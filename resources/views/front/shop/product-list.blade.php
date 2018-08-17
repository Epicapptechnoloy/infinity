
	<div class="shop-content"> 
		<div class="shop-content"> 
			<div class="row">
				@if(count($products)>0)
				@foreach($products as $kp => $p)
				
					@php
						if($p->image)
							$path ='/uploads/product/image/'.$p->image ; 
						else
							$path = 'images/No-Image-Basic.png';
					@endphp
				
				<div class="col-md-4 col-sm-6 col-xs-12">
					<div class="shop-product item">
					
						<div class="product-box">
							@if($p->image)
							<a href=""><img src="{{URL::asset($path) }}" alt=""></a>
							@endif
							<a href="/product/{!! str_replace(' ','-',$p->name) !!}/{!! base64_encode($p->product_id) !!}">
								<div class="cart-overlay">
								</div>
							</a>
							<span class="sticker new"><strong>NEW</strong></span>
						</div>
						<div class="product-info">
							<h4 class="product-title"><a href="#">{{$p->name}}</a></h4>
							<div class="align-items">
								<div class="pull-left">
									<span class="price">{{$p->price}}</span>
								</div>
							</div>
						</div>
					</div>
				</div>
				@endforeach
				
				@else
				<div class="col-md-12 text-center"><span class="NoProductfnd">No product found...</span></div>	
				
				@endif	
				
			</div> 
		</div>
	</div>
	
<div class="pagination ProductPagination">
	{{ $products->links() }}
</div>
	



<script>
$(document).ready(function () {
	$('#storeProductList .pager a').on('click', function(event) {
		event.preventDefault();
		$.fn.getProductListAjax($(this).attr('href'))
	});	
});
</script>
<script>
            /* ONCLICK ACTIVE CLASS */
	$("ul.tab-links li a").click(function() {
		$("ul.tab-links li").removeClass("active");
		$(this).parent().addClass("active");
	});			
		
</script>
<script>
            /* ONCLICK PRODUCT ACTIVE CLASS */
	$("ul.product-cat li a").click(function() {
		$("ul.product-cat li").removeClass("active");
		$(this).parent().addClass("active");
	});	
</script>
<script>
            /* ONCLICK COLOR ACTIVE CLASS */
	$("ul.Product_Color li a").click(function() {
		$("ul.Product_Color li").removeClass("active");
		$(this).parent().addClass("active");
	});	
</script>
<script>
            /* ONCLICK COLOR ACTIVE CLASS */
	$("ul.Product_size li a").click(function() {
		$("ul.Product_size li").removeClass("active");
		$(this).parent().addClass("active");
	});	
</script>