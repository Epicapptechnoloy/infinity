 
$(document).ready(function(){ 

	$(window).scroll(function(){ 
		if($(this).scrollTop() > 50){ 
			$(".header-menu1").addClass('add-Shodow');
			
		}else{
			$('.header-menu1').removeClass('add-Shodow');
			$('.hide-input').hide();
		}
	});
	     
	/* responsive button */	
	$(".button-toggle").click(function(){
		$(".navigation ul.toggle-parent").slideToggle("fast");
	});

	/* responsive button */
	$(".navigation li > a::after").click(function(){
		$(".navigation ul ul").slideToggle("fast");
	});
		
	(function ($, undefined) {

    $(window).on("load", function() {
        $("#carouselTicker").carouselTicker();
    })
    
    $("#carouselTicker1").carouselTicker({
        "direction": "next"
    });

    $("#carouselTicker1").carouselTicker({
        "direction": "next"
    });

    $(".carouselTicker-start").carouselTicker({
        "direction": "next"
    });

    var carouselTickerWidthResize = $("#carouselTicker-width-resize").carouselTicker();

  /*   $(window).on('resize', function() {
        carouselTickerWidthResize.resizeTicker();
    }); */

    $("#carouselTicker-vertical").carouselTicker({
        "mode": "vertical",
        "direction": "prev"
    });
    
    $("#carouselTicker-vertical-with-callback").carouselTicker({
        "mode": "vertical",
        "direction": "next",
        "onCarouselTickerLoad": function() {console.log("callback")}
    });
	  
	var pageRefresh = true;

	function ResCarouselCustom() {
		var items = $("#dItems").val(),
			slide = $("#dSlide").val(),
			speed = $("#dSpeed").val(),
			interval = $("#dInterval").val()

		var itemsD = "data-items=\"" + items + "\"",
			slideD = "data-slide=\"" + slide + "\"",
			speedD = "data-speed=\"" + speed + "\"",
			intervalD = "data-interval=\"" + interval + "\"";


		var atts = "";
		atts += items != "" ? itemsD + " " : "";
		atts += slide != "" ? slideD + " " : "";
		atts += speed != "" ? speedD + " " : "";
		atts += interval != "" ? intervalD + " " : ""
 

		var dat = "";
		dat += '<h4 >' + atts + '</h4>'
		dat += '<div class=\"resCarousel\" ' + atts + '>'
		dat += '<div class="resCarousel-inner">'
		for (var i = 1; i <= 14; i++) {
			dat += '<div class=\"item\"><div><h1>' + i + '</h1></div></div>'
		}
		dat += '</div>'
		dat += '<button class=\'btn btn-default leftRs\'><i class=\"fa fa-fw fa-angle-left\"></i></button>'
		dat += '<button class=\'btn btn-default rightRs\'><i class=\"fa fa-fw fa-angle-right\"></i></button>    </div>'
		console.log(dat);
		$("#customRes").html(null).append(dat);

		if (!pageRefresh) {
			ResCarouselSize();
		} else {
			pageRefresh = false;
		} 
	}

	$("#eventLoad").on('ResCarouselLoad', function() { 
		var dat = "";
		var lenghtI = $(this).find(".item").length;
		if (lenghtI <= 30) {
			for (var i = lenghtI; i <= lenghtI + 10; i++) {
				dat += '<div class="item"><div class="tile"><div><h1>' + (i + 1) + '</h1></div><h3>Title</h3><p>content</p></div></div>'
			}
			$(this).append(dat);
		}
	}); 
	
	
			$(function(){
				$(window).scroll(function(e) {
					if($(this).scrollTop()>150){
						$('.back-to-top').fadeIn(1000); // Fading in the button on scroll after 150px
					}
					else{
						$('.back-to-top').fadeOut(500); // Fading out the button on scroll if less than 150px
					}
				});

				$('.back-to-top').click(function(e) {
					$('body, html').animate({scrollTop:0}, 800);
				});
			});
					
					
			$('#remove-txt').focus(function(){
				 $(this).attr('placeholder','');
				
			});
				
			$('#remove-txt').focusout(function(){
			   $(this).attr('placeholder','Enter Text');
			}); 
 
			$(document).ready(function(){
				$("#testimonial-slider").owlCarousel({
					items:2,
					itemsDesktop:[1000,2],
					itemsDesktopSmall:[979,2],
					itemsTablet:[768,1],
					pagination:true,
					autoPlay:false
				});
			});			
			
				// When the DOM is ready, run this function
				$(document).ready(function() {
				  //Set the carousel options
				  $('#quote-carousel').carousel({
					pause: true,
					interval: 4000,
				  });
				});	

			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip(); 
			});	

				$(document).ready(function() {
				
				  //Sort random function
				  function random(owlSelector){
					owlSelector.children().sort(function(){
						return Math.round(Math.random()) - 0.5; 
					}).each(function(){
					  $(this).appendTo(owlSelector);
					}); 
				  }
				 
				  $("#owl-demo").owlCarousel({
					navigation: true,
					items:4,
					autoPlay: true,
					loop: true, 
					navigationText: [
					  "<i class='icon-chevron-left icon-white'></i>",
					  "<i class='icon-chevron-right icon-white'></i>"
					  ],
					beforeInit : function(elem){
					  //Parameter() elem pointing to $("#owl-demo")
					  random(elem);
					}
				 
				  });
				 
				});

                //log in form
			   /*  $(document).ready(function () {

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
				}); */
				
				//progress icon on click
				$(document).ready(function () {
 
					$("#add_to_cart_hide").hide(); 
					
					$('#click_to_show').click(function(){ 		 
							$("#add_to_cart_hide").show();
					});
					
				});
					
					//WINDOW LOAD MODEL  
					$(document).ready(function () {
					setTimeout(function(){
						$('#myModal').modal(500);
					}, 5000);
				}); 
	             
				 
				 //ONCLICK FLY IMAGE ADD TO CART 

			$('.add-to-cart').on('click', function () {
					var cart = $('.shopping-cart');
					var imgtodrag = $(this).parents('.item').find("img").eq(0);
					
					if (imgtodrag) {
						var imgclone = imgtodrag.clone()
							.offset({
							top: imgtodrag.offset().top,
							left: imgtodrag.offset().left
						})
							.css({
							'opacity': '0.5',
							'z-index': '999999',
								'position': 'absolute',
								'height': '150px',
								'width': '150px', 
						})
							.appendTo($('body'))
							.animate({
							'top': cart.offset().top + 10,
								'left': cart.offset().left + 10,
								'width': 75,
								'height': 75
						}, 1000, 'easeInOutExpo');
						
						setTimeout(function () {
							cart.effect("shake", {
								times: 2
							}, 200);
						}, 1500);

						imgclone.animate({
							'width': 0,
								'height': 0
						}, function () {
							$(this).detach()
						});
					}
				}); 
				$(".block-content ul li a").click(function() {
                $(".block-content ul li").removeClass("current");
                $(this).parent().addClass("current");
            }); 
				 
	             

})(jQuery);	
						
 });			