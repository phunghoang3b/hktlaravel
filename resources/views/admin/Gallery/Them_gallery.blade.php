@extends('admin_layout')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Thêm Thư Viện Hình Ảnh
            </header>
            <?php
            $message = Session::get('message');
            if($message){
                echo '<span class="text-alert" style="position:relative;left:5%">',$message,'</span>';
                Session::put('message',null);
            }
            ?>
            <div class="panel-body">
                <input type="hidden" value="{{$pro_id}}" name="pro_id" class="pro_id">
                <form>
                    @csrf
                    <div id="gallery_load"></div>
                </form>
            </div>
        </section>
    </div>           
@endsection