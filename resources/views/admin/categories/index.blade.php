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
        <div class="card-footer clearfix">
            {{$categories->links('vendor.pagination.bootstrap-4')}}
        </div>
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
