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
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
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
<script src="//cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
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
                <li><a href="#"><i class=" fa fa-suitcase"></i>H??? S??</a></li>
                <li><a href="#"><i class="fa fa-cog"></i> C??i ?????t</a></li>
                <li><a href="{{URL::to('/dangxuat-admin')}}"><i class="fa fa-key"></i> ????ng Xu???t</a></li>
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
                        <span>Trang ch???</span>
                    </a>
                </li>

                <li>
                    <a href="{{URL::to('/information')}}">
                        <i class="fa fa-dashboard"></i>
                        <span>Th??ng Tin Website</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Slide Banner</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/thembanner')}}">Th??m slide banner</a></li>
                        <li><a href="{{URL::to('/danhsachbanner')}}">Danh s??ch slide banner</a></li>
                    </ul>
                </li> 

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh M???c B??i Vi???t</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/them-danhmuc-baiviet')}}">Th??m danh m???c b??i vi???t</a></li>
                        <li><a href="{{URL::to('/danhsach-DM-baiviet')}}">Danh s??ch DM b??i vi???t</a></li>
                    </ul>
                </li> 

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>B??i Vi???t</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/them-baiviet')}}">Th??m b??i vi???t</a></li>
                        <li><a href="{{URL::to('/danhsach-baiviet')}}">Danh s??ch b??i vi???t</a></li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Qu???n l?? Video</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/them-video')}}">Th??m video</a></li>
                    </ul>
                </li>
                
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Danh M???c S???n Ph???m</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/themdanhmucsanpham')}}">Th??m danh m???c s???n ph???m</a></li>
						<li><a href="{{URL::to('/danhsachdanhmucsanpham')}}">Danh s??ch danh m???c s???n ph???m</a></li>
                    </ul>
                </li> 

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Th????ng Hi???u S???n Ph???m</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/themthuonghieu')}}">Th??m th????ng hi???u s???n ph???m</a></li>
						<li><a href="{{URL::to('/danhsachthuonghieu')}}">Danh s??ch th????ng hi???u s???n ph???m</a></li>
                    </ul>
                </li> 

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>S???n Ph???m</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/themsanpham')}}">Th??m s???n ph???m</a></li>
						<li><a href="{{URL::to('/danhsachsanpham')}}">Danh s??ch s???n ph???m</a></li>
                    </ul>
                </li> 

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>M?? Gi???m Gi??</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/them-magiamgia')}}">Th??m M?? Gi???m Gi??</a></li>
						<li><a href="{{URL::to('/danhsachmagiamgia')}}">Danh s??ch m?? gi???m gi??</a></li>
                    </ul>
                </li> 

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>V???n Chuy???n</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/van-chuyen')}}">Qu???n L?? V???n Chuy???n</a></li>
                    </ul>
                </li> 

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>????n H??ng</span>
                    </a>
                    <ul class="sub">
						<li><a href="{{URL::to('/quanly-donhang')}}">Danh s??ch ????n h??ng</a></li>
                    </ul>
                </li>  

                @chuyenquyen
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Quy???n</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/huy-chuyenquyen')}}">D???ng chuy???n quy???n</a></li>
                    </ul>
                </li> 
                @endchuyenquyen 

                @hasrole(['admin','manager'])
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>T??i Kho???n</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{URL::to('/them-taikhoan')}}">Th??m t??i kho???n</a></li>
                        <li><a href="{{URL::to('/users')}}">Danh s??ch t??i kho???n</a></li>
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

<script type="text/javascript">
    $(document).ready( function(){
        $('#myTable').DataTable();
    });
</script>

{{-- qu???n l?? video --}}
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

        // nh???n n??t th??m video
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
                    $('#notify').html('<span class="text text-success">Th??m video th??nh c??ng</span>');
                    location.reload();
                }
            });
        });

        // c???p nh???t video
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
                    $('#notify').html('<span class="text text-success">C???p nh???t video th??nh c??ng</span>');
                }
            });
        });

        // x??a video
        $(document).on('click','.btn-delete-video', function(){
            var video_id = $(this).data('video_id');
            if(confirm('B???n c?? ch???c mu???n x??a video?')){
                $.ajax({
                    url:"{{url('/xoa-video')}}",
                    method:"POST",
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{video_id:video_id},
                    success:function(data){
                        load_video();
                        $('#notify').html('<span class="text text-success">X??a video th??nh c??ng</span>');
                    }
                });
            }
        });

        // c???p nh???t c???t h??nh ???nh trong video
        $(document).on('change','.file_img_video',function(){
            var video_id = $(this).data('video_id');
            var image = document.getElementById('file-video-'+video_id).files[0];
            var form_data = new FormData();
            form_data.append("file",document.getElementById('file-video-'+video_id).files[0]);
            form_data.append("video_id",video_id);
            $.ajax({
                url:"{{url('/capnhat-image-video')}}",
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
                    $('#notify').html('<span class="text text-success">C???p nh???t h??nh ???nh video th??nh c??ng</span>');
                }
            });
        });
    });
</script>

{{-- th?? vi???n gallery --}}
<script type="text/javascript">
    {{-- load h??nh ???nh gallery --}}
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

        // ch???n h??nh ???nh trong file 
        $('#file').change(function(){
            var error = '';
            var files = $('#file')[0].files;
            if(files.length > 5){
                error+='<p>B???n ch???n t???i ??a ch??? ???????c 5 ???nh</p>';
            }else if(files.length == ''){
                error+='<p>B???n kh??ng ???????c b??? tr???ng tr?????ng n??y</p>';
            }else if(files.size > 2000000){
                error+='<p>File ???nh kh??ng ???????c l???n h??n 2MB</p>';
            }
            if(error == ''){

            }else{
                $('#file').val('');
                $('#error_gallery').html('<span class="text-danger">'+error+'</span>');
                return false;
            }
        });

        // ch???nh s???a t??n
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
                    $('#error_gallery').html('<span class="text-danger">C???p nh???t t??n h??nh ???nh th??nh c??ng</span>');
                }
            });
        });

        // x??a h??nh ???nh
        $(document).on('click','.delete-gallery',function(){
            var gal_id = $(this).data('gal_id');
            var _token = $('input[name="_token"]').val();
            if(confirm('B???n c?? ch???c mu???n x??a gallery?')){
                $.ajax({
                    url:"{{url('/xoa-gallery')}}",
                    method:"POST",
                    data:{gal_id:gal_id, _token:_token},
                    success:function(data){
                        load_gallery();
                        $('#error_gallery').html('<span class="text-danger">X??a gallery th??nh c??ng</span>');
                    }
                });
            }
        });

        // c???p nh???t c???t h??nh ???nh trong gallery
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
                    $('#error_gallery').html('<span class="text-danger">C???p nh???t h??nh ???nh th??nh c??ng</span>');
                }
            });
        });
    });
</script>

{{-- ajax n??t c???p nh???t s??? l?????ng trong ctdh --}}
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
               alert('C???p nh???t s??? l?????ng th??nh c??ng');
               location.reload();
            }
        });
    });
</script>

{{-- ajax s??? l?????ng t???n --}}
<script type="text/javascript">
    $('.order_detail').change(function(){
        var order_status = $(this).val();
        var order_id = $(this).children(":selected").attr("id");
        var _token = $('input[name="_token"]').val();

        //l???y ra s??? l?????ng
        quantity = [];
        $("input[name='product_sales_quantity']").each(function(){
            quantity.push($(this).val());
        });

        //l???y ra product id
        order_product_id = [];
        $("input[name='kiemtra_productid']").each(function(){
            order_product_id.push($(this).val());
        });
        j = 0;
        for(i = 0; i < order_product_id.length; i++){
            //s??? l?????ng kh??ch ?????t
            var sl_dh = $('.sl_donhang_' + order_product_id[i]).val();
            //s?? l?????ng t???n kho
            var sl_tonkho = $('.sl_tonkho_' + order_product_id[i]).val();
            if(parseInt(sl_dh) > parseInt(sl_tonkho)){
                j = j + 1;
                if(j == 1){
                    alert('S??? l?????ng b??n trong kho kh??ng ?????');
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
               alert('Thay ?????i t??nh tr???ng ????n h??ng th??nh c??ng');
               location.reload();
            }
            });
        }
    });
</script>

{{-- ajax van chuyen --}}
<script type="text/javascript">
    $(document).ready(function(){
        // l???y d??? li???u ph?? v???n chuy???n trong csdl ra b???ng ajax
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
        //ch???nh s???a ti???n fee_ship
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
            // h??m ajax
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

    {{-- t??? ?????ng thay ?????i slug --}}
    <script type="text/javascript">
        function ChangeToSlug(){
            var slug;        
            //L???y text t??? th??? input title 
            slug = document.getElementById("slug").value;
            slug = slug.toLowerCase();
            //?????i k?? t??? c?? d???u th??nh kh??ng d???u
                slug = slug.replace(/??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'a');
                slug = slug.replace(/??|??|???|???|???|??|???|???|???|???|???/gi, 'e');
                slug = slug.replace(/i|??|??|???|??|???/gi, 'i');
                slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???|??|???|???|???|???|???/gi, 'o');
                slug = slug.replace(/??|??|???|??|???|??|???|???|???|???|???/gi, 'u');
                slug = slug.replace(/??|???|???|???|???/gi, 'y');
                slug = slug.replace(/??/gi, 'd');
                //X??a c??c k?? t??? ?????t bi???t
                slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
                //?????i kho???ng tr???ng th??nh k?? t??? g???ch ngang
                slug = slug.replace(/ /gi, "-");
                //?????i nhi???u k?? t??? g???ch ngang li??n ti???p th??nh 1 k?? t??? g???ch ngang
                //Ph??ng tr?????ng h???p ng?????i nh???p v??o qu?? nhi???u k?? t??? tr???ng
                slug = slug.replace(/\-\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-\-/gi, '-');
                slug = slug.replace(/\-\-\-/gi, '-');
                slug = slug.replace(/\-\-/gi, '-');
                //X??a c??c k?? t??? g???ch ngang ??? ?????u v?? cu???i
                slug = '@' + slug + '@';
                slug = slug.replace(/\@\-|\-\@|\@/gi, '');
                //In slug ra textbox c?? id ???slug???
            document.getElementById('convert_slug').value = slug;
        }
    </script>
</body>
</html>
