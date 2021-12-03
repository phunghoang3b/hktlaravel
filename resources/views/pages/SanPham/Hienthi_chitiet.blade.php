@extends('layout')
@section('content')
    @foreach($chitiet_sanpham as $key => $chitiet)

    <input type="hidden" id="product_viewed_id" value="{{$chitiet->product_id}}">
    <input type="hidden" id="viewed_productname{{$chitiet->product_id}}" value="{{$chitiet->product_name}}">
    <input type="hidden" id="viewed_producturl{{$chitiet->product_id}}" value="{{url('/chi-tiet-san-pham/'.$chitiet->product_id)}}">
    <input type="hidden" id="viewed_productimage{{$chitiet->product_id}}" value="{{asset('public/uploads/product/'.$chitiet->product_image)}}">
    <input type="hidden" id="viewed_productprice{{$chitiet->product_id}}" value="{{number_format($chitiet->product_price,0,',','.')}} VNĐ">

    <div class="product-details"><!--product-details-->
        <div class="breadcrumbs">
            <ol class="breadcrumb">
              <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
              <li class="active">Chi tiết sản phẩm</li>
            </ol>
        </div><!--/breadcrums--> 

        <div class="col-sm-5">
            <ul id="imageGallery">
            @foreach($gallery as $key => $gal)
              <li data-thumb="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}" data-src="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}">
                <img width="100%" alt="{{$gal->gallery_name}}" src="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}"/>
              </li>
            @endforeach
            </ul>
        </div>
        <div class="col-sm-7">
            <div class="product-information"><!--/product-information-->
                <img src="images/product-details/new.jpg" class="newarrival" alt="" />
                <h2>{{$chitiet->product_name}}</h2>
                <p>Mã ID sản phẩm: {{$chitiet->product_id}}</p>
                
                <form action="{{URL::to('/themgiohang-ajax')}}" method="POST">
                    @csrf
                    <input type="hidden" value="{{$chitiet->product_id}}" class="cart_product_id_{{$chitiet->product_id}}">
                    <input type="hidden" value="{{$chitiet->product_name}}" class="cart_product_name_{{$chitiet->product_id}}">
                    <input type="hidden" value="{{$chitiet->product_image}}" class="cart_product_image_{{$chitiet->product_id}}">
                    <input type="hidden" value="{{$chitiet->product_quantity}}" class="cart_product_quantity_{{$chitiet->product_id}}">
                    <input type="hidden" value="{{$chitiet->product_price}}" class="cart_product_price_{{$chitiet->product_id}}">
                    <span>
                        <span>{{number_format($chitiet->product_price,0,',','.').' đ'}}</span>
                        <label>Số lượng:</label>
                        <input name="so_luong" type="number" min="1" value="1" class="cart_product_qty_{{$chitiet->product_id}}" />
                        <input name="sanphamid_hidden" type="hidden" value="{{$chitiet->product_id}}" />
                    </span>
                    <p><b>Thương hiệu:</b> {{$chitiet->brand_name}}</p>
                    <p><b>Danh mục:</b> {{$chitiet->category_name}}</p>
                    <input type="button" value="Thêm giỏ hàng" class="btn btn-default add-to-cart" data-id_sanpham="{{$chitiet->product_id}}" name="them-gio-hang" style="margin-top: 8%;border-radius: 5px;">
                </form>
            </div><!--/product-information-->
        </div>

        <div class="category-tab shop-details-tab"><!--category-tab-->
            <div class="col-sm-12" style="margin-top: 2%;">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#details" data-toggle="tab">Mô Tả</a></li>
                    <li><a href="#companyprofile" data-toggle="tab">Chi Tiết Sản Phẩm</a></li>
                </ul>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade active in" id="details">
                    <p>{!!$chitiet->product_desc!!}</p>                                                 
                </div>
                
                <div class="tab-pane fade" id="companyprofile">
                    <p>{!!$chitiet->product_content!!}</p>                                                
                </div>                  
            </div>
        </div><!--/category-tab-->
    @endforeach

    <div class="recommended_items"><!--recommended_items-->
        <h2 class="title text-center">Sản Phẩm Liên Quan</h2>              
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                @foreach($lienquan as $key => $sanpham)  
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <form>
                                        @csrf
                                        <input type="hidden" value="{{$sanpham->product_id}}" class="cart_product_id_{{$sanpham->product_id}}">
                                        <input type="hidden" value="{{$sanpham->product_name}}" class="cart_product_name_{{$sanpham->product_id}}">
                                        <input type="hidden" value="{{$sanpham->product_quantity}}" class="cart_product_quantity_{{$sanpham->product_id}}">
                                        <input type="hidden" value="{{$sanpham->product_image}}" class="cart_product_image_{{$sanpham->product_id}}">
                                        <input type="hidden" value="{{$sanpham->product_price}}" class="cart_product_price_{{$sanpham->product_id}}">
                                        <input type="hidden" value="1" class="cart_product_qty_{{$sanpham->product_id}}">

                                        <a href="{{URL::to('/chi-tiet-san-pham/'.$sanpham->product_id)}}">
                                            <img src="{{URL::to('public/uploads/product/'.$sanpham->product_image)}}" alt="" />
                                            <h2>{{number_format($sanpham->product_price).' '.'đ'}}</h2>
                                            <p>{{($sanpham->product_name)}}</p>
                                        </a> 
                                        <style type="text/css">
                                            .xemnhanh{
                                                background: #F5F5ED;
                                                border: 0 none;
                                                border-radius: 0;
                                                color: #696763;
                                                font-family: 'Roboto', sans-serif;
                                                font-size: 15px;
                                                margin-bottom: 25px;
                                            }
                                        </style>
                                        <input type="button" value="Thêm giỏ hàng" class="btn btn-default add-to-cart" data-id_sanpham="{{$sanpham->product_id}}" name="them-gio-hang">

                                        <input type="button" data-toggle="modal" data-target="#xemnhanh" value="Xem nhanh" class="btn btn-default xemnhanh" data-id_sanpham="{{$sanpham->product_id}}" name="them-gio-hang">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>  
                @endforeach                                                                 
                </div>                                      
            </div>        
        </div>
    </div><!--/recommended_items-->
</div>
@endsection