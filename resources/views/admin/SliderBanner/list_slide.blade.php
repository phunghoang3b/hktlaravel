@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh Sách Slide Banner
    </div>
    <div class="table-responsive">
      <?php
        $message = Session::get('message');
        if($message){
          echo '<span class="text-alert" style="position:relative;left:40%">',$message,'</span>';
          Session::put('message',null);
        }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="border: 1px solid;text-align: center;width: 20%;">Tên slide</th>
            <th style="border: 1px solid;text-align: center;width: 30%;">Hình ảnh</th>
            <th style="border: 1px solid;text-align: center;width: 30%;">Mô tả</th>
            <th style="border: 1px solid;text-align: center;">Tình trạng</th>
            <th style="border: 1px solid;text-align: center;">Chức năng</th>
          </tr>
        </thead>
        <tbody>
          @foreach($danhsach_slide as $key => $slide)
          <tr>
            <td style="border: 1px solid;">{{ $slide->slider_name }}</td>
            <td style="border: 1px solid; text-align: center;"><img src="public/uploads/slider/{{ $slide->slider_image }}" height="70%" width="70%"></td>
            <td style="border: 1px solid;">{{ $slide->slider_desc }}</td>
            <td style="border: 1px solid;text-align: center;"><span class="text-ellipsis">
              {{-- kiểm tra nếu có danh sách thì xuất hiện thông báo ẩn, hiện --}}
              <?php
                if($slide->slider_status == 1){
              ?>
                <a href="{{URL::to('/unactive-slide/'.$slide->slider_id)}}"><span class="fa-toggle-styling fa fa-toggle-on"></span></a>
              <?php
                }else{
              ?>
                <a href="{{URL::to('/active-slide/'.$slide->slider_id)}}"><span class="fa-power-styling fa fa-power-off"></span></a>
              <?php
                }
              ?>
            </span></td>

            <td style="text-align: center;">
              <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="{{URL::to('/xoa_slide/'.$slide->slider_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach 
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection