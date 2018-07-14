	@extends('layouts.master')

	@section('content')
	
	<!-- PAGE BANNER -->
	
    <section class="product-detail">
	    <div class="container pd-15">
			<div class="row">
			    <div class="col-md-12">
				    <ul class="breadcrumb">
                        <li> <i class="fa fa-home"></i> <a href="/RaascalNew/home">Home</a></li>
                        <li class="active">Product Details</li>
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
							<h2 class="block-title">PRODUCT DETAILS</h2> 
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
		<div class="container pd-15">
			<div class="row pt-100 small-pb">
			<div class="col-md-4 col-sm-6 col-xs-12">
				<!---product detail slider--->
				<div class="slide-left">  
					<div class="container">
						<div class="row">
						@if(!empty($products))
							<?php //echo"<pre>"; print_r($products); die;  ?>
							<div class=" col-sm-4 col-xs-4"> 
								<div id='carousel-custom' class='carousel slide' data-ride='carousel'>
									<div class="control-holder">
										@php 
											$path = 'public/assets/front/images/deatail-slide_1.jpg' ; 
										@endphp
										<?php //echo $path; die;  ?>
										<div class='carousel-outer'>
											<!-- me art lab slider -->
											<div class='carousel-inner '>
												<div class='item active' id="1">
													<img src="{{URL::asset($path) }}" alt=''id="zoom_05" />
												</div>
												<div class='item'  id="zoom_05">
													<img src="{{URL::asset($path) }}" alt=''  />
												</div>
												<div class='item'id="2">
													<img src="{{URL::asset($path) }}" alt='' />
												</div>
													
												<div class='item'id="3">
													<img src="{{URL::asset($path) }}" alt=''id="zoom_05"/>
												</div>
												
												<!-- <script>
													$("#zoom_05").elevateZoom({ zoomType    : "inner", cursor: "crosshair" });
												</script> -->
											</div>  					
										</div>
									
									<!-- thumb -->
									<!--<ol class='carousel-indicators mCustomScrollbar meartlab'>
										<li data-target='#carousel-custom' data-slide-to='0' class='active'><img src="{{ asset('public/assets/front/images/deatail-slide_1.png') }} " alt=""  ></li>
										<li data-target='#carousel-custom' data-slide-to='1' class=''><img src="{{ asset('public/assets/front/images/deatail-slide_1.png') }} " alt=""  ></li>
										<li data-target='#carousel-custom' data-slide-to='2' class=''><img src="{{ asset('public/assets/front/images/deatail-slide_1.png') }} " alt=""  ></li>
										<li data-target='#carousel-custom' data-slide-to='3' class=''><img src="{{ asset('public/assets/front/images/deatail-slide_1.png') }} " alt=""  ></li>
										</ol>-->	
									
									<!-- sag sol --> 
										<a class='left carousel-control' href='#carousel-custom' data-slide='prev'>
											<span class="arrow-slide"><i class="fa fa-angle-left" aria-hidden="true"></i></span>
										</a>
										<a class='right carousel-control' href='#carousel-custom' data-slide='next'>
											<span class="arrow-slide"><i class="fa fa-angle-right" aria-hidden="true"></i></span>
										</a>
									</div>
								</div>
							</div>

								<!--<script type="text/javascript">

								$(document).ready(function() {
									$(".mCustomScrollbar").mCustomScrollbar({axis:"x"});
								});
								</script>-->
							@endif	
						</div> 
					</div> 
                </div> 
            </div> 
				
				<div class="col-md-8 col-sm-6 col-xs-12 mb-40">
					<div class="product-details section">
					
						@if(!empty($products))
						<?php //dd($products); ?>
						
						<!-- Title -->
						<h1 class="title">{{ucfirst($products->name)}}</h1>
						<!-- Price Ratting -->
							<div class="price-ratting section">
								<!-- Price -->
								<span class="price float-left"><span class="new">{{$products->price}}</span></span>
								</br>
								
								<span><br>Model:  <b>{{$products->model}}</b></br></span> 
								<span><br>Price:   <b>{{$products->price}}</b></br></span> 
								<span><br>Weight:  <b>{{$products->weight}} gr</b></br></span>
								<span><br>Size:		<b>{{$products->length}}</b></br></span>
																<!-- Ratting -->
								<span class="ratting float-right">
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
									<i class="fa fa-star active"></i>
									<span> (01 Customer Review)</span>
								</span>
							</div>
						
						<!-- Short Description -->
						<div class="short-desc section">
							<h5 class="pd-sub-title">Quick Overview</h5>
					        <p>{{$products->description}} </p>
						</div>
						<!-- Product Size -->
					<form action="" method="post">
						{{ csrf_field() }}
						<input type="hidden" name="id" value="{{$products->id}}">
						<div class="product-size section">
							<h5 class="pd-sub-title">Select Size</h5>
							<label><input type="radio" name="size"  value="1">s</label>
							<label><input type="radio" name="size"   value="2">m</label>
							<label><input type="radio" name="size"   value="3">l</label>
							<label><input type="radio" name="size"    value="4">xl</label>
						</div>
						<div class="color-list section">
							<h5 class="pd-sub-title">Select Color</h5>
							<label><input type="radio"  name="color"  value="1">red</label>
							<label><input type="radio" name="color"   value="2">blue</label>
							<label><input type="radio" name="color"  value="3">white</label>
							<label><input type="radio" name="color"  value="4">gray</label>
						</div>
						<!-- Quantity Cart -->
						<div class="quantity-cart section">
							<div class="product-quantity">
								<input type="text" value="1">
								<span class="dec qtybtn"><i class="fa fa-angle-left"></i></span><span class="inc qtybtn"><i class="fa fa-angle-right"></i></span>
							</div>
								<button  id="btnGetValue" type="submit" class="add-to-cart"><i class="fa fa-circle-o-notch fa-spin" id="add_to_cart_hide" aria-hidden="true" ></a></i>add to cart</button>
						</div>
					</form>	
						<!-- Usefull Link -->
						<ul class="usefull-link section">
							<li><a href="#"><i class="fa fa-envelope" aria-hidden="true"></i> Email to a Friend</a></li>
							<li><a href="#"><i class="fa fa-heart" aria-hidden="true"></i> Wishlist</a></li>
							<li><a href="#"><i class="fa fa-print" aria-hidden="true"></i> print</a></li>
						</ul>
						<!-- Share -->
						<div class="share-icons section">
							<span>share :</span>
							<a href="#"><i class="fa fa-facebook"></i></a>
							<a href="#"><i class="fa fa-twitter"></i></a>
							<a href="#"><i class="fa fa-instagram"></i></a>
							<a href="#"><i class="fa fa-pinterest"></i></a>
						</div>
						
						@endif
					</div>
				</div>
			</div>
			
			<div class="row">
				<!-- Nav tabs -->
				<div class="col-xs-12">
					<ul class="pro-info-tab-list section">
						<li class="active"><a href="#more-info" data-toggle="tab" aria-expanded="true">More info</a></li>
						<li class=""><a href="#data-sheet" data-toggle="tab" aria-expanded="false">Data sheet</a></li>
						<li class=""><a href="#reviews" data-toggle="tab" aria-expanded="false">Reviews</a></li>
					</ul>
				</div>
				<!-- Tab panes -->
				<div class="tab-content col-xs-12">
					<div class="pro-info-tab tab-pane active" id="more-info">
						<p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
					</div>
					<div class="pro-info-tab tab-pane" id="data-sheet">
						<table class="table-data-sheet">
							<tbody>
								<tr class="odd">
									<td>Compositions</td>
									<td>Cotton</td>
								</tr>
								<tr class="even">
									<td>Styles</td>
									<td>Casual</td>
								</tr>
								<tr class="odd">
									<td>Properties</td>
									<td>Short Sleeve</td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="pro-info-tab tab-pane" id="reviews">
						<a href="#">Be the first to write your review!</a>
					</div>
				</div>		
			</div>			
		</div>
	</section>
	<!-- PAGE BANNER -->
	
	<!-- RELAITED PRODUCTS -->
	
		
		<!---carausale--->
	<section class="pt-100 pb-100">
		<div class="container pd-15">
			<div class="row text-center">
				<h2 class="title-pro">RELAITED PRODUCT</h2>
			</div>					
			<div class="resCarousel" data-items="2-4-4-4" data-interval="2000" data-slide="1" data-animator="lazy">
				<div class="resCarousel-inner"> 
					<div class="item">
					<img src="{{ asset('public/assets/front/images/deatail-slide_1.jpg') }} " alt=""  >
						<!--<img src="images/thumb5.jpg" alt="" />-->
							<div class="product__hover__info">
								<ul class="product__action product-image-action">
                                    <button type="button" class="gbtn" data-toggle="tooltip" data-placement="top"  title="Add to Cart!">  
									<i class="fa fa-shopping-cart"></i>
									<!--<span>Add to cart</span>-->
									</button>								
									<li><a href=" #" data-toggle="tooltip" data-placement="top"  title="Wishlist!"> <i class="fa fa-heart"></i></a> </li>
									
									<li><a href=" #" data-toggle="tooltip" data-placement="top"  title="Compare!"> <i class="fa fa-compress"></i></a></li> 
									<!-- fixcode quick view -->
									<li><a href="#" data-toggle="tooltip" data-placement="top"  title="Quickview!"> <i class="fa fa-eye"></i></a></li>
								</ul>
							</div>
						<div class="product-content_1">
							<h2 class="product-title_1"> <a href="#">{{$products->name}}</a> </h2>
							<span><b>{{$products->price}}</b></span> 
						</div>							
					</div>

					<div class="item">
					<img src="{{ asset('public/assets/front/images/deatail-slide_1.jpg') }} " alt=""  >
						<!--<img src="images/thumb5.jpg" alt="" />-->
							<div class="product__hover__info">
								<ul class="product__action product-image-action">
                                    <button type="button" class="gbtn" data-toggle="tooltip" data-placement="top"  title="Add to Cart!">  
									<i class="fa fa-shopping-cart"></i>
									<!--<span>Add to cart</span>-->
									</button>								
									<li><a href=" #" data-toggle="tooltip" data-placement="top"  title="Wishlist!"> <i class="fa fa-heart"></i></a> </li>
									
									<li><a href=" #" data-toggle="tooltip" data-placement="top"  title="Compare!"> <i class="fa fa-compress"></i></a></li> 
									<!-- fixcode quick view -->
									<li><a href=" #" data-toggle="tooltip" data-placement="top"  title="Quickview!"> <i class="fa fa-eye"></i></a></li>
								</ul>
							</div>	
						<div class="product-content_1">
							<h2 class="product-title_1"> <a href="#">{{$products->name}} </a> </h2>
							<span><b>{{$products->image}}</b></span> 
						</div>							
					</div>

					<div class="item">
						<img src="{{ asset('public/assets/front/images/deatail-slide_1.jpg') }} " alt=""  >
						
							<div class="product__hover__info">
								<ul class="product__action product-image-action">
                                    <button type="button" class="gbtn" data-toggle="tooltip" data-placement="top"  title="Add to Cart!">  
									<i class="fa fa-shopping-cart"></i>
									<!--<span>Add to cart</span>-->
									</button>								
									<li><a href=" #" data-toggle="tooltip" data-placement="top"  title="Wishlist!"> <i class="fa fa-heart"></i></a> </li>
									
									<li><a href=" #" data-toggle="tooltip" data-placement="top"  title="Compare!"> <i class="fa fa-compress"></i></a></li> 
									<!-- fixcode quick view -->
									<li><a href=" #" data-toggle="tooltip" data-placement="top"  title="Quickview!"> <i class="fa fa-eye"></i></a></li>
								</ul>
							</div>
						<div class="product-content_1">
							<h2 class="product-title_1"> <a href="#">{{$products->name}}</a> </h2>
							<span><b>{{$products->price}}</b></span> 
						</div>							
					</div>

					<div class="item">
						<img src="{{ asset('public/assets/front/images/deatail-slide_1.jpg') }} " alt=""  >
						
							<div class="product__hover__info">
								<ul class="product__action product-image-action">
                                    <button type="button" class="gbtn" data-toggle="tooltip" data-placement="top"  title="Add to Cart!">  
									<i class="fa fa-shopping-cart"></i>
									<!--<span>Add to cart</span>-->
									</button>								
									<li><a href=" #" data-toggle="tooltip" data-placement="top"  title="Wishlist!"> <i class="fa fa-heart"></i></a> </li>
									
									<li><a href=" #" data-toggle="tooltip" data-placement="top"  title="Compare!"> <i class="fa fa-compress"></i></a></li> 
									<!-- fixcode quick view -->
									<li><a href=" #" data-toggle="tooltip" data-placement="top"  title="Quickview!"> <i class="fa fa-eye"></i></a></li>
								</ul>
							</div>	
						<div class="product-content_1">
							<h2 class="product-title_1"> <a href="#">{{$products->name}} </a> </h2>
							<span><b>{{$products->price}}</b></span> 
						</div>							
					</div>

					<div class="item">
						<img src="{{ asset('public/assets/front/images/deatail-slide_1.jpg') }} " alt=""  >
						
							<div class="product__hover__info">
								<ul class="product__action product-image-action">
                                    <button type="button" class="gbtn" data-toggle="tooltip" data-placement="top"  title="Add to Cart!">  
									<i class="fa fa-shopping-cart"></i>
									<!--<span>Add to cart</span>-->
									</button>								
									<li><a href=" #" data-toggle="tooltip" data-placement="top"  title="Wishlist!"> <i class="fa fa-heart"></i></a> </li>
									
									<li><a href=" #" data-toggle="tooltip" data-placement="top"  title="Compare!"> <i class="fa fa-compress"></i></a></li> 
									<!-- fixcode quick view -->
									<li><a href=" #" data-toggle="tooltip" data-placement="top"  title="Quickview!"> <i class="fa fa-eye"></i></a></li>
								</ul>
							</div>
						<div class="product-content_1">
							<h2 class="product-title_1"> <a href="#">{{$products->name}}  </a> </h2>
							<span><b>{{$products->price}}</b></span> 
						</div>							
					</div>

					<div class="item">
					<img src="{{ asset('public/assets/front/images/deatail-slide_1.jpg') }} " alt=""  >
						
							<div class="product__hover__info">
								<ul class="product__action product-image-action">
                                    <button type="button" class="gbtn" data-toggle="tooltip" data-placement="top"  title="Add to Cart!">  
									<i class="fa fa-shopping-cart"></i>
									<!--<span>Add to cart</span>-->
									</button>								
									<li><a href=" #" data-toggle="tooltip" data-placement="top"  title="Wishlist!"> <i class="fa fa-heart"></i></a> </li>
									
									<li><a href=" #" data-toggle="tooltip" data-placement="top"  title="Compare!"> <i class="fa fa-compress"></i></a></li> 
									<!-- fixcode quick view -->
									<li><a href=" #" data-toggle="tooltip" data-placement="top"  title="Quickview!"> <i class="fa fa-eye"></i></a></li>
								</ul>
							</div>	
						<div class="product-content_1">
							<h2 class="product-title_1"> <a href="#">{{$products->name}} </a> </h2>
							<span><b>{{$products->price}}</b></span> 
						</div>							
					</div>

				</div>
				<button class='btn btn-default leftRs'><i class="fa fa-angle-left"></i></button>
				<button class='btn btn-default rightRs'><i class="fa fa-angle-right"></i></button>
			</div>
		</div> 
	</section>
		<!---/carausale--->	
	
	<!-- END RELAITED PRODUCTS -->
		
		
		
		<script>
			 $(document).ready(function () {
 
				$("#add_to_cart_hide").hide(); 
				
				$('#click_to_show').click(function(){ 		 
						$("#add_to_cart_hide").show();
					});
					
					
					
					$('#btnGetValue').click(function() {
						var size = $('input[name=size]:checked').val();
						var color = $('input[name=color]:checked').val();
						
						alert(size);
						alert(color);
						
						$.ajax({
							type:'POST',
							data: {"_token": $('meta[name="csrf-token"]').attr('content'),"size": size,"color": color},
							
							url:'/product',
								success:function(data){
									var obj = JSON.parse(data);
									$('.size').val(obj.size);
									$('.color').val(obj.color);
									//alert();
									$('#message').html('Your password has been  changed successfully.');
									$('#message').css('color','green');
									$('#message-box').show();				
									setTimeout(function() {$("#message-box").hide('blind', {}, 500)}, 3000);
								}
							});	
					});
				}); 
		</script>
		
	@endsection
