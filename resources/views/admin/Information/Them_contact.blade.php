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
                    @foreach($contact as $key => $info)
                    <form role="form" action="{{URL::to('/capnhat-lienhe/'.$info->info_id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputPassword1">Thông tin liên hệ</label>
                        <textarea style="resize: none;" rows="8" data-validation="length" data-validation-length="min5" data-validation-error-msg="Hãy nhập thông tin liên hệ" class="form-control" name="info_contact" id="ckeditor">{{$info->info_contact}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Bản đồ</label>
                        <textarea style="resize: none;" rows="8" data-validation="length" data-validation-length="min5" data-validation-error-msg="Hãy thêm đường dẫn bản đồ" class="form-control" name="info_map" id="exampleInputPassword1">{{$info->info_map}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Hình ảnh Logo</label>
                        <input type="file" name="info_image" class="form-control" id="exampleInputEmail1">
                        <img src="{{URL::to('public/uploads/contact/'.$info->info_logo)}}" height="100" width="100">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Fanpage</label>
                        <textarea style="resize: none;" rows="8" data-validation="length" data-validation-length="min5" data-validation-error-msg="Hãy thêm fanpage" class="form-control" name="info_fanpage" id="exampleInputPassword1">{{$info->info_fanpage}}</textarea>
                    </div>                   
                    <button type="submit" name="them_info" class="btn btn-info" style="position: relative;left: 44%;">Cập nhật thông tin</button>                   
                </form>
                <?php
                    $message = Session::get('message');
                    if($message){
                        echo '<span class="text-alert" style="position:relative;left:35%">',$message,'</span>';
                        Session::put('message',null);
                    }
                    ?>
                @endforeach
                </div>
            </div>
        </section>
    </div>           
@endsection