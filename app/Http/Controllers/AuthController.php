<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Roles;
use Auth;
class AuthController extends Controller
{
    public function Dangky_admin(){
        return view('admin.QuyenAdmin.Dang_ky');
    }

    //đăng ký tài khoản
    public function dangky(Request $request){
        $this->validation($request);
        $data = $request->all();

        $admin = new Admin();
        $admin->admin_name = $data['admin_name'];
        $admin->admin_phone = $data['admin_phone'];
        $admin->admin_email = $data['admin_email'];
        $admin->admin_password = md5($data['admin_password']);
        $admin->save();
        return redirect('/Dangky-admin')->with('message','Đăng ký tài khoản thành công');
    }

    //Kiểm tra các trường dữ liệu được gửi
    public function validation($request){
        return $this->validate($request,[
            'admin_name' => 'required|max:255',
            'admin_phone' => 'required|max:255',
            'admin_email' => 'required|email|max:255',
            'admin_password' => 'required|max:255',
        ]);
    }
   
    public function Dangnhap_admin(){
        return view('admin.QuyenAdmin.Dang_nhap');
    }

    //đăng nhập tài khoản
    public function dangnhap(Request $request){
        $this->validate($request,[
            'admin_email' => 'required|email|max:255',
            'admin_password' => 'required|max:255',
        ]);
        $data = $request->all();
        if(Auth::attempt(['admin_email' => $request->admin_email, 'admin_password' => $request->admin_password])){
            
        }
    }
}
