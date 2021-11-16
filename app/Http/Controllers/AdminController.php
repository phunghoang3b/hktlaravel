<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;//sử dụng database
use App\Http\Requests;
use Session;
use Socialite;
use App\Models\Social;
use App\Models\Login;
use Illuminate\Support\Facades\Redirect;
use App\Rules\Captcha; 
use Validator;
use Auth;
session_start();

class AdminController extends Controller
{
    public function KiemtraAdmin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('/Trangadmin');
        }else{
            return Redirect::to('/admin')->send();
        }
    }
    
    public function index(){
        return view('admin_login');
    }

    public function Trangadmin(){
        $this->KiemtraAdmin();
        return view('admin.trangadmin');
    }
    //Đăng nhập
    public function AdminTrangchu(Request $request){
        // $data = $request->all();
        // kiểm tra chức năng captcha
        $data = $request->validate([
            'admin_email' => 'required',
            'admin_password' => 'required',
            'g-recaptcha-response' => new Captcha(), //dòng kiểm tra Captcha
        ]);

        $admin_email = $data['admin_email'];
        $admin_password = md5($data['admin_password']);
        $login = Login::where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($login){
            $login_count = $login->count();
            if($login_count > 0){
                Session::put('admin_name',$login->admin_name);
                Session::put('admin_id',$login->admin_id);
                return Redirect::to('/Trangadmin');
            }
        }else{
            Session::put('message','Nhập sai tài khoản hoặc mật khẩu, vui lòng nhập lại');
            return Redirect::to('/admin');
        }
    }
    //Đăng xuất
    public function Dangxuat(){
        $this->KiemtraAdmin();
        Session::put('admin_name',null);
        Session::put('admin_id',null);
        return Redirect::to('/admin');
    }

    //đăng nhập admin bằng google
    public function login_google(){
        return Socialite::driver('google')->redirect();
    }

    public function callback_google(){
        $users = Socialite::driver('google')->stateless()->user(); 
        // return $users->id;
        $authUser = $this->findOrCreateUser($users,'google');
        if($authUser){
            $account_name = Login::where('admin_id',$authUser->user)->first();
            Session::put('admin_name',$account_name->admin_name);
            Session::put('login_normal',true);
            Session::put('admin_id',$account_name->admin_id); 
        }elseif ($new_customer) {
            $account_name = Login::where('admin_id',$authUser->user)->first();
            Session::put('admin_name',$account_name->admin_name);
            Session::put('login_normal',true);
            Session::put('admin_id',$account_name->admin_id);
        }
        return Redirect('/Trangadmin')->with('message', 'Đăng nhập Admin thành công');
    }

    public function findOrCreateUser($users,$provider){
        $authUser = Social::where('provider_user_id', $users->id)->first();
        if($authUser){
            return $authUser;
        }else{
            $new_customer = new Social([
            'provider_user_id' => $users->id,
            'provider' => strtoupper($provider)
            ]);
            $create = Login::where('admin_email',$users->email)->first();
                if(!$create){
                    $create = Login::create([
                        'admin_name' => $users->name,
                        'admin_email' => $users->email,
                        'admin_password' => '',
                        'admin_phone' => '',
                        'admin_status' => 1
                    ]);
                }
            $new_customer->login()->associate($create);
            $new_customer->save();
            return $new_customer;
        }    
    }
}
