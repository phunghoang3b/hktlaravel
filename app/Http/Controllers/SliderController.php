<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Session;
use DB;//sử dụng database
use Illuminate\Support\Facades\Redirect;

class SliderController extends Controller
{
    public function KiemtraAdmin(){
        $admin_id = Session::get('admin_id');
            if($admin_id){
                return Redirect::to('/Trangadmin');
            }else{
                return Redirect::to('/admin')->send();
            }
    }

    public function danhsach_banner(){
        $danhsach_slide = Slider::orderby('slider_id','DESC')->get();
        return view('admin.SliderBanner.list_slide')->with(compact('danhsach_slide'));
    }

    public function them_banner(){
        return view('admin.SliderBanner.them_slide');
    }

    public function luu_slider(Request $request){
        $this->KiemtraAdmin();
        $data = $request->all();
        $get_image = $request->file('hinh_slide');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/slider',$new_image);

            $slider = new Slider();
            $slider->slider_name = $data['ten_slide'];
            $slider->slider_image = $new_image;
            $slider->slider_desc = $data['mota_slide'];
            $slider->slider_status = $data['slide_status'];
            $slider->save();
            Session::put('message','Thêm slider thành công');
            return Redirect::to('thembanner');
        }else{
            Session::put('message','Hãy thêm hình ảnh');
            return Redirect::to('thembanner');
        }
    }

    //ẩn danh mục
    public function unactive_slide($slide_id){
        $this->KiemtraAdmin();
        //đi vào DB và kiểm tra 
        DB::table('tbl_slider')->where('slider_id',$slide_id)->update(['slider_status'=>0]);
        Session::put('message','Không kích hoạt slide banner thành công');
        return Redirect::to('danhsachbanner'); 
    }
    //hiển thị danh mục
    public function active_slide($slide_id){
        $this->KiemtraAdmin();
        DB::table('tbl_slider')->where('slider_id',$slide_id)->update(['slider_status'=>1]);
        Session::put('message','Kích hoạt slide banner thành công');
        return Redirect::to('danhsachbanner'); 
    }
}
