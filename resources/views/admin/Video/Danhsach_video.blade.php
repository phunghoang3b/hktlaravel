@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh Sách Video
    </div>
    <div class="table-responsive">
      <?php
        $message = Session::get('message');
        if($message){
          echo '<span class="text-alert" style="position:relative;left:40%">',$message,'</span>';
          Session::put('message',null);
        }
      ?><br>
      <div class="col-sm-12">
        <div class="position-center">
            <form>
                {{ csrf_field() }}
              <div class="form-group">
                  <label for="exampleInputEmail1">Tên video</label>
                  <input type="text" name="ten_video" class="form-control ten_video" id="slug" onkeyup="ChangeToSlug();">
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Slug video</label>
                  <input type="text" name="slug_video" class="form-control slug_video" id="convert_slug">
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Link</label>
                  <input type="text" name="link_video" class="form-control link_video">
              </div>
              <div class="form-group">
                  <label for="exampleInputPassword1">Mô tả video</label>
                  <textarea style="resize: none;" rows="8" class="form-control mota_video" name="mota_video" id="exampleInputPassword1"></textarea>
              </div>          
              <button type="button" name="them_video" class="btn btn-info btn-add-video" style="position: relative;left: 44%;">Thêm video</button><br><br>
          </form>
          <div id="notify" style="text-align: center;"></div>
        </div>
      </div>
      <div id="video_load"></div>
    </div>
  </div>

  <!-- Modal -->
    <div class="modal fade" id="video_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tên Video</h5>
          </div>
          <div class="modal-body">
            Video here
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection