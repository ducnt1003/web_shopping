@extends('admin.layouts.app')
@section('alert')
    @include('admin.alert')
@stop
@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label >Tên Thương Hiệu</label>
                <input type="text" name="name" value="{{$brand->name}}" class="form-control" placeholder="Nhập tên thương hiệu">
            </div>
            <div class="form-group">
                <label for="upload">Ảnh</label>
                <input type="file" class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{$brand->photo}}" target="_blank">
                        <img src="{{$brand->photo}}"width="100px">
                    </a>
                </div>
                <input type="hidden" id="photo" value="{{$brand->photo}}" name="photo">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật</button>
        </div>
        @csrf
    </form>
@stop



