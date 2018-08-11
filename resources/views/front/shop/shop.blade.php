@extends('layouts.master')

@section('content')

<!-- HEADER BANNER WRAPPER -->
	<div class="banner-container my-banner sldrfullpge responsive_none">
		<div id="banner-wrapper" class=""> 
			<div class="porto-block ">
				<div class="vc_row wpb_row row vc_custom_1516702364064 vc_row-has-fill">
					<div class="vc_column_container col-md-12">
						<div class="wpb_wrapper vc_column-inner">
							<div class="porto-container container pd-15">
								<div class="wpb_text_column wpb_content_element  vc_custom_1492686264183">
									<div class="wpb_wrapper">
										<p><strong><span style="color: #1e3636; font-weight: bold;">
										<span style="font-size: 18px;">
										CHECK OUR OVER</span> 
										<span style="font-size: 26px;">200+</span></span></strong>
										</p>
									</div>
								</div>
								<h2 class="vc_custom_heading">incredible deals</h2>
								<div class=" porto-btn-ctn-left ">
									<a class="porto-btn"><span class="porto-btn-data porto-btn-text">SHOP NOW</span></a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="vc_row-full-width vc_clearfix"></div>
			</div>
		</div>
	</div>
	<!-- END HEADER BANNER WRAPPER -->
	
	<!-- RESPONSIVE HEADER BANNER WRAPPER -->
	<div class="sldrfullpge deskto-none">
		<div class="respnsiveBnr">
		   <img src="{{ asset('uploads/banner/image/baneer-responsive.jpg') }}" alt="" />
		</div>
	</div>
	<!-- END RESPONSIVE HEADER BANNER WRAPPER -->	
 
 
	<!-- PAGE TITLE -->
    <section class="product-detail">
	    <div class="container pd-15">
		
			<div class="row">
			    <div class="col-md-12">
				    <ul class="breadcrumb">
                        <li> <a href="/"> <i class="fa fa-home"></i>Home</a></li>
                        <li class="active">Shop Categories</li>
                    </ul>
				</div>
			</div>
		</div> 
	</section>	
	<!-- /PAGE TITLE -->


<!-- PAGE CONTENT -->
	<div class="product-area">
		<div class="container pd-15">
			<div class="row">
			@include('front.shop.side-filters')

				<div class="col-md-9 col-sm-9 col-xs-12">
					<div class="shop-content"> 
						<div class="shop-content"> 
							<div class="row">
								@if(count($products)>0)
								@foreach($products as $p_data)
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="shop-product item">
									@php $path = '/uploads/product/image/'.$p_data->image ; 
									@endphp 
										<div class="product-box">
											@if($p_data->image)
											<a href="#"><img src="{{URL::asset($path) }}" alt=""></a>
											@endif
											<div class="cart-overlay">
											</div>
											<span class="sticker new"><strong>NEW</strong></span>
										</div>
										<div class="product-info">
											<h4 class="product-title"><a href="#">{{$p_data->name}}</a></h4>
											<div class="align-items">
												<div class="pull-left">
													<span class="price">{{$p_data->price}}</span>
												</div>
												<div class="pull-right">
													<div class="reviews-icon">
														<i class="i-color fa fa-star"></i>
														<i class="i-color fa fa-star"></i>
														<i class="i-color fa fa-star"></i>
														<i class="i-color fa fa-star"></i>
														<i class="fa fa-star-o"></i>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@endforeach
								@endif
								
								
							</div> 
						</div>
					</div>
					
					<!-- PAGINATION -->
					<div class="pagination">
						<div class="results-navigation pull-left">
							<span>Showing: 1 - 6 Of 17</span>
						</div>
						<nav class="navigation pull-right">
							<a class="next-page" href="javascript:void(0);"><i class="fa fa-angle-left"></i></a>
							<span class="current page-num">1</span>
							<a class="page-num" href="javascript:void(0);">2</a>
							<a class="page-num" href="javascript:void(0);">3</a>
							<div class="divider">...</div>
							<a class="next-page" href="javascript:void(0);"><i class="fa fa-angle-right"></i></a>
						</nav>
					</div>
					<!-- END PAGINATION -->
					
				</div>
			</div> 
		</div> 
	</div> 
	<!-- END PAGE CONTENT -->
	


@endsection

