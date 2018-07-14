	@extends('layouts.master')

	@section('content')
	
	<!-- PAGE BANNER -->
	<?php //echo"<pre>"; print_r($products); die;  ?>
    <section class="product-detail">
	    <div class="container pd-15">
			<div class="row">
			    <div class="col-md-12">
				    <ul class="breadcrumb">
                        <li><i class="fa fa-home">
							</i> <a href="home">Home</a></li>
							<li class="active">Cart</li>
                    </ul>
				</div>
			</div>
		</div>
		<div class="detail-row">
			<div class="container pd-15">
				<div class="detail-row">
					<div class="row">
						<div class="col-md-12 text-center">
							<div class="block-title-w mr_tp_bt">
								<h2 class="block-title">CART</h2> 
								<span class="icon-title">
									<span></span>
									<i class="fa fa-star"></i>
								</span>
							</div>
						</div>
					</div>
				</div>
		    </div>
	    </div>
	</section>	
	<!-- /PAGE TITLE -->
 
	 <!-- MAIN CONTENT -->
	<section class="pb-100"> 
		<div class="container pd-15">
			<div class="row">
				<div class="col-xs-12">
					<div class="checkout small-pt">
						<div class="table-responsive table-none" style="visibility:visible;">
							<table class="table checkout-table">
								<thead>
									<tr class="table-h">
										<td><span>Product</span></td>
										<td><span>ITEM Details</span></td>
										<td><span>UNIT PRICE</span></td>
										<td><span>Quantity</span></td>
										<td><span>EDIT</span></td>
										<td><span>SUBTOTAL</span></td>
									</tr>
								</thead>
								<tbody>
								
									@if(count($products) > 0)
									@foreach($products as $product)
									<?php //dd($product);   ?>
									<tr>
										<td class="text-center">
											@php 
												$path = 'public/assets/front/img/deatail-slide_1.png' ; 
											@endphp
											
											<div div class="col-md-3 col-md-offset-4">
												<img src="{{URL::asset($path) }}" alt='' title="" class="img-responsive"  />
											</div>
											
										</td>
										<td class="product-name"><h1>{{$product->name}} </h1> 
										<span> {{$product->length}}</span></td>
										<td><div class="cost2"><span>{{$product->price}}</span></div></td>
										<td>
											<div class="inc-dre ">
												<div class="input-group ">
													<span class="input-group-btn">
														<button type="button"  class="altera decrescimo">-</button>
													</span>
													<input type="text" id="txtAcrescimo" value="0" />
													<span class="input-group-btn">
														<button type="button"  class="altera acrescimo">+</button>
													</span> 
												</div>
											</div>
										</td>
										<!--<input type="text" id="txtAcrescimo" />
													<button type="button" class="altera acrescimo">+</button>
													<button type="button" class="altera decrescimo">-</button>-->
										<td class="remove-css text-center">
											<p><a  title="Delete" onclick="return confirm ('Are you sure you want to delete?');" href="{{route('delete-product-details', ['id'=>$product->product_id])}}"><i class="fa fa-trash-o" aria-hidden="true"></i> <br>Remove </a></p>
										</td>
										
										<td><div class="cost">{{$product->price}}</div></td>
										
									</tr>
									@endforeach
									@endif
								</tbody>
									
							</table>
						</div> 
					</div>
				</div>
				<div class="col-md-8 col-sm-7 col-xs-12">
					<div class="cart-buttons mb-30">
						<input type="submit" value="Update Cart">
						<a href="#">Continue Shopping</a>
					</div>
					<div class="cart-coupon mb-40">
						<h4>Coupon</h4>
						<p>Enter your coupon code if you have one.</p>
						<input type="text" placeholder="Coupon code">
						<input type="submit" value="Apply Coupon">
					</div>
				</div>	
				
				
				<div class="col-md-4 col-sm-5 col-xs-12">
					<div class="cart-total mb-40">
						<h3>Cart Totals</h3>
						<table>
							<tbody>
								<tr class="cart-subtotal">
									<th>Subtotal</th>
									<td><span class="amount">Rs.306.00</span></td>
								</tr>
								<tr class="order-total">
									<th>Total</th>
									<td>
										<strong><span class="amount">Rs.306.00</span></strong>
									</td>
								</tr>											
							</tbody>
						</table>
						<div class="proceed-to-checkout section mt-30">
							<a href="{{Url('checkout')}}">Proceed to Checkout</a>
						</div>
					</div>
				</div>	 
			</div>
		</div> 
    </section>
	<script>
	
		$(document).ready(function (){ 
		
			var $input = $("#txtAcrescimo");
		
			$input.val(0);

		
			$(".altera").click(function(){
	
				if ($(this).hasClass('acrescimo'))
		
				$input.val(parseInt($input.val())+1);
				else if ($input.val()>=1)
				$input.val(parseInt($input.val())-1);
			});	
		});
			
	</script>
	@endsection
