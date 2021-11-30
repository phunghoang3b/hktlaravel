@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Sửa Danh Mục Sản Phẩm
            </header>
            <div class="panel-body">
                @foreach($suaDMsanpham as $key => $suaDM)
                <div class="position-center">
                    <form role="form" action="{{URL::to('/suadanhmucsanpham/'.$suaDM->category_id)}}" method="post">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên danh mục Sản Phẩm</label>
                        <input type="text" value="{{$suaDM->category_name}}" name="ten_sanpham" data-validation="length" data-validation-length="min5" data-validation-error-msg="Hãy nhập tên danh mục sản phẩm và phải nhiều hơn 5 ký tự" class="form-control" onkeyup="ChangeToSlug();" id="slug" placeholder="Tên danh mục sản phẩm">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Slug</label>
                        <input type="text" name="slug_sanpham" value="{{$suaDM->slug_category_product}}" class="form-control" id="convert_slug" placeholder="Tên danh mục">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mô tả danh mục</label>
                        <textarea style="resize: none;" rows="8" class="form-control" data-validation="length" data-validation-length="min5" data-validation-error-msg="Mô tả không được để trống và phải nhiều hơn 5 ký tự" name="mota_sanpham" id="exampleInputPassword1">{{$suaDM->category_desc}}</textarea>
                    </div>                               
                    <div class="form-group">
                        <label for="exampleInputPassword1">Từ khóa danh mục</label>
                        <textarea style="resize: none;" rows="8" class="form-control" data-validation="length" data-validation-length="min5" data-validation-error-msg="Nhập từ khóa danh mục" name="tukhoa_mota_sanpham" id="exampleInputPassword1">{{$suaDM->meta_keywords}}</textarea>
                    </div>
                    <button type="submit" name="sua_sanpham" class="btn btn-info">Sửa danh mục</button>
                    <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert">',$message,'</span>';
                        Session::put('message',null);
                    }
                    ?>
                </form>
                </div>
                @endforeach
            </div>
        </section>
    </div>           
@endsection