@extends('admin.layouts.app')
@section('alert')
    @include('admin.alert')
@stop
@section('content')
    <table id="example" class="display nowrap" cellspacing="0" width="100%">
        <thead>
        <tr>
            <td>ID</td>
            <td>Tên sản phẩm</td>
            <td>Danh mục</td>
            <td>Mô tả</td>
            <td>Giá</td>
            <td>Màu sắc</td>
{{--            <td>Nhãn hiệu</td>--}}
{{--            <td>Nhân viên tạo</td>--}}
            <td>Active</td>
            <td>Photo</td>
            <td>Barcode</td>
            <td style="width: 100px">&nbsp;</td>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->category->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{number_format($product->price)}}</td>
                <td>{{$product->color}}</td>
{{--                <td>{{$product->createdBy? $product->createdBy->name:''}}</td>--}}
{{--                <td>{{$product->brand->name}}</td>--}}
                <td>{!! \App\Helpers\Helper::active($product->active) !!}</td>
                <td>
                    @if ($product->photo)
                        <img class="img-thumbnail" width="120px" src="{{ asset($product->photo) }}" alt="{{ $product->name }}" />
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/products/barcodes/{{$product->id}}">
                        <i class="fas fa-barcode"></i>
                    </a>
                </td>
                <td >
                    <a class="btn btn-primary btn-sm" href="/admin/products/edit/{{$product->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <a class="btn btn-danger btn-sm" href="#"
                       onclick="removeRow({{$product->id}},'/admin/products/delete')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="card-footer clearfix">
        {{$products->links('vendor.pagination.bootstrap-4')}}
    </div>
    
@stop
@section('js') 
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>

    <script src="{{ asset('template/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('template/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('template/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('template/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('template/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>


    <script type="text/javascript">
    $(document).ready(function() {
        $('#example').DataTable( {
            dom: 'Bfrtip',
            // buttons: [
            //     'copy', 
            // ]                   
            // "info": false,  
               
        } );
    } );
    </script>
@stop
