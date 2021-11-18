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
          echo '<span class="text-alert" style="position:relative;left:40%">',$message,'</span>';
          Session::put('message',null);
        }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="border: 1px solid;text-align: center;">Tên sản phẩm</th>
            <th style="border: 1px solid;text-align: center;">Thư viện</th>
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
            <td style="border: 1px solid;">{{ $sanpham->product_name }}</td>
            <td style="border: 1px solid;"><a href="{{url('/them-gallery/'.$sanpham->product_id)}}">Thêm ảnh</a></td>
            <td style="border: 1px solid;text-align: center;">{{ $sanpham->product_quantity }}</td>
            <td style="border: 1px solid;text-align: center;">{{number_format($sanpham->product_price,0,',','.').' đ' }}</td>
            <td style="border: 1px solid; text-align: center;"><img src="public/uploads/product/{{ $sanpham->product_image }}" height="100" width="100" style="width: 55%;"></td>
            <td style="border: 1px solid;">{{ $sanpham->category_name }}</td>
            <td style="border: 1px solid;">{{ $sanpham->brand_name }}</td>
            <td style="border: 1px solid;text-align: center;"><span class="text-ellipsis">
              {{-- kiểm tra nếu có danh sách thì xuất hiện thông báo ẩn, hiện --}}
              <?php
                if($sanpham->product_status == 0){
              ?>
                <a href="{{URL::to('/unactive-sanpham/'.$sanpham->product_id)}}"><span class="fa-toggle-styling fa fa-toggle-on"></span></a>
              <?php
                }else{
              ?>
                <a href="{{URL::to('/active-sanpham/'.$sanpham->product_id)}}"><span class="fa-power-styling fa fa-power-off"></span></a>
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
      <br>
      <h4 style="text-align: center;">Chọn tệp cần import File Excel:</h4><br>
      {{-- import file excel --}}
      <form action="{{url('/import-file-product')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <input type="file" name="file" accept=".xlsx" style="position: relative;left: 40%;"><br>
        <input type="submit" value="Import File Excel" name="import_csv" class="btn btn-warning" style="position: relative;left: 45.4%;">
      </form><br>

      {{-- export file excel --}}
      <form action="{{url('/export-file-product')}}" method="POST">
          @csrf
        <input type="submit" value="Export File Excel" name="export_csv" class="btn btn-success" style="position: relative;left: 45.4%;">
      </form>

    </div>
  </div>
</div>
@endsection