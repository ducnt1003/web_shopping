<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserRequest;
use App\Models\Role;
use App\Models\Store;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ExtraController extends Controller
{
    
    public function manageUser()
    {
//        $products = Product::with('categories','createdBy')->orderBy('id','desc')->paginate();
        $users = User::orderBy('id','asc')->get();
        $roles = Role::orderBy('id','asc')->get();
        return view('admin.extras.manage-user', [
            'title'=>'Danh sách nhân viên',
            'users'=>$users,
            'roles'=>$roles,
        ]);
    }
    public function createUser()
    {
//        $products = Product::with('categories','createdBy')->orderBy('id','desc')->paginate();
        $stores = Store::orderBy('id','asc')->get();
        $roles = Role::orderBy('id','asc')->get();
        return view('admin.extras.create-user', [
            'title'=>'Tạo nhân viên',
            'stores'=>$stores,
            'roles'=>$roles,
        ]);
    }

    public function storeUser(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->birthday = $request->birthday;
        $user->phone = $request->phone;
        $user->store_id = $request->store_id;
        $user->password = Hash::make($request->password);  
        $user->save();
        $user->roles()->attach($request->role);
        
        if ($user) {
            return redirect(route('admin.extras.manage-user'))
                ->with('success', __('Thêm thành công'));
        }
        return redirect(route('admin.extras.create-user'))
            ->with('error', __('Thêm không thành công!!!!'));;
    }

    public function editUser($id){
        $user = User :: where('id', $id) -> first();
        $roles = Role::orderBy('id','asc')->get();
        $stores = Store::orderBy('id','asc')->get();
        return view('admin.extras.edit-user',[
            'title'=>'Chỉnh sửa thông tin người dùng',
            'user'=>$user,   
            'roles'=>$roles,  
            'stores'=>$stores,     
        ]);
    }

    public function updateUser(Request $Request,$id){
        $user = User :: where('id', $id) -> first();
        $role = Role :: where('name', $Request->role) -> first();
        if($user)
        {
            $user->name = $Request->name;
            $user->email = $Request->email;
            $user->phone = $Request->phone;
            $user->birthday = $Request->birthday;
            $user->photo = $Request->photo; 
            $user->store_id = $Request->store;           
            $user->save();          
        }
        $user->roles()->detach();
        $user->roles()->attach($role->id);
        return redirect(route('admin.extras.manage-user'));
    }
    public function destroy(Request $request)
   {
    $user = User::find($request->input('user_id'));
    if ($user) {
        $user->delete();
        //Storage::delete($banner->photo);
        return redirect(route('admin.extras.manage-user'))
            ->with('success', __('Xóa thành công!'));
    }
    return redirect(route('admin.extras.manage-user'))
        ->with('error', __('xóa không thành công!'));
    }

    private function _upload($request)
    {
        if ($request->hasFile('photo')){
            try {
                $name = $request->file('photo')->getClientOriginalName();
                $pathFull ='uploads/'.date("Y/m/d");
                $request->file('file')->storeAs(
                    'public/' . $pathFull, $name
                );
                return '/storage/' . $pathFull . '/' . $name;
            }catch (\Exception $error){
                return false;
            }
        }
        return false;


    }
   
}
