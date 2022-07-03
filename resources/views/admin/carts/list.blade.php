@extends('admin.layouts.app')
@section('alert')
    @include('admin.alert')
@stop
@section('content')
    <table>
        <thead>
        <tr>
            <td>ID</td>
            <td>Tên Khách hàng</td>
            <td>Số điện thoại</td>
            <td>Email</td>
            <td>Ngày đặt hàng</td>
            <td style="width: 100px">&nbsp;</td>
        </tr>
        </thead>
        <tbody>
        @foreach($carts as $cart)
            <tr>
                <td>{{$cart->id}}</td>
                <td>{{$cart->name}}</td>
                <td>{{$cart->phone}}</td>
                <td>{{$cart->email}}</td>
                <td>{{$cart->created_at}}</td>
                <td >
                    <a class="btn btn-primary btn-sm" href="/admin/cart-detail/{{$cart->id}}">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="#"
                       onclick="removeRow({{$cart->id}},'/admin/cart-delete')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
        {{$carts->links('vendor.pagination.bootstrap-4')}}
    </div>
@stop

