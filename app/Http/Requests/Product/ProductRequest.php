<?php

namespace App\Http\Requests\Product;

use App\Models\Product;
use App\Models\ProductSize;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;


class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'thumb' => 'required'
        ];
    }
    public function store($data)
    {
        $product = Product::create([
            'name' => $data['name'],
            'menu_id' => $data['menu_id'],
            'price' => $data['price'],
            'price_sale' => $data['price_sale'],
            'description' => $data['description'],
            'content' => $data['content'],
            'thumb' => $data['thumb'],
            'active' => $data['active']
        ]);

        if (isset($data['sizes']) && is_array($data['sizes'])) {
            foreach ($data['sizes'] as $sizeId => $quantity) {
                if ($quantity < 0) {
                    Session::flash('error', 'Số lượng không thể nhỏ hơn 0.');
                    return false; // Dừng lại nếu số lượng âm
                }

                // Nếu không có size, gán số lượng là 0
                $quantity = $quantity ?? 0;

                // Chỉ lưu nếu số lượng lớn hơn hoặc bằng 0
                ProductSize::create([
                    'product_id' => $product->id,
                    'size_id' => $sizeId,
                    'quantity' => $quantity,
                ]);
            }
        }

        return $product;
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên sản phẩm',
            'thumb.required' => 'Ảnh đại diện không được trống'
        ];
    }
}
