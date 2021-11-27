@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 style="margin: 0;position: inherit;font-size: 18px" class="title text-center">{{$the_tieude}}</h2><br><br>                
        <div class="product-image-wrapper">
        	@foreach($post as $key => $p)
	            <div class="single-products" style="margin: 10px 0;">
	                {!! $p->post_content !!}
	            </div>
	            <div class="clearfix"></div>
            @endforeach 
        </div>                                                                           
</div><!--features_items-->   
<h2 style="margin: 0;font-size: 18px" class="title text-center">Bài viết liên quan</h2>
<style type="text/css">
	ul.baiviet_lienquan li{
		list-style-type: disc;
		font-size: 16px;
		padding: 6px;
	}
	ul.baiviet_lienquan li a{
		color: #111;
	}
	ul.baiviet_lienquan li a:hover{
		color: #FE980F;
	}
</style>
<ul class="baiviet_lienquan">
	@foreach($lienquan as $key => $lien)
		<li><a href="{{url('/bai-viet/'.$lien->post_slug)}}">{{$lien->post_title}}</a></li>
	@endforeach
</ul>                
@endsection