@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Kết Quả Tìm Kiếm</h2>
    @foreach($timkiem_sanpham as $key => $sanpham)
    <a href="{{URL::to('/chi-tiet-san-pham/'.$sanpham->product_id)}}">
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <div class="single-products">
                        <div class="productinfo text-center">
                            <img src="{{URL::to('public/uploads/product/'.$sanpham->product_image)}}" alt="" />
                            <h2>{{number_format($sanpham->product_price).' '.'đ'}}</h2>
                            <p>{{($sanpham->product_name)}}</p>
                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm Giỏ Hàng</a>
                        </div>
                </div>
            </div>
        </div>
    </a>    
    @endforeach                                                                              
</div><!--features_items-->                   
@endsection