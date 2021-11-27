@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Danh Mục Sản Phẩm
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/luudanhmucsanpham')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục Sản Phẩm</label>
                                    <input type="text" name="ten_sanpham" class="form-control" onkeyup="ChangeToSlug();" id="slug" placeholder="Tên danh mục sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="slug_sanpham" class="form-control" id="convert_slug" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none;" rows="8" class="form-control" name="mota_sanpham" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Từ khóa danh mục</label>
                                    <textarea style="resize: none;" rows="8" class="form-control" name="tukhoa_mota_sanpham" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="hienthi_sanpham" class="form-control input-sm m-bot15">
                                        <option value="1">Ẩn</option>
                                        <option value="0">Hiển thị</option>
                                    </select>
                                </div>
                                
                                <button type="submit" name="them_sanpham" class="btn btn-info" style="position: relative;left: 44%;">Thêm danh mục</button>
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