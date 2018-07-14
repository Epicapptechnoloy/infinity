<!DOCTYPE html>
	<html>
	    <head>
		
			<title>Raascals | Login</title>  
			<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,700" rel="stylesheet"> 
			<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet"> 
			<link href="https://fonts.googleapis.com/css?family=Catamaran:300,400,500,600,700,800|Lato:300,400,700,900" rel="stylesheet"> 
			<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
			
			
			<link rel="stylesheet" href="{{ URL::asset('assets/front/css/bootstrap.min.css') }}">
			
			
			<link rel="stylesheet" href="{{ URL::asset('assets/front/css/animate.css') }}">
			
	       
			<!-- page .css for demo --> 
			<link rel="stylesheet" href="{{ URL::asset('assets/front/css/style.css') }}">
			
			
			
			<!-- end page .css for demo --> 
			<link rel="stylesheet" href="{{ URL::asset('assets/front/css/detail-slider.css') }}">
			
			<!--<link rel="stylesheet" href="{{ URL::asset('assets/front/css/resCarousel.css') }}">-->
			
            <link rel="stylesheet" href="{{ URL::asset('assets/front/css/resCarousel.css') }}">
			
			 
             <link rel="stylesheet" href="{{ URL::asset('assets/front/css/owl.carousel.css') }}">
			 
            <!-- Owl Carousel css -->
             <link rel="stylesheet" href="{{ URL::asset('assets/front/css/owl.theme.css') }}">
            		
			
	    </head>
		
	<body class="login_body"> 
		
		<a href="/">
			<div class="back_home">
				<span>  </span>
			</div>
		</a>
	
		<div class="loginHolder">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<span class="after-border">
						
						<img src="{{ URL::asset('assets/front/images/Raascals Logo.png') }}" width="100%">
						
					</span>	
				</div>
			</div>
			<section  class="signinHolder">
				<!-- login form -->
				<form method="post"  action="{{url('ProcessLogin')}}">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<div class="inputsecHolder" id="login-form">
						<h1 style="width:100%; text-align:left">Login Now</h1>  			
						<aside class="inpHolder">
							<div class="formFieldLblArea {{ $errors->has('login_email') ? ' has-error' : '' }}">
								<label>Email/Mobile<span class="mendatory">&nbsp;*</span></label>
								<input type="text" name="login_email" value="{!! old('login_email') !!}" placeholder="Email/Mobile">
								@if ($errors->has('login_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('login_email') }}</strong>
                                    </span>
                                @endif
							</div> 
						</aside>
						<div class="clearfix"></div> 
						<aside class="inpHolder">
							<div class="formFieldLblArea {{ $errors->has('login_pass') ? ' has-error' : '' }}">
								<label>Password<span class="mendatory">&nbsp;*</span></label>
								<input type="password" name="login_pass"  placeholder="password">
								@if ($errors->has('login_pass'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('login_pass') }}</strong>
                                    </span>
                                @endif
							</div> 
						</aside>
										<!-- end login form -->
						<div class="clearfix"></div>
						<!-- forget password -->
						<aside> 
							<div class="fleft" > 
								<div class="login-form">
									<span> 
										<input type="checkbox" id="stayLogged" name="stayLogged" value="1" /> 
										<label>Remember me</label>
									</span>
								</div>
									<br class="clr">					
									<a href="#" id="ForgotPass">Forgot Password?</a>
							</div> 
							
							<span class="fright">  
								<input type="submit" class="submitbtn" value="Sign In" />
								<input type="button" id="Register-btn" class="submitbtn cancel-btn" value="Register" /> 
							</span>
						</aside>
					</div> 
				</form>
				
				<form method="post" action="{{url('forgotpassword')}}">
					 {{ csrf_field() }}
					<div class="inputsecHolder" id="forgot-pass">
						<h1 style="width:100%; text-align:left">Forgot Password</h1> 
						
						<aside class="inpHolder">      				
							<div class="formFieldLblArea {{ $errors->has('email') ? ' has-error' : '' }}">
								<label>Email<span class="mendatory">&nbsp;*</span></label>
								<input type="text" name="email" value="{{ old('email') }}" placeholder="Enter your email"/>
								@if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>								
						</aside>
						
						<div class="clearfix"></div>
						<aside>
							<span class="fright"> 
								<input type="submit" class="submitbtn" value="Forgot Password" name="getpassbtn" id="forgetPassbtn" />
								<input type="button" class="submitbtn cancel-btn" value="Login"  id="bact_to_login" />
							</span>
						</aside>
					</div>
				</form>
				<!-- end forget password -->
				<!-- regiter fram -->
				<form method="post" disable="" action="{{url('ProcessRegistration')}}">
					{{ csrf_field() }}
					<div class="inputsecHolder" id="regiter-form" > 
						<h1 style="width:100%; text-align:left">Register Now</h1> 			
						<aside class="inpHolder">
							<div class="formFieldLblArea {{ $errors->has('name') ? ' has-error' : '' }}">
								<label>Username <span class="mendatory">&nbsp;*</span></label>
								<input type="text" name="name" value="{{ old('name') }}" placeholder="Enter your name">
								@if ($errors->has('name'))
								<span class="help-block">
									<strong>{{ $errors->first('name') }}</strong>
								</span>
                                @endif
							</div> 
						</aside>
						
							
						<aside class="inpHolder">
							<div class="formFieldLblArea {{ $errors->has('email') ? ' has-error' : '' }}">
								<label>Email address <span class="mendatory">&nbsp;*</span></label>
								<input type="text" name="email"  value="{{ old('email') }}" placeholder="Enter your email address">
								@if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div> 
						</aside>
						
						<aside class="inpHolder">
							<div class="formFieldLblArea {{ $errors->has('number') ? ' has-error' : '' }}">
								<label>Mobile number <span class="mendatory">&nbsp;*</span></label>
								<input type="text" name="number" value="{{ old('number') }}"  placeholder="Enter mobile number">
								@if ($errors->has('number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('number') }}</strong>
                                    </span>
                                @endif
							</div> 
						</aside>
						
						<div class="clearfix"></div> 
						<aside class="inpHolder">
							<div class="formFieldLblArea {{ $errors->has('password') ? ' has-error' : '' }}">
								<div class="row">
									<div class="col-md-6">
										<label>Password<span class="mendatory">&nbsp;*</span></label>
										<input type="password" name="password" placeholder="Enter password">
										@if ($errors->has('password'))
										<span class="help-block">
											<strong>{{ $errors->first('password') }}</strong>
										</span>
										@endif
									</div>
									<div class="col-md-6">
										<label>Confirm Password<span class="mendatory">&nbsp;*</span></label>
										<input type="password" name="password_confirmation" placeholder="Enter confirm password">
									</div>							
								</div>
							</div> 
						</aside> 
						<div class="clearfix"></div>
						<aside>  
							<span class="fright">  
								<input type="submit" class="submitbtn success-btn" value="Register" /> 
								<input type="button" id="back_login" class="submitbtn cancel-btn" value="Back To login" />  
							</span>
						</aside>
					</div> 
				</form>
			</section>
			<!-- end regiter fram -->			
		</div>
		
		<!--/ footer -->
			<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
			<script src="{{ URL::asset('assets/front/js/jquery-min.js') }}"></script>
			<!-- Include all compiled plugins (below), or include individual files as needed -->
			<script src="{{ URL::asset('assets/front/js/bootstrap.min.js') }}"></script>
			<script src="{{ URL::asset('assets/front/js/owl.carousel.min.js') }}"></script>
			<script src="{{ URL::asset('assets/front/js/jquery.carouselTicker.min.js') }}"></script>
			
			
			<script>
			$(document).ready(function () {
					
				<?php if(Request::path() == 'register'){ ?>
					$("#regiter-form").show();
					$("#forgot-pass").hide();
					$("#login-form").hide();
				<?php }elseif(Request::path() == 'forgotpassword'){?>
					$("#forgot-pass").show();
					$("#login-form").hide();
					$("#regiter-form").hide();
				<?php }else{ ?>
					$("#login-form").show();
					$("#regiter-form").hide();
					$("#forgot-pass").hide();
				<?php } ?>
				
				$('#ForgotPass').click(function(){ 		
					$("#login-form").slideToggle();
					$("#forgot-pass").slideToggle();
				});
				
				$('#Register-btn').click(function(){
					$("#regiter-form").slideToggle(); 
					$("#login-form").slideToggle();
				});
				
				$('#back_login').click(function(){
					$("#regiter-form").slideToggle();
					$("#login-form").slideToggle();
				});
				
				$('#bact_to_login').click(function(){	
					$("#forgot-pass").slideToggle();
					$("#login-form").slideToggle();
				});
			});
			</script>
			
	</body> 
</html>