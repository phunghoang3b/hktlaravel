@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading" style="font-weight: bold;">
      Danh Sách Sản Phẩm
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
            <th style="border: 1px solid;text-align: center;">Tên sản phẩm</th>
            <th style="border: 1px solid;text-align: center;">Số lượng</th>
            <th style="border: 1px solid;text-align: center;">Giá</th>
            <th style="border: 1px solid;text-align: center;width: 20%;">Hình ảnh</th>
            <th style="border: 1px solid;text-align: center;width: 10%;">Danh mục</th>
            <th style="border: 1px solid;text-align: center;width: 10%;">Thương hiệu</th>
            <th style="border: 1px solid;text-align: center;">Bật/Tắt</th>
            <th style="border: 1px solid;text-align: center;">Chức năng</th>
          </tr>
        </thead>
        <tbody>
          @foreach($danhsachsanpham as $key => $sanpham)
          <tr>
            <td style="border: 1px solid;"><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td style="border: 1px solid;">{{ $sanpham->product_name }}</td>
            <td style="border: 1px solid;text-align: center;">{{ $sanpham->product_quantity }}</td>
            <td style="border: 1px solid;text-align: center;">{{number_format($sanpham->product_price,0,',','.').' đ' }}</td>
            <td style="border: 1px solid; text-align: center;"><img src="public/uploads/product/{{ $sanpham->product_image }}" height="100" width="100"></td>
            <td style="border: 1px solid;">{{ $sanpham->category_name }}</td>
            <td style="border: 1px solid;">{{ $sanpham->brand_name }}</td>
            <td style="border: 1px solid;text-align: center;"><span class="text-ellipsis">
              {{-- kiểm tra nếu có danh sách thì xuất hiện thông báo ẩn, hiện --}}
              <?php
                if($sanpham->product_status == 0){
              ?>
                <a href="{{URL::to('/unactive-sanpham/'.$sanpham->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
              <?php
                }else{
              ?>
                <a href="{{URL::to('/active-sanpham/'.$sanpham->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
              <?php
                }
              ?>
            </span></td>

            <td style="text-align: center;">
              <a href="{{URL::to('/suasanpham/'.$sanpham->product_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active" style="padding-right: 35px;"></i></a>
              <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="{{URL::to('/xoasanpham/'.$sanpham->product_id)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach 
        </tbody>
      </table>

      {{-- import file excel --}}
      <form action="{{url('/import-file-product')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <input type="file" name="file" accept=".xlsx"><br>
        <input type="submit" value="Import File Excel" name="import_csv" class="btn btn-warning">
      </form>

      {{-- export file excel --}}
      <form action="{{url('/export-file-product')}}" method="POST">
          @csrf
        <input type="submit" value="Export File Excel" name="export_csv" class="btn btn-success">
      </form>

    </div>
  </div>
</div>
@endsection