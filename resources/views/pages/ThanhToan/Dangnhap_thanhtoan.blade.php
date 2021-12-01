<!DOCTYPE html>
<html>
<head>
	<title>Đăng Nhập</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="{{('public/frontend/css/style.css')}}">
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700,800&display=swap" rel="stylesheet">
</head>
<body>
  <div class="cont">
    <div class="form sign-in">
      <h2>Đăng Nhập</h2>
      <form action="{{URL::to('/dangnhap-khachhang')}}" method="POST">
        {{ csrf_field() }}
          <label>
            <span>Email</span>
            <input type="text" required name="email_account">
          </label>
          <label>
            <span>Mật Khẩu</span>
            <input type="password" required name="password_account">
          </label>
          <button class="btn btn-default" type="submit">Đăng nhập</button>
      </form>
      {{-- đăng nhập bằng hình thức khác --}}
      <ul class="list-login">
        <li>
          <a href="{{url('/dangnhap-kh-google')}}"><img width="35px" alt="Đăng nhập bằng tài khoản google" src="{{asset('public/frontend/images/icongoogle.png')}}" style="margin-left: 42%;"></a>
        </li>
        <li>
          <a href="{{url('/dangnhap-kh-facebook')}}"><img width="35px" alt="Đăng nhập bằng tài khoản facebook" src="{{asset('public/frontend/images/iconfacebook.png')}}"></a>
        </li>
      </ul>
      <style type="text/css">
        ul.list-login{
          margin: 10px;
          padding: 0;
        }
        ul.list-login li{
          display: inline;
          margin: 5px;
        }
      </style>
      {{-- đăng nhập bằng hình thức khác --}}
    </div>
    <div class="sub-cont">
      <div class="img">
        <div class="img-text m-up">
          <h2>Điều gì mới?</h2>
          <p>"Bạn phải kiên trì. Kết quả sẽ không xuất hiện chỉ sau một đêm, nhưng cơ thể bạn sẽ luôn luôn hạnh phúc. Tập thể hình, ăn uống điều độ, kiên trì. Cơ thể sẽ đền đáp bạn xứng đáng"</p>
        </div>
        <div class="img-text m-in">
          <h2>Chỉ 1 câu nói?</h2>
          <p>Có những người muốn giấc mơ thành hiện thực. Có những người ước mơ thành hiện thực. Và có những người biến giấc mơ thành hiện thực – Michael.</p>
        </div>
        <div class="img-btn">
          <span class="m-up">Đăng Ký</span>
          <span class="m-in">Đăng Nhập</span>
        </div>
      </div>
      <div class="form sign-up">
        <h2>Đăng Ký</h2>
        <form action="{{URL::to('/them-khachhang')}}" method="POST">
          {{ csrf_field() }}
            <label>
              <span>Họ và Tên</span>
              <input type="text" name="customer_name" required minlength="4" maxlength="25" size="25">
            </label>
            <label>
              <span>Email</span>
              <input type="email" name="customer_email" required>
            </label>
            <label>
              <span>Mật Khẩu</span>
              <input type="password" name="customer_password" required minlength="5" maxlength="20" size="20">
            </label>
            <label>
              <span>Số Điện Thoại</span>
              <input type="tel" name="customer_phone" required pattern="[0-9]{3}[0-9]{3}[0-9]{4}" minlength="10" maxlength="10" size="10">
            </label>
            <button type="submit" class="btn btn-default">Đăng ký ngay!</button>
        </form>
      </div>
    </div>
  </div>
<script type="text/javascript" src="{{('public/frontend/js/script.js')}}"></script>
</body>
</html>