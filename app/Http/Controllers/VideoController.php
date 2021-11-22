<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;//sử dụng database
use App\Http\Requests;
use Session;
use Auth;
use App\Models\Video;
use Illuminate\Support\Facades\Redirect;
session_start();

class VideoController extends Controller
{
    public function KiemtraAdmin(){
        $admin_id = Auth::id();
        if($admin_id){
            return Redirect::to('/Trangadmin');
        }else{
            return Redirect::to('/admin')->send();
        }
    }

    public function video(){
        $this->KiemtraAdmin();
        return view('admin.Video.Danhsach_video');
    }

    // hiển thị dữ liệu danh sách video
    public function chon_video(Request $request){
        $this->KiemtraAdmin();
        $video = Video::orderby('video_id','DESC')->get();
        $video_count = $video->count();
        $output = '
                <form>
                '.csrf_field().'
                <table class="table table-striped b-t b-light">
                    <thead>
                      <tr>
                        <th style="border: 1px solid;text-align: center;">Thứ tự</th>
                        <th style="border: 1px solid;text-align: center;">Tên video</th>
                        <th style="border: 1px solid;text-align: center;">Slug video</th>
                        <th style="border: 1px solid;text-align: center;">Hình ảnh</th>
                        <th style="border: 1px solid;text-align: center;">Link</th>
                        <th style="border: 1px solid;text-align: center;">Mô tả</th>
                        <th style="border: 1px solid;text-align: center;">Demo</th>
                        <th style="border: 1px solid;text-align: center;">Chức năng</th>
                      </tr>
                    </thead>
                    <tbody>         
        ';
        if($video_count > 0){
            $i = 0;
            foreach($video as $key => $vd){
                $i++;
                $output.='
                    <tr>
                        <td>'.$i.'</td>
                        <td contenteditable data-video_id="'.$vd->video_id.'" data-video_type="video_title" class="video_edit" id="video_title_'.$vd->video_id.'">'.$vd->video_title.'</td>

                        <td contenteditable data-video_id="'.$vd->video_id.'" data-video_type="video_slug" class="video_edit" id="video_slug_'.$vd->video_id.'">'.$vd->video_slug.'</td>

                        <td>
                            <img src="'.url('public/uploads/videos/'.$vd->video_image).'" class="img-thumbnail" width="200" height="200">
                        </td>

                        <td contenteditable data-video_id="'.$vd->video_id.'" data-video_type="video_link" class="video_edit" id="video_link_'.$vd->video_id.'">https://youtu.be/'.$vd->video_link.'</td>

                        <td contenteditable data-video_id="'.$vd->video_id.'" data-video_type="video_desc" class="video_edit" id="video_desc_'.$vd->video_id.'">'.$vd->video_desc.'</td>

                        <td><iframe width="400" height="250" src="https://www.youtube.com/embed/'.$vd->video_link.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></td>

                        <td><button type="button" data-video_id="'.$vd->video_id.'" class="btn btn-xs btn-danger btn-delete-video">Xóa video</button></td>
                    </tr>
                ';
            }
        }else{
            $output.='
                <tr>
                    <td colspan="4">Chưa có video, hãy thêm video vào!</td>
                </tr> 
                ';
        }
        $output.='
                </tbody>
                </table>
                </form> 
                ';
        echo $output;
    }

    // thêm video mới
    public function insert_video(Request $request){
        $data = $request->all();
        $video = new Video();
        $sub_link = substr($data['video_link'], 17);
        $video->video_title = $data['video_title'];
        $video->video_slug = $data['video_slug'];
        $video->video_link = $sub_link;
        $video->video_desc = $data['video_desc'];

        $get_image = $request->file('file');
        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/videos',$new_image);
            $video->video_image = $new_image;
        }
        $video->save();
    }

    // cập nhật video
    public function capnhat_video(Request $request){
        $data = $request->all();
        $video_id = $data['video_id'];
        $video_edit = $data['video_edit'];
        $video_check = $data['video_check'];
        $video = Video::find($video_id);

        if($video_check == 'video_title'){
            $video->video_title = $video_edit;
        }elseif($video_check == 'video_desc'){
            $video->video_desc = $video_edit;
        }elseif($video_check == 'video_link'){
            $sub_link = substr($video_edit, 17);
            $video->video_link = $sub_link;
        }else{
            $video->video_slug = $video_edit;
        }
        $video->save();
    }

    // xóa video
    public function xoa_video(Request $request){
        $data = $request->all();
        $video_id = $data['video_id'];
        $video = Video::find($video_id);
        $video->delete();
    }

    // hiển thị video ra trang index
    public function video_gymstore(Request $request){
        //--seo
        $meta_desc = "Video về tập gym cũng như những kiến thức về thực phẩm bổ sung Whey Protein";
        $meta_keywords = "Dinh dưỡng và phụ kiện tập Gym";
        $the_tieude = "HKT - Gym Store";
        $duongdan = $request->url();
        //--end seo

        $danhsach_video = DB::table('tbl_videos')->paginate(10);
        return view('pages.Video.video')->with('meta_desc',$meta_desc)->with('meta_keywords',$meta_keywords)->with('the_tieude',$the_tieude)->with('duongdan',$duongdan)->with('danhsach_video',$danhsach_video);
    }
}
