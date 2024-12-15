<?php


namespace App\Http\Services;


use App\Jobs\SendMail;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartService
{
    public function create($request)
    {
        $qty = (int)$request->input('num_product');
        $product_id = (int)$request->input('product_id');

        if ($qty <= 0 || $product_id <= 0) {
            Session::flash('error', 'Số lượng hoặc Sản phẩm không chính xác');
            return false;
        }

        $carts = Session::get('carts');
        if (is_null($carts)) {
            Session::put('carts', [
                $product_id => $qty
            ]);
            return true;
        }

        $exists = Arr::exists($carts, $product_id);
        if ($exists) {
            $carts[$product_id] = $carts[$product_id] + $qty;
            Session::put('carts', $carts);
            return true;
        }

        $carts[$product_id] = $qty;
        Session::put('carts', $carts);

        return true;
    }

    public function getProduct()
    {
        $carts = Session::get('carts');
        if (empty($carts)) return [];

        $productId = array_keys($carts);
        return Product::select('id', 'name', 'price', 'price_sale', 'thumb')
            ->where('active', 1)
            ->whereIn('id', $productId)
            ->get();
    }

    public function update($request)
    {
        Session::put('carts', $request->input('num_product'));

        return true;
    }

    public function remove($id)
    {
        $carts = Session::get('carts');
        unset($carts[$id]);

        Session::put('carts', $carts);
        return true;
    }

    public function addCart($request)
    {
        try {
            DB::beginTransaction();

            $carts = Session::get('carts');

            if (is_null($carts))
                return false;

            $customer = Customer::create([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'address' => $request->input('address'),
                'email' => $request->input('email'),
                'content' => $request->input('content'),
                'created_at' => now(),
            ]);

            $this->infoProductCart($carts, $customer->id);

            DB::commit();
            Session::flash('success', 'Đặt Hàng Thành Công');

            #Queue
            SendMail::dispatch($request->input('email'))->delay(now()->addSeconds(2));

            Session::forget('carts');
        } catch (\Exception $err) {
            DB::rollBack();
            Session::flash('error', 'Đặt Hàng Lỗi, Vui lòng thử lại sau');
            return false;
        }

        return true;
    }

    protected function infoProductCart($carts, $customer_id)
{
    $productId = array_keys($carts);
    $products = Product::select('id', 'name', 'price', 'price_sale', 'thumb')
        ->where('active', 1)
        ->whereIn('id', $productId)
        ->get();

    $data = [];
    $user_id = auth()->id();

    foreach ($products as $product) {
        $qtyInCart = $carts[$product->id]; // Số lượng đặt

        // Kiểm tra nếu số lượng đặt lớn hơn số lượng tồn kho
        if ($qtyInCart > $product->quantity) {
            // Sử dụng Session::flash để thông báo lỗi
            Session::flash('error', "Sản phẩm {$product->name} không đủ số lượng trong kho. Hiện tại chỉ còn {$product->quantity} sản phẩm.");
            throw new \Exception("Sản phẩm {$product->name} không đủ số lượng trong kho."); // Dừng xử lý
        }

        // Giảm số lượng sản phẩm trong kho
        $product->quantity -= $qtyInCart;
        $product->save();

        // Chuẩn bị dữ liệu để chèn vào bảng carts
        $data[] = [
            'user_id' => $user_id,
            'customer_id' => $customer_id,
            'product_id' => $product->id,
            'pty'   => $qtyInCart,
            'price' => $product->price_sale != 0 ? $product->price_sale : $product->price,
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
