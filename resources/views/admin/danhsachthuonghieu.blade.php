@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh Sách Thương Hiệu Sản Phẩm
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
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th style="border: 1px solid;text-align: center;">Tên thương hiệu sản phẩm</th>
            <th style="border: 1px solid;text-align: center;">Hiển thị</th>
            <th style="border: 1px solid;text-align: center;">Chức năng</th>
            {{-- <th style="width:30px;"></th> --}}
          </tr>
        </thead>
        <tbody>
          @foreach($danhsachTHsanpham as $key => $thuonghieu)
          <tr>
            <td style="border: 1px solid;"><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td style="border: 1px solid;">{{ $thuonghieu->brand_name }}</td>
            <td style="border: 1px solid;text-align: center;"><span class="text-ellipsis">
              {{-- kiểm tra nếu có danh sách thì xuất hiện thông báo ẩn, hiện --}}
              <?php
                if($thuonghieu->brand_status == 0){
              ?>
                <a href="{{URL::to('/unactive-thuonghieu/'.$thuonghieu->brand_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
              <?php
                }else{
              ?>
                <a href="{{URL::to('/active-thuonghieu/'.$thuonghieu->brand_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
              <?php
                }
              ?>
            </span></td>

            <td style="text-align: center;">
              <a href="{{URL::to('/suathuonghieu/'.$thuonghieu->brand_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active" style="padding-right: 35px;"></i></a>
              <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="{{URL::to('/xoathuonghieu/'.$thuonghieu->brand_id)}}" class="active" ui-toggle-class="">
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