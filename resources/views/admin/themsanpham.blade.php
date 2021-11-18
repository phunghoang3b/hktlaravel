@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Sản Phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/luusanpham')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" data-validation="length" data-validation-length="min5" data-validation-error-msg="Hãy nhập tên sản phẩm" name="ten_sanpham" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="text" data-validation="number" data-validation-error-msg="Hãy nhập số lượng sản phẩm" name="soluong_sanpham" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name="hinhanh_sanpham" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" data-validation="number" data-validation-error-msg="Hãy nhập giá sản phẩm" name="gia_sanpham" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none;" rows="8" class="form-control" name="mota_sanpham" id="ckeditor1"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none;" rows="8" class="form-control" name="noidung_sanpham" id="ckeditor"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                    <select name="danhmuc" class="form-control input-sm m-bot15">
                                        @foreach($danhmuc_sanpham as $key => $danhmuc)
                                            <option value="{{$danhmuc->category_id}}">{{$danhmuc->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                                    <select name="thuonghieu" class="form-control input-sm m-bot15">
                                        @foreach($thuonghieu_sanpham as $key => $thuonghieu)
                                            <option value="{{$thuonghieu->brand_id}}">{{$thuonghieu->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="hienthi_sanpham" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    </select>
                                </div>
                                
                                <button type="submit" name="them_sanpham" class="btn btn-info" style="position: relative;left: 44%;">Thêm sản phẩm</button>
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