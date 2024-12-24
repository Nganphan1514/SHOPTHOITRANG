<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Services\CartService;
use App\Models\Cart;

class CartController extends Controller
{
    protected $cart;
    public function __construct(CartService $cart)
    {
        $this->cart = $cart;
    }

    public function index()
    {
        return view('admin.carts.customer', [
            'title' => 'Danh Sách Đơn Đặt Hàng',
            'customers' => $this->cart->getCustomer()
        ]);
    }

    public function index_user()
    {
        $user_id = auth()->id(); // Lấy user_id của người dùng hiện tại
        $customers = $this->cart->getProductByUserId($user_id);
        // dd($customers);

        return view('admin.users.order', [
            'title' => 'Sản Phẩm Đã Đặt',
            'customers' => $customers
        ]);
    }

    public function show(Customer $customer)
    {
        $carts = $this->cart->getProductForCart($customer);

        return view('admin.carts.detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }
    public function updateStatus(Request $request)
    {
        $cart = Cart::find($request->cart_id);

        if ($cart) {
            $cart->status_id = $request->status_id;
            $cart->save();

            return response()->json([
                'message' => 'Status updated successfully',
                'status' => $cart->status_id,
            ], 200);
        }

        return response()->json([
            'message' => 'Cart not found',
        ], 404);
    }
    public function show_user(Customer $customer)
    {
        $carts = $this->cart->getProductForCart($customer);

        return view('admin.users.detail', [
            'title' => 'Chi Tiết Đơn Hàng: ' . $customer->name,
            'customer' => $customer,
            'carts' => $carts
        ]);
    }
}
