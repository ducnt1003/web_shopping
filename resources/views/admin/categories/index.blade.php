@extends('admin.layouts.app')
@section('alert')
    @include('admin.alert')
@stop
@section('content')
    <table id="example" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Description</td>
                <td>Tax</td>
                <td>Unit</td>
                <td>Photo</td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
        {!! \App\Helpers\Helper::category_list($categories) !!}
        </tbody>
        {{-- <div class="card-footer clearfix">
            {{$categories->links('vendor.pagination.bootstrap-4')}}
        </div> --}}
    </table>
@stop
@section('delete_category_js')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script>
        function removeRow(id,url){
            if (confirm('Bạn có chắc muốn xóa')){
                $.ajax({
                    type:'DELETE',
                    datatype:'JSON',
                    data:{id},
                    url:url,
                    success: function (result){
                        if (result.error === false){
                            alert(result.message);
                            location.reload();
                        }
                        else {
                            alert('Xóa lỗi vui lòng thử lại');
                        }
                    }
                })
            }
        }
    </script>
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