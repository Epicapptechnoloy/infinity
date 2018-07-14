<!DOCTYPE html>
	<html>
	    <head>
		
			<title>Raascals | Login</title>  
			<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,700" rel="stylesheet"> 
			<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet"> 
			<link href="https://fonts.googleapis.com/css?family=Catamaran:300,400,500,600,700,800|Lato:300,400,700,900" rel="stylesheet"> 
			<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
			
			
			<link rel="stylesheet" href="{{ URL::asset('public/assets/front/css/bootstrap.min.css') }}">
			
			
			<link rel="stylesheet" href="{{ URL::asset('public/assets/front/css/animate.css') }}">
			
	       
			<!-- page .css for demo --> 
			<link rel="stylesheet" href="{{ URL::asset('public/assets/front/css/style.css') }}">
			
			
			
			<!-- end page .css for demo --> 
			<link rel="stylesheet" href="{{ URL::asset('public/assets/front/css/detail-slider.css') }}">
			
			<!--<link rel="stylesheet" href="{{ URL::asset('assets/front/css/resCarousel.css') }}">-->
			
            <link rel="stylesheet" href="{{ URL::asset('public/assets/front/css/resCarousel.css') }}">
			
			 
             <link rel="stylesheet" href="{{ URL::asset('public/assets/front/css/owl.carousel.css') }}">
			 
            <!-- Owl Carousel css -->
             <link rel="stylesheet" href="{{ URL::asset('public/assets/front/css/owl.theme.css') }}">
            		
			
	    </head>
		
	<body class="login_body"> 
		
		<a href="/RaascalNew">
			<div class="back_home">
				<span>  </span>
			</div>
		</a>
	
		<div class="loginHolder">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<span class="after-border">
						
						<img src="{{ URL::asset('public/assets/front/images/Raascals Logo.png') }}" width="100%">
						
					</span>	
				</div>
			</div>
		
			<section  class="signinHolder">
				<!-- login form -->
				<form method="post"  action="{{url('process-reset-password')}}">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<input type="hidden" name="id" value="{{$id}}">
					<div class="inputsecHolder" id="login-form">
						<h1 style="width:100%; text-align:left">Reset Password</h1>  			
						<aside class="inpHolder">
							<div class="formFieldLblArea {{ $errors->has('password') ? ' has-error' : '' }}">
								<label>New Password<span class="mendatory">&nbsp;*</span></label>
								<input type="password" name="password" placeholder="Password">
								@if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
							</div> 
						</aside>
						<div class="clearfix"></div> 
						<aside class="inpHolder">
							<div class="formFieldLblArea {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
								<label>Confirm Password<span class="mendatory">&nbsp;*</span></label>
								<input type="password" name="password_confirmation"  placeholder="Confirm password">
								@if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
							</div> 
						</aside>
						<div class="clearfix"></div>
						<aside>  
							<span class="fright">  
								<input type="submit" class="submitbtn success-btn" value="Submit" /> 
								<a href="/RaascalNew"><input type="button" id="back_login" class="submitbtn cancel-btn" value="Cancel" /> </a> 
							</span>
						</aside>
						
					</div> 
				</form>
				
			</section>
			<!-- end regiter fram -->			
		</div>
		
		<!--/ footer -->
			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			<script src="{{ URL::asset('public/assets/front/js/jquery-min.js') }}"></script>
			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<script src="{{ URL::asset('public/assets/front/js/bootstrap.min.js') }}"></script>
			<script src="{{ URL::asset('public/assets/front/js/owl.carousel.min.js') }}"></script>
			<script src="{{ URL::asset('public/assets/front/js/jquery.carouselTicker.min.js') }}"></script>
			
			
	</body> 
</html>