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

    <!--Gioithieu-->
    <div class="Content">
        <h1>ĐỘI NGŨ HKT - GYM STORE</h1>
        <p>
            "Đội ngũ tập thể trẻ đầy năng động, nhiệt huyết, sáng tạo, kỹ luật và tinh thần tiên phong
            , đam mê công nghệ, các thành viên luôn đem hết tâm huyết tạo nên website kinh doanh tốt nhất".
        </p>
    </div>
    <!--HInhanh-->
    <div class="row">
        <div class="image">
            <div id="zoom-In">
                <figure>
                    <img src="{{('public/frontend/images/introgymshark.jpg')}}" alt="" />
                </figure>
            </div>
        </div>
        <style>
            .row {
                margin-left: 0px;
                margin-right: 0px;
            }

            .Content h1 {
                font-size: 40px;
                text-align: center;
                font-weight: bold;
                margin-top: -5px;
                margin-bottom: 15px;
                color: #000000;
                position: relative;
            }

            .Content p {
                text-align: center;
                font-size: 17px;
                width: 57%;
                margin-left: 22%;
            }

            .image {
                display: inline-block;
                text-align: center;
                width: 33%;
                width: 62%;
                margin-left: 20%;
            }

            figure {
                overflow: hidden;
                margin: 0 1px;
            }

            .image img {
                display: block;
                width: 98%;
                height: auto;
                cursor: pointer;
            }

            .image #zoom-In img {
                transform: scale(1);
                transition: 0.3s ease-in-out;
            }

            .image #zoom-In:hover img {
                transform: scale(1.3);
            }
        </style>
    </div>
    <!-- Thanh vien-->
    <hr class="logo-brand" style="margin-top: 25px; border: 0; border-top: 1px solid #ff0000;width: 50%;"/>
    <div class="my-team" style="text-align:center; margin-top:25px;">
        <h2>Thành Viên</h2>
    </div>
    <div class="container-team">
        <div class="box">
            <div class="imgBox">
                <img src="{{('public/frontend/images/team2.jpg')}}" style="width: 83%;border-radius: 15px; margin-left: 8%;" />
            </div>
            <div class="details">
                <div class="content">
                    <h2 style="text-align: center;">Nguyễn Hoàng Khải</h2>
                    <p style="text-align: center;width: 97%;padding-left: 10px;font-size: 17px;">
                        Là 1 nhóm trưởng với sở thích thiết kế, đam mê
                        công nghệ và yêu thích thể thao tập gym nên trong đồ án web này nhóm đã thiết kế 
                        1 website kinh doanh sản phẩm bổ sung và phụ kiện cho tập gym.
                    </p>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="imgBox">
                <img src="{{('public/frontend/images/team3.jpg')}}" style="width: 83%;border-radius: 15px; margin-left: 8%;" />
            </div>
            <div class="details">
                <div class="content">
                    <h2 style="text-align: center;">Đỗ Minh Trí</h2>
                    <p style="text-align: center;width: 97%;padding-left: 10px;font-size: 17px;">
                        Là một người vui vẻ, thích thể thao và cùng chung niềm đam mê công nghệ với bạn
                        Khải nên đã gia nhập team HKT để hỗ trợ bạn cùng làm 1 dự án web.
                    </p>
                </div>
            </div>
        </div>
        <div class="box">
            <div class="imgBox">
                <img src="{{('public/frontend/images/team1.jpg')}}" style="width: 83%;border-radius: 15px; margin-left: 8%;" />
            </div>
            <div class="details">
                <div class="content">
                    <h2 style="text-align: center;">Huỳnh Quốc Huy</h2>
                    <p style="text-align: center;width: 97%;padding-left: 10px;font-size: 17px;">
                        Gia nhập Team HKT khoảng 1 tháng. Và giữ vai trò 
                        Bussiness Analyst trong team. Vui vẻ, hòa đồng và 
                        hoạt động với tiêu chí phát triển bản thân và vui chơi lành mạnh.
                    </p>
                </div>
            </div>
        </div>
        <h3 style="margin-top: 4%;"><span style="color:#66b3ff;"><span style="font-size:16px;font-weight: bold;"><span style="font-family:Tahoma,Geneva,sans-serif;">I. TIÊU CHÍ BÁN HÀNG CỐT LÕI CỦA HKT - GYM STORE</span></span></span></h3>
        <br>
        <p><span style="color:#000000;"><span style="font-size:17px;"><span style="Helvetica Neue",Helvetica,Arial,sans-serif>- Hàng Chính Hãng:&nbsp;HKT - GYM STORE hiện đang là hiện đang là cửa hàng và là nhà phân phối thực phẩm bổ sung chính hãng được sự ủy quyền của nhà máy tại Hoa Kỳ như BOCCI, MUSCLEUP, PROFIT,&nbsp;BBT... có đầy đủ tem chống hàng giả, tem cào theo quy định của nhà phân phối.</span></span></span></p>
        <br>
        <p><span style="color:#000000;"><span style="font-size:17px;"><span style="Helvetica Neue",Helvetica,Arial,sans-serif>- Đa Dạng Hóa Sản Phẩm:&nbsp;Do sự phát triển của thị trường và nhu cầu ngày càng gia tăng của khách hàng, HKT - GYM STORE luôn cập nhật và tìm nhiều nguồn hàng nhằm đa dạng hóa sản phẩm, nhằm cung cấp đa dạng nhu cầu của khách hàng. Là đơn vị đi tiên phong trong thị trường Thực Phẩm Bổ Sung, HKT - GYM STORE luôn cố gắng mang đến cho khách hàng những sản phẩm tốt nhất. Để góp phần thực hiện triết lý kinh doanh của HKT - GYM STORE - Nâng Tầm Sức Vóc Con Người Việt.&nbsp;</span></span></span></p>
        <p><img alt="tieu-chi-ban-hang-cot-loi-gymstore" data-thumb="original" original-height="4000" original-width="4000" src="//bizweb.dktcdn.net/100/011/344/files/z2819516771887-3405d7da9e3b8c1f23c4aacfa70dc3b4-07e4f88b-89f3-470f-903d-f5c4c3983d89.jpg?v=1633419545948" style="width: 805px;margin-left: 21%;"></p>
        <br>
        <p><span style="color:#000000;"><span style="font-size:17px;"><span style="Helvetica Neue",Helvetica,Arial,sans-serif>- Giá&nbsp;Tốt Nhất: Đóng vai trò là đại lý&nbsp;cấp 1, HKT - GYM STORE cam kết&nbsp;cung cấp giá tốt nhất tới quý khách hàng. Cam kết chính sách hậu mãi với khách hàng thân thuộc, thường xuyên tổ chức chương trình tri ân khách hàng thân thuộc.</span></span></span></p>
        <h2><span style="color:#66b3ff;"><span style="font-size:17px;font-weight: bold;"><span style="font-family:Tahoma,Geneva,sans-serif;">II. HKT - GYM STORE HỢP TÁC VỚI NHỮNG THƯƠNG HIỆU THỰC PHẨM BỔ SUNG UY TÍN HÀNG ĐẦU THẾ GIỚI&nbsp;</span></span></span></h2>
        <P><span style="color:#000000;"><span style="font-size:17px;"><span style="Helvetica Neue",Helvetica,Arial,sans-serif>- Hiện chúng tôi cung cấp tới trên 30 sản phẩm của các thương hiệu nổi tiếng nhất thế giới, và trên 10 thương hiệu phân phối chính hãng tại Việt Nam như Optimum nutrition, BSN Sport, Muscletech, AST Sport, Bodybuilding.com, Universal nutrition, Musclepharm. Dymatize, Cellucor, Gaspari Nutrition, BPI Sport, Labrada, Met-RX Nutrition, Now Supplement, RSP, EVL, Poliquin Performance...</span></span></span></P>
        <hr class="logo-brand" style="margin-top: 25px; border: 0; border-top: 1px solid #ff0000;width: 80%;"/>
        </div>
        <style>
            .container-team {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                width: 1153px;
                margin: 28px 20.2% 484px;
                margin-bottom: 0%;
            }

            .container-team .box {
                position: relative;
                background: #f0f5f5;
                box-sizing: border-box;
                display: inline-block;
                width: 364px;
                height: 495px;
                margin: 10px;
                border-radius: 10px;
            }

            .container-team .box .imgBox {
                position: relative;
                overflow: hidden;
            }

            .container .box .imgBox img{
                max-width: 100%;
                transition: transform 1s;
                border-radius: 10px;
            }
            .container .box:hover .imgBox img{
                transform: scale(1.1);
            }
            .container .box .details{
                position: absolute;
                top: 16px;
                left: 10px;
                bottom: -196px;
                right: 10px;
                background: rgba(0,0,0,.8);
                transform: scaleY(0);
                transition: transform .4s;
            }
            .container .box:hover .details{
                transform: scaleY(1);
            }
            .container .box .details .content
            {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                text-align: center;
                padding: 15px;
                color: #fff;
            }
            .container .box .details .content h2{
                margin: 0;
                padding: 0;
                font-size: 20px;
                color: #ff0;
            }
            .container .box .details .content p{
                margin: 10px 0 -5px;
                padding: 0;
            }
        </style>
    
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

    {{-- scrollup --}}
    <a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647;"><i class="fa fa-angle-up"></i></a>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
</body>
</html>