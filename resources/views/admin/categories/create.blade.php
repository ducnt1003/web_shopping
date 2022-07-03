@extends('admin.layouts.app')
@section('alert')
    @include('admin.alert')
@stop
@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label >Tên Danh Mục</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Nhập tên danh mục">
            </div>
            <div class="form-group">
                <label>Danh Mục</label>
                <select class="form-control" name="parent_id">
                    <option value="0">Danh mục cha</option>
                    @foreach($categories as $category)
                        <option value={{$category->id}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Mô tả danh mục</label>
                <textarea name="description" value="{{old('description')}}" class="form-control"></textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Thuế</label>
                        <input type="number" name="tax" value="{{old('tax')}}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Đơn vị</label>
                        <input type="text" name="unit" value="{{old('text')}}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="upload">Ảnh</label>
                <input type="file" class="form-control" id="upload">
                <div id="image_show"></div>
                <input type="hidden" id="photo" name="photo">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Tạo Danh Mục</button>
        </div>
        @csrf
    </form>
@stop

