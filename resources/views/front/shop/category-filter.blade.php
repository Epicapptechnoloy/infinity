
<div class="col-md-12 pd-15 responsive_none">
	<nav id="primary-menu">
	
		<ul class="main-menu text-center pull-right">
		
			<li><a href="/">Home</a> </li>
			
			<li class="mega-parent"><a href="javascript:void(0);">Customised Gifts </a>
				<div class="mega-menu-area clearfix bg_menu_">
					<div class="mega-menu-link f-left">
						@if(!empty($Categories))
						@foreach($Categories as $cat)
						<ul class="single-mega-item">
							<li class="menu-title">{{$cat->name}}</li>
							@if(!empty($cat->SubCategory))
							@foreach($cat->SubCategory as $sc)
							<li><a href="{{Route('shop')}}">{{$sc->name}}</a></li>
							@endforeach
							@endif
						</ul>
						@endforeach
						@endif
					</div>
				</div>
			</li>
			
		
			<li class="mega-parent"><a href="javascript:void(0);">Mobile Covers </a>
				<div class="mega-menu-area mega-menu-area-2 clearfix" style="padding-top:15px !important;">
					<div class="mega-menu-link mega-menu-link-2  f-left">
						<ul class="single-mega-item">
							<li><a href="shop.html">Apple</a></li>
							<li><a href="shop.html">Samsung</a></li>
							<li><a href="shop.html">Xiaomi</a></li>
							<li><a href="shop.html">Vivo</a></li>
							<li><a href="shop.html">Sony</a></li>
							<li><a href="shop.html">OnePlus</a></li>
							<li><a href="shop.html">Motorola </a></li>
							<li><a href="shop.html">Micromax </a></li> 
						</ul>										
							 
					</div>
				</div>
			</li>
			<li><a href="javascript:void(0);">T-Shirts  </a>
				<ul class="dropdwn men_t_shirt">
					<li>
						<a href="shop.html">Men</a> 
					</li>
					<li>
						<a href="shop.html#">Women</a>
					</li>
					<li>
						<a href="shop.html">Sets</a>
					</li> 
				</ul>
			</li>
			<li>
				<a href="shop.html">Office Stationary</a>
			</li>
			<li>
				<a href="Personalized.html">Paintings  </a>
				<!--<ul class="dropdwn men_t_shirt">
					<li><a href="cover-print.html">Mobile Covers</a></li>
					<li><a href="Personalized-mugs.html">Mugs</a></li>
					<li><a href="Personalized-tshirt.html">T-Shirts</a></li> 
					<li><a href="stone-plate.html">Stone Plates</a></li> 
					<li><a href="towbels&bathrobes.html">Towels & Bathrobes</a></li> 
				</ul>	--->								
				
			</li>
			
			<li>
				<a href="#">Daily Offers  </a>
			</li>		
			<li>
				<a href="#">Other Products  </a>
			</li>								
		</ul>
	</nav>
</div>