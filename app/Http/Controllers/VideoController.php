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
                        <td>'.$vd->video_title.'</td>
                        <td>'.$vd->video_slug.'</td>
                        <td>'.$vd->video_link.'</td>
                        <td>'.$vd->video_desc.'</td>
                        <td><button type="button" data-toggle="modal" data-target="#video_model" class="btn btn-xs btn-success">Xem video</button></td>
                        <td><button class="btn btn-xs btn-danger">Xóa video</button></td>
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
        $video->video_title = $data['video_title'];
        $video->video_slug = $data['video_slug'];
        $video->video_link = $data['video_link'];
        $video->video_desc = $data['video_desc'];
        $video->save();
    }
}
