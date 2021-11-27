@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading" style="font-weight: bold;">
                            Sửa Sản Phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                @foreach($suasanpham as $key => $sanpham)
                                <form role="form" action="{{URL::to('/capnhatsanpham/'.$sanpham->product_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="ten_sanpham" class="form-control" onkeyup="ChangeToSlug();" id="slug" value="{{$sanpham->product_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="slug_sanpham" class="form-control" id="convert_slug" placeholder="Tên danh mục" value="{{$sanpham->product_slug}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Số lượng</label>
                                    <input type="text" data-validation="number" data-validation-error-msg="Hãy nhập số lượng sản phẩm" name="soluong_sanpham" class="form-control" id="exampleInputEmail1" value="{{$sanpham->product_quantity}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name="hinhanh_sanpham" class="form-control" id="exampleInputEmail1">
                                    <img src="{{URL::to('public/uploads/product/'.$sanpham->product_image)}}" height="100" width="100">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá sản phẩm</label>
                                    <input type="text" name="gia_sanpham" class="form-control" id="exampleInputEmail1" value="{{$sanpham->product_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none;" rows="8" class="form-control" name="mota_sanpham" id="exampleInputPassword1">{{$sanpham->product_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none;" rows="8" class="form-control" name="noidung_sanpham" id="exampleInputPassword1">{{$sanpham->product_content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Danh mục sản phẩm</label>
                                    <select name="danhmuc" class="form-control input-sm m-bot15">
                                        @foreach($danhmuc_sanpham as $key => $danhmuc)
                                            @if($danhmuc->category_id==$sanpham->category_id)
                                            <option selected value="{{$danhmuc->category_id}}">{{$danhmuc->category_name}}
                                            @else
                                            <option value="{{$danhmuc->category_id}}">{{$danhmuc->category_name}}
                                            @endif
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Thương hiệu sản phẩm</label>
                                    <select name="thuonghieu" class="form-control input-sm m-bot15">
                                        @foreach($thuonghieu_sanpham as $key => $thuonghieu)
                                            @if($thuonghieu->brand_id==$sanpham->brand_id)
                                            <option selected value="{{$thuonghieu->brand_id}}">{{$thuonghieu->brand_name}}
                                            @else
                                            <option value="{{$thuonghieu->brand_id}}">{{$thuonghieu->brand_name}}
                                            @endif
                                            </option>
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
                                
                                <button type="submit" name="them_sanpham" class="btn btn-info">Sửa sản phẩm</button>
                                <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert">',$message,'</span>';
                                    Session::put('message',null);
                                }
                                ?>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>
            </div>           
@endsection