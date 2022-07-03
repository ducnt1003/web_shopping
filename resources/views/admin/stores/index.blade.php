@extends('admin.layouts.app')
@section('alert')
    @include('admin.alert')
@stop
@section('content')
    <table id="example2" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <td>STT</td>
                <td>Tên Cửa Hàng</td>
                <td>Địa Chỉ</td>
                <td>Số Điện Thoại</td>
                <td>&nbsp;</td>

            </tr>
        </thead>
        <tbody>
        @forelse($stores as $store)
            <tr>
                <td>{{$store->id}}</td>
                <td>{{$store->name}}</td>
                <td>{{$store->address}}</td>
                <td>{{$store->phone}}</td>

                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-primary" href="{{ route('admin.stores.edit',$store->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="button" class="delete btn btn-danger" data="{{$store->id}}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5"><p>No stores</p></td>
            </tr>
        @endforelse
        </tbody>
    </table>
@stop

@section('modal')
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('admin.stores.delete')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="store_id" id="store_id" value="0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">xóa store!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="border: 0px"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        bạn có muốn xóa store này?
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
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.min.js"></script>
    
    
    <script type="text/javascript">
        $('.delete').click(function(){
            $('#store_id').val($(this).attr('data'))
            var myModal = new bootstrap.Modal($('#deleteModal'),
                {
                    keyboard: false
                });
            myModal.show();
        });
    </script>
 
    <script type="text/javascript">
    $(document).ready(function() {
        $('#example2').DataTable( {
            // dom: 'Bfrtip',     
        } );
    } );
    </script>
@stop




