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

			<div class="col-md-9 col-sm-8 col-xs-12" id="storeProductList">
								
			</div>
				
			</div> 
		</div> 
	</div> 
	<!-- END PAGE CONTENT -->
	
<script> 
$.fn.getProductListAjax = function(url) { 
	var searchdata = "_token="+JS_args._token;
	if($.trim($("#formtype").val()) == "1"){
		searchdata = $("#storeSearchForm").serialize();
	}else if($.trim($("#formtype").val()) == "2"){
		searchdata = $("#storeFilterForm").serialize();
	}
	 
	$('.playerInfoContainer').show();
	$.ajax({
		url: url,
		method: 'post',
		dataType: 'html',
		data: searchdata
	}).done(function (data) {
		$('.playerInfoContainer').hide();
		$('#storeProductList').html(data);
	}).fail(function () {
		$.fn.alert('Alert','product could not be loaded.', 'Close');
	});
}
$(document).ready(function () {
	$("ul.tab-links li a").click(function() {
		$("ul.tab-links li").removeClass("active");
		$(this).parent().addClass("active");
	}); 
	
	$.fn.getProductListAjax("{{ route('getproducts') }}");
	$("#storeSearch").on("click", function(){
		$("#formtype").val("1")
		$.fn.getProductListAjax("{{ route('getproducts') }}");
	});
	$(".filtersearch").on("click", function(){
		$("#formtype").val("2")
		var filtertype = $(this).data('filter');
		$("#product"+filtertype).val($(this).data('id'));
		$.fn.getProductListAjax("{{ route('getproducts') }}");
	});
	$("#productprice").on("change", function(){
		$("#formtype").val("2")
		$.fn.getProductListAjax("{{ route('getproducts') }}");
	});
	
}); 	
</script>

@endsection

