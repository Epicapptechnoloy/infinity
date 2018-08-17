@extends('layouts.master')

@section('content')
 <!-- BREADCRUMB -->
<div class="container pd-15"> 
	<div class="row sldrfullpge">
		<div class="col-md-12">
			<ul class="breadcrumb">
				<li> <a href="index.html"> <i class="fa fa-home"></i>Home</a></li>
				<li class="active">My Account</li>
			</ul>
		</div>
	</div>
</div>
<!-- END BREADCRUMB -->
	
 
	 <!-- MAIN CONTENT -->
<section class=""> 
	<div class="container pd-15">
	@if(count($products) > 0)
		<div class="row">
			<div class="col-lg-12 col-sm-12">
				<div class="col-lg-3 col-sm-3"></div>
				<div class="col-lg-6 col-sm-6"><span id="messageArea" style="color:green;"></span></div>
			</div>

			<div class="col-xs-12">
			
				@php
					$totalPrice = 0;
				@endphp
				<div class="checkout">
					<div class="table-responsive table-none" style="visibility:visible;">
						<table class="table checkout-table">
							<tbody>
								<thead>
									<tr class="table-h">
										<td><span>Product</span></td>
										<td><span>ITEM Details</span></td>
										<td><span>Quantity</span></td>
										<td><span>Product PRICE</span></td>
										<td><span>EDIT</span></td>
										<td><span>SUBTOTAL</span></td>
									</tr>
								</thead>
								
								@foreach($products as $product)
								
									@php
									$totalPrice = $totalPrice + $product->total_price;
									if($product->getProduct->image)
										$imgUrl ='/uploads/product/image/'.$product->getProduct->image;
									else
										$imgUrl = '/images/No-Image-Basic.png';
									@endphp
								<tr>
									<td class="text-center">
										<div class="col-md-3 col-md-offset-4">
										<img src="{{$imgUrl}}" alt="" title="" class="img-responsive">
										</div>
									</td>
									
									<td class="product-name">
										<h1>{!! $product->getProduct->name !!} </h1> 
									
										<span> {{$product->size}}</span> 
										<span> Color: <em class="colorCode">{{$product->color}}</em></span>
									</td>
									
									<td class="cart-product-quantity text-center">
										<div class="quant-input">
											<div class="arrows">
												<div data-id="{{$product->cart_id}}" class="arrow plus gradient" pid="{{$product->getProduct->product_id}}"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
												<div data-id="{{$product->cart_id}}" class="arrow minus gradient" pid="{{$product->getProduct->product_id}}"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
												<span id="ajaxArea_{{$product->cart_id}}"></span>
											</div>
											<input type="text" readonly="readonly" id="qty_{{$product->cart_id}}" class="qnt" name="qty" value="{{$product->qty}}">
										</div>
									</td>
									
									<td>
										<div class="cost2">
											<span>
											{{($product->getProduct->price + 0 )}} x {{$product->qty}} = {{($product->getProduct->price * $product->qty) + 0}} 
											</span>
										</div>
									</td>
									
									<td class="remove-css romove-item text-center" recno="{{$product->cart_id}}">
										<p><a href="javascript:void(0);" title="Remove" ><i class="fa fa-trash-o" aria-hidden="true"></i> <br> Remove </a> </p>
										<span id="DelajaxArea_{{$product->cart_id}}"></span>
									</td>
									<td><div class="cost">{{($product->getProduct->price * $product->qty) + 0}} </div></td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div> 
				</div>
			</div>
			<div class="col-md-8 col-sm-7 col-xs-12">
				<div class="cart-buttons mb-30">
					
					<a href="/shop">Continue Shopping</a>
				</div>
				<div class="cart-coupon mb-40">
					<h4>Coupon</h4>
					<p>Enter your coupon code if you have one.</p>
					<input type="text" placeholder="Coupon code">
					<input type="submit" value="Apply Coupon">
				</div>
			</div>	

			@if(count($products) > 0)
			<div class="col-md-4 col-sm-5 col-xs-12">
				<div class="cart-total mb-40">
					<h3>Cart Totals</h3>
					<table>
						<tbody>
							<tr class="cart-subtotal">
								<th>Subtotal</th>
								<td><span class="amount">Rs.{{($totalPrice + 0)}} </span></td>
							</tr>
							<tr class="order-total">
								<th>Total</th>
								<td>
								<strong><span class="amount">Rs.{{($totalPrice + 0)}}</span></strong>
								</td>
							</tr>											
						</tbody>
					</table>
					<div class="proceed-to-checkout section mt-30">
						<a href="/checkout">
						<button type="button" id="Checkout" class="btn btn-primary checkout-btn">Proceed to Checkout <i id="hideDef" class="fa fa-spinner fa-pulse"></i> </button></a>
					</div>
				</div>
			</div>
			@endif	
		</div>
	@else
		<h2>Your Cart Empty </h2>
	@endif
	</div> 
</section>
	 
<script> 
	$(document).ready(function () {
		$(".plus").on("click", function(){ 
			var dataId = $(this).attr('data-id'); 
			var qty = parseInt($("#qty_"+dataId).val());
			if(qty <= 100){
				qty = qty + 1;
				$("#qty_"+dataId).val(qty);
				$.fn.updateKart(dataId , qty , $(this).attr('pid'));
			}		
		});
		$(".minus").on("click", function(){
			var dataId = $(this).attr('data-id'); 
			var qty = parseInt($("#qty_"+dataId).val());
			if(qty > 1){
				qty = qty - 1;
				$("#qty_"+dataId).val(qty);
				$.fn.updateKart(dataId,qty , $(this).attr('pid'));
			}		
		});	
		
		$("#hideDef").hide('');
			$("#Checkout").on("click", function(){
			$("#hideDef").show(''); 
		});
		
		/*****************Remove Item from Kart *******************/
		$('.romove-item').on('click',function(){
			var dataId = $(this).attr('recno');
			var request = $.ajax({
				url: "{{ route('updateINFKart') }}",
				method: "POST",
				data: {
					'action': 'delete',
					'id':dataId,					 
					'_token': JS_args._token,					  
				},				 
				dataType: "html",
				beforeSend: function(msg){
					$('#DelajaxArea_'+dataId).text('Wait...');					  
				},
				success: function(msg){					
					var response = JSON.parse(msg);
					$('#DelajaxArea_'+dataId).text('');
					$('#messageArea').text(response.message);
					if(response.status == 200){ 
						location.reload(true);
					}
				}
			});	
		});
	});
	
	$.fn.updateKart = function(dataId , qty , pid){
		var request = $.ajax({
			url: "{{ route('updateINFKart') }}",
			method: "POST",
			data: {
				'action': 'update',
				'qty':qty,
				'pid':pid,
				'_token': JS_args._token,					  
			},				 
			dataType: "html",
			beforeSend: function(msg){
				$('#ajaxArea_'+dataId).text('Wait...');					  
			},
			success: function(msg){					
				var response = JSON.parse(msg);
				$('#ajaxArea_'+dataId).text('');
				$('#messageArea').text(response.message);
				if(response.status == 200){ 
					location.reload(true);
				}
			}
		});
	} 	
</script> 
 
@endsection