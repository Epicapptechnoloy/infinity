@extends('layouts.master')

@section('content')
<!-- PAGE CONTENT --> 
	<div class="container pd-15">
		<div class="row sldrfullpge">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li> <a href="{{ route('INFKart', ['sessionid' => \Session::getId()]) }}">MY CART</a></li>     
					<li class="active">DELIVERY</li>
					<li>PAYMENT</li>
				</ul>
			</div>
		</div>
	</div>

  <div class="chechout-holder">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8 col-sm-12 col-12">
				<div class="row">
					<div class="col-md-12 col-12">
						<div class="headingregular common-color">Confirm Address</div>
					</div>
				</div>
				<div id="listaddress" class="cartboxlist">
				
					<div class="row billingAddress11">
					@if(!empty($BillingAddress))
					@foreach($BillingAddress as $billingAddress1)
						<div  class="col-lg-6 col-md-12 col-12" id="delete_address__id_{{ $billingAddress1['address_id'] }}">
							<div>
								<div class="addbx active">
									<div class=" pull-left">
										<input type="radio" name="address" id="current_address__id_{{ $billingAddress1['address_id'] }}" class="ckbox" value="{{ $billingAddress1['address_id'] }}" checked>
										<label>&nbsp; </label>
									</div>
									<div class="address" id="address_div_id_{{ $billingAddress1['address_id'] }}">
										<span class="font-bold ">{{$billingAddress1['first_name']}}
										{{$billingAddress1['last_name']}}</span>
											<!---->
											
											<span><br>{{$billingAddress1['zip']}}</span>
											<span><br>{{$billingAddress1['address1']}}</span>
											<span><br>{{$billingAddress1['address2']}}</span>
											<span><br>{{$billingAddress1['city']}}</span>
											
											<span><br> Mobile: <span class="font-bold">{{$billingAddress1['phone']}}</span></span>
											<br>
											
											
											<span class="mt10">
												<span class="btn  btn-secondary  btn-sm text-uppercase"><a class="EditAddress" href="javascript:void(0);"  data-id="{{ $billingAddress1['address_id']}}" id="EditAddress"><span class="J_editAdd">Edit</span></a></span>
											</span>
											
											<span class="mt10"><span class="btn btn-secondary btn-sm text-uppercase"><a class="DeleteAddressBook" href="javascript:void(0);"  data-id="{{ $billingAddress1['address_id'] }}"  title="Delete Address" data-toggle="modal" data-target="#deleteAddressModal"><span class="J_delAdd">Remove</span></a> </span></span> 
									</div>
								</div>
							</div>
						</div>
					@endforeach
					@endif	
					</div>
					
						<div  class="col-lg-6 col-md-12 col-12">
							<div  class="addbx mb0 showdesktop">
								<div  class="addnew pointer">
								<a href="/checkoutPopups?showmodal=true "  data-toggle="modal" data-target="#ProductCheckoutModelPopups">
									<span  class="fa fa-plus-circle f50"></span>
									<p>Add New Address</p>
								</a>
								</div>
							</div>
						</div>
					</div>
					<!---->
				</div>
			</div>
			<div  class="col-lg-4 col-md-4 col-sm-12 col-12">
				<div  class="checkout_rightside">
					<div  class="billingdetails">
						<div>
							<div class="headingregular common-color"> Billing Details</div>
							<div class="sidebox">
								<ul>
									<li>Cart Total <span class="font-bold">Rs.{{$product + 0}}</span></li>
									<li>Discount Coupon <span> 0 </span></li>
									<!---->
									<li>Reward Points <span> 0 </span></li>
									<li>Gift Voucher <span> 0 </span></li>
									<li>Gift Wrap<span> 0 </span></li>
									<li>Shipping Charges
										<!---->
									</li>
									{{--<li>GST<span data-v-19d9842e="">Rs. 25</span></li>--}}
									<li class="font-bold">Total Payable<span data-v-19d9842e="">Rs.{{$product + 0}}</span></li>
								</ul>
							</div>
						</div>
					</div>
					<div  class="clearfix"></div>
					<div  class="mbstickyfooter">
						<button  id="con_payment" class="btn btn-primary btn-lg btn-block pointer text-uppercase">Continue to Payment</button>
					</div>
				</div>
			</div>
		</div>
	</div>  
  </div>
  <!-- END PAGE CONTENT --> 
  
<script>


	/* Edit Book Address */
	$(document.body).on('click', '.EditAddress', function() {
		var addressId = $(this).data('id');
		$.ajax({
			url:  JS_args.BASE_URL+'/edit-address-form',
			type: 'GET',
			dataType: 'html',
			data: {
				'address_id' : addressId
			},
			beforeSend: function() {
				//$(".addressHolder").prepend('<div class="bodypageloader"></div>');
				$(".bodypageloader").show();
			},
			success: function(response) {
				$(".bodypageloader").hide();
				$(document.body).find('#editAddresss_body').html(response)
				$('#editUserAddress').modal('show');
			},
			error:function(err) {
				$(".bodypageloader").hide();
			}
		});
	});
	/*End Edit Book Address */

	/* Delete Book Address */
	
	$(document).ready(function(){
		$('body').on('click', '.DeleteAddressBook', function() {
			var id = $(this).data('id');	
			console.log(id);
			$('#delete_address_book_confirm').attr('data-id',id);	
		});
		
		$('body').on('click', '#delete_address_book_confirm', function() {
			var address_id = $('#delete_address_book_confirm').attr('data-id');
			$('#delete_address_book_confirm').attr('data-id','')
			$.ajax({
				type:'POST',
				data: {"_token": JS_args._token,"id":address_id},
				url:'/delete-address-book',
				dataType: 'json',
				beforeSend: function() {
					$(".modal-content").prepend('<div class="bodypageloader"></div>');
				},
				success:function(response){
					$(".bodypageloader").hide();
					$('#delete_address__id_'+response.id).remove();
					$('.close_modal').click();
				},
				error:function(err) {
					$(".bodypageloader").hide();
				}
			});
		});
	});
	/*End delete Book Address */
</script>
@endsection

