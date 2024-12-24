@extends('admin.main')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="update-status-url" content="{{ route('customers.updateStatus') }}">

    <div class="customer mt-3">
        <ul>
            <li>Tên khách hàng: <strong>{{ $customer->name }}</strong></li>
            <li>Số điện thoại: <strong>{{ $customer->phone }}</strong></li>
            <li>Địa chỉ: <strong>{{ $customer->address }}</strong></li>
            <li>Email: <strong>{{ $customer->email }}</strong></li>
            <li>Ghi chú: <strong>{{ $customer->content }}</strong></li>
        </ul>
    </div>

    <div class="carts">
        @php $total = 0; @endphp
        <table class="table">
            <tbody>
            <tr class="table_head">
                <th class="column-1">IMG</th>
                <th class="column-2">Product</th>
                <th class="column-3">Size</th>
                <th class="column-4">Price</th>
                <th class="column-6">Total</th>
            </tr>

            @foreach($carts as $key => $cart)
                @php
                    $price = $cart->price * $cart->pty;
                    $total += $price;
                @endphp
                <tr>
                    <td class="column-1">
                        <div class="how-itemcart1">
                            <img src="{{ $cart->product->thumb }}" alt="IMG" style="width: 100px">
                        </div>
                    </td>
                    <td class="column-2">{{ $cart->product->name }}</td>
                    <th class="column-3">{{$cart->sizes->name}}</th>
                    <td class="column-4">{{ number_format($cart->price, 0, '', '.') }}</td>
                    <td class="column-5">{{ $cart->pty }}</td>
                    <td class="column-6">{{ number_format($price, 0, '', '.') }}</td>
                </tr>
            @endforeach
                <tr>
                    <td colspan="4" class="text-right">Tổng Tiền</td>
                    <td>{{ number_format($total, 0, '', '.') }}</td>
                </tr>

                @switch($cart->status_id)
    @case(1)
        <tr>
            <th>Trạng thái đơn:</th>
            <th>
            <p>Đơn hàng đang chờ xét duyệt<p>
            </th>
            <th>
            <button class="btn btn-success update-status" data-id="{{ $cart->id }}" data-status="3">Duyệt</button>
            <button class="btn btn-danger update-status" data-id="{{ $cart->id }}" data-status="2">Từ chối</button>
        </th>
        </tr>
        @break
    @case(2)
    <tr>
        <th>Trạng thái đơn:</th>
        <th>
        <p>Đơn hàng đã bị từ chối bởi bạn<p></th>
    </tr>
    @break
    @case(3)
        <tr>
            <th>Trạng thái đơn:</th>
        <th><p>Đơn hàng đã được duyệt chờ vận chuyển<p></th>
            <th>
        <button class="btn btn-primary update-status" data-id="{{ $cart->id }}" data-status="4">Vận chuyển</button>
    </th>
    </tr>
        @break

    @case(4)
        <tr>
            <th>Trạng thái đơn:</th>
            <th><p>Đơn hàng đang giao<p></th>
        </tr>
        @break

    @case(5)
    <th>Trạng thái đơn:</th>
        <tr>Giao đơn thành công</tr>
        @break

    @case(6)
    <th>Trạng thái đơn:</th>
        <tr>Giao đơn thất bại</tr>
        @break    
    @default
        <tr>
            <th>Trạng thái đơn:</th>
            <th><p>Trạng thái không xác định<p></th>
        </tr>
@endswitch


            </tbody>
        </table>
    </div>
@endsection

<script src="{{asset('js/statusorder.js')}}"></script>


