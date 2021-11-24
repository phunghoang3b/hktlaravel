@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Thông Tin Website
            </header>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{URL::to('/luu-lienhe')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputPassword1">Thông tin liên hệ</label>
                        <textarea style="resize: none;" rows="8" data-validation="length" data-validation-length="min5" data-validation-error-msg="Hãy nhập thông tin liên hệ" class="form-control" name="info_contact" id="ckeditor"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Bản đồ</label>
                        <textarea style="resize: none;" rows="8" data-validation="length" data-validation-length="min5" data-validation-error-msg="Hãy thêm đường dẫn bản đồ" class="form-control" name="info_map" id="exampleInputPassword1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình ảnh Logo</label>
                        <input type="file" name="info_image" class="form-control" id="exampleInputEmail1">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Fanpage</label>
                        <textarea style="resize: none;" rows="8" data-validation="length" data-validation-length="min5" data-validation-error-msg="Hãy thêm fanpage" class="form-control" name="info_fanpage" id="exampleInputPassword1"></textarea>
                    </div>                   
                    <button type="submit" name="them_info" class="btn btn-info" style="position: relative;left: 44%;">Thêm thông tin</button>
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