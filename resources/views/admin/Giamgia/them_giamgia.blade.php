@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm Mã Giảm Giá
                        </header>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/luumagiamgia')}}" method="post">
                                    @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                    <input data-validation="length" data-validation-length="min1" data-validation-error-msg="*Vui lòng không để trống mục này" type="text" name="ten_giamgia" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mã giảm giá</label>
                                    <input data-validation="length" data-validation-length="min1" data-validation-error-msg="*Vui lòng không để trống mục này" type="text" name="ma_giamgia" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Số lượng</label>
                                    <input data-validation="length" data-validation-length="min1" data-validation-error-msg="*Vui lòng không để trống mục này" type="text" name="soluong_giamgia" class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tính năng</label>
                                    <select name="tinhnang_giamgia" class="form-control input-sm m-bot15">
                                        <option value="0">------Chọn------</option>
                                        <option value="1">Giảm theo phần trăm</option>
                                        <option value="2">Giảm theo tiền</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nhập % hoặc số tiền giảm</label>
                                    <input data-validation="length" data-validation-length="min1" data-validation-error-msg="*Vui lòng không để trống mục này" type="text" name="so_giamgia" class="form-control" id="exampleInputEmail1">
                                </div>                               
                                <button type="submit" name="them_giamgia" class="btn btn-info">Thêm giảm giá</button>
                                <?php
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alert">',$message,'</span>';
                                    Session::put('message',null);
                                }
                                ?>
                            </form>
                            </div>

                        </div>
                    </section>
            </div>           
@endsection