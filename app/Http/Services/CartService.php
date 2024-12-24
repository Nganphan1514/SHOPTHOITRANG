<?php


namespace App\Http\Services;


use App\Jobs\SendMail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class CartService
{
    public function create($request)
    {
        $qty = (int)$request->input('num_product');
        $product_id = (int)$request->input('product_id');
        $size_name = $request->input('size_name'); // Lấy size từ request

        if ($qty <= 0 || $product_id <= 0 || empty($size_name)) {
            Session::flash('error', 'Số lượng, sản phẩm hoặc size không chính xác');
            return false;
        }

        $carts = Session::get('carts', []);

        // Tạo key riêng cho từng sản phẩm và size
        $key = $product_id . '-' . $size_name;

        if (isset($carts[$key])) {
            $carts[$key] += $qty; // Tăng số lượng nếu đã tồn tại
        } else {
            $carts[$key] = $qty; // Thêm sản phẩm mới
        }

        Session::put('carts', $carts);
        return true;
    }


    // public function getProduct()
    // {
    //     $carts = Session::get('carts');
    //     if (empty($carts)) return [];

    //     $productId = array_keys($carts);
    //     return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
    //         ->where('active', 1)
    //         ->whereIn('id', $productId)
    //         ->get();
    // }
    public function getProduct()
    {
        $carts = Session::get('carts');
        if (empty($carts)) return [];

        $productIds = [];
        foreach (array_keys($carts) as $key) {
            [$productId,] = explode('-', $key);
            $productIds[] = $productId;
        }

        return Product::select('id',
            'name',
            'price',
            'price_sale',
            'thumb'
        )
            ->where('active', 1)
            ->whereIn('id', array_unique($productIds))
            ->get();
    }

    // public function update($request)
    // {
    //     Session::put('carts', $request->input('num_product'));

    //     return true;
    // }
    public function update($request)
    {
        $newQuantities = $request->input('num_product');
        if (!is_array($newQuantities)) {
            return false;
        }

        $currentCart = Session::get('carts', []);
        foreach ($newQuantities as $key => $qty) {
            if (isset($currentCart[$key]) && $qty > 0) {
                $currentCart[$key] = (int)$qty;
            }
        }

        Session::put('carts', $currentCart);
        return true;
    }

    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);

        Session::put('carts', $carts);
        return true;
    }

    // public function addCart($request)
    // {
    //     try {
    //         DB::beginTransaction();

    //         $carts = Session::get('carts');

    //         if (is_null($carts))
    //             return false;

    //         $customer = Customer::create([
    //             'name' => $request->input('name'),
    //             'phone' => $request->input('phone'),
    //             'address' => $request->input('address'),
    //             'email' => $request->input('email'),
    //             'content' => $request->input('content'),
    //             'created_at' => now(),
    //         ]);

    //         $this->infoProductCart($carts, $customer->id);

    //         DB::commit();
    //         Session::flash('success', 'Đặt Hàng Thành Công');

    //         #Queue
    //         SendMail::dispatch($request->input('email'))->delay(now()->addSeconds(2));

    //         Session::forget('carts');
    //     } catch (\Exception $err) {
    //         DB::rollBack();
    //         Session::flash('error', 'Đặt Hàng Lỗi, Vui lòng thử lại sau');
    //         return false;
    //     }

    //     return true;
    // }
    public function addCart($request)
    {
        try {
            // 1. Validate dữ liệu đầu vào
            if (!$this->validateOrderData($request)) {
                Session::flash('error', 'Thông tin đặt hàng không hợp lệ');
                return false;
            }

            // 2. Kiểm tra giỏ hàng
            $carts = Session::get('carts');
            if (empty($carts)) {
                Session::flash('error', 'Giỏ hàng trống');
                return false;
            }

            DB::beginTransaction();

            // 3. Tạo khách hàng với validation
            try {
                $customer = Customer::create([
                    'name' => trim($request->input('name')),
                    'phone' => trim($request->input('phone')),
                    'address' => trim($request->input('address')),
                    'email' => trim($request->input('email')),
                    'content' => trim($request->input('content')),
                    'created_at' => now(),
                ]);
            } catch (\Exception $e) {
                throw new \Exception('Lỗi khi tạo thông tin khách hàng: ' . $e->getMessage());
            }

            // 4. Xử lý giỏ hàng và kiểm tra kết quả
            $cartResult = $this->infoProductCart($carts, $customer->id);
            if (!$cartResult) {
                throw new \Exception('Lỗi khi xử lý giỏ hàng');
            }

            // 5. Hoàn tất giao dịch
            DB::commit();

            // 6. Gửi email và xóa giỏ hàng
            try {
                SendMail::dispatch($request->input('email'))->delay(now()->addSeconds(2));
            } catch (\Exception $e) {
                Log::error('Lỗi gửi email: ' . $e->getMessage());
                // Không throw exception vì đơn hàng vẫn thành công
            }

            Session::forget('carts');
            Session::flash('success', 'Đặt Hàng Thành Công');
            return true;
        } catch (\Exception $err) {
            DB::rollBack();
            Log::error('Lỗi đặt hàng: ' . $err->getMessage());
            Session::flash('error', 'Đặt Hàng Lỗi: ' . $err->getMessage());
            return false;
        }
    }

    // Thêm phương thức validate
    private function validateOrderData($request)
    {
        if (
            empty(trim($request->input('name'))) ||
            empty(trim($request->input('phone'))) ||
            empty(trim($request->input('address'))) ||
            empty(trim($request->input('email'))) ||
            !filter_var($request->input('email'), FILTER_VALIDATE_EMAIL)
        ) {
            return false;
        }
        return true;
    }

    //     protected function infoProductCart($carts, $customer_id)
    // {
    //     $productId = array_keys($carts);
    //     $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')
    //         ->where('active', 1)
    //         ->whereIn('id', $productId)
    //         ->get();

    //     $data = [];
    //     $user_id = auth()->id();

    //     foreach ($products as $product) {
    //         $qtyInCart = $carts[$product->id]; // Số lượng đặt

    //         // Kiểm tra nếu số lượng đặt lớn hơn số lượng tồn kho
    //         if ($qtyInCart > $product->quantity) {
    //             // Sử dụng Session::flash để thông báo lỗi
    //             Session::flash('error', "Sản phẩm {$product->name} không đủ số lượng trong kho. Hiện tại chỉ còn {$product->quantity} sản phẩm.");
    //             throw new \Exception("Sản phẩm {$product->name} không đủ số lượng trong kho."); // Dừng xử lý
    //         }

    //         // Giảm số lượng sản phẩm trong kho
    //         $product->quantity -= $qtyInCart;
    //         $product->save();

    //         // Chuẩn bị dữ liệu để chèn vào bảng carts
    //         $data[] = [
    //             'user_id' => $user_id,
    //             'customer_id' => $customer_id,
    //             'product_id' => $product->id,
    //             'pty'   => $qtyInCart,
    //             'price' => $product->price_sale != 0 ? $product->price_sale : $product->price,
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ];
    //     }

    //     return Cart::insert($data);
    // }
    // protected function infoProductCart($carts, $customer_id)
    // {
    //     $data = [];
    //     $user_id = auth()->id();

    //     foreach ($carts as $key => $qtyInCart) {
    //         // Tách product_id và size_name từ key
    //         [$productId, $sizeName] = explode('-', $key);

    //         // Lấy thông tin từ bảng product_size
    //         $productSize = DB::table('product_size')
    //         ->where('product_id', $productId)
    //             ->where('size_name', $sizeName)
    //             ->first();

    //         if (!$productSize) {
    //             Session::flash('error', "Không tìm thấy sản phẩm hoặc kích thước không hợp lệ.");
    //             throw new \Exception("Product or size not found for ID: {$productId}, Size: {$sizeName}");
    //         }

    //         // Kiểm tra số lượng tồn kho
    //         if ($qtyInCart > $productSize->quantity) {
    //             Session::flash('error', "Sản phẩm {$sizeName} không đủ số lượng. Chỉ còn {$productSize->quantity} sản phẩm.");
    //             throw new \Exception("Not enough stock for Product ID: {$productId}, Size: {$sizeName}");
    //         }

    //         // Giảm số lượng trong kho
    //         DB::table('product_size')
    //         ->where('product_id', $productId)
    //             ->where('size_name', $sizeName)
    //             ->decrement('quantity', $qtyInCart);

    //         // Chuẩn bị dữ liệu để chèn vào bảng carts
    //         $data[] = [
    //             'user_id' => $user_id,
    //             'customer_id' => $customer_id,
    //             'product_id' => $productId,
    //             'size_name' => $sizeName,
    //             'pty' => $qtyInCart,
    //             'price' => $productSize->price, // Lấy giá theo kích thước
    //             'created_at' => now(),
    //             'updated_at' => now(),
    //         ];
    //     }

    //     return Cart::insert($data);
    // }
    protected function infoProductCart($carts, $customer_id)
    {
        $data = [];
        $user_id = auth()->id();

        foreach ($carts as $key => $qtyInCart) {
            // Tách product_id và size_name từ key
            [$productId, $sizeName] = explode('-',
                $key
            );

            // 1. Lấy size_id từ bảng sizes dựa vào size_name
            $size = DB::table('sizes')
            ->where('name',
                $sizeName
            )
            ->first();

            if (!$size) {
                throw new \Exception("Không tìm thấy size: {$sizeName}");
            }

            // 2. Lấy thông tin sản phẩm để lấy giá
            $product = DB::table('products')
                ->select('id', 'price', 'price_sale')
                ->where('id', $productId)
                ->first();

            if (!$product) {
                throw new \Exception("Không tìm thấy sản phẩm với ID: {$productId}");
            }

            // 3. Query bảng product_size với size_id
            $productSize = DB::table('product_size')
                ->where('product_id', $productId)
                ->where('size_id', $size->id)  // Sử dụng size_id thay vì size_name
                ->first();

            if (!$productSize) {
                throw new \Exception("Không tìm thấy sản phẩm hoặc kích thước không hợp lệ.");
            }

            if ($qtyInCart > $productSize->quantity) {
                throw new \Exception("Sản phẩm size {$sizeName} không đủ số lượng. Chỉ còn {$productSize->quantity} sản phẩm.");
            }

            // 4. Giảm số lượng trong kho
            DB::table('product_size')
            ->where('product_id', $productId)
                ->where('size_id', $size->id)  // Sử dụng size_id thay vì size_name
                ->decrement('quantity', $qtyInCart);

            // 5. Tính giá cuối cùng
            $finalPrice = $product->price_sale > 0 ? $product->price_sale : $product->price;

            // 6. Chuẩn bị dữ liệu để chèn vào bảng carts
            $data[] = [
                'user_id' => $user_id,
                'customer_id' => $customer_id,
                'product_id' => $productId,
                'size_id' => $size->id,  // Lưu size_id thay vì size_name
                'pty' => $qtyInCart,
                'price' => $finalPrice,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        return Cart::insert($data);
    }



    public function getCustomer()
    {
        return Customer::orderByDesc('id')->paginate(15);
    }

    public function getProductForCart($customer)
    {
        return $customer->carts()->with(['product' => function ($query) {
            $query->select('id', 'name', 'thumb');
        }])->get();
        
    }

    public function getProductByUserId($user_id, $perPage = 15)
    {
        $carts = Cart::where('user_id', $user_id)
        ->with(['customer:id,name,phone,email', 'product:id,name,thumb'])
        ->paginate($perPage);

        return $carts; 
    }

}
