<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;
use App\Models\Roles;
use App\Models\Admin;
use Auth;
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
        if(Auth::id() == $request->admin_id){
            return redirect()->back()->with('message','Bạn không được phân quyền cho bản thân!');
        }

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

    //xóa quyền user
    public function xoaquyen_user($admin_id){
        if(Auth::id() == $admin_id){
            return redirect()->back()->with('message','Bạn đang đăng nhập bằng tài khoản này, không được xóa!');
        }
        $admin = Admin::find($admin_id);
        if($admin){
            $admin->roles()->detach();
            $admin->delete();
        }
        return redirect()->back()->with('message','Xóa tài khoản thành công');
    }

    public function them_taikhoan(){
        return view('admin.User.Them_user');
    }

    //lưu lại tài khoản
    public function luu_taikhoan(Request $request){
        $data = $request->all();
        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_phone = $data['admin_phone'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_password = md5($data['admin_password']);
        $admin->save();
        $admin->roles()->attach(Roles::where('name','user')->first());
        Session::put('message','Thêm tài khoản thành công');
        return Redirect::to('/users');
    }

    //chuyển quyền mà ko cần đăng nhập lại
    public function chuyenquyen_user($admin_id){
        $user = Admin::where('admin_id',$admin_id)->first();
        if($user){
            Session()->put('chuyenquyen',$user->admin_id);
        }
        return redirect('/users');
    }

    //hủy chuyển quyền 
    public function huy_chuyenquyen(){
        Session()->forget('chuyenquyen');
        return redirect('/users');
    }
}
