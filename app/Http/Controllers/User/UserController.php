<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.changepassword',['title'=>'Chỉnh sửa thông tin người dùng']);
    }
    public function edit(){
        $user = Auth::user();
        return view('admin.users.edit',[
            'title'=>'Chỉnh sửa thông tin người dùng',
            'user'=>$user,          
        ]);
    }

    public function update(UserRequest $userRequest){
        $user = Auth::user();
        try {
            $user->name = $userRequest->name;
            $user->email = $userRequest->email;
            $user->phone = $userRequest->phone;
            $user->birthday = $userRequest->birthday;
            $user->photo = $userRequest->photo;

            $user->save();
            Session::flash('success','Cập nhật thành công');
        }catch (\Exception $err){
            Session::flash('error','Có lỗi vui lòng thử lại');
            \Log::info($err->getMessage());
        }     
        return redirect(route('admin.users.edit'));
    }

    public function changePassword(Request $request)
    {
        $request->validate([
          'current_password' => 'required|current_password',
          'password' => 'required|string|min:6|confirmed',
          'password_confirmation' => 'required',    
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back();
        }

        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('login')->with('success', 'Mật khẩu đã bị thay đổi. Vui lòng đăng nhập lại!'); 
    }
}
