@extends('main')

@section('content')
    <form class="bg0 p-t-130" method="post">
        @include('admin.alert')

        @if (count($products) != 0)
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
                        <div class="m-l-25 m-r--38 m-lr-0-xl">
                            <div class="wrap-table-shopping-cart">
                                @php $total = 0; @endphp
                                <table class="table-shopping-cart">
                                    <tbody>
                                    <tr class="table_head">
                                        <th class="column-1">Sản Phẩm</th>
                                        <th class="column-2"></th>
                                        <th class="column-3">Size</th>
                                        <th class="column-4">Giá</th>
                                        <th class="column-5">Số Lượng</th>
                                        {{-- <th class="column-6">Tổng </th> --}}
                                        <th class="column-7">&nbsp;</th>
                                    </tr>

@foreach($carts as $key => $quantity)
    @php
        [$product_id, $size_name] = explode('-', $key); // Tách key thành product_id và size_name
        $product = $products->firstWhere('id', $product_id); // Lấy thông tin sản phẩm
        $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
        $priceEnd = $price * $quantity;
        $total += $priceEnd;
    @endphp

    <tr class="table_row" id="product-row-{{ $product_id }}">
        <td class="column-1">
            <div class="how-itemcart1">
                <img src="{{ $product->thumb }}" alt="IMG">
            </div>
        </td>
        <td class="column-2">{{ $product->name }}</td>
        <td class="column-3">{{ $size_name }}</td> <!-- Hiển thị size -->
        <td class="column-4" id="price-{{ $product_id }}">{{ number_format($price, 0, '', '.') }}</td>
        <td class="column-5" >
            <div class="quantity-controls">
                {{-- <button type="button" class="btn-quantity" onclick="updateQuantity('{{ $key }}', -1)">-</button> --}}
                <input type="number" 
                       name="num_product[{{ $key }}]" 
                       value="{{ $quantity }}" 
                       class="product-quantity"
                       min="1"
                       onchange="updateProductTotal('{{ $key }}', this.value)"
                       id="quantity-{{ $key }}"
                       style="width: 50px; text-align: center;margin-left: 40%">
                {{-- <button type="button" class="btn-quantity" onclick="updateQuantity('{{ $key }}', 1)">+</button> --}}
            </div>
        </td>
        {{-- <td class="column-6" id="total-{{ $key }}">{{ number_format($priceEnd, 0, '', '.') }}</td> --}}
        <td class="p-r-15">
            <a href="/carts/delete/{{ $key }}">Xóa</a>
        </td>
    </tr>
@endforeach


{{-- Add this JavaScript section at the bottom of your view --}}
@section('scripts')
<script>
function updateQuantity(productId, change) {
    const input = document.getElementById(`quantity-${productId}`);
    let newValue = parseInt(input.value) + change;
    if (newValue < 1) newValue = 1;
    input.value = newValue;
    updateProductTotal(productId, newValue);
}

function updateProductTotal(productId, quantity) {
    const priceElement = document.getElementById(`price-${productId}`);
    const totalElement = document.getElementById(`total-${productId}`);
    
    // Get price (remove dots and convert to number)
    const price = parseInt(priceElement.innerText.replace(/\./g, ''));
    const newTotal = price * quantity;
    
    // Update total with formatting
    totalElement.innerText = newTotal.toLocaleString('vi-VN').replace(/,/g, '.');
    
    // Update cart total
    updateCartTotal();
}

function updateCartTotal() {
    let total = 0;
    const totalElements = document.querySelectorAll('[id^="total-"]');
    
    totalElements.forEach(element => {
        total += parseInt(element.innerText.replace(/\./g, ''));
    });
    
    // Update the cart total display
    const cartTotalElement = document.querySelector('.mtext-110.cl2');
    cartTotalElement.innerText = total.toLocaleString('vi-VN').replace(/,/g, '.');
}
</script>
@endsection

                                    </tbody>
                                </table>
                            </div>

                            <div class="flex-w flex-sb-m bor15 p-t-18 p-b-15 p-lr-40 p-lr-15-sm">
                                <input type="submit" value="Update Cart" formaction="/update-cart"
                                    class="flex-c-m stext-101 cl2 size-119 bg8 bor13 hov-btn3 p-lr-15 trans-04 pointer m-tb-10">
                                @csrf
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
                        <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
                            <h4 class="mtext-109 cl2 p-b-30">
                                Giỏ Hàng
                            </h4>

                            <div class="flex-w flex-t p-t-27 p-b-33">
                                <div class="size-208">
                                    <span class="mtext-101 cl2">
                                        Tổng:
                                    </span>
                                </div>

                                <div class="size-209 p-t-1">
                                    <span class="mtext-110 cl2">
                                        {{ number_format($total, 0, '', '.') }}
                                    </span>
                                    <span> VND </span>
                                </div>
                            </div>
                            <p style="color: red;">Lưu ý khi đặt bạn không thể hủy đơn</p>
                            <div class="flex-w flex-t bor12 p-t-15 p-b-30">

                                <div class="size-100 p-r-18 p-r-0-sm w-full-ssm">

                                    <div class="p-t-15">
                                        <h4>
                                        <span>
                                            Thông Tin Khách Hàng
                                        </span>
                                        </h4>
                                        <br>
                                        <p>Tên khách hàng</p>
                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="name" value="{{$user->name}}" required>
                                        </div>
                                        <p>Số Điện Thoại</p>
                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="phone" value="{{$user->SĐT}}" required>
                                        </div>
                                        <p>Địa chỉ</p>
                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="address" value="{{$user->address}}">
                                        </div>
                                        <p>Email</p>
                                        <div class="bor8 bg0 m-b-12">
                                            <input class="stext-111 cl8 plh3 size-111 p-lr-15" type="text" name="email" value="{{$user->email}}">
                                        </div>
                                        <p>Nội dung</p>
                                        <div class="bor8 bg0 m-b-12">
                                            <textarea class="cl8 plh3 size-111 p-lr-15" name="content" placeholder="Nhập nội dung ý kiến nếu cần"></textarea>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
                               Đặt Hàng
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </form>
    @else
        <div class="text-center"><h2>Giỏ hàng trống!</h2></div>
        <br><br>
    @endif
@endsection
