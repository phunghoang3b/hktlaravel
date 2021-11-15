<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Models\Roles;
use App\Models\Admin;
use Session;

class UserController extends Controller
{
    public function index(){
        // paginate là phân trang
        $admin = Admin::with('roles')->orderby('admin_id','DESC')->paginate(5);
        return view('admin.User.Danhsach_user')->with(compact('admin'));
    }

    //cấp quyền cho user
    public function phanquyen_vaitro(Request $request){
        // $data = $request->all();
        $user = Admin::where('admin_email',$request->admin_email)->first();
        $user->roles()->detach();
        if($request->admin_role){
            $user->roles()->attach(Roles::where('name','admin')->first());
        }
        if($request->user_role){
            $user->roles()->attach(Roles::where('name','user')->first());
        }
        if($request->manager_role){
            $user->roles()->attach(Roles::where('name','manager')->first());
        }
        return redirect()->back()->with('message','Cấp quyền cho tài khoản thành công');
    }
}
