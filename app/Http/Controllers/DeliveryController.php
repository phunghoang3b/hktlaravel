<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Province;
use App\Models\Wards;
use App\Models\Feeship;
class DeliveryController extends Controller
{
    public function vanchuyen(Request $request){
        $city = City::orderby('matp','ASC')->get();
        return view('admin.Vanchuyen.Them_phivanchuyen')->with(compact('city'));
    }

    //chọn nơi vận chuyển
    public function chon_vanchuyen(Request $request){
        $data = $request->all();
        if($data['action']){
            $output = '';
            if($data['action'] == "city"){
                $chon_quanhuyen = Province::where('matp',$data['ma_id'])->orderby('maqh','ASC')->get();
                    $output.='<option>----Chọn quận huyện----</option>';
                foreach($chon_quanhuyen as $key => $quanhuyen){
                    $output.='<option value="'.$quanhuyen->maqh.'">'.$quanhuyen->name_quanhuyen.'</option>';
                }
            }else{
                $chon_xaphuong = Wards::where('maqh',$data['ma_id'])->orderby('xaid','ASC')->get();
                    $output.='<option>----Chọn xã phường----</option>';
                foreach($chon_xaphuong as $key => $xaphuong){
                    $output.='<option value="'.$xaphuong->xaid.'">'.$xaphuong->name_xaphuong.'</option>';
                }
            }
            echo $output;
        }
    }

    //thêm phí vận chuyển
    public function them_vanchuyen(Request $request){
        $data = $request->all();
        $fee_ship = new Feeship();
        $fee_ship->fee_matp = $data['city'];
        $fee_ship->fee_maqh = $data['province'];
        $fee_ship->fee_xaid = $data['wards'];
        $fee_ship->fee_feeship = $data['fee_ship'];
        $fee_ship->save();
    }

    //chọn phí vận chuyển
    public function chon_feeship(){
        $feeship = Feeship::orderby('fee_id','DESC')->get();
        $output = '';
        $output .= '<div class="table-responsive">
            <header class="panel-heading">
                Danh Sách Phí Vận Chuyển
            </header>
            <table class="table table-bordered">
                <thread>
                    <tr>
                        <th style="text-align: center;">Tên thành phố</th>
                        <th style="text-align: center;">Tên quận huyện</th>
                        <th style="text-align: center;">Tên xã phường</th>
                        <th style="text-align: center;">Phí ship</th>
                    </tr>
                </thread>  
                <tbody>
                ';
                foreach($feeship as $key => $fee){
                    $output.= '
                    <tr>
                        <td>'.$fee->city->name_city.'</td>
                        <td>'.$fee->province->name_quanhuyen.'</td>
                        <td>'.$fee->wards->name_xaphuong.'</td>
                        <td contenteditable data-feeship_id="'.$fee->fee_id.'" class="fee_feeship_edit">'.number_format($fee->fee_feeship,0,',','.').'</td>
                    </tr>
                    ';
                }
                $output .= '
                </tbody> 
                </table></div>';
                echo $output;
    }

    //cập nhật giá tiền feeship
    public function capnhatgia_vanchuyen(Request $request){
        $data = $request->all();
        $fee_ship = Feeship::find($data['feeship_id']);
        //cắt dấu chấm dùng rtrim
        $fee_value = rtrim($data['fee_value'],'.');
        $fee_ship->fee_feeship = $fee_value;
        $fee_ship->save();
    }
}
