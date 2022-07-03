@extends('admin.layouts.app')
@section('css')
<link rel="stylesheet" href="/template/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Bootstrap4 Duallistbox -->
<link rel="stylesheet" href="/template/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">
<!-- BS Stepper -->
<link rel="stylesheet" href="/template/plugins/bs-stepper/css/bs-stepper.min.css">
<!-- dropzonejs -->
<link rel="stylesheet" href="/template/plugins/dropzone/min/dropzone.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="/template/dist/css/adminlte.min.css">
@stop
@section('alert')
@include('admin.alert')
@stop
@section('content')
<form action="{{route('admin.extras.create-user')}}" method="post">
    <div class="card-body">
        <div class="form-group">
            <label>Tên người dùng</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>User Name</label>
            <input type="text" name="username" class="form-control">
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email"  class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label>Số điện thoại</label>
                    <input type="text" name="phone" class="form-control">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="birthday">Ngày sinh</label>
            <input type="date" name="birthday" class="form-control">
        </div>
        <div class="form-group">
            <label for="upload">Ảnh</label>
            <input type="file" class="form-control" id="upload">
            <div id="image_show">
            </div>
            <input type="hidden" id="photo" name="photo">
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label>Vai trò</label>
                <select name="role" class="form-control select2 " style="width: 20%;">
                    @foreach($roles as $role)                  
                    <option value="{{$role->id}}">{{$role->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-md-6">
                <label>Cửa hàng</label>
                <select name="store" class="form-control select2 " style="width: 20%;">
                    @foreach($stores as $store)
                    <option value="{{$store->id}}">{{$store->name}}</option>
                    @endforeach
                </select>

            </div>
        </div>
        <div class="form-group">
            <label>Mật khẩu</label>
            <input type="text" name="password" class="form-control">
        </div>
    </div>


    <div class="card-footer">
        <button type="submit" class="btn btn-primary">Tạo</button>
    </div>
    @csrf
</form>
@stop
@section('js')
<script src="/template/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Select2 -->
<script src="/template/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="/template/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="/template/plugins/moment/moment.min.js"></script>
<script src="/template/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="/template/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="/template/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="/template/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->
<script src="/template/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<!-- dropzonejs -->
<script src="/template/plugins/dropzone/min/dropzone.min.js"></script>
<!-- AdminLTE App -->
<script src="/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/template/dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()
        $('.select2bs4').select2({

            theme: 'bootstrap4'

        })

        //Bootstrap Duallistbox

        $('.duallistbox').bootstrapDualListbox()

    })
</script>

@stop