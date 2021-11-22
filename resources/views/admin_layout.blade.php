<!DOCTYPE html>
<head>
<title>Trang Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
<meta name="csrf-token" content="{{csrf_token()}}">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
<link rel="stylesheet" href="{{asset('public/backend/css/morris.css')}}" type="text/css"/>
<!-- calendar -->
<link rel="stylesheet" href="{{asset('public/backend/css/monthly.css')}}">
<!-- //calendar -->
<!-- //font-awesome icons -->
<script src="{{asset('public/backend/js/jquery2.0.3.min.js')}}"></script>
<script src="{{asset('public/backend/js/raphael-min.js')}}"></script>
<script src="{{asset('public/backend/js/morris.js')}}"></script>
</head>
<body>
<section id="container">
<!--header start-->
<header class="header fixed-top clearfix">
<!--logo start-->
<div class="brand">
    <a href="{{URL::to('/Trangadmin')}}" class="logo">
        Admin Gym
    </a>
    <div class="sidebar-toggle-box">
        <div class="fa fa-bars"></div>
    </div>
</div>
<!--logo end-->

<div class="top-nav clearfix">
    <!--search & user info start-->
    <ul class="nav pull-right top-menu">
        <li>
            <input type="text" class="form-control search" placeholder=" Search">
        </li>
        <!-- user login dropdown start-->
        <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                <img alt="" src="{{('public/backend/images/background1.jpg')}}">
               	<?php
                    $name =  Auth::user()->admin_name;
                    if($name){
                        echo $name;
                    }
                    ?>
                <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
                <li><a href="#"><i class=" fa fa-suitcase"></i>Hồ Sơ</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> Cài Đặt</a></li>
                <li><a href="{{URL::to('/dangxuat-admin')}}"><i class="fa fa-key"></i> Đăng Xuất</a></li>
            </ul>
        </li>
        <!-- user login dropdown end -->
       
    </ul>
    <!--search & user info end-->
</div>
</header>
<!--header end-->
<!--sidebar start-->
<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="{{URL::to('/Trangadmin')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Trang chủ</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Slide Banner</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/thembanner')}}">Thêm slide banner</a></li>
                        <li><a href="{{URL::to('/danhsachbanner')}}">Danh sách slide banner</a></li>
                    </ul>
                </li> 

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh Mục Bài Viết</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/them-danhmuc-baiviet')}}">Thêm danh mục bài viết</a></li>
                        <li><a href="{{URL::to('/danhsach-DM-baiviet')}}">Danh sách DM bài viết</a></li>
                    </ul>
                </li> 

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Bài Viết</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/them-baiviet')}}">Thêm bài viết</a></li>
                        <li><a href="{{URL::to('/danhsach-baiviet')}}">Danh sách bài viết</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quản lý Video</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/them-video')}}">Thêm video</a></li>
                    </ul>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh Mục Sản Phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/themdanhmucsanpham')}}">Thêm danh mục sản phẩm</a></li>
						<li><a href="{{URL::to('/danhsachdanhmucsanpham')}}">Danh sách danh mục sản phẩm</a></li>
                    </ul>
                </li> 

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Thương Hiệu Sản Phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/themthuonghieu')}}">Thêm thương hiệu sản phẩm</a></li>
						<li><a href="{{URL::to('/danhsachthuonghieu')}}">Danh sách thương hiệu sản phẩm</a></li>
                    </ul>
                </li> 

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Sản Phẩm</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/themsanpham')}}">Thêm sản phẩm</a></li>
						<li><a href="{{URL::to('/danhsachsanpham')}}">Danh sách sản phẩm</a></li>
                    </ul>
                </li> 

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Mã Giảm Giá</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/them-magiamgia')}}">Thêm Mã Giảm Giá</a></li>
						<li><a href="{{URL::to('/danhsachmagiamgia')}}">Danh sách mã giảm giá</a></li>
                    </ul>
                </li> 

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Vận Chuyển</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/van-chuyen')}}">Quản Lý Vận Chuyển</a></li>
                    </ul>
                </li> 

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Đơn Hàng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/quanly-donhang')}}">Danh sách đơn hàng</a></li>
                    </ul>
                </li>  

                @chuyenquyen
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quyền</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/huy-chuyenquyen')}}">Dừng chuyển quyền</a></li>
                    </ul>
                </li> 
                @endchuyenquyen 

                @hasrole(['admin','manager'])
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Tài Khoản</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/them-taikhoan')}}">Thêm tài khoản</a></li>
                        <li><a href="{{URL::to('/users')}}">Danh sách tài khoản</a></li>
                    </ul>
                </li> 
                @endhasrole           
            </ul>            
        </div>
        <!-- sidebar menu end-->
    </div>
</aside>
<!--sidebar end-->
<!--main content start-->
<section id="main-content">
	<section class="wrapper">
    @yield('admin_content')		
</setion>
</section>
<!--main content end-->
</section>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('public/backend/ckeditor/ckeditor.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.form-validator.min.js')}}"></script>

{{-- quản lý video --}}
<script type="text/javascript">
    $(document).ready(function(){
        load_video();
        function load_video(){
            $.ajax({
                url:"{{url('/chon-video')}}",
                method:"POST",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success:function(data){
                    $('#video_load').html(data);
                }
            });
        }

        // nhấn nút thêm video
        $(document).on('click','.btn-add-video', function(){
            var video_title = $('.ten_video').val();
            var video_slug = $('.slug_video').val();
            var video_link = $('.link_video').val();
            var video_desc = $('.mota_video').val();
            var form_data = new FormData();
            form_data.append("file",document.getElementById("file_img_video").files[0]);
            form_data.append("video_title",video_title);
            form_data.append("video_slug",video_slug);
            form_data.append("video_link",video_link);
            form_data.append("video_desc",video_desc);
            $.ajax({
                url:"{{url('/insert-video')}}",
                method:"POST",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:form_data,
                contentType:false,
                cache:false,
                processData:false,
                success:function(data){
                    load_video();
                    $('#notify').html('<span class="text text-success">Thêm video thành công</span>');
                }
            });
        });

        // cập nhật video
        $(document).on('blur','.video_edit',function(){
            var video_type = $(this).data('video_type');
            var video_id = $(this).data('video_id');
            if(video_type == 'video_title'){
                var video_edit = $('#'+video_type+'_'+video_id).text();
                var video_check = video_type;
            }else if(video_type == 'video_slug'){
                var video_edit = $('#'+video_type+'_'+video_id).text();
                var video_check = video_type;
            }else if(video_type == 'video_link'){
                var video_edit = $('#'+video_type+'_'+video_id).text();
                var video_check = video_type;
            }else{
                var video_edit = $('#'+video_type+'_'+video_id).text();
                var video_check = video_type;
            }
            $.ajax({
                url:"{{url('/capnhat-video')}}",
                method:"POST",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{video_edit:video_edit, video_id:video_id, video_check:video_check},
                success:function(data){
                    load_video();
                    $('#notify').html('<span class="text text-success">Cập nhật video thành công</span>');
                }
            });
        });

        // xóa video
        $(document).on('click','.btn-delete-video', function(){
            var video_id = $(this).data('video_id');
            if(confirm('Bạn có chắc muốn xóa video?')){
                $.ajax({
                    url:"{{url('/xoa-video')}}",
                    method:"POST",
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{video_id:video_id},
                    success:function(data){
                        load_video();
                        $('#notify').html('<span class="text text-success">Xóa video thành công</span>');
                    }
                });
            }
        });
    });
</script>

{{-- thư viện gallery --}}
<script type="text/javascript">
    {{-- load hình ảnh gallery --}}
    $(document).ready(function(){
        load_gallery();
        function load_gallery(){
            var pro_id = $('.pro_id').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{url('/chon-gallery')}}",
                method:"POST",
                data:{pro_id:pro_id, _token:_token},
                success:function(data){
                    $('#gallery_load').html(data);
                }
            });
        }

        // chọn hình ảnh trong file 
        $('#file').change(function(){
            var error = '';
            var files = $('#file')[0].files;
            if(files.length > 5){
                error+='<p>Bạn chọn tối đa chỉ được 5 ảnh</p>';
            }else if(files.length == ''){
                error+='<p>Bạn không được bỏ trống trường này</p>';
            }else if(files.size > 2000000){
                error+='<p>File ảnh không được lớn hơn 2MB</p>';
            }
            if(error == ''){

            }else{
                $('#file').val('');
                $('#error_gallery').html('<span class="text-danger">'+error+'</span>');
                return false;
            }
        });

        // chỉnh sửa tên
        $(document).on('blur','.edit_gal_name',function(){
            var gal_id = $(this).data('gal_id');
            var gal_text = $(this).text();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:"{{url('/capnhat-gallery-name')}}",
                method:"POST",
                data:{gal_id:gal_id, _token:_token, gal_text:gal_text},
                success:function(data){
                    load_gallery();
                    $('#error_gallery').html('<span class="text-danger">Cập nhật tên hình ảnh thành công</span>');
                }
            });
        });

        // xóa hình ảnh
        $(document).on('click','.delete-gallery',function(){
            var gal_id = $(this).data('gal_id');
            var _token = $('input[name="_token"]').val();
            if(confirm('Bạn có chắc muốn xóa gallery?')){
                $.ajax({
                    url:"{{url('/xoa-gallery')}}",
                    method:"POST",
                    data:{gal_id:gal_id, _token:_token},
                    success:function(data){
                        load_gallery();
                        $('#error_gallery').html('<span class="text-danger">Xóa gallery thành công</span>');
                    }
                });
            }
        });

        // cập nhật cột hình ảnh trong gallery
        $(document).on('change','.file_image',function(){
            var gal_id = $(this).data('gal_id');
            var image = document.getElementById('file-'+gal_id).files[0];
            var form_data = new FormData();
            form_data.append("file",document.getElementById('file-'+gal_id).files[0]);
            form_data.append("gal_id",gal_id);
            $.ajax({
                url:"{{url('/capnhat-image-gallery')}}",
                method:"POST",
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:form_data,
                contentType:false,
                cache:false,
                processData:false,
                success:function(data){
                    load_gallery();
                    $('#error_gallery').html('<span class="text-danger">Cập nhật hình ảnh thành công</span>');
                }
            });
        });
    });
</script>

{{-- ajax nút cập nhật số lượng trong ctdh --}}
<script type="text/javascript">
    $('.update_quantity_order').click(function(){
        var order_product_id = $(this).data('product_id');
        var sl_donhang = $('.sl_donhang_' + order_product_id).val();
        var order_code = $('.order_code').val();
        var _token = $('input[name="_token"]').val();
        $.ajax({
            url : '{{url('/capnhat-btn-sldh')}}',
            method: 'POST',
            data:{_token:_token, sl_donhang:sl_donhang, order_code:order_code, order_product_id:order_product_id},
            success:function(data){
               alert('Cập nhật số lượng thành công');
               location.reload();
            }
        });
    });
</script>

{{-- ajax số lượng tồn --}}
<script type="text/javascript">
    $('.order_detail').change(function(){
        var order_status = $(this).val();
        var order_id = $(this).children(":selected").attr("id");
        var _token = $('input[name="_token"]').val();

        //lấy ra số lượng
        quantity = [];
        $("input[name='product_sales_quantity']").each(function(){
            quantity.push($(this).val());
        });

        //lấy ra product id
        order_product_id = [];
        $("input[name='kiemtra_productid']").each(function(){
            order_product_id.push($(this).val());
        });
        j = 0;
        for(i = 0; i < order_product_id.length; i++){
            //số lượng khách đặt
            var sl_dh = $('.sl_donhang_' + order_product_id[i]).val();
            //sô lượng tồn kho
            var sl_tonkho = $('.sl_tonkho_' + order_product_id[i]).val();
            if(parseInt(sl_dh) > parseInt(sl_tonkho)){
                j = j + 1;
                if(j == 1){
                    alert('Số lượng bán trong kho không đủ');
                }
                $('.mau_soluong_' + order_product_id[i]).css('background','#e28743');
            }
        }
        if(j == 0){
            $.ajax({
            url : '{{url('/capnhat-sldh')}}',
            method: 'POST',
            data:{_token:_token, order_status:order_status, order_id:order_id, quantity:quantity, order_product_id:order_product_id},
            success:function(data){
               alert('Thay đổi tình trạng đơn hàng thành công');
               location.reload();
            }
            });
        }
    });
</script>

{{-- ajax van chuyen --}}
<script type="text/javascript">
    $(document).ready(function(){
        // lấy dữ liệu phí vận chuyển trong csdl ra bằng ajax
        take_delivery();
        function take_delivery(){
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url : '{{url('/chon-feeship')}}',
                method: 'POST',
                data:{_token:_token},
                success:function(data){
                   $('#load_delivery').html(data);
                }
            });
        }
        //chỉnh sửa tiền fee_ship
        $(document).on('blur','.fee_feeship_edit',function(){
            var feeship_id = $(this).data('feeship_id');
            var fee_value = $(this).text();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: '{{url('/capnhatgia-vanchuyen')}}',
                method: 'POST',
                data: {feeship_id:feeship_id, fee_value:fee_value, _token:_token},
                success:function(data){
                    take_delivery();
                }
            });
        });

        $('.add_delivery').click(function(){
            var city = $('.city').val();
            var province = $('.province').val();
            var wards = $('.wards').val();
            var fee_ship = $('.fee_ship').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url : '{{url('/them-vanchuyen')}}',
                method: 'POST',
                data:{city:city, province:province, _token:_token, wards:wards, fee_ship:fee_ship},
                success:function(data){
                   take_delivery();
                }
            });
        });

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
                url: '{{url('/chon-vanchuyen')}}',
                method: 'POST',
                data: {action:action, ma_id:ma_id, _token:_token},
                success:function(data){
                    $('#'+result).html(data);
                }
            });
        });
    })
</script>

<script type="text/javascript">
	$.validate({

	});
</script>
<script type="text/javascript">
	CKEDITOR.replace('ckeditor');
	CKEDITOR.replace('ckeditor1');
</script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
<!-- morris JavaScript -->	
<script>
	$(document).ready(function() {
		//BOX BUTTON SHOW AND CLOSE
	   jQuery('.small-graph-box').hover(function() {
		  jQuery(this).find('.box-button').fadeIn('fast');
	   }, function() {
		  jQuery(this).find('.box-button').fadeOut('fast');
	   });
	   jQuery('.small-graph-box .box-close').click(function() {
		  jQuery(this).closest('.small-graph-box').fadeOut(200);
		  return false;
	   });
	   
	    //CHARTS
	    function gd(year, day, month) {
			return new Date(year, month - 1, day).getTime();
		}
		
		graphArea2 = Morris.Area({
			element: 'hero-area',
			padding: 10,
        behaveLikeLine: true,
        gridEnabled: false,
        gridLineColor: '#dddddd',
        axes: true,
        resize: true,
        smooth:true,
        pointSize: 0,
        lineWidth: 0,
        fillOpacity:0.85,
			data: [
				{period: '2015 Q1', iphone: 2668, ipad: null, itouch: 2649},
				{period: '2015 Q2', iphone: 15780, ipad: 13799, itouch: 12051},
				{period: '2015 Q3', iphone: 12920, ipad: 10975, itouch: 9910},
				{period: '2015 Q4', iphone: 8770, ipad: 6600, itouch: 6695},
				{period: '2016 Q1', iphone: 10820, ipad: 10924, itouch: 12300},
				{period: '2016 Q2', iphone: 9680, ipad: 9010, itouch: 7891},
				{period: '2016 Q3', iphone: 4830, ipad: 3805, itouch: 1598},
				{period: '2016 Q4', iphone: 15083, ipad: 8977, itouch: 5185},
				{period: '2017 Q1', iphone: 10697, ipad: 4470, itouch: 2038},
			
			],
			lineColors:['#eb6f6f','#926383','#eb6f6f'],
			xkey: 'period',
            redraw: true,
            ykeys: ['iphone', 'ipad', 'itouch'],
            labels: ['All Visitors', 'Returning Visitors', 'Unique Visitors'],
			pointSize: 2,
			hideHover: 'auto',
			resize: true
		});
		
	   
	});
	</script>
    <!-- calendar -->
	<script type="text/javascript" src="{{asset('public/backend/js/monthly.js')}}"></script>
	<script type="text/javascript">
		$(window).load( function() {

			$('#mycalendar').monthly({
				mode: 'event',
				
			});

			$('#mycalendar2').monthly({
				mode: 'picker',
				target: '#mytarget',
				setWidth: '250px',
				startHidden: true,
				showTrigger: '#mytarget',
				stylePast: true,
				disablePast: true
			});

		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->

    {{-- tự động thay đổi slug --}}
    <script type="text/javascript">
        function ChangeToSlug(){
            var slug;        
            //Lấy text từ thẻ input title 
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //Đổi ký tự có dấu thành không dấu
                slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
                slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
                slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
                slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
                slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
                slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
                slug = slug.replace(/đ/gi, 'd');
                //Xóa các ký tự đặt biệt
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //Đổi khoảng trắng thành ký tự gạch ngang
                slug = slug.replace(/ /gi, "-");
                //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
                //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //Xóa các ký tự gạch ngang ở đầu và cuối
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox có id “slug”
            document.getElementById('convert_slug').value = slug;
        }
    </script>
</body>
</html>
