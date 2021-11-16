@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Sửa Danh Mục Bài Viết
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{URL::to('/capnhat-danhmuc-baiviet/'.$category_post->cate_post_id)}}" method="post">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên danh mục</label>
                        <input type="text" name="ten_DMPost" class="form-control" value="{{$category_post->cate_post_name}}" id="slug" onkeyup="ChangeToSlug();">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Slug</label>
                        <input type="text" name="slug_DMPost" class="form-control" id="convert_slug" value="{{$category_post->cate_post_slug}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả danh mục</label>
                        <textarea style="resize: none;" rows="8" class="form-control" name="desc_DMPost" id="exampleInputPassword1">{{$category_post->cate_post_desc}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Hiển thị</label>
                        <select name="hienthi_DMPost" class="form-control input-sm m-bot15">
                            @if($category_post->cate_post_status == 1)
                                <option value="0">Ẩn</option>
                                <option selected value="1">Hiển thị</option>
                            @else
                                <option selected value="0">Ẩn</option>
                                <option value="1">Hiển thị</option>
                            @endif
                        </select>
                    </div>
                    
                    <button type="submit" name="capnhat_DMPost" class="btn btn-info" style="position: relative;left: 44%;">Cập nhật danh mục</button>
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert" style="position:relative;left:46%">',$message,'</span>';
                        Session::put('message',null);
                    }
                    ?>
                </form>
                </div>
            </div>
        </section>
    </div>           
@endsection