@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Sửa Thương Hiệu Sản Phẩm
                        </header>
                        <div class="panel-body">
                            @foreach($suaTHsanpham as $key => $suaTH)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('/suathuonghieu/'.$suaTH->brand_id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên thương hiệu</label>
                                    <input type="text" value="{{$suaTH->brand_name}}" name="ten_thuonghieu" class="form-control" id="exampleInputEmail1" placeholder="Tên thương hiệu sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả thương hiệu</label>
                                    <textarea style="resize: none;" rows="8" class="form-control" name="mota_thuonghieu" id="exampleInputPassword1">{{$suaTH->brand_desc}}</textarea>
                                </div>                               
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Từ khóa thương hiệu</label>
                                    <textarea style="resize: none;" rows="8" class="form-control" name="tukhoa_mota_thuonghieu" id="exampleInputPassword1">{{$suaTH->meta_keywords}}</textarea>
                                </div>
                                <button type="submit" name="sua_thuonghieu" class="btn btn-info">Sửa thương hiệu</button>
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