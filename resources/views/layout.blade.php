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
</head><!--/head-->

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
                                <li class="dropdown"><a href="#">Tin Tức<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach($category_post as $key => $dmbv)
                                            <li><a href="{{URL::to('/danh-muc-bai-viet/'.$dmbv->cate_post_slug)}}">{{$dmbv->cate_post_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li> 
                                {{-- <li><a href="{{URL::to('/hienthi-giohang')}}">Giỏ Hàng</a></li> --}}
                                <li><a href="{{URL::to('/Lien-he')}}">Liên Hệ</a></li>
                                <li><a href="{{URL::to('/Video-gymstore')}}">Video</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <form action="{{URL::to('/Tim-kiem')}}" method="POST">
                            {{ csrf_field() }}
                            <div class="search_box pull-right">
                                <input type="text" name="tukhoa_sanpham" placeholder="Tìm Kiếm"/>
                                <input type="submit" style="margin-top: 0; color: #111; font-weight: bold; width: 75px;" name="timkiem_items" class="btn btn-primary btn-sm" value="Tìm Kiếm"/>
                            </div>
                        </form>
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
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh Mục Sản Phẩm</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                            @foreach($category as $key => $danhmuc)                                   
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{URL::to('/danh-muc-sp/'.$danhmuc->category_id)}}">{{$danhmuc->category_name}}</a></h4>
                                </div>
                            </div>
                            @endforeach
                        </div><!--/category-products-->
                    
                        <div class="brands_products"><!--brands_products-->
                            <h2>Thương Hiệu</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach($brand as $key => $thuonghieu)
                                    <li><a href="{{URL::to('/thuong-hieu-sp/'.$thuonghieu->brand_id)}}"> <span class="pull-right"></span>{{$thuonghieu->brand_name}}</a></li> 
                                    @endforeach                 
                                </ul>
                            </div>
                        </div><!--/brands_products-->                       
                        
                        <div class="shipping text-center"><!--shipping-->
                            <img src="https://www.thol.com.vn/pub/media/wysiwyg/banner/Whey-RSP-banner.jpg" alt="" />
                        </div><!--/shipping--><br>
                            
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    @yield('content')                                                                                           
                </div>
            </div>
        </div>

        {{-- custom layout --}}
        <div class="custom">
            @yield('content1')
        </div>

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
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/slider.js')}}"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="8Nbv5FZH"></script>

    {{-- zalo --}}
    <div class="zalo-chat-widget" data-oaid="4395814966648974259" data-welcome-message="Rất vui khi được hỗ trợ bạn!" data-autopopup="0" data-width="" data-height=""></div>

    <script src="https://sp.zalo.me/plugins/sdk.js"></script>

    {{-- Xem video --}}
    <script type="text/javascript">
        $(document).on('click','.watch-video',function(){
            var video_id = $(this).attr('id');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:'{{url('/Xem-video')}}',
                method:"POST",
                dataType:"JSON",
                data:{video_id:video_id,_token:_token},
                success:function(data){
                    $('#video_title').html(data.video_title);
                    $('#video_link').html(data.video_link);
                    $('#video_desc').html(data.video_desc);                  
                }
            });
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('.add-to-cart').click(function(){
                var id = $(this).data('id_sanpham');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                if(parseInt(cart_product_qty) > parseInt(cart_product_quantity)){
                    alert('Làm ơn đặt nhỏ hơn' + cart_product_quantity);
                }else{
                //sử dụng ajax
                $.ajax({
                    url: '{{url('/themgiohang-ajax')}}',
                    method: 'POST',
                    data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token, cart_product_quantity:cart_product_quantity},
                    success:function(){
                        swal({
                            title: "Đã thêm sản phẩm vào giỏ hàng",
                            text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                            showCancelButton: true,
                            cancelButtonText: "Xem tiếp",
                            confirmButtonClass: "btn-success",
                            confirmButtonText: "Đi đến giỏ hàng",
                            closeOnConfirm: false
                        },
                        function() {
                            window.location.href = "{{url('/giohang-ajax')}}";
                        });
                    }
                });
            }
            });
        });
    </script>

    {{-- chọn các trường thông tin vận chuyển --}}
    <script type="text/javascript">
        $(document).ready(function(){
            $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
            if(action == 'city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            // hàm ajax
            $.ajax({
                url: '{{url('/chon-vanchuyen-giohang')}}',
                method: 'POST',
                data: {action:action, ma_id:ma_id, _token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
            });
        });      
    </script>

    {{-- tính phí vận chuyển bằng ajax --}}
    <script type="text/javascript">
        $(document).ready(function(){
            $('.calculate_delivery').click(function(){
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if(matp == '' && maqh == '' && xaid == ''){
                    alert('Chọn địa chỉ để tính phí vận chuyển');
                }else{
                    $.ajax({
                    url: '{{url('/tinhtoanphi-giohang')}}',
                    method: 'POST',
                    data: {matp:matp, maqh:maqh, xaid:xaid, _token:_token},
                    success:function(){
                        location.reload();
                    }
                    });
                }
            });
        });
    </script>

    {{-- xác nhận thông tin đơn hàng --}}
    <script type="text/javascript">
        $(document).ready(function(){
            $('.send_order').click(function(){
                swal({
                    title: "Xác nhận đơn hàng?",
                    text: "Bạn không thể hoàn trả đơn hàng sau khi đặt, bạn có muốn đặt hàng!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Cảm ơn quý khách đã mua hàng!",
                    cancelButtonText: "Đóng, chưa mua hàng!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if(isConfirm){
                        var shipping_name = $('.shipping_name').val();
                        var shipping_email = $('.shipping_email').val();
                        var shipping_address = $('.shipping_address').val();
                        var shipping_phone = $('.shipping_phone').val();
                        var shipping_notes = $('.shipping_notes').val();
                        var shipping_method = $('.chonhinhthuc_thanhtoan').val();
                        var order_fee = $('.order_fee').val();
                        var order_coupon = $('.order_coupon').val();
                        var _token = $('input[name="_token"]').val();

                        //sử dụng ajax
                        $.ajax({
                            url: '{{url('/xacnhan-donhang')}}',
                            method: 'POST',
                            data:{shipping_name:shipping_name, shipping_email:shipping_email, shipping_address:shipping_address, shipping_phone:shipping_phone, shipping_notes:shipping_notes, order_fee:order_fee, order_coupon:order_coupon, _token:_token, shipping_method:shipping_method},
                            success:function(){
                                swal("Đơn hàng!", "Đơn hàng của bạn đặt thành công", "success");
                            }
                        });
                        window.setTimeout(function(){
                            location.reload();
                        }, 1000);
                    }else{
                        swal("Đóng", "Đơn hàng của bạn chưa được gửi, hãy hoàn tất đơn hàng", "error");
                    }
                });               
            });
        });
    </script>

</body>
</html>