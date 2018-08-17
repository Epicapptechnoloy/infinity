<div class="Click_slide col-xs-12"><p class="FilterSearch"> <i class="" aria-hidden="true"></i></p></div>
<div class="SlideDownHolder"> 
<div class="col-md-3 col-sm-3 col-xs-12">
	<div class="widget-search mb-30">
		<form action="#" id="storeSearchForm">
			{{ csrf_field() }}
			<input class="form-control" placeholder="Search here..." type="text"  name="keyword" value="{{ (isset($request->keyword) && $request->keyword)?$request->keyword:''}}">
			<button type="button" id="storeSearch">
				<i class="fa fa-search"></i>
			</button>
		</form>
	</div>
	<div>
		<form action="#" id="storeFilterForm">
		{{ csrf_field() }}
			<div class="widget-ct widget-categories mb-30">
				<div class="widget-s-title">
					<h4>Categories</h4>
				</div>
				<div>
					@if(!empty($Categories))
					@foreach($Categories as $cat)
					<ul id="accordion-category" class="product-cat">
					
						<li class="panel">
							<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-category" href="#category_<?php echo $cat->category_id ?>">{{$cat->name}} <span><i class="fa fa-angle-down"></i></span></a>
							<div id="category_<?php echo $cat->category_id ?>" class="panel-collapse collapse">
								<ul class="listSidebar">
								@if(!empty($cat->SubCategory))
								@foreach($cat->SubCategory as $sc)
									<li><a class="accordion-toggle filtersearch" data-id="{{ $sc->sub_category_id }}" data-filter="subcategory" data-parent="#accordion-subcategory" href="#subcategory{{ $sc->sub_category_id }}">{{$sc->name}}</a></li>
								@endforeach
								@endif
								</ul>
							</div>
						</li>
					</ul>
					@endforeach
					@endif
				</div>
				<input type="hidden" name="subcategory" id="productsubcategory" value="{{ (isset($request->subcategory) && $request->subcategory != "")?$request->subcategory:'' }}" />
			</div>
			
			<div class="widget-ct widget-color mb-30">
				<div class="widget-s-title">
					<h4>Color</h4>
				</div>
				<div class="widget-info color-filter clearfix">
					<ul class="Product_Color">
						@if(!empty($productColors))
						@foreach($productColors as $pck => $pc) 
					
						<li><a href="javascript:void(0);"  class="filtersearch" data-id="{{ $pc->color_id }}"  data-filter="color"><span class="color" style="background:{{ $pc->color_code }}"></span>{{ $pc->color_name }}<span class="count">{{ $pc->color->count() }}</span></a></li>
						
						@endforeach
						@endif
					</ul>
				</div>
				<input type="hidden" name="color" id="productcolor" value="{{ (isset($request->color) && $request->color != "")?$request->color:'' }}" />
			</div>
			
			<div class="widget-ct widget-filter mb-30">
				<div class="widget-s-title">
					<h4>Filter By Price</h4>  
					<div class="price_main">
						<span class="h1" id="amount-label">
							<span class="pricing__dollar"><i class="fa fa-inr" aria-hidden="true"></i></span>
						</span>
						<br/>
						<br/> 
						<br/> 
						<div class="price_"> 
							<input type="range" min="{{ $minPrice}}" max="{{ $maxPrice + 10}}"  step="10" value="{{ $minPrice}}" name="price" id="productprice" data-filter="price" >
						</div> 
					</div>
			
				</div> 
			</div>
			
			<div class="widget-ct widget-size mb-30">
				<div class="widget-s-title">
					<h4>Size</h4>
				</div>
				<div class="widget-info size-filter clearfix">
					<ul class="Product_size">
					@foreach($productSizes as $psk => $ps)
						<li><a href="javascript:void(0);"  data-id="{{ $ps->size_id }}" data-filter="size" class="filtersearch">{{ $ps->size_name }}</a></li>
					@endforeach
					</ul>
				</div>
			</div>
			
			<input type="hidden" name="size" id="productsize" value="{{ (isset($request->size) && $request->size != "")?$request->size:'' }}" />
		</form>
	</div>
</div>
</div>
<input type="hidden" name="formtype" id="formtype" value="{{ (isset($formtype))?$formtype:'' }}" />
<script>
	$(document).ready(function(){
		$(".SlideDownHolder").addClass("hidden_resonsive");
		$(".FilterSearch").click(function(){
			$(".SlideDownHolder").slideToggle();
			var hsClass = $(this).hasClass('Iconrotate');
		if (hsClass) {
			$(this).removeClass('Iconrotate');
		} else {
			$(this).addClass('Iconrotate');
		}
		}); 
		
	});
</script>  
