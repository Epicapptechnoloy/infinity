<!DOCTYPE html>
<html>
	
		<head>
		
			<title>Infinity | Home</title>  
			<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,700" rel="stylesheet"> 
			<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet"> 
			<link href="https://fonts.googleapis.com/css?family=Catamaran:300,400,500,600,700,800|Lato:300,400,700,900" rel="stylesheet"> 
			<meta name="viewport" content="width=device-width, initial-scale=1.0">  
			
			<link rel="stylesheet" href="{{ URL::asset('assets/front/css/bootstrap.min.css') }}">  
			<link rel="stylesheet" href="{{ URL::asset('assets/front/css/animate.css') }}"> 
			<link rel="stylesheet" href="{{ URL::asset('assets/front/css/style.css') }}"> 
			<link rel="stylesheet" href="{{ URL::asset('assets/front/css/resCarousel.css') }}"> 
			<link rel="stylesheet" href="{{ URL::asset('assets/front/font-awesome/css/font-awesome.min.css') }}"> 
			<link rel="stylesheet" href="{{ URL::asset('assets/front/css/owl.carousel.css') }}"> 
			<link rel="stylesheet" href="{{ URL::asset('assets/front/css/owl.theme.css') }}"> 
			<link rel="stylesheet" href="{{ URL::asset('assets/front/css/responsive.css') }}">
			<link rel="stylesheet" href="{{ URL::asset('assets/front/css/header-menu.css') }}">
			<link rel="stylesheet" href="{{ URL::asset('assets/front/css/aos.css') }}">
			<link rel="stylesheet" href="{{ URL::asset('assets/front/css/jquery.simpleGallery.css') }}">
			<link rel="stylesheet" href="{{ URL::asset('assets/front/css/jquery.simpleLens.css') }}">
			<link rel="stylesheet" href="{{ URL::asset('assets/front/css/developer.css') }}">
            


			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			<script src="{{ URL::asset('assets/front/js/jquery-min.js') }}"></script>
			
 			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<script src="{{ URL::asset('assets/front/js/bootstrap.min.js') }}"></script>
			
			<!-- Include wow.js-->
			<script src="{{ URL::asset('assets/front/js/wow.min.js') }}"></script>
			
			
			<script src="{{ URL::asset('assets/front/js/owl.carousel.min.js') }}"></script>
			
			<script src="{{ URL::asset('assets/front/js/jquery.carouselTicker.min.js') }}"></script>
			
			<!-- Include mmain.js-->
			<script src="{{ URL::asset('assets/front/js/main.js') }}"></script>
			
			<script src="{{ URL::asset('assets/front/js/detail.slider.js') }}"></script>
			
			<script src="{{ URL::asset('assets/front/js/resCarousel.js') }}"></script>
			<script src="{{ URL::asset('assets/front/js/aos.js') }}"></script>
			<script src="{{ URL::asset('assets/front/js/jquery.simpleGallery.js') }}"></script>
			<script src="{{ URL::asset('assets/front/js/jquery.simpleLens.js') }}"></script>
			<script type="text/javascript" src="{{ URL::asset('assets/front/custome/jquery.validate.min.js') }}"></script>
			<script type="text/javascript" src="{{ URL::asset('assets/front/custome/validate.settings.js') }}"></script>
			<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
			
			<script> new WOW().init();</script>
			
	    </head>
	<body>
	    <!--<div class="wrapper">-->
		<div class="bodypageloader" style="display:none;"></div>
		
		@include('layouts.partials.front.header')
		
		@include('layouts.model')
		<div class="content-wrapper">
			<!-- Content Header (Page header) --> 

			<section class="content">
		
			@yield('content')
			</section>
		</div>
   
		<!-- /.content-wrapper -->
		@include('layouts.partials.front.footer')

	
		<!--/ footer -->
			
			
			 
	</body>
</html>
