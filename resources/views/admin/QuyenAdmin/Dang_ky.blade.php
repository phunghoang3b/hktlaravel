<!DOCTYPE html>
<head>
<title>Đăng Ký</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Visitors Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="{{asset('public/backend/css/bootstrap.min.css')}}" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="{{asset('public/backend/css/style.css')}}" rel='stylesheet' type='text/css' />
<link href="{{asset('public/backend/css/style-responsive.css')}}" rel="stylesheet"/>
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="{{asset('public/backend/css/font.css')}}" type="text/css"/>
<link href="{{asset('public/backend/css/font-awesome.css')}}" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
</head>
<body>
<div class="log-w3">
<div class="w3layouts-main">
    <h2>Đăng Ký</h2>
    {{-- hiện thông báo --}}
    <?php
    $message = Session::get('message');
    if($message){
        echo '<span class="text-alert">',$message,'</span>';
        Session::put('message',null);
    }
    ?>
        <form action="{{URL::to('/dangky')}}" method="post">
            {{ csrf_field() }}
            {{-- ->all() là bắt tất cả lỗi --}}
            @foreach($errors->all() as $giatri)
            <ul>
                <li>{{$giatri}}</li>
            </ul>
            @endforeach

            <input type="text" class="ggg" name="admin_name" value="{{old('admin_name')}}" placeholder="Nhập Tên">
            <input type="email" class="ggg" name="admin_email" placeholder="Nhập Email">
            <input type="tel" class="ggg" name="admin_phone" value="{{old('admin_name')}}" placeholder="Nhập Số Điện Thoại">
            <input type="password" class="ggg" name="admin_password" placeholder="Nhập Password">
                <div class="clearfix"></div>
                <input type="submit" value="Đăng Ký" name="login">
        </form>
        <a href="{{URL::to('/admin')}}" style="margin-left: 43%;text-decoration: underline;">Đăng Nhập</a>
</div>
</div>
<script src="{{asset('public/backend/js/bootstrap.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.dcjqaccordion.2.7.js')}}"></script>
<script src="{{asset('public/backend/js/scripts.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="{{asset('public/backend/js/jquery.scrollTo.js')}}"></script>
</body>
</html>
