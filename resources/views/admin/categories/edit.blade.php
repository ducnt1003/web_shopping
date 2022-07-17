@extends('admin.layouts.app')
@section('alert')
    @include('admin.alert')
@stop
@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label >Name</label>
                <input type="text" name="name" value="{{$category->name}}" class="form-control" placeholder="Category name">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select class="form-control" name="parent_id">
                    <option value="0" {{$category->parent_id==0 ? 'selected' : ''}}>Parent Category</option>
                    @foreach($categories_parent as $category_parent)
                        <option value="{{$category_parent->id}}"
                            {{$category->parent_id==$category_parent->id ? 'selected' : ''}}>
                            {{$category_parent->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control">{{$category->description}}</textarea>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Tax</label>
                        <input type="number" name="tax" value="{{$category->tax}}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Unit</label>
                        <input type="text" name="unit" value="{{$category->unit}}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="upload">Photo</label>
                <input type="file" class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{$category->photo}}" target="_blank">
                        <img src="{{$category->photo}}"width="100px">
                    </a>
                </div>
                <input type="hidden" id="photo" value="{{$category->photo}}" name="photo">
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
        @csrf
    </form>
@stop



