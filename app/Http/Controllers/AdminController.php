<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;//sử dụng database
use App\Http\Requests;
use Session;
use Socialite;
use App\Models\Customer;
use App\Models\SocialCustomers;
use App\Models\Login;
use Illuminate\Support\Facades\Redirect;
use App\Rules\Captcha; 
use Validator;
use Auth;
session_start();
use provider;

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

    public function dangnhap_kh_google(){
        config(['services.google.redirect' => env('GOOGLE_URL')]);
        return Socialite::driver('google')->redirect();
    }

    public function callback_customer_google(){
        config(['services.google.redirect' => env('GOOGLE_URL')]);
        $users = Socialite::driver('google')->stateless()->user();
        $authUser = $this->findOrCreateCustomer($users,'google');
        if($authUser){
            $account_name = Customer::where('customer_id',$authUser->user)->first();
            Session::put('customer_id',$account_name->customer_id);
            Session::put('customer_picture',$account_name->customer_picture);
            Session::put('customer_name',$account_name->customer_name);
        }elseif($customer_new){
            $account_name = Customer::where('customer_id',$authUser->user)->first();
            Session::put('customer_id',$account_name->customer_id);
            Session::put('customer_picture',$account_name->customer_picture);
            Session::put('customer_name',$account_name->customer_name);
        }
        return redirect('/thanhtoan');
    }

    public function findOrCreateCustomer($users,$provider){
        $authUser = SocialCustomers::where('provider_user_id',$users->id)->first();
        if($authUser){
            return $authUser;
        }else{
            $customer_new = new SocialCustomers([
                'provider_user_id' => $users->id,
                'provider_user_email' => $users->email,
                'provider' => strtoupper($provider)
            ]);
            $customer = Customer::where('customer_email',$users->email)->first();
            if(!$customer){
                $customer = Customer::create([
                    'customer_name' => $users->name,
                    'customer_picture' => $users->avatar,
                    'customer_email' => $users->email,
                    'customer_password' => '',
                    'customer_phone' => ''
                ]);
            }
            $customer_new->customer()->associate($customer);
            $customer_new->save();
            return $customer_new;
        }
    }
}
