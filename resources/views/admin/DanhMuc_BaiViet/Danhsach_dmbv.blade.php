@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh Sách Danh Mục Bài Viết
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
            <th style="border: 1px solid;text-align: center;width: 26%;">Tên danh mục</th>
            <th style="border: 1px solid;text-align: center;width: 32%;">Slug</th>
            <th style="border: 1px solid;text-align: center;">Hiển thị</th>
            <th style="border: 1px solid;text-align: center;">Chức năng</th>
            {{-- <th style="width:30px;"></th> --}}
          </tr>
        </thead>
        <tbody>
          @foreach($category_post as $key => $post)
          <tr>
            <td style="border: 1px solid;">{{ $post->cate_post_name }}</td>
            <td style="border: 1px solid;">{{ $post->cate_post_slug }}</td>
            <td style="text-align: center;border: 1px solid;">
                @if($post->cate_post_status == 0)
                  Ẩn
                @else
                  Hiển thị
                @endif
            </td>
            <td style="text-align: center;border: 1px solid;">
              <a href="{{URL::to('/sua-DMPost/'.$post->cate_post_id)}}" class="active" ui-toggle-class=""><i class="fa fa-pencil-square-o text-success text-active" style="padding-right: 35px;"></i></a>
              <a onclick="return confirm('Bạn chắc chắn muốn xóa?')" href="{{URL::to('/xoa-DMPost/'.$post->cate_post_id)}}" class="active" ui-toggle-class="">
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