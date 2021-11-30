@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Danh Mục Bài Viết
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{URL::to('/luudanhmuc-baiviet')}}" method="post">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên danh mục</label>
                        <input type="text" name="ten_DMPost" data-validation="length" data-validation-length="min5" data-validation-error-msg="Hãy nhập tên danh mục và phải nhiều hơn 5 ký tự" class="form-control" id="slug" onkeyup="ChangeToSlug();">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Slug</label>
                        <input type="text" name="slug_DMPost" class="form-control" id="convert_slug">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả danh mục</label>
                        <textarea style="resize: none;" rows="8" class="form-control" data-validation="length" data-validation-length="min5" data-validation-error-msg="Mô tả danh mục không được trống và phải nhiều hơn 5 ký tự" name="desc_DMPost" id="exampleInputPassword1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Hiển thị</label>
                        <select name="hienthi_DMPost" class="form-control input-sm m-bot15">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>
                        </select>
                    </div>                 
                    <button type="submit" name="them_DMPost" class="btn btn-info" style="position: relative;left: 41%;">Thêm danh mục bài viết</button>
                </form>
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert" style="position:relative;left:36%;top:10px">',$message,'</span>';
                    Session::put('message',null);
                }
                ?>
                </div>
            </div>
        </section>
    </div>           
@endsection