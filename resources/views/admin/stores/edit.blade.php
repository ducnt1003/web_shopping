@extends('admin.layouts.app')
@section('alert')
    @include('admin.alert')
@stop
@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label >Tên Cửa Hàng</label>
                <input type="text" name="name" value="{{$store->name}}" class="form-control" placeholder="Nhập tên cửa hàng">
            </div>
            <div class="form-group">
                <label >Địa Chỉ</label>
                <input type="text" name="address" value="{{$store->address}}" class="form-control" placeholder="Nhập địa chỉ">
            </div>
            <div class="form-group">
                <label >Số Điện Thoại</label>
                <input type="text" name="phone" value="{{$store->phone}}" class="form-control" placeholder="Nhập số điện thoại">
            </div>
        </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </div>
        @csrf
    </form>
@stop



