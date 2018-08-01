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
								<div class="btnlabel"> Facebook</div>
							</button>
						</div>
					</div>
					<div class="col-md-6 col-xs-6">
						<div class="g-signin-button">
							<button type="button" class="btn btn-white btn-block prelative social-btn">
								<div class="btnicon google"></div>
								<div class="btnlabel"> Google</div>
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
		
		<form action="#" id="forgot-pass">
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
							<span class="EntertextHldr">Enter your E-mail Address</span>
							<input type="text" class="required email" id="forgot_email" placeholder="Enter your e-mail address" name="forgotEmail">
						</div>
					</aside> 
					<aside>  
							<input type="button" class="submitbtn" value="Get Password" name="" id="forgetPassbtn_Disable"/> 
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
								<div class="btnlabel"> Facebook</div>
							</button>
						</div>
					</div>
					<div class="col-md-6 col-xs-6">
						<div class="g-signin-button">
							<button type="button" class="btn btn-white btn-block prelative social-btn">
								<div class="btnicon google"></div>
								<div class="btnlabel"> Google</div>
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
<script>

	$(document).ready(function () {

		$("#login-form").show();
		$("#forgot-pass").hide();
		$("#regiter-form").hide();
		
		$('#ForgotPass').click(function(){ 		
			$("#login-form").slideToggle();
			$("#forgot-pass").slideToggle();
		});
		
		$('.Register-btn').click(function(){
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
		
		$('.back_login2').click(function(){	
			$("#regiter-form").slideToggle();
			$("#login-form").slideToggle();
		});	

		$('#Register-btnforget').click(function(){	
			$("#forgot-pass").slideToggle();
			$("#regiter-form").slideToggle();
		});	
		
		$('#login-btnforget').click(function(){	
			$("#forgot-pass").slideToggle();
			$("#login-form").slideToggle();
		});						
		$('#removeactive').click(function(){	
			$("#removehldr1").removeClass("active");
		});	
		
		
		$('.newUser.Register-btn').click(function(){	
			$(".back_login2 ").removeClass("active");
			$(".active2.Register-btn").addClass("active");
		});	
	});
				
	$(document).ready(function(){ 
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

		
		$("#searchoppener").click(function(){
			$("#searcinput").toggleClass("width100");
		});
	
   
		$("#searchoppener").click(function(){
			$(this).toggleClass("iconnone");
		});
    
 		
		$(".menu-oppner").click(function(){
			$("#mb-main-menu").addClass("open-menu");
			$("#sitebodyoverlay").addClass("overlay_");
		});
	
   
	 
		$("#close-mb-menu").click(function(){
			$("#mb-main-menu").removeClass("open-menu");
			$("#sitebodyoverlay").removeClass("overlay_");
		});
		 
   
	 
		$(".parent").click(function(){
			var did = $(this).data('id');
			$(".parent").removeClass('test');
			$(this).addClass('test');
			$(".none_defoult").slideUp(500); 
			$("#"+did).slideDown(500); 
		});
		
  
		$("ul.tab-links li a").click(function() {
			$("ul.tab-links li").removeClass("active");
			$(this).parent().addClass("active");
		});
  
  
		window.onload = function () {

			$('#Waitloader').fadeOut(500, function(){ $('#Waitloader').remove(); } );
		} 
		
	});
</script>

<script>
    $(document).ready(function() {
		/* login form validation */
		$(".loginformpop").validate({
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true
                }
            },
            messages: {
                username: {
                    required: "*Please enter valid Email ID/Mobile number."
                },
                password: {
                    required: "*Please enter Password."
                }
            },
			
            submitHandler: function(form) {
                var uname = $('#usenamepop').val();
                var pass = $('#passwordpop').val();
                
                $.ajax({
                    url: '/login',
                    type: 'POST',
                    dataType: 'json',
                    data: {
						_token: function() {
                            return $("input[name='_token']").val();
                        },
                        username: uname,
                        password: pass

                    },
					beforeSend: function() {
						$(".modal-content").prepend('<div class="bodypageloader"></div>');
					},
					
					success: function(response) {
						
						$('.bodypageloader').css('display','none');

						if (response.status == 200) {
						window.location.href = "/";
						}else{
							$("#err").attr('style','display:block;');
							$('#err').html(response.message);

						}
						
                    },
					
					
                });
            }
        });
		
		
	
		/* signup form validation */
		
		$.validator.addMethod("valueNotEquals", function(value, element, arg)
			{
				return arg != value;
			}, "Value must not equal arg.");
		
		$(".registerformpop").validate({
			rules: {
				first_name: {
					required: true,
					minlength: 3,
					maxlength:30
				},
				last_name: {
					required: true
				},
				lastname: {
					required: true
				},
				
				email: {
					required: true,
					remote: {
						url: "/ajax-handler-auth",
						type: "post",
						dataType: "json",
						data: {
							_token: function() {
								return $("input[name='_token']").val();
							},
							email: function() {
								return $("#email").val();
							},
							formtype: function() {
								return $("#formsignup").val();
							},
							ajaxMethod: 'validateEmail',
						}

					},
					regex: /^((?!mailnator.com)[\s\S])*$/,
				},
				password: {
					required: true,
					regex: /^[A-Za-z].*[0-9]|[0-9].*[A-Za-z]+$/,
					minlength: 6,
					maxlength:25
				},
			  
				password_confirmation: {
					required: true,
					minlength: 6,
					maxlength:25,
					equalTo: "#loginpopmatch"
				},
			   
				number: {
					required: true
				},
				
				
				website:{
					regex: /^(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)/,
				} 
			},
			messages: {
				first_name: {
					required: "*First Name is required field..",
				   
				},
				
				last_name: {
					required: "*Last Name is required field.",
				},
				
				email: {
					required: "*Email is required field.",
					email: "*Invalid email format.",
					remote: "*Email already exists.",
					regex: "*Mailnator.com email are not allowed."
				},
				
				password: {
					required: "*Password is required field.",
					minlength: "Minimum length of password is 6",
					regex: "Password must contain at least one letter and one number.",
					maxlength: "MaxLength of password is 25."
				},
				password_confirmation: {
					required: "*This is required field.",
					minlength: "Minimum length of password is 6.",
					maxlength: "MaxLength of password is 25.",
					equalTo: "Password doesn't matched"
				},
			   
				number: {
					required: "*Contact number is required field.",
				},
				
				website:{
					regex: "Please enter a valid url like https://example.com."
				}
			}
		});
			
		
		
		
		
	});
	
	
	
	
	
</script>