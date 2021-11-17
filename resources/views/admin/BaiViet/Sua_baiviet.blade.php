@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Sửa Bài Viết
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{URL::to('/capnhat-baiviet/'.$post->post_id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên bài viết</label>
                        <input type="text" name="ten_baiviet" class="form-control" id="slug" onkeyup="ChangeToSlug();" value="{{$post->post_title}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Slug</label>
                        <input type="text" name="slug_baiviet" class="form-control" id="convert_slug" value="{{$post->post_slug}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tóm tắt bài viết</label>
                        <textarea style="resize: none;" rows="8" class="form-control" name="desc_baiviet" id="ckeditor">{{$post->post_desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nội dung bài viết</label>
                        <textarea style="resize: none;" rows="8" class="form-control" name="cotent_baiviet" id="ckeditor1">{{$post->post_content}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Meta từ khóa</label>
                        <textarea style="resize: none;" rows="5" class="form-control" name="meta_keywords" id="exampleInputPassword1">{{$post->post_meta_keywords}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Meta nội dung</label>
                        <textarea style="resize: none;" rows="5" class="form-control" name="meta_desc" id="exampleInputPassword1">{{$post->post_meta_desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                        <input type="file" name="hinhanh_baiviet" class="form-control" id="exampleInputEmail1">
                        <img src="{{URL::to('public/uploads/post/'.$post->post_image)}}" height="100" width="100">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Danh mục bài viết</label>
                        <select name="cate_post_id" class="form-control input-sm m-bot15">
                            @foreach($danhmuc_baiviet as $key => $danhmuc)
                                <option {{$post->cate_post_id == $danhmuc->cate_post_id ? 'selected' : ''}} value="{{$danhmuc->cate_post_id}}">{{$danhmuc->cate_post_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Hiển thị</label>
                        <select name="hienthi_baiviet" class="form-control input-sm m-bot15">
                            @if($post->post_status == 0)
                                <option selected value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            @else
                                <option value="0">Ẩn</option>
                                <option selected value="1">Hiển thị</option>
                            @endif
                        </select>
                    </div>
                    
                    <button type="submit" name="capnhat_baiviet" class="btn btn-info" style="position: relative;left: 44%;">Cập nhật bài viết</button>
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert" style="position:relative;left:5%">',$message,'</span>';
                        Session::put('message',null);
                    }
                    ?>
                </form>
                </div>
            </div>
        </section>
    </div>           
@endsection