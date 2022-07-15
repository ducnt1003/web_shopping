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
                    <button type="button" class="delete btn btn-danger" data="{{$product->id}}">
                        <i class="fas fa-trash"></i>
                    </button>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>
    {{-- <div class="card-footer clearfix">
        {{$products->links('vendor.pagination.bootstrap-4')}}
    </div> --}}
    
@stop
@section('modal')
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('admin.products.delete')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="product_id" id="product_id" value="0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Xóa product!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="border: 0px"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        Bạn có muốn xóa product này?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">đóng</button>
                        <button type="submit" class="btn btn-danger">xóa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop


@section('js') 
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
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
    <script type="text/javascript">
        $('.delete').click(function(){
            $('#product_id').val($(this).attr('data'))
            var myModal = new bootstrap.Modal($('#deleteModal'),
                {
                    keyboard: false
                });
            myModal.show();
        });
    </script>
@stop
