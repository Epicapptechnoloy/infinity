   <!-- START HEADER --->
	<header>
		<!---TOP-MAIN-HEADER--->
		<section class="header-menu"> 
			<div class="top-main-header">
				<div class="top-header-info res_space">
					<div class="container pd-15">
						<div class="row mr15-right-left">

							<div class="col-md-4 col-sm-4 col-xs-12"> 
							</div>

							<div class="col-md-6 col-sm-6 col-xs-4 responsive_none"> 
							</div>

							<div class="col-md-2 col-xs-12 col-sm-12 pd-15R">
								<div class="cart-holder"> 
									<ul class="main-cart">
										<li class="main-hvr"> 
										   <a id="searchoppener" class="account-ink icondeflt" href="javascript:void(0);"> 
												<i class="fa fa-search"></i> 
												<i class="fa fa-close"></i> 
											</a>  
											<div id="searcinput" class="search-safari" style="display: block;">
												<div class="search-form dropdowSCContent">
													<form method="POST" action="#">
														<input type="text" name="search" placeholder="Search">
														<input type="submit" name="search" value="Search">
														<i class="fa fa-search"></i>
													</form>
												</div>
											</div>
											@if(empty(Auth::guard('frontUser')->user()))
											<span class="account-ink userAcnt">
												<a href="/login?showmodal=true " data-toggle="modal" data-target="#LoginModalPopups"> 
												<i class="fa fa-user-o"></i></a>
											</span>
											@else
											<span class="account-ink userAcnt">
											<i class="fa fa-user-o"></i>
												<ul class="arrowholdr">
													<span class="arrowUl"></span>
													<li>
														<i class="fa fa-user-circle" aria-hidden="true"></i> {{strtoupper(Auth::guard('frontUser')->user()->first_name)}}
													</li>
													<li>
														<i class="fa fa-user-circle" aria-hidden="true"></i> My Account 
													</li>
													<li>
														<i class="fa fa-first-order" aria-hidden="true"></i> Order 
													</li>
													<li>
														<i class="fa fa-heart" aria-hidden="true"></i> Wishlist
													</li> 
													<li>
														<i class="fa fa-archive" aria-hidden="true"></i> Rewards 
													</li> 
													<li>
														<i class="fa fa-bell" aria-hidden="true"></i> Notifications
													</li> 
													<li>
														<a href="{{route('user.logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
													</li> 												
												</ul>										
											</span>	
											@endif	
										</li> 
										<li>
											<a title="View Your Cart" class="shopping-cart" href="cart.html"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> </a>
										</li>
										<span class="cart-counter">0</span>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!---END TOP-MAIN-HEADER--->

			<!---MENU--->
			<div class="menu-area responsive_none">
				<div class="container">
					<div class="row">
						<div class="col-md-1 pd-15">
							<div class="brand-logo">
								
								<a href="index.html"><img src="{{ asset('assets/front/img/Infinity_Changed.png') }}" alt="brand-logo" /></a>
							</div>
						</div>
						<!-- primary-menu -->
						<div class="col-md-12 pd-15 responsive_none">
							<nav id="primary-menu">
								<ul class="main-menu text-center pull-right">
								
									<li><a href="index.html">Home</a> </li>
									 
									
									<li class="mega-parent"><a href="shop.html">Customised Gifts </a>
										<div class="mega-menu-area clearfix bg_menu_">
											<div class="mega-menu-link f-left">
												<ul class="single-mega-item">
													<li class="menu-title">GIFT ITEMS</li>
													<li><a href="shop.html">Pen</a></li>
													<li><a href="shop.html">Stone Plates</a></li>
													<li><a href="shop.html">Cushion Covers</a></li>
													<li><a href="shop.html">Towels & Bathrobes</a></li>
													<li><a href="shop.html">Shot Glasses</a></li>
													<li><a href="shop.html">Gift Tags</a></li>
													<li><a href="shop.html">Sagan Envelopes</a></li>
												</ul>
												<ul class="single-mega-item">
													<li class="menu-title">CORPORATE</li>
													<li><a href="shop.html">Diary & Calenders</a></li>
													<li><a href="shop.html">Trophies</a></li>
													<li><a href="shop.html"> Pens & Keychains</a></li> 							
													<li><a href="shop.html">Pendrive</a></li>
													<li><a href="shop.html">Desktop Items</a></li>
													<li><a href="shop.html">Pendrive</a></li>    
													<li><a href="shop.html">Laptop Bags</a></li> 
												</ul>
												
												<ul class="single-mega-item">
													<li class="menu-title">LEATHER ITEMS</li>
													<li><a href="shop.html">Key Chains</a></li>
													<li><a href="shop.html">Folders & Wallets</a></li>
													<li><a href="shop.html">Bags</a></li> 
													<li class="menu-title">Mugs</li>
													<li><a href="shop.html">Magic</a></li>
													<li><a href="shop.html">Coloured</a></li>
												</ul>
												
											</div>
											<!---<div class="mega-menu-photo f-left">
												<a href="javascript:void(0);">
													<img src="img/block_menu.jpg" alt="mega menu image">
												</a>
											</div>--->
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
												<ul class="single-mega-item">
													<li><a href="shop.html">Lenovo  </a></li> 
													<li><a href="shop.html">LeEco </a></li> 
													<li><a href="shop.html">Huawei </a></li> 
													<li><a href="shop.html">HTC </a></li> 
													<li><a href="shop.html">Gionee </a></li> 
													<li><a href="shop.html">Coolpad </a></li> 
													<li><a href="shop.html">Coolpad </a></li> 
													<li><a href="shop.html">Gionee </a></li> 
												</ul> 	 
											</div>
										</div>
									</li>
									<li><a href="#">T-Shirts  </a>
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
						 <!-- primary-menu --> 
					</div>
				</div>
			</div>
			
			<div class="col-md-12 pd-15 deskto-none bgwhite">
				<div class="menuopner_logo">
					<span class="respnsivelogo"><img src="{{ asset('assets/front/img/Infinity_Changed.png') }}" alt="brand-logo" /></span>
					<span class="menu-oppner deskto-none mbmenu-icon  pull-right"><i class="fa fa-bars" aria-hidden="true"></i></span>
				</div> 
			</div> 		
		</section> 
		<!-- MOBILE MENU --> 
		<div id="sitebodyoverlay"></div>
		<nav id="mb-main-menu" class="main-menu">
			<div class="mb-menu-title">
				<h3>Navigation</h3>
				<span id="close-mb-menu">
					<i class="fa fa-times-circle"></i>
				</span>
			</div>
			<ul  class="cate_list">
				<li data-id="first-slide" class="level0 parent col1 all-product">
					<a class="acc-btn active" href="#">
						<span>All Product</span>
						<i class="fa fa-chevron-down"></i><i class="fa fa-chevron-right"></i>
					</a>
					<ul id="first-slide" class="level0 none_defoult">
						<li class="level1">
							<a href="shop.html" title="Business Card">T-Shirt</a>
						</li>
						<li class="level1">
							<a href="#" title="Premium Business Card">Premium Business Card</a>
						</li>
						<li class="level1">
							<a href="#" title="Free Business Card">Free Business Card</a>
						</li>
						<li class="level1">
							<a href="#" title="Marketing Materials">Marketing Materials</a>
						</li>
						<li class="level1">
							<a href="#" title="Dance Marketing Kit">Dance Marketing Kit</a>
						</li>
						<li class="level1 view-all-pro">
							<a href="#" title="view all product">View all</a>
						</li>
					</ul>
				</li>
				<li data-id="second-slide" class="level0 parent col1">
					<a class="acc-btn active" href="#" title="Business Cards">
						<span>Business Cards</span>
						<i class="fa fa-chevron-down"></i><i class="fa fa-chevron-right"></i>
					</a>
					<ul id="second-slide" class="level0 none_defoult">
						<li class="level1 nav-1-1 first item">
							<a href="#" title="Premium Business Cards">Premium Business Cards</a>
						</li>
						<li class="level1 nav-1-2 item">
							<a href="#" title="Free Business Cards">Free Business Cards</a>
						</li>
						<li class="level1 nav-1-3 item">
							<a href="#" title="Die-Cut Business Cards">Die-Cut Business Cards</a>
						</li>
						<li class="level1 nav-1-4 item">
							<a href="#" title="Standard Business Cards">Standard Business Cards</a>
						</li>
						<li class="level1 nav-1-5 item">
							<a href="#" class="Personal Business Cards">Personal Business Cards</a>
						</li>
						<li class="level1 nav-1-6 item">
							<a href="#" title="Business Card Holders">Business Card Holders</a>
						</li>
						<li class="level1 nav-1-7 item">
							<a href="#" title="Networking Cards">Networking Cards</a>
						</li>
						<li class="level1 nav-1-8 item">
							<a href="#" title="Appointment Cards">Appointment Cards</a>
						</li>
						<li class="level1 nav-1-9 last item">
							<a href="#" title="Mommy Cards">Mommy Cards</a>
						</li>
					</ul>
				</li>
				<li class="level0">
					<a href="category_grid.html" title="Marketing">Marketing</a>
				</li>
				<li class="level0">
					<a href="#" title="Postcards">Postcards</a>
				</li>
				<li class="level0">
					<a href="#" title="Stickers & Badges">Stickers & Badges</a>
				</li>
				<li class="level0" title="Promotional">
					<a href="#">Promotional</a>
				</li>
			</ul>
		</nav> 	
		<!-- END MOBILE MENU --> 
		<!---/HEADER MENU--->
	</header>
	<!-- END HEADER --->
	
