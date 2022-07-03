@extends('admin.layouts.app')
@section('alert')
    @include('admin.alert')
@stop
@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label >Tên Thương Hiệu</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Nhập tên thương hiệu">
            </div>
            <div class="form-group">
                <label for="upload">Ảnh</label>
                <input type="file" class="form-control" id="upload">
                <div id="image_show"></div>
                <input type="hidden" id="photo" name="photo">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo </button>
        </div>
        @csrf
    </form>
@stop

