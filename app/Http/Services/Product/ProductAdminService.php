<?php


namespace App\Http\Services\Product;

use Illuminate\Support\Facades\Log;
use App\Models\Menu;
use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Support\Facades\Session;



class ProductAdminService
{
    public function getMenu()
    {
        return Menu::where('active', 1)->get();
    }

    protected function isValidPrice($request)
    {
        if ($request->input('price') != 0 && $request->input('price_sale') != 0
            && $request->input('price_sale') >= $request->input('price')
        ) {
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        if ($request->input('price_sale') != 0 && (int)$request->input('price') == 0) {
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }

        return  true;
    }

    public function insert($request)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $request->except('_token');
            Product::create($request->all());

            Session::flash('success', 'Thêm Sản phẩm thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Thêm Sản phẩm lỗi');
            Log::info($err->getMessage());
            return  false;
        }

        return  true;
    }

    public function get()
    {
        return Product::with('menu')
            ->orderByDesc('id')->paginate(15);
    }

    public function update($request, $product)
    {
        $isValidPrice = $this->isValidPrice($request);
        if ($isValidPrice === false) return false;

        try {
            $product->fill($request->input());
            $product->save();
            Session::flash('success', 'Cập nhật thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Có lỗi vui lòng thử lại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request)
    {
        $product = Product::where('id', $request->input('id'))->first();
        if ($product) {
            $product->sizes()->detach();
            $product->delete();
            return true;
        }

        return false;
    }
    // public function store($data)
    // {
    //     // Tạo sản phẩm mới
    //     $product = Product::create([
    //         'name' => $data['name'],
    //         'menu_id' => $data['menu_id'],
    //         'price' => $data['price'],
    //         'price_sale' => $data['price_sale'],
    //         'description' => $data['description'],
    //         'content' => $data['content'],
    //         'thumb' => $data['thumb'],
    //         'active' => $data['active']
    //     ]);

    //     // Lưu các size của sản phẩm
    //     if (isset($data['sizes'])) {
    //         foreach ($data['sizes'] as $sizeId => $quantity) {
    //             if ($quantity === null || $quantity === '') {
    //                 $quantity = 0;  // Set default quantity to 0 if empty or null
    //             }

    //             // Kiểm tra số lượng sản phẩm
    //             if ($quantity < 0) {
    //                 Session::flash('error', 'Số lượng không thể nhỏ hơn 0.');
    //                 return false; // Dừng lại nếu số lượng âm
    //             }

    //             // Lưu size với số lượng đã kiểm tra
    //             ProductSize::create([
    //                 'product_id' => $product->id,
    //                 'size_id' => $sizeId,
    //                 'quantity' => $quantity,
    //             ]);
    //         }
    //     }

    //     return $product;
    // }
}
