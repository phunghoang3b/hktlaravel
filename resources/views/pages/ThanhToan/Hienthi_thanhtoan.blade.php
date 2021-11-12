<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- chuẩn seo --}}
    <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link rel="canonical" href="{{$duongdan}}"/>
    <meta name="author" content="">

    {{-- chuẩn seo --}}
    <title>{{$the_tieude}}</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{('public/frontend/images/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{('public/frontend/images/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{('public/frontend/images/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{('public/frontend/images/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{('public/frontend/images/apple-touch-icon-57-precomposed.png')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css">
</head>
<body>
	<header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a href="#"><i class="fa fa-phone"></i> +84 37 441 2199</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> nguyenhoangkhai0379@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="social-icons pull-right">
                            <ul class="nav navbar-nav">
                                <li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="https://mail.google.com/mail/u/0/#inbox"><i class="fa fa-google-plus"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{URL::to('/Trang-chu')}}"><img src="{{('public/frontend/images/logo1.png')}}" alt="" /></a>
                        </div>                      
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <?php
                                    $customer_id = Session::get('customer_id');
                                    $shipping_id = Session::get('shipping_id');
                                    if($customer_id != NULL && $shipping_id == NULL){
                                ?>
                                    <li><a href="{{URL::to('/thanhtoan')}}"><i class="fa fa-crosshairs"></i> Thanh Toán</a></li>
                                <?php
                                    }elseif($customer_id != NULL && $shipping_id != NULL){
                                ?>
                                    <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i>Thanh Toán</a></li>
                                <?php
                                    }else{
                                ?>  
                                     <li><a href="{{URL::to('/dangnhap-thanhtoan')}}"><i class="fa fa-crosshairs"></i>Thanh Toán</a></li>
                                <?php
                                    }
                                ?>
                                {{-- phần giỏ hàng --}}
                                <li><a href="{{URL::to('/giohang-ajax')}}"><i class="fa fa-shopping-cart"></i> Giỏ Hàng</a></li>
                                <?php
                                    $customer_id = Session::get('customer_id');
                                    if($customer_id != NULL){
                                ?>
                                    <li><a href="{{URL::to('/dangxuat-thanhtoan')}}"><i class="fa fa-lock"></i> Đăng Xuất</a></li>
                                <?php
                                    }else{
                                ?>
                                    <li><a href="{{URL::to('/dangnhap-thanhtoan')}}"><i class="fa fa-lock"></i> Đăng Nhập</a></li>
                                <?php
                                    }
                                ?>                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/Trang-chu')}}" class="active">Trang chủ</a></li>
                                <li><a href="#">Sản Phẩm</a></li>
                                <li><a href="{{URL::to('/Gioi-thieu')}}">Giới Thiệu</a></li>
                                <li><a href="#">Tin Tức</a></li> 
                                {{-- <li><a href="{{URL::to('/hienthi-giohang')}}">Giỏ Hàng</a></li> --}}
                                <li><a href="{{URL::to('/Lien-he')}}">Liên Hệ</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->

	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div><!--/breadcrums-->	

			<div class="img-feeship" style="margin-left: 43%;">
				<img src="{{('public/frontend/images/shipped.png')}}">
			</div>

			{{-- chọn địa chỉ và tính phí vận chuyển --}}
			<form>
                @csrf               
                <p style="color: #111;font-size: 15px;margin-bottom: 25px;text-align: center;">Hãy chọn địa chỉ để tính phí vận chuyển nhé!</p>               
            <div class="form-group">
                <label for="exampleInputPassword1" style="font-size: 17px;margin-left: 24%;">Chọn Thành Phố</label>
                <select name="city" id="city" class="form-control input-sm m-bot15 choose city" style="width: 50%;text-align: center;margin-left: 24%;">
                    <option value="">----Chọn Tỉnh Thành Phố----</option>
                    @foreach($city as $key => $tp)
                        <option value="{{$tp->matp}}">{{$tp->name_city}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1" style="font-size: 17px;margin-left: 24%;">Chọn Quận Huyện</label>
                <select name="province" id="province" class="form-control input-sm m-bot15 choose province" style="width: 50%;text-align: center;margin-left: 24%;">
                    <option value="">------Chọn quận huyện------</option>                                      
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1" style="font-size: 17px;margin-left: 24%;">Chọn Xã Phường</label>
                <select name="wards" id="wards" class="form-control input-sm m-bot15 wards" style="width: 50%;text-align: center;margin-left: 24%;">
                    <option value="">------Chọn xã phường------</option>                                      
                </select>
            </div>

            <input type="button" value="Tính phí vận chuyển" name="tinhphi_vanchuyen" class="btn btn-primary btn-sm calculate_delivery" style="    margin-top: 2px;margin-left: 41%;margin-bottom: 3%;font-weight: bold;color: #111;font-size: 17px;border-radius: 5px;">
        	</form>
			{{-- chọn địa chỉ và tính phí vận chuyển --}}	

			<div class="shopper-informations">
				<div class="row">					
					<div class="col-sm-12 clearfix">
						@if(session()->has('message'))
			                <div class="alert alert-success">
			                    {{ session()->get('message') }}
			                </div>
			            @elseif(session()->has('error'))
			                 <div class="alert alert-danger">
			                    {{ session()->get('error') }}
			                </div>
			            @endif
						<div class="table-responsive cart_info">
						<form action="{{url('/capnhat-giohang-ajax')}}" method="POST">
							@csrf
							<table class="table table-condensed">
								<thead>
									<tr class="cart_menu">
										<td class="image" style="text-align: center; width: 20%;">Hình sản phẩm</td>
										<td class="description" style="text-align: center;">Tên sản phẩm</td>
										<td class="price" style="text-align: center;">Giá tiền</td>
										<td class="quantity" style="text-align: center;width: 15%;">Số lượng</td>
										<td class="total" style="text-align: center;">Thành tiền</td>
										<td></td>
									</tr>
								</thead>
								<tbody>
									@if(Session::get('giohang') == true)
									@php
										$tongtien = 0;
									@endphp

									@foreach(Session::get('giohang') as $key => $gio)
										@php
											$thanhtien = $gio['product_price'] * $gio['product_sales_quantity'];
											$tongtien += $thanhtien;
										@endphp
										<tr>
											<td class="cart_product" style="text-align: center;width: 90%;">
												<img src="{{asset('public/uploads/product/'.$gio['product_image'])}}" width="80" height="60" alt="{{$gio['product_name']}}" style="width: 82%;height: 2%;" />
											</td>
											<td class="cart_description" style="text-align: center;">
												<h4><a href=""></a></h4>
												<p>{{$gio['product_name']}}</p>
											</td>
											<td class="cart_price" style="text-align: center;">
												<p>{{number_format($gio['product_price'],0,',','.')}} đ</p>
											</td>
											<td class="cart_quantity" style="text-align: center;">
												<div class="cart_quantity_button">								
													<input class="cart_quantity" type="number" min="1" name="cart_qty[{{$gio['session_id']}}]" value="{{$gio['product_sales_quantity']}}">										
												</div>
											</td>
											<td class="cart_total" style="text-align: center;">
												<p class="cart_total_price">
													{{number_format($thanhtien,0,',','.')}} đ
												</p>
											</td>
											<td class="cart_delete" style="text-align: center;">
												<a class="cart_quantity_delete" href="{{url('/xoasp-ajax/'.$gio['session_id'])}}"><img src="{{('public/frontend/images/garbage.png')}}"></a>
											</td>
										</tr>							
									@endforeach	
										<tr>
											<td><input type="submit" value="Cập nhật giỏ hàng" name="capnhat_sl" class="check_out btn btn-default btn-sm" style="border-radius: 5px;height: 42px;margin-left: 20%;"></td>
											<td><a class="btn btn-default check_out" href="{{url('/xoatatca-giohang')}}" style="border-radius: 5px;margin-left: -16%"><img src="{{('public/frontend/images/shopping-cart.png')}}"></a></td>
											<td>
												@if(Session::get('giamgia'))
												<a class="btn btn-default check_out" href="{{url('/xoagiamgia-giohang')}}" style="border-radius: 5px;height: 42px;padding-top: 12px;">Xóa Mã Giảm Giá</a>
												@endif
											</td>

											<td colspan="2">
												<p style="padding-top: 25px; color: red;font-size: 20px; font-weight: bold;padding-left: 10%;">Tổng tiền: <span>{{number_format($tongtien,0,',','.')}} đ</span></p>
												@if(Session::get('giamgia'))
												<p style="color: red;font-size: 20px; font-weight: bold;padding-left: 10%;">
												@foreach(Session::get('giamgia') as $key => $giam)
													@if($giam['tinhnang_giamgia']==1)
														Mã giảm giá: {{$giam['so_giamgia']}} %
														<p>
															@php 
																$tong_giamgia = ($tongtien*$giam['so_giamgia'])/100;
															@endphp
														</p>
														<p>
															@php
																$tongtien_saugiamgia = $tongtien-$tong_giamgia;
															@endphp
														</p>
													@elseif($giam['tinhnang_giamgia']==2)
														Mã giảm : {{number_format($giam['so_giamgia'],0,',','.')}} k
														<p>
															@php 
																$tong_giamgia = $tongtien - $giam['so_giamgia'];					
															@endphp
														</p>
														@php
															$tongtien_saugiamgia = $tong_giamgia;
														@endphp
													@endif
												@endforeach								
												</p>
												@endif 

												{{-- kiểm tra nếu có session phí vận chuyển --}}
												@if(Session::get('fee'))
												<p style="color: red;font-size: 20px; font-weight: bold;padding-left: 10%;">
													<a class="cart_quantity_delete" href="{{url('/xoaphi-giohang')}}"><i class="fa fa-times"></i></a>
													Phí vận chuyển: <span>{{number_format(Session::get('fee'),0,',','.')}} đ</span></p>
													<?php $tongtien_saucophi = $tongtien + Session::get('fee'); ?>
												@endif

												<p style="color: red;font-size: 20px; font-weight: bold;padding-left: 10%;">Tổng còn:
													@php
														if(Session::get('fee') && !Session::get('giamgia')){
															$tongtien_sau = $tongtien_saucophi;
															echo number_format($tongtien_sau,0,',','.').'đ';
														}elseif(!Session::get('fee') && Session::get('giamgia')){
															$tongtien_sau = $tongtien_saugiamgia;
															echo number_format($tongtien_sau,0,',','.').'đ';
														}elseif(Session::get('fee') && Session::get('giamgia')){
															$tongtien_sau = $tongtien_saugiamgia;
															$tongtien_sau = $tongtien_sau + Session::get('fee');
															echo number_format($tongtien_sau,0,',','.').'đ';
														}elseif(!Session::get('fee') && !Session::get('giamgia')){
															$tongtien_sau = $tongtien;
															echo number_format($tongtien_sau,0,',','.').'đ';
														}
													@endphp
												</p>
											</td>
										</tr>
									@else
										<tr>
											<td colspan="5">
												<center style="padding-top: 14%;color: #111;font-weight: bold;">
													<img src="{{('public/frontend/images/basket.png')}}" style="position: absolute;margin-top: -12%;margin-left: 10%;">
													@php
														echo 'Giỏ hàng bạn đang trống, hãy thêm sản phẩm vào giỏ hàng!'
													@endphp
												</center>
											</td>
										</tr>
									@endif										
								</tbody>
							</form>
							@if(Session::get('giohang'))
								<tr>
									<td style="padding-left: 11%;padding-top: 25px;">
										<form method="POST" action="{{url('/kiemtra-giamgia')}}">
										@csrf
										<img src="{{('public/frontend/images/coupon.png')}}" style="position: absolute;margin-top: -15px;left: 66px;">
										<input type="text" class="form-control" name="giamgia" placeholder="Nhập mã giảm giá" style="width: 266%;"><br>
			            				<input type="submit" class="btn btn-default check_coupon" name="kiemtra_giamgia" value="Tính mã giảm giá" style="font-weight: bold;">
				            			</form>
									</td>
								</tr>
							@endif
							</table>

						</div>
					</div>

					<div class="col-sm-12 clearfix">
						<div class="bill-to">
							<p style="font-weight: bold;text-align: center;color: #111;">Thông tin thanh toán</p>
							<div class="form-one">
								<form method="POST" style="margin-left: 50%;width: 113%;">
									@csrf
									<input type="text" name="shipping_name" class="shipping_name" placeholder="Họ và Tên">
									<input type="text" name="shipping_email" class="shipping_email" placeholder="Email">
									<input type="text" name="shipping_address" class="shipping_address" placeholder="Địa Chỉ">
									<input type="text" name="shipping_phone" class="shipping_phone" placeholder="Số Điện Thoại">
									<textarea name="shipping_notes" class="shipping_notes" placeholder="Ghi chú đơn hàng của bạn" rows="5"></textarea>

									{{-- lấy dữ liệu 2 trường phí vận chuyển và mã giảm giá --}}
									@if(Session::get('fee'))
										<input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
									@else
										<input type="hidden" name="order_fee" class="order_fee" value="15000">
									@endif

									@if(Session::get('giamgia'))
										@foreach(Session::get('giamgia') as $key => $giam)
											<input type="hidden" name="order_coupon" class="order_coupon" value="{{$giam['ma_giamgia']}}">
										@endforeach
									@else
										<input type="hidden" name="order_coupon" class="order_coupon" value="no">
									@endif

									{{-- chọn hình thức thanh toán --}}
									<div class=""><br>
										<div class="form-group">
		                                    <label for="exampleInputPassword1" style="font-size: 17px;">Chọn Phương Thức Thanh Toán</label>
		                                    <select name="chonhinhthuc_thanhtoan" class="form-control input-sm m-bot15 chonhinhthuc_thanhtoan">
		                                        <option value="0">Chuyển khoản</option>     
		                                        <option value="1">Tiền mặt</option>                                     
		                                    </select>
			                            </div>
									</div>
									<input type="button" value="Xác nhận đơn hàng" name="send_order" class="btn btn-primary btn-sm send_order" style="border-radius: 5px;font-size: 17px;font-weight: bold;color: #111;">
								</form>								
							</div>
						</div>
					</div>				
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<footer id="footer" style="margin-top: 5px;"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="companyinfo">
                            <h2><span>HKT</span>-Gym Store</h2>
                            <p>Hãy cung cấp cho bạn những thực phẩm bổ sung, phụ kiện tốt nhất cho việc tập luyện của một gymer!</p>
                        </div>
                    </div>
                    <div class="col-sm-7">
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{asset('public/frontend/images/ifme.jpg')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{asset('public/frontend/images/iframe2.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{asset('public/frontend/images/iframe3.png')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                        
                        <div class="col-sm-3">
                            <div class="video-gallery text-center">
                                <a href="#">
                                    <div class="iframe-img">
                                        <img src="{{asset('public/frontend/images/ifme2.jpg')}}" alt="" />
                                    </div>
                                    <div class="overlay-icon">
                                        <i class="fa fa-play-circle-o"></i>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="address">
                            <img src="{{asset('public/frontend/images/map.png')}}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>DỊCH VỤ</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Trợ giúp trực tuyến</a></li>
                                <li><a href="#">Liên hệ chúng tôi</a></li>
                                <li><a href="#">Tình trạng đặt hàng</a></li>
                                <li><a href="#">Thay đổi địa điểm</a></li>
                                <li><a href="#">Câu hỏi thường gặp</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>DANH MỤC</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">PROTEIN & Tăng cân</a></li>
                                <li><a href="#">Năng lượng & Sức khỏe</a></li>
                                <li><a href="#">Thời trang</a></li>
                                <li><a href="#">Phụ kiện</a></li>
                                <li><a href="#">Bình nước</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>CHÍNH SÁCH</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Điều khoản sử dụng</a></li>
                                <li><a href="#">Chính sách bảo mật</a></li>
                                <li><a href="#">Chính sách hoàn lại tiền</a></li>
                                <li><a href="#">Hệ thống thanh toán</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>GIỚI THIỆU SHOP</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="#">Thông tin Shop</a></li>
                                <li><a href="#">Nghề nghiệp</a></li>
                                <li><a href="#">Vị trí cửa hàng</a></li>
                                <li><a href="#">Chương trình liên kết</a></li>
                                <li><a href="#">Bản quyền</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>HKT - STORE GYM</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Địa chỉ email của bạn" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Chúng tôi sẽ liên hệ và giải đáp các thắc mắc của bạn sớm nhất có thể...</p>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Bản quyền © 2021 HKT - Store Gym</p>
                    <p class="pull-right">Thiết kế bởi <span><a target="_blank" href="https://www.facebook.com/khai.nguyenhoang.3386/">Khải Nguyễn</a></span></p>
                </div>
            </div>
        </div>      
    </footer><!--/Footer-->

    {{-- scrollup --}}
    <a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647;"><i class="fa fa-angle-up"></i></a>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
</body>
</html>