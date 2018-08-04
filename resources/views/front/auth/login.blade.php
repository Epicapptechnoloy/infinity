<!-- LOGIN MODEL --> 
<div class="modal-content"> 
<div class="loginHolder custompopup"> 
	<section  class="signinHolder">
		<button type="button" class="close close_custom" data-dismiss="modal">&times;</button> 	
		
		<form  class="loginformpop" role="form"  method="post" action="" id="login-form" novalidate="novalidate">
		{{ csrf_field() }}
			<div class="inputsecHolder" > 
				<ul class="loginpopup-ul tab-links">
				   <li id="back_login" class="pull-left activelog active"> <a class="tringle" href="javascript:void(0);">Login</a></li>
				   <li id="removehldr1" class="pull-right Register-btn"><a href="javascript:void(0);">Register New User </a></li>
				</ul> 
				<div class="row rowcustom">
					<div class="col-md-6 col-xs-6">
						<div class="fb-signin-button">
							<button type="button" class="btn btn-white btn-block prelative social-btn">
								<div class="btnicon facebook"></div>
								<div class="btnlabel"><a href="{!! url('auth/facebook') !!}"> Facebook</a></div>
							</button>
						</div>
					</div>
					<div class="col-md-6 col-xs-6">
						<div class="g-signin-button">
							<button type="button" class="btn btn-white btn-block prelative social-btn">
								<div class="btnicon google"></div>
								<div class="btnlabel"><a href="{!! url('auth/google') !!}"> Google</a></div>
							</button>
						</div>
					</div>
				</div>	
				
				<div class="Or_"><span>- OR -</span></div>
				
				<aside class="inpHolder">
					<div class="formFieldLblArea"> 
						<input type="text" id="usenamepop" name="username"  placeholder="Enter Email/Mobile Number" autocomplete="off">
					</div> 
				</aside>
				<div class="clearfix"></div> 
				<aside class="inpHolder">
					<div class="formFieldLblArea"> 
						<input type="password"  id="passwordpop"  name="password" placeholder="Password" autocomplete="off">
						<span id="err" style="display:none" class="help-block"></span>
					</div>
					
				</aside>
				<a class="frgtclick" href="#" id="ForgotPass">Forgot Password?</a>
				<div class="clearfix"></div>
				<aside>  
					<input type="submit" name="subbuttonpop" id="buttonpop" class="submitbtn" value="Login" class="btn btn-primary btn-lg btn-block"/>
					
					<span class="newUser Register-btn">New User ? <em>Create Account</em></span>
				</aside>
			</div> 
		</form>
		 
		<form class="forgotformpop"  method="post" role="form" action="{{route('user.forgotPassword')}}" id="forgot-pass">
		{{ csrf_field() }}
			<div class="inputsecHolder" >
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
								<input type="text" class="required email" id="forgot_email" placeholder="Enter your e-mail address" name="emai11" >
								@if ($errors->has('emai11'))
									<span class="help-block">
										<strong>{{ $errors->first('emai11') }}</strong>
									</span>
								@endif
							</div>
						</div>
					</aside> 
					<aside>  
							<input type="submit"  class="submitbtn" value="Get Password" name="" id="forgetPassbtn_Disable"/> 
					</aside>
				</div>
			</div>
		</form>
		
		<form class="registerformpop" method="post" role="form" action="{{route('user.signupProcess')}}" id="regiter-form" novalidate="novalidate" enctype="multipart/form-data">
			{{ csrf_field() }}
			<div class="inputsecHolder" > 
				<ul class="loginpopup-ul tab-links">
				   <li class="pull-left back_login2"> <a class="tringle" href="javascript:void(0);">Login</a></li>
				   <li class="pull-right active2 Register-btn"><a href="javascript:void(0);">Register New User </a></li>
				</ul> 
				<div class="row rowcustom">
					<div class="col-md-6 col-xs-6">
						<div class="fb-signin-button">
							<button type="button" class="btn btn-white btn-block prelative social-btn">
								<div class="btnicon facebook"></div>
								<div class="btnlabel"><a href="{!! url('auth/facebook') !!}"> Facebook</a></div>
							</button>
						</div>
					</div>
					<div class="col-md-6 col-xs-6">
						<div class="g-signin-button">
							<button type="button" class="btn btn-white btn-block prelative social-btn">
								<div class="btnicon google"></div>
								<div class="btnlabel"><a href="{!! url('auth/google') !!}"> Google</a></div>
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
					
					<input type="submit" name="submitbtn" id="formsignup" class="submitbtn" value="Register" class="btn btn-primary btn-lg btn-block"/>
					<span id="removeactive" class="newUser back_login2">Already a Customer? <em>Login</em></span>
				</aside>
			</div> 
		</form>
	</section>
	<!-- end regiter fram -->	  
</div>
</div>
<!-- END LOGIN MODEL -->
<script type="text/javascript" src="{{ URL::asset('assets/front/custom-js/home.js') }}"></script>
