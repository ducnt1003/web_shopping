@extends('admin.layouts.app')

@section('content')
    <div class="">
        <ul>
            <li>Tên khách hàng: <strong>{{$customer->name}}</strong></li>
            <li>Số điện thoại: <strong>{{$customer->phone}}</strong></li>
            <li>Địa chỉ: <strong>{{$customer->address}}</strong></li>
            <li>Email: <strong>{{$customer->email}}</strong></li>
        </ul>
    </div>

        <table>
            <thead>
            <tr>
                <td >Tên sản phẩm</td>
                <td >Ảnh</td>
                <td>Giá</td>
                <td>Số lượng</td>
                <td>Thành tiền</td>
            </tr>
            </thead>
            <tbody>
            @php
                $total = 0;
            @endphp
            @foreach($carts as $cart)
                @php
                    $priceEnd = $cart->price * $cart->quantity;
                    $total += $priceEnd;
                @endphp
                <tr>
                    <td>{{$cart->product->name}}</td>
                    <td>
                        @if ($cart->product->photo)
                            <img class="img-thumbnail" width="120px" src="{{ asset($cart->product->photo) }}" alt="{{ $cart->product->name }}" />
                        @endif
                    </td>
                    <td>${{number_format($cart->price)}}</td>
                    <td>{{$cart->quantity}}</td>
                    <td>${{number_format($priceEnd)}}</td>
                </tr>
            @endforeach
            <tr style="margin-top: 50px">
                <td class="text-center" colspan="4"><strong>Tổng tiền: </strong></td>
                <td><strong>${{number_format($total)}}</strong></td>
            </tr>
            </tbody>
        </table>
@stop
