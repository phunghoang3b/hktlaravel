@extends('layout')
@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div><!--/breadcrums-->	

			<div class="row">					
				<div class="col-sm-9 clearfix">
					<div class="img-feeship" style="margin-left: 43%;">
						<img src="{{('public/frontend/images/shipped.png')}}">
					</div>
				</div>
			</div>

			<div class="row">					
				<div class="col-sm-9 clearfix">
					{{-- chọn địa chỉ và tính phí vận chuyển --}}
					<form>
		                @csrf               
		                <p style="color: #111;font-size: 15px;margin-bottom: 25px;text-align: center;">Hãy chọn địa chỉ để tính phí vận chuyển nhé!</p>               
		            <div class="form-group">
		                <label for="exampleInputPassword1" style="font-size: 17px;margin-left: 24%;">Chọn Thành Phố</label>
		                <select name="city" id="city" class="form-control input-sm m-bot15 choose city" style="width: 50%;text-align: center;margin-left: 24%;">
		                    <option value="">----Chọn Tỉnh Thành Phố----</option>
		                    @foreach($city as $key => $tp)
		                        <option value="{{$tp->matp}}">{{$tp->name_city}}</option>
		                    @endforeach
		                </select>
		            </div>

		            <div class="form-group">
		                <label for="exampleInputPassword1" style="font-size: 17px;margin-left: 24%;">Chọn Quận Huyện</label>
		                <select name="province" id="province" class="form-control input-sm m-bot15 choose province" style="width: 50%;text-align: center;margin-left: 24%;">
		                    <option value="">------Chọn quận huyện------</option>                                      
		                </select>
		            </div>

		            <div class="form-group">
		                <label for="exampleInputPassword1" style="font-size: 17px;margin-left: 24%;">Chọn Xã Phường</label>
		                <select name="wards" id="wards" class="form-control input-sm m-bot15 wards" style="width: 50%;text-align: center;margin-left: 24%;">
		                    <option value="">------Chọn xã phường------</option>                                      
		                </select>
		            </div>

		            <input type="button" value="Tính phí vận chuyển" name="tinhphi_vanchuyen" class="btn btn-primary btn-sm calculate_delivery" style="    margin-top: 2px;margin-left: 39%;margin-bottom: 3%;font-weight: bold;color: #111;font-size: 17px;border-radius: 5px;">
		        	</form>
	        	</div>
	    	</div>

			{{-- chọn địa chỉ và tính phí vận chuyển --}}	

			<div class="shopper-informations">
				<div class="row">					
					<div class="col-sm-9 clearfix">
						@if(session()->has('message'))
			                <div class="alert alert-success">
			                    {!! session()->get('message') !!}
			                </div>
			            @elseif(session()->has('error'))
			                 <div class="alert alert-danger">
			                    {!! session()->get('error') !!}
			                </div>
			            @endif
						<div class="table-responsive cart_info">
						<form action="{{url('/capnhat-giohang-ajax')}}" method="POST">
							@csrf
							<table class="table table-condensed">
								<thead>
									<tr class="cart_menu">
										<td class="image" style="text-align: center; width: 20%;">Hình sản phẩm</td>
										<td class="description" style="text-align: center;">Tên sản phẩm</td>
										<td class="price" style="text-align: center;">Giá tiền</td>
										<td class="quantity" style="text-align: center;width: 15%;">Số lượng</td>
										<td class="total" style="text-align: center;">Thành tiền</td>
										<td></td>
									</tr>
								</thead>
								<tbody>
									@if(Session::get('giohang') == true)
									@php
										$tongtien = 0;
									@endphp

									@foreach(Session::get('giohang') as $key => $gio)
										@php
											$thanhtien = $gio['product_price'] * $gio['product_sales_quantity'];
											$tongtien += $thanhtien;
										@endphp
										<tr>
											<td class="cart_product" style="text-align: center;width: 90%;">
												<img src="{{asset('public/uploads/product/'.$gio['product_image'])}}" width="80" height="60" alt="{{$gio['product_name']}}" style="width: 82%;height: 2%;" />
											</td>
											<td class="cart_description" style="text-align: center;">
												<h4><a href=""></a></h4>
												<p>{{$gio['product_name']}}</p>
											</td>
											<td class="cart_price" style="text-align: center;">
												<p>{{number_format($gio['product_price'],0,',','.')}} đ</p>
											</td>
											<td class="cart_quantity" style="text-align: center;">
												<div class="cart_quantity_button">								
													<input class="cart_quantity" type="number" min="1" name="cart_qty[{{$gio['session_id']}}]" value="{{$gio['product_sales_quantity']}}">										
												</div>
											</td>
											<td class="cart_total" style="text-align: center;">
												<p class="cart_total_price">
													{{number_format($thanhtien,0,',','.')}} đ
												</p>
											</td>
											<td class="cart_delete" style="text-align: center;">
												<a class="cart_quantity_delete" href="{{url('/xoasp-ajax/'.$gio['session_id'])}}"><img src="{{('public/frontend/images/garbage.png')}}"></a>
											</td>
										</tr>							
									@endforeach	
										<tr>
											<td><input type="submit" value="Cập nhật giỏ hàng" name="capnhat_sl" class="check_out btn btn-default btn-sm" style="border-radius: 5px;height: 42px;margin-left: 20%;"></td>
											<td><a class="btn btn-default check_out" href="{{url('/xoatatca-giohang')}}" style="border-radius: 5px;margin-left: 2%"><img src="{{('public/frontend/images/shopping-cart.png')}}"></a></td>
											<td>
												@if(Session::get('giamgia'))
												<a class="btn btn-default check_out" href="{{url('/xoagiamgia-giohang')}}" style="border-radius: 5px;height: 42px;padding-top: 12px;">Xóa Mã Giảm Giá</a>
												@endif
											</td>

											<td colspan="2">
												<p style="padding-top: 25px; color: red;font-size: 20px; font-weight: bold;padding-left: 10%;">Tổng tiền: <span>{{number_format($tongtien,0,',','.')}} đ</span></p>
												@if(Session::get('giamgia'))
												<p style="color: red;font-size: 20px; font-weight: bold;padding-left: 10%;">
												@foreach(Session::get('giamgia') as $key => $giam)
													@if($giam['tinhnang_giamgia']==1)
														Mã giảm giá: {{$giam['so_giamgia']}} %
														<p>
															@php 
																$tong_giamgia = ($tongtien*$giam['so_giamgia'])/100;
															@endphp
														</p>
														<p>
															@php
																$tongtien_saugiamgia = $tongtien-$tong_giamgia;
															@endphp
														</p>
													@elseif($giam['tinhnang_giamgia']==2)
														Mã giảm : {{number_format($giam['so_giamgia'],0,',','.')}} k
														<p>
															@php 
																$tong_giamgia = $tongtien - $giam['so_giamgia'];					
															@endphp
														</p>
														@php
															$tongtien_saugiamgia = $tong_giamgia;
														@endphp
													@endif
												@endforeach								
												</p>
												@endif 

												{{-- kiểm tra nếu có session phí vận chuyển --}}
												@if(Session::get('fee'))
												<p style="color: red;font-size: 20px; font-weight: bold;padding-left: 10%;">
													<a class="cart_quantity_delete" href="{{url('/xoaphi-giohang')}}"><i class="fa fa-times"></i></a>
													Phí vận chuyển: <span>{{number_format(Session::get('fee'),0,',','.')}} đ</span></p>
													<?php $tongtien_saucophi = $tongtien + Session::get('fee'); ?>
												@endif

												<p style="color: red;font-size: 20px; font-weight: bold;padding-left: 10%;">Tổng còn:
													@php
														if(Session::get('fee') && !Session::get('giamgia')){
															$tongtien_sau = $tongtien_saucophi;
															echo number_format($tongtien_sau,0,',','.').'đ';
														}elseif(!Session::get('fee') && Session::get('giamgia')){
															$tongtien_sau = $tongtien_saugiamgia;
															echo number_format($tongtien_sau,0,',','.').'đ';
														}elseif(Session::get('fee') && Session::get('giamgia')){
															$tongtien_sau = $tongtien_saugiamgia;
															$tongtien_sau = $tongtien_sau + Session::get('fee');
															echo number_format($tongtien_sau,0,',','.').'đ';
														}elseif(!Session::get('fee') && !Session::get('giamgia')){
															$tongtien_sau = $tongtien;
															echo number_format($tongtien_sau,0,',','.').'đ';
														}
													@endphp
												</p>
											</td>
										</tr>
									@else
										<tr>
											<td colspan="5">
												<center style="padding-top: 14%;color: #111;font-weight: bold;">
													<img src="{{('public/frontend/images/basket.png')}}" style="position: absolute;margin-top: -13%;margin-left: 15%;width: 12%;">
													@php
														echo 'Giỏ hàng bạn đang trống, hãy thêm sản phẩm vào giỏ hàng!'
													@endphp
												</center>
											</td>
										</tr>
									@endif										
								</tbody>
							</form>
							@if(Session::get('giohang'))
								<tr>
									<td style="padding-left: 11%;padding-top: 25px;">
										<form method="POST" action="{{url('/kiemtra-giamgia')}}">
										@csrf
										<img src="{{('public/frontend/images/coupon.png')}}" style="position: absolute;margin-top: -15px;left: 42px;">
										<input type="text" class="form-control" name="giamgia" placeholder="Nhập mã giảm giá" style="width: 266%;"><br>
			            				<input type="submit" class="btn btn-default check_coupon" name="kiemtra_giamgia" value="Tính mã giảm giá" style="font-weight: bold;">
				            			</form>
									</td>
									<td colspan="4">
										@php
											$vnd_to_usd = $tongtien_sau/22715;
										@endphp
                                        <div id="paypal-button" style="margin-left: 55%"></div>
                                        <input type="hidden" id="vnd_to_usd" value="{{round($vnd_to_usd,2)}}">
                                    </td>
								</tr>
							@endif
							</table>

						</div>
					</div>

					<div class="col-sm-9 clearfix">
						<div class="bill-to">
							<p style="font-weight: bold;text-align: center;color: #111;">Thông tin thanh toán</p>
							<div class="form-one">
								<form method="POST" style="margin-left: 50%;width: 113%;">
									@csrf
									<input type="text" name="shipping_name" class="shipping_name" placeholder="Họ và Tên">
									<input type="text" name="shipping_email" class="shipping_email" placeholder="Email">
									<input type="text" name="shipping_address" class="shipping_address" placeholder="Địa Chỉ">
									<input type="text" name="shipping_phone" class="shipping_phone" placeholder="Số Điện Thoại">
									<textarea name="shipping_notes" class="shipping_notes" placeholder="Ghi chú đơn hàng của bạn" rows="5"></textarea>

									{{-- lấy dữ liệu 2 trường phí vận chuyển và mã giảm giá --}}
									@if(Session::get('fee'))
										<input type="hidden" name="order_fee" class="order_fee" value="{{Session::get('fee')}}">
									@else
										<input type="hidden" name="order_fee" class="order_fee" value="15000">
									@endif

									@if(Session::get('giamgia'))
										@foreach(Session::get('giamgia') as $key => $giam)
											<input type="hidden" name="order_coupon" class="order_coupon" value="{{$giam['ma_giamgia']}}">
										@endforeach
									@else
										<input type="hidden" name="order_coupon" class="order_coupon" value="no">
									@endif

									{{-- chọn hình thức thanh toán --}}
									<div class=""><br>
										<div class="form-group">
		                                    <label for="exampleInputPassword1" style="font-size: 17px;">Chọn Phương Thức Thanh Toán</label>
		                                    <select name="chonhinhthuc_thanhtoan" class="form-control input-sm m-bot15 chonhinhthuc_thanhtoan">
		                                        <option value="0">Chuyển khoản</option>     
		                                        <option value="1">Tiền mặt</option>                                     
		                                    </select>
			                            </div>
									</div>
									<input type="button" value="Xác nhận đơn hàng" name="send_order" class="btn btn-primary btn-sm send_order" style="border-radius: 5px;font-size: 17px;font-weight: bold;color: #111;">
								</form>								
							</div>
						</div>
					</div>				
				</div>
			</div>
		</div>
	</section> <!--/#cart_items-->
@endsection