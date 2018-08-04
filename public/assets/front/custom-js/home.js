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
						$(".signinHolder").prepend('<div class="bodypageloader"></div>');
						
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
					email: true,
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
					required: true,
					number: true,
					
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
			
		/* forgot password  */
		
		 $(".forgotformpop").validate({
            rules: {
               
                emai11: {
					required: true,
					email: true,
					remote: {
						url: "/ajax-handler-auth",
						type: "post",
						dataType: "json",
						data: {
							_token: function() {
								return $("input[name='_token']").val();
							},
							email: function() {
								return $("#emai11").val();
							},
							formtype: function() {
								return $("#forgetPassbtn_Disable").val();
							},
							ajaxMethod: 'validateEmailForgotPwd',
						}

					},
					regex: /^((?!mailnator.com)[\s\S])*$/,
				}
            },
		
		});
	});
	
	