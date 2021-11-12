@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Slide Banner
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/luu-slider')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên slide</label>
                                    <input type="text" name="ten_slide" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Hình ảnh</label>
                                    <input type="file" name="hinh_slide" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả slide</label>
                                    <textarea style="resize: none;" rows="8" class="form-control" name="mota_slide" id="exampleInputPassword1"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                    <select name="slide_status" class="form-control input-sm m-bot15">
                                        <option value="0">Ẩn slide</option>
                                        <option value="1">Hiển thị slide</option>
                                    </select>
                                </div>
                                
                                <button type="submit" name="them_slide" class="btn btn-info" style="margin-left: 46%;">Thêm slider</button>
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