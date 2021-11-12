@extends('layout')
@section('content')
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Giỏ hàng của bạn</li>
				</ol>
			</div>
			<div class="table-responsive cart_info">
				<?php
				//lấy ra những gì đã thêm vào giỏ hàng
				$content = Cart::content();
				?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="image">Hình sản phẩm</td>
							<td class="description">Mô tả</td>
							<td class="price">Giá tiền</td>
							<td class="quantity">Số lượng</td>
							<td class="total">Tổng tiền</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						@foreach($content as $giatri)
						<tr>
							<td class="cart_product">
								<a href=""><img src="{{URL::to('public/uploads/product/'.$giatri->options->image)}}" width="80" height="60" alt="" /></a>
							</td>
							<td class="cart_description">
								<h4><a href="">{{$giatri->name}}</a></h4>
							</td>
							<td class="cart_price">
								<p>{{number_format($giatri->price,0,',','.').' đ'}}</p>
							</td>
							<td class="cart_quantity">
								<div class="cart_quantity_button">
								<form action="{{URL::to('/capnhat-sl-giohang')}}" method="POST">
									{{ csrf_field() }}
									<input class="cart_quantity_input" type="text" name="quantity_cart" value="{{$giatri->qty}}">
									<input type="hidden" value="{{$giatri->rowId}}" name="rowId_sp" class="form-control">
									<input type="submit" value="Cập nhật" name="capnhat_sl" class="btn btn-default btn-sm">
								</form>
								</div>
							</td>
							<td class="cart_total">
								<p class="cart_total_price">
									<?php
										$subtotal = $giatri->price * $giatri->qty;
										echo number_format($subtotal,0,',','.').' đ';
									?>
								</p>
							</td>
							<td class="cart_delete">
								<a class="cart_quantity_delete" href="{{URL::to('/xoa-giohang/'.$giatri->rowId)}}"><i class="fa fa-times"></i></a>
							</td>
						</tr>
						@endforeach												
					</tbody>
				</table>
			</div>
		</div>
	</section> <!--/#cart_items-->

	<section id="do_action">
		<div class="container">
			<div class="row">				
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
							<li>Tổng cộng: <span>{{Cart::priceTotal(0,',','.').' đ'}}</span></li>
							<li>Thuế: <span>{{Cart::tax(0,',','.').' đ'}}</span></li>
							<li>Phí vận chuyển: <span>Miễn phí</span></li>
							<li>Thành tiền: <span>{{Cart::total(0,',','.').' đ'}}</span></li>
						</ul>
						<?php
                            $customer_id = Session::get('customer_id');
                            if($customer_id != NULL){
                        ?>
                            <a class="btn btn-default update" href="{{URL::to('/thanhtoan')}}">Thanh Toán</a>
                        <?php
                            }else{
                        ?>
                            <a class="btn btn-default update" href="{{URL::to('/dangnhap-thanhtoan')}}">Thanh Toán</a>
                        <?php
                            }
                        ?>  
					</div>
				</div>
			</div>
		</div>
	</section><!--/#do_action-->
@endsection