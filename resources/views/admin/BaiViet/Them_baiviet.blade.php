@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Bài Viết
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{URL::to('/luu-baiviet')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên bài viết</label>
                        <input type="text" name="ten_baiviet" data-validation="length" data-validation-length="min5" data-validation-error-msg="Hãy nhập tên bài viết và phải nhiều hơn 5 ký tự" class="form-control" id="slug" onkeyup="ChangeToSlug();">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Slug</label>
                        <input type="text" name="slug_baiviet" class="form-control" id="convert_slug">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Tóm tắt bài viết</label>
                        <textarea style="resize: none;" rows="8" class="form-control" data-validation="length" data-validation-length="min5" data-validation-error-msg="Tóm tắt bài viết không được bỏ trống và phải nhiều hơn 5 ký tự" name="desc_baiviet" id="ckeditor"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Nội dung bài viết</label>
                        <textarea style="resize: none;" rows="8" class="form-control" data-validation="length" data-validation-length="min5" data-validation-error-msg="Nội dung bài viết không được bỏ trống và phải nhiều hơn 5 ký tự" name="cotent_baiviet" id="ckeditor1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Meta từ khóa</label>
                        <textarea style="resize: none;" rows="5" class="form-control" data-validation="length" data-validation-length="min5" data-validation-error-msg="Meta từ khóa không được bỏ trống và phải nhiều hơn 5 ký tự" name="meta_keywords" id="exampleInputPassword1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Meta nội dung</label>
                        <textarea style="resize: none;" rows="5" class="form-control" data-validation="length" data-validation-length="min5" data-validation-error-msg="Meta nội dung không được bỏ trống và phải nhiều hơn 5 ký tự" name="meta_desc" id="exampleInputPassword1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình ảnh bài viết</label>
                        <input type="file" required name="hinhanh_baiviet" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Danh mục bài viết</label>
                        <select name="cate_post_id" class="form-control input-sm m-bot15">
                            @foreach($danhmuc_baiviet as $key => $danhmuc)
                                <option value="{{$danhmuc->cate_post_id}}">{{$danhmuc->cate_post_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Hiển thị</label>
                        <select name="hienthi_baiviet" class="form-control input-sm m-bot15">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>
                        </select>
                    </div>
                    
                    <button type="submit" name="them_baiviet" class="btn btn-info" style="position: relative;left: 44%;">Thêm bài viết</button>                   
                </form>
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert" style="position:relative;left:34%;top:10px">',$message,'</span>';
                    Session::put('message',null);
                }
                ?>
                </div>
            </div>
        </section>
    </div>           
@endsection