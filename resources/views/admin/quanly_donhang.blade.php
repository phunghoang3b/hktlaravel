@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh Sách Đơn Hàng
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
            <th style="border: 1px solid;text-align: center;">Thứ tự</th>
            <th style="border: 1px solid;text-align: center;">Mã đơn hàng</th>
            <th style="border: 1px solid;text-align: center;">Ngày đặt hàng</th>
            <th style="border: 1px solid;text-align: center;">Tình trạng đơn hàng</th>
            <th style="border: 1px solid;text-align: center;">Chức năng</th>
          </tr>
        </thead>
        <tbody>
          {{-- khởi tạo biến i = 0 cho thứ tự đơn hàng --}}
          @php
              $i = 0;
          @endphp
          @foreach($order as $key => $ord)
          @php
              $i++;
          @endphp
          <tr>
            <td style="text-align: center;"><i>{{$i}}</i></label></td>
            <td style="border: 1px solid;text-align: center;">{{ $ord->order_code }}</td>
            <td style="border: 1px solid;text-align: center;">{{ $ord->created_at }}</td>
            <td style="border: 1px solid;text-align: center;">@if($ord->order_status == 1)
                  Đơn hàng mới 
                @else
                  Đã xử lý
                @endif
            </td>
            <td style="text-align: center;">
              <a href="{{URL::to('/xem-donhang/'.$ord->order_code)}}" class="active" ui-toggle-class=""><i class="fa fa-eye text-success text-active" style="padding-right: 35px;"></i></a>
              <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="{{URL::to('/xoa-donhang/'.$ord->order_code)}}" class="active" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach 
        </tbody>
      </table>
      <br>
      <h4 style="text-align: center;">Chọn tệp cần import File Excel:</h4><br>
      {{-- import file excel --}}
      <form action="{{url('/import-file')}}" method="POST" enctype="multipart/form-data">
          @csrf
        <input type="file" name="file" accept=".xlsx" style="position: relative;left: 40%;"><br>
        <input type="submit" value="Import File Excel" name="import_csv" class="btn btn-warning" style="position: relative;left: 45.4%;">
      </form><br>

      {{-- export file excel --}}
      <form action="{{url('/export-file')}}" method="POST">
          @csrf
        <input type="submit" value="Export File Excel" name="export_csv" class="btn btn-success" style="position: relative;left: 45.4%;">
      </form>
      
    </div>
  </div>
</div>
@endsection