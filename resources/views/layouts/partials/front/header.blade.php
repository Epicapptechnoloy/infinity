    <!---TOP-MAIN-HEADER--->
    <section class="header-menu"> 
        <div class="top-main-header">
            <div class="top-header-info res_space">
                <div class="container pd-15">
                    <div class="row mr15-right-left">

                        <div class="col-md-4 col-sm-4 col-xs-12">
							<div class="info-holder responsive_none"> 
								<div class="headersocial">
									<a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
									<a href="#" target="_blank" rel="nofollow"><i class="fa fa-google-plus"></i></a>
									<a href="#" target="_blank" rel="nofollow"><i class="fa fa-pinterest"></i></a>
									<a href="#" target="_blank" rel="nofollow"><i class="fa fa-snapchat"> </i></a>
									<a href="#" target="_blank" rel="nofollow"><i class="fa fa-apple"> </i></a>
									<a href="#" target="_blank"><i class="fa fa-android"></i></a>
								</div>
                            </div>
                        </div>

                        <div class="col-md-6 col-sm-6 col-xs-4 responsive_none"> 
                        </div>

                        <div class="col-md-2 col-xs-12 col-sm-12">
                            <div class="cart-holder">
							   <span class="deskto-none logoresponsive responsive_none"><img src="{{ asset('assets/front/images/logo-footer.png') }} " alt=""></span>
							    <span class="menu-oppner deskto-none mbmenu-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
							    
								<ul class="main-cart">
									<a id="searchoppener" class="account-ink" href="javascript:void(0);"> 
											<i class="fa fa-search"></i> 
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
								
									@if (Auth::check())
										
										<li class="main-hvr"><a class="account-ink" href="#"> <i class="fa fa-user"></i> {{ ucfirst(Auth::user()->name) }} <span class="caret"></span></a>
											<ul class="down-nav">
												
												<li><a href="{!! url('/logout'); !!}"> <i class="fa fa-registered" aria-hidden="true"></i> &nbsp Logout </a></li> 
											</ul>
										</li>
									@else

										<li class="main-hvr"><a class="account-ink" href="#"> <i class="fa fa-user"></i>&nbsp Account<span class="caret"></span></a>
											<ul class="down-nav">
												<li><a href="{!! url('/auth-process'); !!}"> <i class="fa fa-sign-in" aria-hidden="true"></i> &nbsp Login</a></li>
												<li><a href="{!! url('/register'); !!}"> <i class="fa fa-sign-in" aria-hidden="true"></i> &nbsp Signup</a></li>
											</ul>
										</li>

									@endif
									<li><a class="shopping-cart" href="#"> <i class="fa fa-shopping-cart" aria-hidden="true"></i> </a></li>
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
                            <a href="index.html"><img src="{{ asset('assets/front/images/Raascals Logo.png') }}" alt="brand-logo" /></a>
                        </div>
                    </div>
				    <!-- primary-menu -->
					<div class="col-md-12 pd-15 responsive_none">
						<nav id="primary-menu">
							<ul class="main-menu text-center pull-right">
							
								<li><a href="index.html">Home</a> </li>
								
								<li class="mega-parent"><a href="javascript:void(0);">What's new</a> </li>
								
								<li class="mega-parent"><a href="shop.html">All Products  </a>
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
									<a href="shop.html">Paintings</a>
								</li>
								<li>
									<a href="Personalized.html">Personalized  </a>
									<ul class="dropdwn men_t_shirt">
										<li><a href="cover-print.html">Mobile Covers</a></li>
										<li><a href="Personalized-mugs.html">Mugs</a></li>
										<li><a href="Personalized-tshirt.html">T-Shirts</a></li> 
										<li><a href="stone-plate.html">Stone Plates</a></li> 
										<li><a href="towbels&bathrobes.html">Towels & Bathrobes</a></li> 
									</ul>									
									
								</li>
								
								<li>
									<a href="contact.html">Contact Us  </a>
								</li>								
							</ul>
						</nav>
					</div>				
				     <!-- primary-menu --> 
                </div>
            </div>
        </div>
    </section>
	<!-- MOBILE MENU -->
	
	
		<script> 
		$(function(){
			$(window).scroll(function(e) {
				if($(this).scrollTop()>150){
					$('.btntoTop').fadeIn(1000); // Fading in the button on scroll after 150px
				}
				else{
					$('.btntoTop').fadeOut(500); // Fading out the button on scroll if less than 150px
				}
			});

			$('.btntoTop').click(function(e) {
				$('body, html').animate({scrollTop:0}, 800);
			});
		});		
	</script>  
	<script>
		$(document).ready(function(){
		    $("#searcinput").hide(); 
			$("#searchoppener").click(function(){
				$("#searcinput").slideToggle();
			});
		});
    </script>
	
    <script> 
 		$(document).ready(function(){ 
			$(".menu-oppner").click(function(){
				$("#mb-main-menu").addClass("open-menu");
				$("#sitebodyoverlay").addClass("overlay_");
			});
		}); 
    </script> 
	
    <script> 
 		$(document).ready(function(){ 
			$("#close-mb-menu").click(function(){
				$("#mb-main-menu").removeClass("open-menu");
				$("#sitebodyoverlay").removeClass("overlay_");
			});
		}); 
    </script>	
	
    <script> 
	 	$(document).ready(function(){ 
			$(".parent").click(function(){
				var did = $(this).data('id');
				$(".parent").removeClass('test');
				$(this).addClass('test');
				$(".none_defoult").slideUp(500); 
				$("#"+did).slideDown(500); 
			});
		}); 
    </script>