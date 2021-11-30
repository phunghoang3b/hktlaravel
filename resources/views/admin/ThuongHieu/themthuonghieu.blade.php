@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Thương Hiệu Sản Phẩm
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{URL::to('/luuthuonghieusanpham')}}" method="post">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên thương hiệu</label>
                        <input type="text" name="ten_thuonghieu" class="form-control" data-validation="length" data-validation-length="min5" data-validation-error-msg="Hãy nhập tên thương hiệu và phải nhiều hơn 5 ký tự" onkeyup="ChangeToSlug();" id="slug">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Slug</label>
                        <input type="text" name="slug_thuonghieu" class="form-control" id="convert_slug" placeholder="Tên danh mục">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                        <textarea style="resize: none;" rows="8" class="form-control" data-validation="length" data-validation-length="min5" data-validation-error-msg="Mô tả thương hiệu không được để trống và phải nhiều hơn 5 ký tự" name="mota_thuonghieu" id="exampleInputPassword1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Từ khóa thương hiệu</label>
                        <textarea style="resize: none;" rows="2" class="form-control" data-validation="length" data-validation-length="min5" data-validation-error-msg="Hãy nhập từ khóa thương hiệu và phải nhiều hơn 5 ký tự" name="tukhoa_mota_thuonghieu" id="exampleInputPassword1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Hiển thị</label>
                        <select name="hienthi_thuonghieu" class="form-control input-sm m-bot15">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển thị</option>
                        </select>
                    </div>                  
                    <button type="submit" name="them_sanpham" class="btn btn-info" style="position: relative;left: 44%;">Thêm thương hiệu</button>
                </form>
                <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert" style="position:relative;left:35%;top:10px">',$message,'</span>';
                    Session::put('message',null);
                }
                ?>
                </div>
            </div>
        </section>
    </div>           
@endsection