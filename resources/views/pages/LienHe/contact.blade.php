@extends('layout')
@section('content')
<div class="features_items">
	<h2 class="title text-center">Liên hệ</h2>
	<div class="row">
		@foreach($contact as $key => $info)
		<div class="col-md-12" style="text-align: center;">	
			{!! $info->info_contact !!}	
			{!! $info->info_fanpage !!}
		</div>
		<div class="col-md-12">
			<h4 style="margin-top: 8%;text-align: center;font-size: 18px;font-weight: bold;margin-bottom: 3%;color: #66b3ff;">BẢN ĐỒ</h4>
			{!! $info->info_map !!}
		</div>
	</div>
	@endforeach
</div>
@endsection