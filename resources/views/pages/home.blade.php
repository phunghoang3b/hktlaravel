@extends('layout')
@section('content')
<!-- Popup start -->
    <div class="login-popup">
        <div class="box">
            <div class="img-area">
                <div class="img"></div>
            </div>
            <div class="form">
                <div class="close">&times;</div>
                <div class="content">
                    <div>
                        <h3>CHUNG TAY PHÒNG CHỐNG</h3><br>
                        <h2>
                            DỊCH COVID-19<br>
                            ------------------
                        </h2>
                        <p>
                            HKT - Gym Store chuyển sang hoạt động bán hàng trực tuyến
                            từ ngày 20/12.<br>
                            Hotline hỗ trợ: 0374 412 199
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .login-popup{
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 1099;
            background-color:rgba(0,0,0,0.6);
            visibility: hidden;
            opacity: 0;
            transition: all 1s ease;
        }
        .login-popup.show{
            visibility:visible;
            opacity: 1;
        }
        .login-popup .box{
            background-color:#ffffff;
            width: 620px;
            height: 330px;
            position: absolute;
            left: 50%;
            top:50%;
            transform:translate(-50%,-50%);
            display: flex;
            flex-wrap: wrap;
            opacity: 0;
            margin-left: 50px;
            transition: all 1s ease;
            border-radius: 15px;
        }
        .login-popup.show .box{
            opacity: 1;
            margin-left: 0;
        }
        .login-popup .box .img-area{
            flex:0 0 50%;
            max-width: 50%;
            position: relative;
            overflow: hidden;
            padding:30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-popup .box .img-area h1{
            font-size: 30px;
        }
        .login-popup .box .img-area .img {
            position: absolute;
            left: 0;
            top: 0;
            width: 146%;
            height: 90.6%;
            background-image: url(public/img/gymcovid.jpg);
            background-size: cover;
            background-position: center;
            animation: zoomInOut 7s linear infinite;
            z-index: -1;
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
        }
        .login-popup .box .form{
            flex:0 0 50%;
            max-width: 50%;
            padding:40px 46px;
        }
        .login-popup .box .form .close{
            position: absolute;
            right: 10px;
            top:0px;
            font-size: 30px;
            cursor: pointer;
        }
        .box .content h3{
            color: #333;
            line-height: 1em;
            font-weight: bold;
            font-size: 24px;
            text-align: center;
        }
        .box .content h2{
            font-size: 30px;
            color: #ff4d54;
            font-weight: bold;
        }
        .box .content p{
            text-align: center;
        }
    </style>
<!-- Popup end -->
<div class="features_items"><!--features_items-->
    <h2 class="title text-center">Sản Phẩm Mới Nhất</h2>
    @foreach($allproduct as $key => $sanpham)                     
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
</div><!--features_items--> 
<!-- Modal -->
<div class="modal fade" id="xemnhanh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title product_quickview_title" id="">
            <span id="product_quickview_title"></span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <style type="text/css">
            @media screen and (min-width: 768px){
                .modal-dialog{
                    width: 700px;
                }
                .modal-sm{
                    width: 350px;
                }
            }
            @media screen and (min-width: 992px){
                .modal-lg{
                    width: 1200px;
                }
            }
        </style>
        <div class="row">
            <div class="col-md-5">
                <span id="product_quickview_image"></span>
                {{-- <span id="product_quickview_gallery"></span> --}}
            </div>
            <form>
                @csrf
                <div id="product_quickview_value"></div>
                <div class="col-md-7">
                    <h2><span id="product_quickview_title"></span></h2>
                    <p>Mã ID:<span id="product_quickview_id"></span></p>
                    <p style="font-size: 20px; color: brown; font-weight: bold;">Giá sản phẩm: <span id="product_quickview_price"></span></p>
                    <label>Số lượng:</label>
                    <input name="so_luong" type="number" min="1" value="1" class="cart_product_qty_" /><hr>
                    <h4 style="font-size: 20px; color: brown; font-weight: bold;">Mô tả sản phẩm</h4>
                    <span id="product_quickview_desc"></span>
                    {{-- <p><span id="product_quickview_content"></span></p> --}}
                    <div id="product_quickview_button"></div>               
                    <div id="beforesend_quickview"></div>
                </div>
            </form>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
        <button type="button" class="btn btn-default redirect-cart">Đi tới giỏ hàng</button>
      </div>
    </div>
  </div>
</div>              
@endsection
@section('content1')
    <!-- San pham moi ve -->
        <div class="row">
            <div class="bestselling__heading-wrap">
                <img class="bestselling__heading-img" src="{{('public/frontend/images/newilove.jpg')}}" alt="" style="width: 40px;height: 40px;margin-right: 10px;">
                <div class="bestselling__heading">Sản phẩm mới tháng 11</div>
            </div>
        </div>
        <div class="clearilove"></div>
        <style>
            .clearilove {
                margin-top: 20px;
            }
        </style>
        <div class="row">
            <div class="col-md-6 bestselling__banner-left">
                <img class="bestselling__banner-left-img" src="{{('public/frontend/images/newproduct1.jpg')}}" alt="">
            </div>
            <div class="col-md-6 bestselling__banner-right">
                <img class="bestselling__banner-right-img" src="{{('public/frontend/images/newproduct2.jpg')}}" alt="">
            </div>
            <style type="text/css">
                .col-md-6.bestselling__banner-left {
                    padding-bottom: 30 px;
                }
                img.bestselling__banner-left-img {
                    width: 59%;
                    left: 41%;
                    position: relative;
                    border-top-left-radius: 10px;
                    border-bottom-left-radius: 10px;
                }
                img {
                    vertical-align: inherit;
                    border-style: none;
                }
                img.bestselling__banner-right-img {
                    width: 59%;
                    position: relative;
                    border-top-right-radius: 10px;
                    border-bottom-right-radius: 10px;
                }
                .bestselling__heading-wrap {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    width: 100%;
                    padding-top: 20px;
                }
                .bestselling__heading {
                    color: #66b3ff;
                    font-size: 24px;
                    font-weight: 500;
                    font-family: 'Roboto', sans-serif;
                    text-transform: uppercase;
                }
            </style>
        </div>

        <!-- Video Slider start -->
        <hr class="logo-brand" />
        <div class="tieu-de">
            <h2>Xem Ngay !</h2>
            <p>Hẫy xem và chọn cho mình một sản phẩm phù hợp với nhu cầu :3</p>
            <style>
                .tieu-de h2{
                    color: #66b3ff;
                    font-size: 25px;
                    font-weight: 500;
                    font-family: 'Roboto', sans-serif;
                    text-transform: uppercase;
                    text-align: center;
                }
                .tieu-de p{
                    text-align: center;
                    font-size: 18px;
                }
            </style>
        </div>
        <div class="slider-video">
            <div class="slide1 active">
                <iframe src="https://www.youtube.com/embed/27qfOLy3ETg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="slide1">
                <iframe src="https://www.youtube.com/embed/vBF2sndWtHo" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="slide1">
                <iframe src="https://www.youtube.com/embed/Ymg_Kop2j6o" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="slide1">
                <iframe src="https://www.youtube.com/embed/KIscOF9Mc3c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="slide1">
                <iframe src="https://www.youtube.com/embed/F7PfsSqjKe8" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
            <div class="navigation">
                <i class="fa fa-angle-left prev-btn"></i>
                <i class="fa fa-angle-right next-btn"></i>
            </div>
            <div class="navigation-visibility">
                <div class="slide-icon active"></div>
                <div class="slide-icon"></div>
                <div class="slide-icon"></div>
                <div class="slide-icon"></div>
                <div class="slide-icon"></div>
            </div>
        </div>
        <style>
            .slider-video {
                position: relative;
                background: #000116;
                width: 1142px;
                min-height: 580px;
                margin-left: 20%;
                overflow: hidden;
                border-radius: 10px;
            }
            .slider-video .slide1{
              position: absolute;
              width: 100%;
              height: 100%;
              clip-path: circle(0% at 0 50%);
            }
            .slider-video .slide1.active{
              clip-path: circle(150% at 0 50%);
              transition: 2s;
            }
            .slider-video .slide1 iframe{
              position: absolute;
              width: 100%;
              height: 100%;
              object-fit: cover;
            }
            .navigation{
              height: 570px;
              display: flex;
              align-items: center;
              justify-content: space-between;
              opacity: 0;
              transition: opacity 0.5s ease;
            }
            .slider-video:hover .navigation{
              opacity: 1;
            }
            .prev-btn, .next-btn{
              z-index: 999;
              font-size: 2em;
              color: #66ccff;
              background: rgba(255, 255, 255, 0.8);
              padding: 10px;
              cursor: pointer;
            }
            .prev-btn{
              border-top-right-radius: 3px;
              border-bottom-right-radius: 3px;
            }
            .next-btn{
              border-top-left-radius: 3px;
              border-bottom-left-radius: 3px;
            }
            .navigation-visibility{
              z-index: 999;
              display: flex;
              justify-content: center;
            }
            .navigation-visibility .slide-icon{
              z-index: 999;
              background: rgba(255, 255, 255, 0.5);
              width: 20px;
              height: 10px;
              transform: translateY(-50px);
              margin: 0 6px;
              border-radius: 2px;
              box-shadow: 0 5px 25px rgb(1 1 1 / 20%);
            }
            .navigation-visibility .slide-icon.active{
              background: #4285F4;
            }
        </style>
        <script type="text/javascript">
            const slider = document.querySelector(".slider-video");
            const nextBtn = document.querySelector(".next-btn");
            const prevBtn = document.querySelector(".prev-btn");
            const slides = document.querySelectorAll(".slide1");
            const slideIcons = document.querySelectorAll(".slide-icon");
            const numberOfSlides = slides.length;
            var slideNumber = 0;

            //image slider next button
            nextBtn.addEventListener("click", () => {
                slides.forEach((slide) => {
                    slide.classList.remove("active");
                });
                slideIcons.forEach((slideIcon) => {
                    slideIcon.classList.remove("active");
                });

                slideNumber++;

                if (slideNumber > (numberOfSlides - 1)) {
                    slideNumber = 0;
                }

                slides[slideNumber].classList.add("active");
                slideIcons[slideNumber].classList.add("active");
            });

            //image slider previous button
            prevBtn.addEventListener("click", () => {
                slides.forEach((slide) => {
                    slide.classList.remove("active");
                });
                slideIcons.forEach((slideIcon) => {
                    slideIcon.classList.remove("active");
                });

                slideNumber--;

                if (slideNumber < 0) {
                    slideNumber = numberOfSlides - 1;
                }

                slides[slideNumber].classList.add("active");
                slideIcons[slideNumber].classList.add("active");
            });

            //image slider autoplay
            var playSlider;

            var repeater = () => {
                playSlider = setInterval(function () {
                    slides.forEach((slide) => {
                        slide.classList.remove("active");
                    });
                    slideIcons.forEach((slideIcon) => {
                        slideIcon.classList.remove("active");
                    });

                    slideNumber++;

                    if (slideNumber > (numberOfSlides - 1)) {
                        slideNumber = 0;
                    }

                    slides[slideNumber].classList.add("active");
                    slideIcons[slideNumber].classList.add("active");
                }, 4000);
            }
            repeater();

            //stop the image slider autoplay on mouseover
            slider.addEventListener("mouseover", () => {
                clearInterval(playSlider);
            });

            //start the image slider autoplay again on mouseout
            slider.addEventListener("mouseout", () => {
                repeater();
            });
        </script>
        <!-- Video Slider end -->
        <br><br>
        <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">PHỤ KIỆN</h2>            
            <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel" style="width: 50%;margin-left: 25%;">
                <div class="carousel-inner">
                    <div class="item active">   
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{('public/frontend/images/SP1.png')}}" alt="" />
                                        <h2>449,000 đ</h2>
                                        <p>Găng tay tập Gym nam Gofit men's xtrainer</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{('public/frontend/images/SP2.jpg')}}" alt="" />
                                        <h2>500,000 đ</h2>
                                        <p>HARBINGER WOMEN'S FLEXFIT</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{('public/frontend/images/SP3.jpg')}}" alt="" />
                                        <h2>600,000 đ</h2>
                                        <p>HARBINGER 5" FOAM CORE BELT</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">  
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{('public/frontend/images/SP4.jpg')}}" alt="" />
                                        <h2>700,000 đ</h2>
                                        <p>HARBINGER 4" PADDED LEATHER BELT</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{('public/frontend/images/SP5.jpg')}}" alt="" />
                                        <h2>80,000 đ</h2>
                                        <p>Dây nhảy THOL J001 cardio đốt mỡ nhanh</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="{{('public/frontend/images/SP6.jpg')}}" alt="" />
                                        <h2>100,000 đ</h2>
                                        <p>Tạ dumbbell THOL</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Thêm giỏ hàng</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
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

        <!-- image beautiful start -->
        <div class="banner-ads">
            <img src="{{('public/frontend/images/banner21.png')}}" />
        </div>
        <div class="clear" style="margin-bottom: 32.7%;"></div>
        <div class="row-image">
            <img src="{{('public/frontend/images/img1.jpg')}}" style="margin-left: 20%;border-bottom-left-radius: 10px;" />
            <img src="{{('public/frontend/images/img2.jpg')}}" />
            <img src="{{('public/frontend/images/img3.jpg')}}" style="border-bottom-right-radius: 10px;" />
        </div>
        <style>
            .banner-ads img {
                width: 60%;
                height: 11%;
                position: absolute;
                margin-left: 20%;
                border-top-left-radius: 10px;
                border-top-right-radius: 10px;
            }

            .row-image img {
                width: 19.9%;
                justify-content: space-evenly;
                transition: 0.6s ease-in-out;
            }

            .row-image img:hover {
                transform: scale(1.1);
            }

            .clear {
                margin-bottom: 29%;
            }
        </style>
        <!-- image beautiful end -->

        <!-- SECTION BRAND-LOGO START-->
        <br><br>
        <h2 class="title text-center">THƯƠNG HIỆU</h2>  
        <div class="brand-layout container">
            <div class="glide" id="glide1">
                <div class="glide__track" data-glide-el="track">
                    <ul class="glide__slides">
                        <li class="glide__slide">
                            <img src="{{('public/frontend/images/brand_1_image.png')}}" />
                        </li>
                        <li class="glide__slide">
                            <img src="{{('public/frontend/images/brand_2_image.png')}}" />
                        </li>
                        <li class="glide__slide">
                            <img src="{{('public/frontend/images/brand_3_image.png')}}" />
                        </li>
                        <li class="glide__slide">
                            <img src="{{('public/frontend/images/brand_4_image.png')}}" />
                        </li>
                        <li class="glide__slide">
                            <img src="{{('public/frontend/images/brand_5_image.png')}}" />
                        </li>
                        <li class="glide__slide">
                            <img src="{{('public/frontend/images/brand_6_image.png')}}" />
                        </li>
                        <li class="glide__slide">
                            <img src="{{('public/frontend/images/brand_7_image.png')}}" />
                        </li>
                        <li class="glide__slide">
                            <img src="{{('public/frontend/images/brand_8_image.png')}}" />
                        </li>
                        <li class="glide__slide">
                            <img src="{{('public/frontend/images/brand_9_image.png')}}" />
                        </li>
                        <li class="glide__slide">
                            <img src="{{('public/frontend/images/brand_10_image.png')}}" />
                        </li>
                        <li class="glide__slide">
                            <img src="{{('public/frontend/images/brand_11_image.png')}}" />
                        </li>
                        <li class="glide__slide">
                            <img src="{{('public/frontend/images/brand_12_image.png')}}" />
                        </li>
                        <li class="glide__slide">
                            <img src="{{('public/frontend/images/brand_13_image.png')}}" />
                        </li>
                        <li class="glide__slide">
                            <img src="{{('public/frontend/images/brand_14_image.png')}}" />
                        </li>
                        <li class="glide__slide">
                            <img src="{{('public/frontend/images/brand_15_image.png')}}" />
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- logo BRAND end -->

        <!-- BLOG START-->
        <br><br>
        <h2 class="title text-center">TIN TỨC</h2>
        <div class="container-blog">
            <div class="card">
                <div class="imgBx">
                    <img src="{{('public/frontend/images/tintuc1.jpg')}}" />
                </div>
                <div class="content">
                    <h3>NHỮNG ĐIỀU BẠN CẦN BIẾT VỀ EAA?</h3>
                    <p>
                        EAA bao gồm 9 loại Amino Axit Thiết Yếu. Axit amin là các 
                        hợp chất hữu cơ bao gồm nitơ, cacbon, hydro và oxy, cùng 
                        với một nhóm chuỗi bên thay đổi.
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="imgBx">
                    <img src="{{('public/frontend/images/tintuc2.jpg')}}" />
                </div>
                <div class="content">
                    <h3>WHEY PROTEIN LÀ GÌ ?</h3>
                    <p>
                        Nếu bạn là một người tập luyện chăm chỉ và thường xuyên ở 
                        bất kì bộ môn nào, chắc hẳn bạn đã rất quen thuộc với cụm 
                        từ Whey Protein hoặc là sữa tăng cơ.
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="imgBx">
                    <img src="{{('public/frontend/images/tintuc3.jpg')}}" />
                </div>
                <div class="content">
                    <h3>33 THỰC PHẨM GIÀU PROTEIN</h3>
                    <p>
                        Chắc chắn rằng những ai đã từng trải qua hoặc áp dụng chế độ 
                        ăn kiêng dựa trên thực vật đều sẽ gặp một vấn đề đó chính là: 
                        Tôi không thể làm cách nào để có thể tìm được những nguồn.
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="imgBx">
                    <img src="{{('public/frontend/images/tintuc4.jpg')}}" />
                </div>
                <div class="content">
                    <h3>KETO LÀ GÌ? THỰC ĐƠN KETO DIET</h3>
                    <p>
                        Chế độ ketogenic (hay gọi tắt là chế độ ăn keto) là một chế độ ăn 
                        ít carb, nhiều chất béo mang lại nhiều lợi ích cho sức khỏe. 
                        Trên thực tế, nhiều nghiên cứu chỉ ra rằng..
                    </p>
                </div>
            </div>
        </div>
        <style>
            .container-blog {
                position: relative;
                width: 1120px;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
                padding: 30px;
                margin-left: 21%;
                margin-top: -10px;
                margin-bottom: -2%;
            }

            .container-blog .card {
                position: relative;
                max-width: 245px;
                height: 215px;
                background:  #cce6ff;
                margin: 30px 10px;
                padding: 20px 15px;
                display: flex;
                flex-direction: column;
                transition: 0.3s ease-in-out
            }

            .container-blog .card:hover {
                height: 420px;
            }

            .container-blog .card .imgBx {
                position: relative;
                width: 220px;
                height: 260px;
                top: -60px;
                z-index: 1;
                text-align: center;
            }

            .container-blog .card .imgBx img {
                max-width: 102%;
                border-radius: 4px;
                height: 120%;
            }

            .container-blog .card .content {
                position: relative;
                margin-top: -140px;
                padding: 10px 15px;
                text-align: center;
                color: #111;
                visibility: hidden;
                opacity: 0;
                transition: 0.3s ease-in-out;
            }

            .container-blog .card:hover .content {
                visibility: visible;
                opacity: 1;
                margin-top: -40px;
                transition-delay: 0.3s;
            }
        </style>
        <!-- Blog end-->
    </section>

@endsection