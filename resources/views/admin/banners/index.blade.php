@extends('admin.layouts.app')
@section('alert')
    @include('admin.alert')
@stop
@section('content')
    <table>
        <thead>
            <tr>
                <td>STT</td>
                <td>Tiêu Đề</td>
                <td>Logo</td>
                <td>&nbsp;</td>
            </tr>
        </thead>
        <tbody>
        @forelse($banners as $banner)
            <tr>
                <td>{{$banner->id}}</td>
                <td>{{$banner->name}}</td>

                <td>
                    @if($banner->photo)
                        <img  class="img-thumbnail" width="120px" src="{{asset($banner->photo)}}" alt="{{$banner->name}}"/>
                    @endif
                </td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a class="btn btn-primary" href="{{ route('admin.banners.edit',$banner->id) }}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <button type="button" class="delete btn btn-danger" data="{{$banner->id}}">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5"><p>No banners</p></td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div class="card-footer clearfix">
        {!! $banners->links('vendor.pagination.bootstrap-4') !!}
    </div>
@stop

@section('modal')
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('admin.banners.delete')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="banner_id" id="banner_id" value="0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">xóa banner!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="border: 0px"><i class="fas fa-times"></i></button>
                    </div>
                    <div class="modal-body">
                        bạn có muốn xóa banner này?
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
    <script type="text/javascript">
        $('.delete').click(function(){
            $('#banner_id').val($(this).attr('data'))
            var myModal = new bootstrap.Modal($('#deleteModal'),
                {
                    keyboard: false
                });
            myModal.show();
        });
    </script>
@stop


