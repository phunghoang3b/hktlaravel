@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
               Thêm Tài Khoản
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{URL::to('/luu-taikhoan')}}" method="post">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên user</label>
                        <input type="text" data-validation="length" data-validation-length="min1" data-validation-error-msg="*Vui lòng không để trống mục này" name="admin_name" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" data-validation="length" data-validation-length="min1" data-validation-error-msg="*Vui lòng không để trống mục này" name="admin_email" class="form-control" id="exampleInputEmail1">
                    </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">Số điện thoại</label>
                        <input type="tel" data-validation="length" data-validation-length="min1" data-validation-error-msg="*Vui lòng không để trống mục này" name="admin_phone" class="form-control" id="exampleInputEmail1">
                    </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Mật khẩu</label>
                        <input type="password" data-validation="length" data-validation-length="min1" data-validation-error-msg="*Vui lòng không để trống mục này" name="admin_password" class="form-control" id="exampleInputEmail1">
                    </div>               
                    <button type="submit" name="them_taikhoan" class="btn btn-info" style="position: relative;left: 44%;">Thêm tài khoản</button>
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