@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh Sách Mã Giảm Giá
    </div>
    <div class="row w3-res-tb">
      <div class="col-sm-5 m-b-xs">
        <select class="input-sm form-control w-sm inline v-middle">
          <option value="0">Bulk action</option>
          <option value="1">Delete selected</option>
          <option value="2">Bulk edit</option>
          <option value="3">Export</option>
        </select>
        <button class="btn btn-sm btn-default">Apply</button>                
      </div>
      <div class="col-sm-4">
      </div>
      <div class="col-sm-3">
        <div class="input-group">
          <input type="text" class="input-sm form-control" placeholder="Search">
          <span class="input-group-btn">
            <button class="btn btn-sm btn-default" type="button">Go!</button>
          </span>
        </div>
      </div>
    </div>
    <div class="table-responsive">
      <?php
        $message = Session::get('message');
        if($message){
          echo '<span class="text-alert">',$message,'</span>';
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
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">Hiện 20-30 của 50 sản phẩm</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection