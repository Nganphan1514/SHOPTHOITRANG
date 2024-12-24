<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Services\Product\ProductAdminService;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Size;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductAdminService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->get();

        // Lấy size còn hàng cho mỗi sản phẩm
        foreach ($products as $product) {
            $available_sizes = $product->sizes_have
                ->pluck('name') // Lấy tên size
                ->implode(', '); // Nối các size còn hàng lại với dấu phẩy

            // Nếu không có size còn hàng, gán giá trị mặc định
            $product->available_sizes = $available_sizes ?: 'Không có size còn hàng';
        }

        return view('admin.product.list', [
            'title' => 'Danh Sách Sản Phẩm',
            'products' => $products
        ]);
    }


    public function create()
    {
        return view('admin.product.add', [
            'title' => 'Thêm Sản Phẩm Mới',
            'menus' => $this->productService->getMenu(),
            'sizes' => Size::all() // Lấy tất cả các size từ bảng sizes

        ]);
    }


    public function store(Request $request, ProductRequest $productService)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'menu_id' => 'required|integer',
            'price' => 'required|numeric',
            'price_sale' => 'nullable|numeric',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'thumb' => 'required|string',
            'active' => 'required|boolean',
            'sizes' => 'nullable|array',
            'sizes.*' => 'nullable|integer|min:0', // Số lượng size phải >= 0
        ]);

        $product = $productService->store($data);

        return redirect()->back()->with('success', 'Thêm Sản phẩm thành công');;
    }

    public function show(Product $product)
    {
        return view('admin.product.edit', [
            'title' => 'Chỉnh Sửa Sản Phẩm',
            'product' => $product,
            'sizes' => Size::all() ,
            'menus' => $this->productService->getMenu()
        ]);
    }


    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'menu_id' => 'required|integer',
            'price' => 'required|numeric',
            'price_sale' => 'nullable|numeric',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'thumb' => 'required|string',
            'active' => 'required|boolean',
            'sizes' => 'nullable|array',  // Ensure 'sizes' is an array
            'sizes.*' => 'nullable|integer|min:0',  // Each size must be an integer with minimum value 0
        ]);
        $product->update([
            'name' => $data['name'],
            'menu_id' => $data['menu_id'],
            'price' => $data['price'],
            'price_sale' => $data['price_sale'],
            'description' => $data['description'],
            'content' => $data['content'],
            'thumb' => $data['thumb'],
            'active' => $data['active'],
        ]);

        // Update the sizes and quantities
        if (isset($data['sizes'])) {
            foreach ($data['sizes'] as $sizeId => $quantity) {
                // Update the quantity of each size in the pivot table (product_size)
                $product->sizes()->updateExistingPivot($sizeId, ['quantity' => $quantity]);
            }
        }

        $result = $this->productService->update($request, $product);
        if ($result) {
            return redirect('/admin/products/list');
        }

        return redirect()->back()->with('success', 'Sản phẩm đã được cập nhật thành công');
    }


    public function destroy(Request $request)
    {
        $result = $this->productService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công sản phẩm'
            ]);
        }

        return response()->json([ 'error' => true ]);
    }
}
