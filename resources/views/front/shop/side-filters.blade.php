<div class="col-md-3 col-sm-3 col-xs-12">
	<div class="widget-search mb-30">
		<form action="#">
			<input class="form-control" placeholder="Search here..." type="text">
			<button type="submit">
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
				<ul id="accordion-category" class="product-cat">
					<li class="panel">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-category" href="#category1">Fashion <span><i class="fa fa-angle-down"></i></span></a>
						<div id="category1" class="panel-collapse collapse">
							<ul class="listSidebar">
								<li><a href="#">Men</a></li>
								<li><a href="#">Women</a></li>
								<li><a href="#">Bag</a></li>
							</ul>
						</div>
					</li>
					<li class="panel">
						<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-category" href="#category2">Trending <span><i class="fa fa-angle-down"></i></span></a>
						<div id="category2" class="panel-collapse collapse">
							<ul class="listSidebar">
								<li><a href="#">Cups</a></li>
								<li><a href="#">Beauty</a></li>
								<li><a href="#">Flowerpot</a></li>
							</ul>
						</div>
					</li>
				
				</ul>
			</div>
			<div class="widget-ct widget-color mb-30">
				<div class="widget-s-title">
					<h4>Color</h4>
				</div>
				<div class="widget-info color-filter clearfix">
					<ul>
						<li><a href="#"><span class="color color-1"></span>LightSalmon<span class="count">12</span></a></li>
						<li><a href="#"><span class="color color-2"></span>Dark Salmon<span class="count">20</span></a></li>
						<li><a href="#"><span class="color color-3"></span>Tomato<span class="count">59</span></a></li>
						<li class="active"><a href="#"><span class="color color-4"></span>Deep Sky Blue<span class="count">45</span></a></li>
						<li><a href="#"><span class="color color-5"></span>Electric Purple<span class="count">78</span></a></li>
						<li><a href="#"><span class="color color-6"></span>Atlantis<span class="count">10</span></a></li>
						<li><a href="#"><span class="color color-7"></span>Deep Lilac<span class="count">15</span></a></li>
					</ul>
				</div>
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
							<input id="range-slider" type="range" min="0" max="100" step="10" value="0">
						</div> 
					</div>
			
				</div> 
			</div>
			<div class="widget-ct widget-size mb-30">
				<div class="widget-s-title">
					<h4>Size</h4>
				</div>
				<div class="widget-info size-filter clearfix">
					<ul>
						<li><a href="#">M</a></li>
						<li class="active"><a href="#">S</a></li>
						<li><a href="#">L</a></li>
						<li><a href="#">SL</a></li>
						<li><a href="#">XL</a></li>
					</ul>
				</div>
			</div>
			
		</form>
	</div>
</div>