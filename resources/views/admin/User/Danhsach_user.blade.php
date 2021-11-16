@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh Sách Tài Khoản
    </div>
    <div class="table-responsive">
      <?php
        $message = Session::get('message');
        if($message){
          echo '<span class="text-alert" style="position:relative;left:40%">',$message,'</span>';
          Session::put('message',null);
        }
      ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="text-align: center;border: 1px solid;width: 20%;">Tên user</th>
            <th style="text-align: center;border: 1px solid;">Email</th>
            <th style="text-align: center;border: 1px solid;">Số điện thoại</th>
            <th style="text-align: center;border: 1px solid;width: 20%;">Mật khẩu</th>
            <th style="text-align: center;border: 1px solid;">Admin</th>
            <th style="text-align: center;border: 1px solid;">User</th>
            <th style="text-align: center;border: 1px solid;">Manager</th>      
            <th style="text-align: center;border: 1px solid;">Chức năng</th>
          </tr>
        </thead>
        <tbody>
          @foreach($admin as $key => $user)
            <form action="{{url('/phanquyen-vaitro')}}" method="POST">
              @csrf
              <tr>
                <td style="border: 1px solid;">{{ $user->admin_name }}</td>
                <td style="border: 1px solid;">{{ $user->admin_email }} 
                  <input type="hidden" name="admin_email" value="{{ $user->admin_email }}">
                  <input type="hidden" name="admin_id" value="{{ $user->admin_id }}">
                </td>
                <td style="border: 1px solid;text-align: center;">{{ $user->admin_phone }}</td>
                <td style="border: 1px solid;">{{ $user->admin_password }}</td>
                <td style="border: 1px solid;text-align: center;"><input type="checkbox" name="admin_role" {{$user->hasRole('admin') ? 'checked' : ''}}></td>
                <td style="border: 1px solid;text-align: center;"><input type="checkbox" name="user_role"  {{$user->hasRole('user') ? 'checked' : ''}}></td>
                <td style="border: 1px solid;text-align: center;"><input type="checkbox" name="manager_role"  {{$user->hasRole('manager') ? 'checked' : ''}}></td>
              <td style="border: 1px solid; text-align: center;">                  
                 <p><input type="submit" value="Cấp Quyền" class="btn btn-sm btn-default"></p>
                 <p><a style="margin: 5px 0" class="btn btn-sm btn-danger" href="{{url('/xoaquyen-user/'.$user->admin_id)}}">Xóa User</a></p> 
              </td> 
              </tr>
            </form>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection