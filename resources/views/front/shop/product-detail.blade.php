@extends('layouts.master')

@section('content')

	@php 
	
		if($product->image)
			$imgUrl ='/uploads/product/image/'.$product->image ; 
			
		else
			$imgUrl = 'images/No-Image-Basic.png';
		
		if(count($product->getReviews) > 0){
			$TotalReviews = $product->getReviewsTotal[0]->total;
			$reviewCount = count($product->getReviews);
		$ReviewAVg = $TotalReviews/$reviewCount;}
		else
			$ReviewAVg = 0;
	@endphp

	<!-- ACCOUNT PAGE BANNER -->
	<div class="notification-section notification-img-1 notification-padding-1 sldrfullpge">
		<div class="container pd-15">
			<div class="notification-wrapper">
				<div class="notification-content">
					<p>Click And Get Mobile App ! 
						<a href="javascript:void(0);">DOWNLOAD THE APP</a>
						<span class="app_donwld"> 
							<a target="_blank" href="javascript:void(0);">
							   <img src="img/app_android_v1.png" alt="No-Img" alt="">
							</a>
							<a rel="nofollow" target="_blank" href="javascript:void(0);">
								<img src="img/app_ios_v1.png" alt="">
							</a> 
						</span>					
					</p> 
						
				</div> 
			</div>
		</div>
	</div>	
	<!-- END ACCOUNT PAGE BANNER -->
	
   <!-- BREADCRUMB -->
	<div class="container pd-15">
	
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li> <a href="/"> <i class="fa fa-home"></i>Home</a></li>
					<li class="active">Product Detail</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- END BREADCRUMB -->
	
	<!-- PAGE CONTENT -->  
		<div class="container pd-15">
			<div class="row">
				<div class="col-md-4 col-sm-6 col-xs-12">
					<!---product detail slider--->
					<img src="{{ URL::asset($imgUrl) }}" alt="">
					
				</div> 
				<!---end product detail slider--->
				<div class="col-md-8 col-sm-6 col-xs-12 mb-40">
					<div class="product-details section">
						<!-- Title -->
						<h1 class="title">{{ ucfirst($product->name) }}</h1>
						<!-- Price Ratting -->
						@if(count($reviews) > 0)
							<div id="rateYo"></div>					
						@endif	
						
						<div class="availability">
						
							@if($product->quantity > 0)
								Availability: <span class="availabilitycolor">In stock<i class="fa fa-check"></i></span>
							@else
								Not Available
							@endif	
						</div>
						
						<div class="price style-2">{{ ($product->price + 0) }}</div>
						
						
						<!-- Short Description -->
						<div class="short-desc section">
							<h5 class="pd-sub-title">Quick Overview</h5>
					        @if($product->description != NULL)
							<p>{!! $product->description !!}</p>
							@endif
						</div>
						<div class="row mr-15-right-left">
						<form action="" id="productCheckForm">
							{{ csrf_field() }}
							<input type="hidden" name="productId" id="productId" value="{{ $product->product_id }}"/>
							<div class="col-md-4">
							
								<!-- Product Size -->
								<div class="color-list section">
									<h5 class="pd-sub-title">Select Color</h5>
									@if(count($productColors) > 0)
									@foreach($productColors as $p_color)
										<ul class="select" id="color">
											<input type="radio" name="color" value="{!! $p_color->color_name !!}" checked />{{ $p_color->color_name}} <br />
										</ul>
									@endforeach
									@endif
								</div>
								<!-- Product Color -->
								<div class="product-size section">
									<h5 class="pd-sub-title">Select Size</h5>
									@if(count($productSizes) > 0)
									@foreach($productSizes as $p_size)
									<div class="select" id="size">
										<input type="radio" name="size" value="{!! $p_size->size_name !!}" checked />{{ $p_size->size_name}} <br/>
									</div>
									@endforeach
									@endif
								</div>
								
								<div class="product-size section">
									<span class="titledetl">quantity</span>
									<div class="input-group quantity-box">	
										<div class="input-group-btn">
											<span class="btn min button cl-decrease">-</span>
										</div>
										<input type="text" name="qty" id="qty" value="1" maxlength="3"/>
										
										<div class="input-group-btn">
											<span class="btn plus button cl-increase">+</span>
										</div>
									</div>
								</div>
							
							</div>
						</form>
						</div>
						<a class="btn pull-left" href="javascript:void(0);" id="proceed_to_checkout"> <span id="">Add To Cart </span> </a>
						
					</div>
				</div>
			</div>
		</div>
		<div class="container pd-15">
			<div class="row">
				<!-- Nav tabs -->
				<div class="col-xs-12">
					<ul class="pro-info-tab-list section">
						<li class="active"><a href="#more-info" data-toggle="tab" aria-expanded="true">Product Description</a></li>
						<li class=""><a href="#data-sheet" data-toggle="tab" aria-expanded="false">Product Details</a></li>
						<li class=""><a href="#reviews" data-toggle="tab" aria-expanded="false">Reviews</a></li>
					</ul>
				</div>
				<!-- Tab panes -->
				<div class="tab-content col-xs-12">
					<div class="pro-info-tab tab-pane active" id="more-info">
						<p>{{ $product->description }}</p>
					</div>
					<div class="pro-info-tab tab-pane" id="data-sheet">
						<table class="table-data-sheet">
							<tbody>
								<tr class="odd">
									<td>Category</td>
									<td>{{$product->getCategory->name}}</td>
								</tr>
								<tr class="odd">
									<td>Price</td>
									<td>{{ ($product->price + 0) }}</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="pro-info-tab tab-pane" id="reviews">
						
					</div>
				</div>		
			</div>			
		</div>
		
	<!-- RELATED PRODUCTS -->
<script>
	$.fn.checkStoreLogin = function() {
		$.ajax({
			url: '{{ route("checkLogin") }}',
			method: 'post',
			dataType: 'json',
			data: $("#productCheckForm").serialize()
			
		}).done(function (response) {
			console.log(response.success);
			if(response.success){
				if(response.status == 401){
				
					window.location.href = '{{ route("auth-process") }}';
				
				}else{
					window.location.href = '{{ route("auth-process") }}';
					
				}
			}else{
				$.fn.alert('Unable to checkout',response.message, 'Close');
			}		
		}).fail(function () {
			$.fn.alert('Alert','Unable to checkout.', 'Close');
		});
	}

	$(document).ready(function () {
		
		$('#colorForm input').on('change', function() {
		   var color=$('input[name="color"]:checked', '#colorForm').val(); 
		});
		
		$('#sizeForm input').on('change', function() {
		   var size=$('input[name="size"]:checked', '#sizeForm').val(); 
		});
		
		$(".cl-increase").on("click", function(){
			var qty = parseInt($("#qty").val());
			if(qty <= 100){
				qty = qty + 1;
				$("#qty").val(qty);
			}		
		});
		$(".cl-decrease").on("click", function(){
			var qty = parseInt($("#qty").val());
			if(qty > 1){
				qty = qty - 1;
				$("#qty").val(qty);
			}		
			$("#hideDef").hide('');
		});	 
		
		$("#proceed_to_checkout").on("click", function(){
			$("#hideDef").html('Please wait... <i class="processRun fa fa-spinner fa-pulse"></i>');
			$.fn.checkStoreLogin();
		});
	}); 

	$(function () {
	 
	  $("#rateYo").rateYo({
		rating: <?php echo $ReviewAVg; ?>,
		readOnly: true
	  });
	 
	});	

	$(function () {
	 
	  $("#reviews").rateYo({
		rating: <?php echo $ReviewAVg; ?>,
		readOnly: true
	  });
	 
	});	
</script>

	
@endsection