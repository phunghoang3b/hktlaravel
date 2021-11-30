@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh Sách Mã Giảm Giá
    </div>
    <div class="table-responsive">
      <?php
        $message = Session::get('message');
        if($message){
          echo '<span class="text-alert" style="position:relative;left:43%">',$message,'</span>';
          Session::put('message',null);
        }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="border: 1px solid;text-align: center;">Tên giảm giá</th>
            <th style="border: 1px solid;text-align: center;">Mã giảm giá</th>
            <th style="border: 1px solid;text-align: center;">Số lượng</th>
            <th style="border: 1px solid;text-align: center;">Hình thức giảm giá</th>
            <th style="border: 1px solid;text-align: center;width: 20%;">Hiển thị % hoặc số tiền</th>
            <th style="border: 1px solid;text-align: center;">Chức năng</th>
          </tr>
        </thead>
        <tbody>
          @foreach($giamgia as $key => $giam)
          <tr>
            <td style="border: 1px solid;">{{ $giam->coupon_name }}</td>
            <td style="border: 1px solid;text-align: center;">{{ $giam->coupon_code }}</td>
            <td style="border: 1px solid;text-align: center;">{{ $giam->coupon_time }}</td>
            <td style="border: 1px solid;text-align: center;"><span class="text-ellipsis">
              {{-- kiểm tra nếu có danh sách thì xuất hiện thông báo ẩn, hiện --}}
              <?php
                if($giam->coupon_condition == 1){
              ?>
                  Giảm theo %
              <?php
                }else{
              ?>
                  Giảm theo tiền
              <?php
                }
              ?>
            </span></td>
            <td style="border: 1px solid;text-align: center;"><span class="text-ellipsis">
              {{-- kiểm tra nếu có danh sách thì xuất hiện thông báo ẩn, hiện --}}
              <?php
                if($giam->coupon_condition == 1){
              ?>
                  Giảm {{$giam->coupon_number}} %
              <?php
                }else{
              ?>
                  Giảm {{number_format($giam->coupon_number)}} VNĐ
              <?php
                }
              ?>
            </span></td>

            <td style="text-align: center;">
              <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="{{URL::to('/xoamagiamgia/'.$giam->coupon_id)}}" class="active" ui-toggle-class="">
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