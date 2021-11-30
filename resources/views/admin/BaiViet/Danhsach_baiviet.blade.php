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
            <th style="border: 1px solid;text-align: center;width: 12%;">Tên bài viết</th>
            <th style="border: 1px solid;text-align: center;width: 10%;">Slug</th>
            <th style="border: 1px solid;text-align: center;width: 16%;">Mô tả bài viết</th>
            <th style="border: 1px solid;text-align: center;width: 16%;">Từ khóa bài viết</th>
            <th style="border: 1px solid;text-align: center;width: 18%;">Hình ảnh</th>
            <th style="border: 1px solid;text-align: center;width: 12%;">Danh mục</th>
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
    </div>
  </div>
</div>
@endsection