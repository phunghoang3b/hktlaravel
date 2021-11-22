@extends('layout')
@section('content')

    <div class="features_items"><!--features_items-->
    <h2 class="title text-center">Video Gym & Thực Phẩm Bổ Sung Whey Protein</h2>
    @foreach($danhsach_video as $key => $video)
        <div class="col-sm-4">
            <div class="product-image-wrapper">
                <style type="text/css">
                    .single-products.single-products-video{
                        height: 500px;
                    }
                </style>
                <div class="single-products single-products-video">
                    <div class="productinfo text-center">
                        <form>
                            @csrf                          
                            <a href="">
                                <img src="{{asset('public/uploads/videos/'.$video->video_image)}}" alt="{{$video->video_title}}" />
                                <h2>{{$video->video_title}}</h2>
                                <p>{{$video->video_desc}}</p>
                            </a> 
                            <button type="button" id="{{$video->video_id}}" class="btn btn-primary watch-video" data-toggle="modal" data-target="#model_video">
                              Xem Video
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach                                                                              
    </div><!--features_items-->  
    <ul class="pagination pagination-sm m-t-none m-b-none">
        {!! $danhsach_video->links() !!}
    </ul>
    
    <!-- Modal Video-->
    <div class="modal fade" id="model_video" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="video_title"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">  
                <div id="video_desc"></div><br>          
                <div id="video_link"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
          </div>
        </div>
      </div>
    </div>
 @endsection