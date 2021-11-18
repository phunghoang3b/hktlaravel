@extends('layout')
@section('content')
<div class="features_items"><!--features_items-->
    <h2 style="margin: 0;position: inherit;font-size: 18px" class="title text-center">{{$the_tieude}}</h2>                   
        <div class="product-image-wrapper">
        	@foreach($post as $key => $p)
	            <div class="single-products" style="margin: 10px 0;">
	                {!! $p->post_content !!}
	            </div>
	            <div class="clearfix"></div>
            @endforeach 
        </div>                                                                           
</div><!--features_items-->                   
@endsection