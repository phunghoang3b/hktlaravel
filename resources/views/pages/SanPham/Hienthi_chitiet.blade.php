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

    <link rel="stylesheet" href="{{asset('public/frontend/css/lightslider.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/prettify.css')}}">
    <link rel="stylesheet" href="{{asset('public/frontend/css/lightgallery.min.css')}}">

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
                                <li><a href="{{URL::to('/Trang-chu')}}">Trang chủ</a></li>
                                <li><a href="#">Sản Phẩm</a></li>
                                <li><a href="{{URL::to('/Gioi-thieu')}}" class="active">Giới Thiệu</a></li>
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

    <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                            <li data-target="#slider-carousel" data-slide-to="3"></li>
                            <li data-target="#slider-carousel" data-slide-to="4"></li>
                        </ol>
                        
                        <div class="carousel-inner" style="border-radius: 15px;">
                            @php
                                $i = 0;
                            @endphp
                            @foreach($slider as $key => $slide)
                            @php
                                $i++;
                            @endphp
                            <div class="item {{$i == 1 ? 'active' : ''}}">
                                <div class="col-sm-12">
                                    <img alt="{{$slide->slider_desc}}" src="{{asset('public/uploads/slider/'.$slide->slider_image)}}" height="80%" width="100%" class="img img-responsive"/>
                                </div>
                            </div> 
                            @endforeach                         
                        </div>
                        
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
                            <i class="fa fa-angle-left"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->

	@foreach($chitiet_sanpham as $key => $chitiet)
	<div class="product-details"><!--product-details-->
		<div class="breadcrumbs" style="left: 20%;">
					<ol class="breadcrumb">
					  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
					  <li class="active">Chi tiết sản phẩm</li>
					</ol>
				</div><!--/breadcrums-->	

				<div class="col-sm-5" style="width: 30%;left: 19.3%;">
					<ul id="imageGallery">
                      <li data-thumb="{{asset('public/frontend/images/ao1.jpg')}}" data-src="{{asset('public/frontend/images/ao1.jpg')}}">
                        <img width="100%" src="{{asset('public/frontend/images/ao1.jpg')}}" />
                      </li>
                      <li data-thumb="{{asset('public/frontend/images/ao1.jpg')}}" data-src="{{asset('public/frontend/images/ao1.jpg')}}">
                        <img width="100%" src="{{asset('public/frontend/images/ao1.jpg')}}" />
                      </li>
                      <li data-thumb="{{asset('public/frontend/images/ao1.jpg')}}" data-src="{{asset('public/frontend/images/ao1.jpg')}}">
                        <img width="100%" src="{{asset('public/frontend/images/ao1.jpg')}}" />
                      </li>
                      <li data-thumb="{{asset('public/frontend/images/ao1.jpg')}}" data-src="{{asset('public/frontend/images/ao1.jpg')}}">
                        <img width="100%" src="{{asset('public/frontend/images/ao1.jpg')}}" />
                      </li>
                      <li data-thumb="{{asset('public/frontend/images/ao1.jpg')}}" data-src="{{asset('public/frontend/images/ao1.jpg')}}">
                        <img width="100%" src="{{asset('public/frontend/images/ao1.jpg')}}" />
                      </li>
                      <li data-thumb="{{asset('public/frontend/images/ao1.jpg')}}" data-src="{{asset('public/frontend/images/ao1.jpg')}}">
                        <img width="100%" src="{{asset('public/frontend/images/ao1.jpg')}}" />
                      </li>
                    </ul>
				</div>
				<div class="col-sm-7" style="width: 31%;right: -19%;">
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
								{{-- <input type="button" class="btn btn-primary btn-sm add-to-cart" style="border-radius: 5px;position: absolute;margin-top: 34%;right: 63%;" value="Thêm giỏ hàng" name="add-to-cart">
									{{-- <i class="fa fa-shopping-cart"></i> --}}
                                <button type="submit" class="btn btn-fefault cart" style="border-radius: 5px;position: absolute;margin-top: 32%;right: 63%;">
                                    <i class="fa fa-shopping-cart"></i>
                                    Thêm Giỏ Hàng
                                </button>
							</span>
						</form>
						<p><b>Tình trạng:</b> Còn hàng</p>
						<p><b>Chất lượng:</b> Mới</p>
						<p><b>Thương hiệu:</b> {{$chitiet->brand_name}}</p>
						<p><b>Danh mục:</b> {{$chitiet->category_name}}</p>
					</div><!--/product-information-->
				</div>
			</div><!--/product-details-->

			<div class="category-tab shop-details-tab" style="width: 59.2%;margin-left: 20%;"><!--category-tab-->
				<div class="col-sm-12">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#details" data-toggle="tab">Mô Tả</a></li>
						<li><a href="#companyprofile" data-toggle="tab">Chi Tiết Sản Phẩm</a></li>
						<li><a href="#reviews" data-toggle="tab">Đánh Giá</a></li>
					</ul>
				</div>
				<div class="tab-content">
					<div class="tab-pane fade active in" id="details" >
						<p>{!!$chitiet->product_desc!!}</p>													
					</div>
					
					<div class="tab-pane fade" id="companyprofile" >
						<p>{!!$chitiet->product_content!!}</p>													
					</div>								
					
					<div class="tab-pane fade" id="reviews" >
						<div class="col-sm-12">
							<ul>
								<li><a href=""><i class="fa fa-user"></i>Khải Nguyễn</a></li>
								<li><a href=""><i class="fa fa-clock-o"></i>14:41 PM</a></li>
								<li><a href=""><i class="fa fa-calendar-o"></i>11 11 2021</a></li>
							</ul>
							<p>PVL WHEY GOLD nâng mức tiêu chuẩn Protein Blend lên tâng cao mới. Công thức tiên tiến của PVL sạch hơn và hấp thụ nhanh hơn các nguồn protein kém chất lượng. Rất đơn giản, để giúp bạn có thể đạt được mục tiêu của mình sớm hơn!
							PVL WHEY GOLD sản xuất Protein với các loại whey protein đã qua xử lý lạnh, được vi lọc từ các nguồn sữa loại A được cho ăn cỏ và không chứa hormone. 
							Đi cùng với công nghệ đặc biệt, PVL WHEY GOLD bổ sung các enzyme để cải thiện tiêu hóa cũng như hấp thụ Whey Protein tốt hơn. Đi cùng với 2 hương vị đặc trưng và ngon nhất của hãng đó chính là: Vanilla Soft Serve Supreme và Triple Chocolate Brownie Overload mang lại cho bạn một trải nghiệm hương vị đỉnh hơn bao giờ hết.</p>
							<p><b>Viết đánh giá của bạn</b></p>
							
							<form action="#">
								<span>
									<input type="text" placeholder="Họ Tên"/>
									<input type="email" placeholder="Địa chỉ Email"/>
								</span>
								<textarea name="" ></textarea>
								<b>Đánh giá: </b> <img src="images/product-details/rating.png" alt="" />
								<button type="button" class="btn btn-default pull-right">
									Gửi
								</button>
							</form>
						</div>
					</div>
					
				</div>
			</div><!--/category-tab-->
		@endforeach

			<div class="recommended_items"><!--recommended_items-->
				<h2 class="title text-center" style="width: 58%;left: 20%;">Sản Phẩm Liên Quan</h2>
				
				<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel" style="width: 50%;left: 24.7%;">
					<div class="carousel-inner">
						<div class="item active">
						@foreach($lienquan as $key => $splienquan)	
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
	                                        <div class="productinfo text-center">
	                                            <img src="{{URL::to('public/uploads/product/'.$splienquan->product_image)}}" alt="" />
	                                            <h2>{{number_format($splienquan->product_price).' '.'đ'}}</h2>
	                                            <p>{{($splienquan->product_name)}}</p>
	                                            <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm Giỏ Hàng</a>
	                                        </div>
	                                </div>
								</div>
							</div>	
						@endforeach																	
						</div>										
					</div>
					 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
						<i class="fa fa-angle-left"></i>
					  </a>
					  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
						<i class="fa fa-angle-right"></i>
					  </a>			
				</div>
			</div><!--/recommended_items-->

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
                <div class="row" style="margin-left: -15px;margin-right: -15px;">
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

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/slider.js')}}"></script>

    <script src="{{asset('public/frontend/js/lightslider.js')}}"></script>
    <script src="{{asset('public/frontend/js/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/prettify.js')}}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="8Nbv5FZH"></script>

    {{-- galary image --}}
    <script type="text/javascript">
        $(document).ready(function(){
        $('#imageGallery').lightSlider({
            gallery:true,
            item:1,
            loop:true,
            thumbItem:6,
            slideMargin:0,
            enableDrag: false,
            currentPagerPosition:'left',
            onSliderLoad:function(el){  
                the.lightGallery({
                    selector:'#imageGallery.lslide' 
                });
            }   
        });  
      });
    </script>
</body>
</html>