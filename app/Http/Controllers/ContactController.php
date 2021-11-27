<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use DB;
use Session;
use App\Models\CatePost;
use App\Models\Slider;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();
class ContactController extends Controller
{
    public function Lien_he(Request $request){
        //danh mục bài viết
        $category_post = CatePost::orderby('cate_post_id','DESC')->get();
        //--slider
        $slider = Slider::orderby('slider_id','DESC')->where('slider_status','1')->take(6)->get();
        //--seo
        $meta_desc = "Liên Hệ";
        $meta_keywords = "Liên Hệ";
        $the_tieude = "HKT - Gym Store";
        $duongdan = $request->url();
        //--end seo

        $danhmuc_sanpham = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $thuonghieu_sanpham = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $contact = Contact::where('info_id',3)->get();
        return view('pages.LienHe.contact')->with('category',$danhmuc_sanpham)->with('brand',$thuonghieu_sanpham)->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('the_tieude',$the_tieude)->with('duongdan',$duongdan)->with('slider',$slider)->with('category_post',$category_post)->with('contact',$contact);
    }

    public function information(Request $request){
        $contact = Contact::where('info_id',3)->get();
        return view('admin.Information.Them_contact')->with(compact('contact'));
    }

    public function capnhat_lienhe(Request $request, $info_id){
        $data = $request->all();
        $contact = Contact::find($info_id);
        $contact->info_contact = $data['info_contact'];
        $contact->info_map = $data['info_map'];
        $contact->info_fanpage = $data['info_fanpage'];
        $path = 'public/uploads/contact/';
        $get_image = $request->file('info_image');
        if($get_image){
            unlink($path.$contact->info_logo);
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path,$new_image);
            $contact->info_logo = $new_image;
        }
        $contact->save();
        return redirect()->back()->with('message','Cập nhật thông tin trang web thành công');
    }
}
