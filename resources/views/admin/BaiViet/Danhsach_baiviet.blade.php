@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading" style="font-weight: bold;">
      Danh Sách Bài Viết
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
            <th style="border: 1px solid;text-align: center;">Tên bài viết</th>
            <th style="border: 1px solid;text-align: center;">Slug</th>
            <th style="border: 1px solid;text-align: center;">Mô tả bài viết</th>
            <th style="border: 1px solid;text-align: center;">Từ khóa bài viết</th>
            <th style="border: 1px solid;text-align: center;width: 20%;">Hình ảnh</th>
            <th style="border: 1px solid;text-align: center;width: 10%;">Danh mục</th>
            <th style="border: 1px solid;text-align: center;">Hiển thị</th>
            <th style="border: 1px solid;text-align: center;">Chức năng</th>
          </tr>
        </thead>
        <tbody>
          @foreach($danhsach_baiviet as $key => $danhsach)
          <tr>
            <td style="border: 1px solid;">{{ $danhsach->post_title }}</td>
            <td style="border: 1px solid;text-align: center;">{{ $danhsach->post_slug }}</td>
            <td style="border: 1px solid;text-align: center;">{!! $danhsach->post_desc !!}</td>
            <td style="border: 1px solid;">{{ $danhsach->post_meta_keywords }}</td>
            <td style="border: 1px solid; text-align: center;"><img src="{{asset('public/uploads/post/'.$danhsach->post_image)}}" height="100" width="100" style="width: 55%;"></td>
            <td style="border: 1px solid;">{{ $danhsach->cate_post->cate_post_name }}</td>
            <td style="border: 1px solid;text-align: center;">
              @if($danhsach->post_status == 0)
                Ẩn
              @else
                Hiển thị
              @endif
            </td>
            <td style="text-align: center;">
              <a href="{{URL::to('/sua-baiviet/'.$danhsach->post_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active" style="padding-right: 35px;"></i></a>
              <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="{{URL::to('/xoa-baiviet/'.$danhsach->post_id)}}" class="active" ui-toggle-class="">
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