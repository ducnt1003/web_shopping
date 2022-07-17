@extends('admin.layouts.app')
@section('alert')
    @include('admin.alert')
@stop
@section('content')
    <form action="" method="post">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Name</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"
                            placeholder="Name product">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="category_id">
                            @foreach ($categories as $category)
                                <option value={{ $category->id }}>{{ $category->name }}</option>
                            @endforeach
                            <option value="0">Other</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Brand</label>
                        <select class="form-control" name="brand_id">
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                            <option value="0">Other</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Created User</label>
                        <input type="hidden" name="created_by" value="{{ $users->id }}" class="form-control">
                        <input value="{{ $users->name }}" class="form-control" disabled>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Price</label>
                        <input type="number" name="price" value="{{ old('price') }}" class="form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Color</label>
                        <input type="text" name="color" value="{{ old('color') }}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="hidden" name="product_code" value="{{ $product_code }}" class=" form-control">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <input type="hidden" name="barcode" value="{{ $barcode }}" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>
            <label for="upload">Photo</label>
            <div class="row">     
                <div class="col-md-3">
                    <div class="form-group"> 
                        <input type="file" class="form-control upload-img" id="upload">
                        <div id="image_show"></div>
                        <input type="hidden" id="photo" name="photo">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="file" class="form-control upload-img" id="upload1">
                        <div id="image_show1"></div>
                        <input type="hidden" id="photo1" name="photo1">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="file" class="form-control upload-img" id="upload2">
                        <div id="image_show2"></div>
                        <input type="hidden" id="photo2" name="photo2">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input type="file" class="form-control upload-img" id="upload3">
                        <div id="image_show3"></div>
                        <input type="hidden" id="photo3" name="photo3">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Active</label>
                <div class="form-check">
                    <input class="form-check-input" value="1" type="radio" name="active" id="active"
                        checked="">
                    <label class="form-check-label" for="active">Yes</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" value="0" type="radio" name="active" id="no_active">
                    <label class="form-check-label" for="no_active">No</label>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
        @csrf
    </form>
@stop
