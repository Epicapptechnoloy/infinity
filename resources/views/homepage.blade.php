@extends('layouts.master')

@section('content')



   <!-- FULL PAGE SLIDER -->
	<div class="sldrfullpge">  
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			<!-- Indicators -->
			<ol class="carousel-indicators">
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<li data-target="#myCarousel" data-slide-to="3"></li>
				<li data-target="#myCarousel" data-slide-to="4"></li>
				<li data-target="#myCarousel" data-slide-to="5"></li>
			</ol>

			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<div class="item active">
				   <img src="{{ asset('assets/front/images/demo-slder-2.jpg') }} " alt="" style="width:100%;">
				  
				   
				</div>

				<div class="item">
				    <img src="{{ asset('assets/front/images/demo-slder-1.jpg') }} " alt="" style="width:100%;">
				    
				</div>

				<div class="item">
					<img src="{{ asset('assets/front/images/demo-slder-3.jpg') }} " alt="" style="width:100%;">
				</div>
				
				<div class="item">
					<img src="{{ asset('assets/front/images/demo-slder-4.jpg') }} " alt="" style="width:100%;">
					
				</div>

				<div class="item">
					<img src="{{ asset('assets/front/images/demo-slder-2.jpg') }} " alt="" style="width:100%;">
					
				</div>
				<div class="item">
					<img src="{{ asset('assets/front/images/demo-slder-5.jpg') }} " alt="" style="width:100%;">
					
				</div> 	 				
			</div>

			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left IconSliderlR"><i class="fa fa-arrow-circle-o-left" aria-hidden="true"></i></span>
				<span class="sr-only">Previous</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right IconSliderlR"><i class="fa fa-arrow-circle-o-right" aria-hidden="true"></i></span>
				<span class="sr-only">Next</span>
			</a>
		</div>
	</div>
    <!-- END FULL PAGE SLIDER --> 
	 

    <!--- TITLE HEADING --->
	<div class="container pd-15">
		<div class="row"> 
		    <div class="col-md-12 tileHead">
				<div class="lined-heading">
				    <span>Popular Product </span>
				</div>
			</div>
		</div>
	</div>
    <!--- TITLE HEADING END --->

    <!---carausale--->

    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 pd-15">
                <div id="owl-demo" class="owl-carousel owl-theme right-arrow">
                    <div class="item orange">
                        <div class="product-image-action item">
                            <a href="javascript:void(0);">
								<img src="{{ asset('assets/front/images/demo-carausale-1.jpg') }} " alt="" style="width:100%;">
                                
                            </a> 
                        </div>  
                    </div>

                    <div class="item darkCyan">
                        <div class="product-image-action item">
                            <a href="javascript:void(0);">
								<img src="{{ asset('assets/front/images/demo-carausale-2.jpg') }} " alt="">
                                
                            </a> 
                        </div> 
                    </div>

                    <div class="item yellow">
                        <div class="product-image-action item">
                            <a href="javascript:void(0);">
								<img src="{{ asset('assets/front/images/demo-carausale-3.jpg') }} " alt="">
                                
                            </a> 
                        </div> 
                    </div>

                    <div class="item forestGreen">
                        <div class="product-image-action item">
                            <a href="javascript:void(0);">
							<img src="{{ asset('assets/front/images/demo-carausale-4.jpg') }} " alt="" >
                                
                            </a> 
                        </div> 
                    </div>
                    <div class="item dodgerBlue">
                        <div class="product-image-action item">
                            <a href="javascript:void(0);">
							<img src="{{ asset('assets/front/images/demo-carausale-3.jpg') }} " alt="" >
                               
                            </a> 
                        </div> 
                    </div>

                    <div class="item skyBlue">
                        <div class="product-image-action item">
                            <a href="javascript:void(0);">
							<img src="{{ asset('assets/front/images/demo-carausale-1.jpg') }} " alt="" >
                               
                            </a> 
                        </div> 
                    </div>
                    <div class="item zombieGreen">
                        <div class="product-image-action item">
                            <a href="javascript:void(0);">
							<img src="{{ asset('assets/front/images/demo-carausale-1.jpg') }} " alt="" >
                             
                            </a> 
                        </div> 
                    </div>

                    <div class="item violet">
                        <div class="product-image-action item">
                            <a href="javascript:void(0);">
							<img src="{{ asset('assets/front/images/demo-carausale-3.jpg') }} " alt="" >
                               
                            </a> 
                        </div> 
                    </div>

                    <div class="item steelGray">
                        <div class="product-image-action item">
                            <a href="javascript:void(0);">
							<img src="{{ asset('assets/front/images/demo-carausale-2.jpg') }} " alt="" >
                               
                            </a> 
                        </div> 
                    </div>

                    <div class="item dodgerBlue">
                        <div class="product-image-action item">
                            <a href="javascript:void(0);">
							<img src="{{ asset('assets/front/images/demo-carausale-4.jpg') }} " alt="" >
                               
                            </a> 
                        </div> 
                    </div>

                    <div class="item darkCyan">
                        <div class="product-image-action item">
                            <a href="javascript:void(0);">
							<img src="{{ asset('assets/front/images/demo-carausale-1.jpg') }} " alt="" >
                               
                            </a> 
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!---/carausale--->


    <!--- TITLE HEADING --->
	<div class="container pd-15">
		<div class="row"> 
		    <div class="col-md-12 tileHead">
				<div class="lined-heading">
				    <span>PRODUCTS </span>
				</div>
			</div>
		</div>
	</div>
    <!--- TITLE HEADING END --->  
	<div class="container pd-15">
		<div class="row"> 
			<div class="col-md-6 col-sm-6 col-12 bx">
				<div class="tilethumb"><a href="" class="htilebtn txt-upper fsemibold"> T-Shirts</a>
					<a href="javascript:void(0);" class="scaleImg">
						<div class="imgContainer" style="background-image: url(&quot;https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180206023106-1.jpg&quot;);"></div> <img src="https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180206023106-1.jpg" alt="T-Shirts">
					</a>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-12 bx">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12 bx">
						<div class="tilethumb">
							<a href="javascript:void(0);" class="scaleImg">
								<div class="htilebtn txt-upper fsemibold"> Mobile Covers</div>
								<div class="imgContainer" style="background-image: url(&quot;https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180206023225-1.jpg&quot;);"></div> <img src="https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180206023225-1.jpg" alt="Mobile Covers">
							</a>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6 bx">
						<div class="tilethumb spacepro scaleImg"> 
							<a href="" class="htilebtn txt-upper fsemibold"> Backpacks </a>
								<div class="imgContainer" style="background-image: url(&quot;https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180411154134-1.jpg&quot;);">
								</div> 
								<img src="https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180411154134-1.jpg" alt="">
							 
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6 bx">
						<div class="tilethumb spacepro scaleImg"> 
								<a href="javascript:void(0);" class="htilebtn txt-upper fsemibold"> Boxers </a>
								<div class="imgContainer" style="background-image: url(&quot;https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180207170652-1.jpg&quot;);"></div> <img src="https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180207170652-1.jpg" alt="">
							 
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-12 bx clearfixdesk">
				<div class="row">
					<div class="col-md-6 col-sm-6 col-6 bx">
						<div class="tilethumb scaleImg"><a href="javascript:void(0);"><a href="javascript:void(0);" class="htilebtn txt-upper fsemibold"> Badges </a>
							<div class="imgContainer" style="background-image: url(&quot;https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180206024116-1.jpg&quot;);"></div> <img src="https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180206024116-1.jpg" alt=""></a>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-6 bx">
						<div class="tilethumb scaleImg"><a href="javascript:void(0);"><a href="javascript:void(0);" class="htilebtn txt-upper fsemibold"> Mugs </a>
							<div class="imgContainer" style="background-image: url(&quot;https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180206023635-1.jpg&quot;);"></div> <img src="https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180206023635-1.jpg" alt=""></a>
						</div>
					</div>
					<div class="col-md-12 col-sm-12 col-12 bx">
						<div class="tilethumb spacepro scaleImg">
							<a href="javascript:void(0);">
								<div class="htilebtn txt-upper fsemibold"> Notebooks </div>
								<div class="imgContainer" style="background-image: url(&quot;https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180206023825-1.jpg&quot;);"></div> <img src="https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180206023825-1.jpg" alt=""></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-12 bx">
				<div class="tilethumb"><a href="" class="htilebtn txt-upper fsemibold"> T-Shirt Dresses</a>
					<a href="javascript:void(0);" class="scaleImg">
						<div class="imgContainer" style="background-image: url(&quot;https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180424100954-1.jpg&quot;);"></div> <img src="https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180424100954-1.jpg" alt="">
					</a>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-12 bx">
				<div class="tilethumb"><a href="javascript:void(0);" class="htilebtn txt-upper fsemibold"> Duffle Bags</a>
					<a href="javascript:void(0);" class="scaleImg">
						<div class="imgContainer" style="background-image: url(&quot;/static/images/Duffle-bag-tile.jpg&quot;);"></div> 
						<img src="{{ asset('assets/front/images/Duffle-bag-tile.jpg') }} " alt="" >
						
					</a>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-12 bx clearfixdesk">
				<div class="row">
					<div class="col-md-12 col-sm-12 col-12 bx">
						<div class="tilethumb">
							<a href="javascript:void(0);" class="scaleImg">
								<div class="htilebtn txt-upper fsemibold"> Stickers </div>
								<div class="imgContainer" style="background-image: url(&quot;https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180223150648-1.jpg&quot;);"></div> <img src="https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180223150648-1.jpg" alt="">
							</a>
						</div>
					</div>
					<div class="col-md-6 col-sm-6 col-xs-6 col-6 bx">
						<div class="tilethumb spacepro2">
							<a href="javascript:void(0);" class="scaleImg">
								<div class="imgContainer" style="background-image: url(&quot;https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180323160332-1.jpg&quot;);"></div> <span class="htilebtn txt-upper fsemibold"> Tote Bags </span> <img src="https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180323160332-1.jpg" alt="">
							</a>
						</div>
					</div>
					<div class="col-md-6  col-sm-6 col-xs-6 col-6 bx">
						<div class="tilethumb spacepro2">
							<a href="javascript:void(0);" class="scaleImg"><span class="htilebtn txt-upper fsemibold"> Coasters </span>
							<div class="imgContainer" style="background-image: url(&quot;https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180206024029-1.jpg&quot;);">
							</div>
							<img src="https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180206024029-1.jpg" alt="">
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-12 bx">
				<div class="tilethumb">
					<a href="javascript:void(0);" class="scaleImg">
						<div class="htilebtn txt-upper fsemibold"> Action Figures &amp; Keychains </div>
						<div class="imgContainer" style="background-image: url(&quot;https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180223151312-1.jpg&quot;);">
						</div> 
						<img src="https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180223151312-1.jpg" alt="">
					</a>
				</div>
			</div>
			<div class="col-md-6 col-sm-6 col-12 bx">
				<div class="tilethumb">
					<a href="javascript:void(0);" class="scaleImg">
						<div class="htilebtn txt-upper fsemibold"> Posters </div>
						<div class="imgContainer" style="background-image: url(&quot;https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180427015641-1.jpg&quot;);">
						</div> 
						<img src="https://images.thesouledstore.com/public/theSoul/uploads/catalog/category/20180427015641-1.jpg" alt="">
					</a>
				</div>
			</div>
		</div> 
	</div>
 
    
@endsection
