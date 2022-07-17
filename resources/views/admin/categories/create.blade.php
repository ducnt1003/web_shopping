@extends('admin.layouts.app')
@section('alert')
    @include('admin.alert')
@stop
@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="form-group">
                <label >Name</label>
                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Category Name">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="parent_id">
                    <option value="0">Parrent Category</option>
                    @foreach($categories as $category)
                        <option value={{$category->id}}>{{$category->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" value="{{old('description')}}" class="form-control"></textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tax</label>
                        <input type="number" name="tax" value="{{old('tax')}}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Unit</label>
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
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
        @csrf
    </form>
@stop

