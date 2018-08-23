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
            	<!-- Latest compiled and minified CSS -->
			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">


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
			
		
			<!-- Latest compiled and minified JavaScript --> 
			<script type="text/javascript" src="{{ URL::asset('assets/front/custome/jquery.rateyo.min.js') }}"></script>
			
			<script type="text/javascript" src="{{ URL::asset('assets/front/custom-js/common.js') }}"></script>	
			
			<!-- PAGE TITLE BANNER AREA -->
			
			<script type="text/javascript" src="{{ URL::asset('assets/front/custom-js/home.js') }}"></script>	
			<script src='http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.5/jquery-ui.min.js'></script>
			
			<script> new WOW().init();</script>
			
			<script type="text/javascript">
				var JS_args = {
					_token: "{{ csrf_token() }}",
					BASE_URL: "{{ URL::to('/') }}"
				};
			
			</script>
			
	    </head>
	
		   <!-- START HEADER --->
	@include('../../../layouts.partials.front.header')
	@include('../layouts.model')

	
	<!-- PAGE CONTENT --> 
	<div class="sldrfullpge">
		<div class="bgform">
			<div class="container text-center">   
			<div class="row">   
				<div class="col-md-5 col-md-offset-4">   
				
					<div class="loginHolder1"> 
						<section class="signinHolder"> 
                            <h4 class="title-LogOn">Login with the Infinity.com</h4>						
							<!-- login form -->
							<form class="loginformpop" role="form"  method="post" action="" id="login-form" novalidate="novalidate">
							{{ csrf_field() }}
								<div class="inputsecHolder" id="login-form"> 
								 
									<ul class="loginpopup-ul tab-links">
									   <li id="back_login" class="pull-left activelog active"> <a class="tringle" href="javascript:void(0);">Login</a></li>
									   <li id="removehldr1" class="pull-right Register-btn"><a href="javascript:void(0);">Register New User </a></li>
									</ul> 
									<div class="row rowcustom">
										<div class="col-md-6 col-xs-6">
											<div class="fb-signin-button">
												<button type="button" class="btn btn-white btn-block prelative social-btn">
													<div class="btnicon facebook"></div>
													<div class="btnlabel"> <a href="{!! url('auth/facebook') !!}"> Facebook</a></div>
												</button>
											</div>
										</div>
										<div class="col-md-6 col-xs-6">
											<div class="g-signin-button">
												<button type="button" class="btn btn-white btn-block prelative social-btn">
													<div class="btnicon google"></div>
													<div class="btnlabel"> <a href="{!! url('auth/google') !!}"> Google</a></div>
												</button>
											</div>
										</div>
									</div>	
									<div class="Or_"><span>- OR -</span></div>
									
									<aside class="inpHolder">
										<div class="formFieldLblArea"> 
											<input type="text" class="required email" id="usenamepop" name="username" placeholder="Email Id">
										</div> 
									</aside>
									<div class="clearfix"></div> 
									<aside class="inpHolder">
										<div class="formFieldLblArea"> 
											<input type="password" class="required" id="passwordpop"  name="password" placeholder="Enter Password">
											<span id="err" style="display:none" class="help-block"></span>
										</div> 
									</aside>
									<a class="frgtclick" href="javascript:void(0);" id="ForgotPass">Forgot Password?</a>
									<!-- end login form -->
									<div class="clearfix"></div>
									<!-- forget password -->
									<aside>  
										 
											<input type="submit"  name="subbuttonpop" id="buttonpop" class="submitbtn" value="Login">
											<!-- <input type="button" id="Register-btn" class="submitbtn" value="Register" />   -->
											<span class="newUser Register-btn">New User ? <em>Create Account</em></span>
									</aside>
								</div> 
							</form>
							
							<form class="forgotformpop"  method="post" role="form" action="{{route('user.forgotPassword')}}">
							{{ csrf_field() }}
								<div class="inputsecHolder" id="forgot-pass" style="display: none;">
								
									<ul class="loginpopup-ul tab-links">
									   <li id="" class="pull-left active2 forgetbck"> <a class="tringle" href="javascript:void(0);">Forgot Password</a></li>
									   <li id="login-btnforget" class="pull-right outact"><a href="javascript:void(0);">Login </a></li> 
									</ul> 
									<div class="forgotholder">  
										<aside class="inpHolder">      				
											<div class="formFieldLblArea"> 
												<h5>Forgot Your Password? </h5>
												<p>We’ll send you a link to reset your password</p>
												<div class="form-group{{ $errors->has('emai11') ? ' has-error' : '' }}">
												<span class="EntertextHldr">Enter your E-mail Address</span>
												<input type="text" class="required email" id="email" placeholder="Enter your e-mail address" name="">
												@if ($errors->has('emai11'))
													<span class="help-block">
														<strong>{{ $errors->first('emai11') }}</strong>
													</span>
												@endif
											</div>
										</aside> 
										<aside>  
												<input type="submit" class="submitbtn" value="Get Password" name="" id="forgetPassbtn_Disable"> 
										</aside>
									</div>
								</div>
							</form>
							<!-- end forget password -->
							
							<!-- regiter fram -->
							<form class="registerformpop" method="post" role="form" action="{{route('user.signupProcess')}}"  novalidate="novalidate" enctype="multipart/form-data"> 
								{{ csrf_field() }}
								<div class="inputsecHolder" id="regiter-form" style="display: none;"> 
									<ul class="loginpopup-ul tab-links">
									   <li class="pull-left back_login2"> <a class="tringle" href="javascript:void(0);">Login</a></li>
									   <li class="pull-right active2 Register-btn"><a href="javascript:void(0);">Register New User </a></li>
									</ul> 
								<div class="row rowcustom">
									<div class="col-md-6 col-xs-6">
										<div class="fb-signin-button">
											<button type="button" class="btn btn-white btn-block prelative social-btn">
												<div class="btnicon facebook"></div>
												<div class="btnlabel"> <a href="{!! url('auth/facebook') !!}"> Facebook</a></div>
											</button>
										</div>
									</div>
									<div class="col-md-6 col-xs-6">
										<div class="g-signin-button">
											<button type="button" class="btn btn-white btn-block prelative social-btn">
												<div class="btnicon google"></div>
												<div class="btnlabel"> <a href="{!! url('auth/google') !!}"> Google</a></div>
											</button>
										</div>
									</div>
								</div>	
								<div class="Or_"><span>- OR -</span></div>		
									<div class="clearfix"></div> 
									<aside class="inpHolder">
										<div class="formFieldLblArea">
											<div class="row">
												<div class="col-md-6 respnsiveinput"> 
													<input type="text"  id="first_name" placeholder="First Name"  name="first_name">
												</div>
												<div class="col-md-6"> 
													<input type="text"  id="last_name" placeholder="Last Name"  name="last_name">
												</div> 	 
											</div>
										</div> 
									</aside> 
									<div class="clearfix"></div>							
											
									<aside class="inpHolder">
										<div class="formFieldLblArea"> 
											<input type="text" id="email" name="email"  placeholder="Email Id *" >
										</div> 
									</aside>
									
									<aside class="inpHolder">
										<div class="formFieldLblArea"> 
											<input type="password" id="loginpopmatch" name="password" placeholder="Enter Password *">
										</div> 
									</aside>

									<aside class="inpHolder">
										<div class="formFieldLblArea"> 
											<input type="password"   id="password_confirmation" name="password_confirmation" placeholder="Confirm Password *">
										</div> 
									</aside>		

									<aside class="inpHolder">
										<div class="formFieldLblArea contactprefix"> 
											<input type="text"  id="number" name="number" placeholder="Mobile Number*">
										</div> 
									</aside>

									<div class="form-check">
										<ul>
										   <li class="select" id="gender">Gender</li> 
										   <li><input type="radio" name="gender" value="1"><span> Male</span></li>
										   <li><input type="radio" name="gender" value="2"><span>Female</span></li>
										   <li><input type="radio" name="gender" value="3"><span>Other</span></li>
										</ul>
									</div>
									
									<aside>   
										<input type="submit" id="formsignup" class="submitbtn"  value="Register"> 
										<span id="removeactive" class="newUser back_login2">Already a Customer? <em>Login</em></span>
									</aside>
								</div> 
							</form>
						</section>
						<!-- end regiter fram -->			
					</div>  


				
				</div> 
			</div> 
		</div> 
	  </div>
  </div>
  
  <!-- END PAGE CONTENT --> 
</html>