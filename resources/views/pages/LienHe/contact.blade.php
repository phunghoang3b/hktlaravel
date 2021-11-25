@extends('layout')
@section('content')
<div class="features_items">
	<h2 class="title text-center">Liên hệ</h2>
	<div class="row">
		@foreach($contact as $key => $info)
		<div class="col-md-12">	
			{!! $info->info_contact !!}	
			{!! $info->info_fanpage !!}
		</div>
		<div class="col-md-12">
			<h4>Bản Đồ</h4>
			{!! $info->info_map !!}
		</div>
	</div>
	@endforeach
</div>
@endsection