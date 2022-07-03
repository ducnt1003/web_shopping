@extends('admin.layouts.app')
@section('content')

<table>
        <thead>
        <tr>
            <td>Avatar</td>
            <td>ID</td>
            <td>Tên nhân viên</td>
            <td>Email</td>
            <td>Vai trò</td>   
            <td style="width: 100px">&nbsp;</td>       
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>       
                    <img class="img-thumbnail" width="120px" src="{{ asset($user->photo ? $user->photo : 'template/dist/img/avatar.png') }}"  />                   
                </td>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>                   
                    <?php $roleUser=$user->roles->first() ?>                                       
                    {{$roleUser->name }}
                </td> 
                <td >
                    <a class="btn btn-primary btn-sm" href="/admin/extras/edit-user/{{$user->id}}">
                        <i class="fas fa-edit"></i>
                    </a>
                    <button class="delete btn btn-danger btn-sm" data="{{$user->id}}">
                        <i class="fas fa-trash"></i>
                    </button>
                </td> 
                                    
                                             
            </tr>
        @endforeach
        
        </tbody>
    </table>
@stop
@section('modal')
    <!-- Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{route('admin.extras.delete-user')}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="user_id" id="user_id" value="0">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete User!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Are you want to delete this User?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
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
            $('#user_id').val($(this).attr('data'))
            var myModal = new bootstrap.Modal($('#deleteModal'),
                {
                    keyboard: false
                });
            myModal.show();
        });
    </script>
@stop