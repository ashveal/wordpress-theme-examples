//@codekit-prepend "magnific.min.js"
//@codekit-prepend "jquery.easing.js"
//@codekit-prepend "jquery.touchSwipe.js"

(function() {
    var lastTime = 0;
    var vendors = ['webkit', 'moz'];
    for(var x = 0; x < vendors.length && !window.requestAnimationFrame; ++x) {
        window.requestAnimationFrame = window[vendors[x]+'RequestAnimationFrame'];
        window.cancelAnimationFrame =
          window[vendors[x]+'CancelAnimationFrame'] || window[vendors[x]+'CancelRequestAnimationFrame'];
    }

    if (!window.requestAnimationFrame)
        window.requestAnimationFrame = function(callback, element) {
            var currTime = new Date().getTime();
            var timeToCall = Math.max(0, 16 - (currTime - lastTime));
            var id = window.setTimeout(function() { callback(currTime + timeToCall); },
              timeToCall);
            lastTime = currTime + timeToCall;
            return id;
        };

    if (!window.cancelAnimationFrame)
        window.cancelAnimationFrame = function(id) {
            clearTimeout(id);
		};
}());

$(function() {

	var $slider_wrapper = $('.slider-wrapper');
	
	$slider_wrapper.find('.slider-images').on('click','a',function(e){
	
		var $next = $('this').parent().parent().find('.next'),
		$previous = $('this').parent().parent().find('.previous');
	
		$next.show();
		$previous.show();
		
		e.preventDefault();
		
	});
	


	// this is for IE8 <
	if (!Date.now) {
	  Date.now = function now() {
	    return new Date().getTime();
	  };
	}
	

	var x = 0,
	maxslide = $slider_wrapper.find('.slider-images').width()/2,
	now,
	then=Date.now(),
	fpsInterval = 1000/24,
	startx,
	xthrow = 0,
	swiped = false;
	
	function drawSlider(){
		requestID =requestAnimationFrame(drawSlider);
		now = Date.now();
    var elapsed = now - then;

		if(elapsed > fpsInterval) {
		
			if(xthrow > 1 || xthrow < -1) {
			
				xthrow = xthrow / 2;
				
				x += xthrow;
			} else {
				x-=2;
			}
		
			
			if(x <= -maxslide) {
				x = maxslide+x;
			}
			if(x >= 0) {
				x = -maxslide+x;
			}
			$slider_wrapper.find('.slider-images').stop().css({'transform':'translateX('+x+'px)'});
			
			then = now - (elapsed % fpsInterval);
		}
	}
	
	var requestID = window.requestAnimationFrame(drawSlider);

	
	var matrixToArray = function(str){
    return str.split('(')[1].split(')')[0].split(',');
	};

	$slider_wrapper.find('.slider-images').swipe({
		/*swipe:function(event, direction, distance, duration, fingerCount) {
			console.log("You swiped " + direction);
		},*/
		threshold:0,
		excludedElements:[], //allow a tags to be swiped
		allowPageScroll:"vertical",
		tap:function(event, target) {
			swiped = false;
			$(target).parent().trigger('click');
		},
		swipe:function(e){
			swiped = true;
		},
		swipeStatus:function(event, phase, direction, distance, duration/*, fingers*/) {
			switch(phase) {
				case 'start':
					cancelAnimationFrame(requestID);
					var matrix = $slider_wrapper.find('.slider-images').css('transform');
					startx = matrixToArray(matrix)[4];
				break;
				case 'move':
					if(direction === 'left') {
						x = parseInt(startx) - parseInt(distance);
						if(x <= -maxslide) {
							x = maxslide+x;
						}
					}
					if(direction === 'right') {
						x =  parseInt(startx) + parseInt(distance);
						if(x >= 0) {
							x = -maxslide+x;
						}
					}
					$slider_wrapper.find('.slider-images').css({'transform':'translateX('+x+'px)'});
				break;
				case 'end':

					var speed = (distance/duration);

					if(speed > .5) {
						xthrow = speed*200;
						
						if(direction === 'left') {
							xthrow = -xthrow;
						}
					}
					requestID =requestAnimationFrame(drawSlider);
				break;
			}

		},
	});
	
	
	$slider_wrapper.find('.slider-images').magnificPopup({type:'image',delegate:'a',gallery:{enabled:true},callbacks: {
    open: function() {
    
    	if(swiped) {
    		this.close();
    	}
    
      cancelAnimationFrame(requestID);
   
    },
    close: function() {
      requestID = requestAnimationFrame(drawSlider);
    }
  }
  });
  
  
  var $page = $('#page'), $mobile_menu = $('#mobile_menu'), $mobilewrap = $('#mobilewrap'), $mobile_overflow_wrapper = $('#mobile-overflow-wrapper'), $body = $('body'), $html = $('html'), $splash = $('#splash'), $content_wrapper = $('#content-wrapper'), $sidebar = $('#sidebar'), $header = $('header');
  
  
  //menu-item menu-item-type-post_type menu-item-object-page current-page-ancestor current-menu-ancestor current_page_ancestor menu-item-has-children menu-item-33
  
	$('#mobile_menu').find('#mobile_menu_ul li:not(.current-page-ancestor,.current-menu-item,.current_page_ancestor):has(ul)').addClass('mobile_collapse');
  
  //$mobile_menu.find('#mobile_menu_ul li:not(.current-page-ancestor) ul.sub-menu').hide();
  
  $mobile_menu.find('#mobile_menu_ul li:has(ul) > a').click(function(e){
	  e.preventDefault();
	  $(this).parent().toggleClass('mobile_collapse');
  });
  
  
	
	$(window).on('resize',function(){
		var height = $(window).height(),
		width = $(window).width(),
		container_height = $('#splash_wrap .container').height();
		
		if(height < container_height) {
			height = container_height;
		}
		
		$mobile_menu.height(height-40);
		$body.height(height);
		
		if($mobilewrap.height() < $body.height()) {
			$mobilewrap.height($body.height())
		} else if( width > 992){
			$mobilewrap.height('auto');
		}

			$mobile_overflow_wrapper.height(height-80-$('html').css('margin-top'));


	});
	
	
	
	$(window).on('scroll mousedown DOMMouseScroll mousewheel keyup',function(e){
		if ( e.which > 0 || e.type === "mousedown" || e.type === "mousewheel"){
			$("html, body").stop();
		}
	});
	
	$mobile_overflow_wrapper.on('touchstart touchmove touchend',function(e){
		if($html.hasClass('show_menu')) {
				e.preventDefault();
				e.stopPropagation();
				
				if(e.type=='touchend') {
					$('html').removeClass('show_menu');
				}
		}
	})
	
	$('#mobile_toggle').on('click',function(e){
	
		$('html').toggleClass('show_menu');
	
		e.preventDefault();
	});
	
	//submenus
	$('div.submenu > ul > li > a', $content_wrapper).click(function() {
	
		var $submenu = $(this).parent().find('ul.sub-menu');
	
		if($submenu.length === 1) {
			
			if($(this).parent().hasClass('current_page_parent')) {
				//$submenu.slideToggle();	
			} else {
				$submenu.slideToggle('slow',function() {
			    $(this).prev().toggleClass('expand', $(this).is(':visible'));
			  });
			}

			return false;
		}
		
	});
	
	
	
		
	
	
	/***************
	TESTIMONIALS
	****************/
	
	var $total_testimonials = $('.slider-wrapper-testimonial ul.testimonials li').length;
	
	if($total_testimonials > 0) {
	
		/*testimonial slider*/
		var $current_testimonial = 0;
		
		$('.slider-wrapper-testimonial div.testimonial-nav a').click(function() {
			
			//clear interval
			clearInterval(testimonial_interval);
			
			
			var selected = $(this).parent().index();
			var $selected_testimonial = $('.slider-wrapper-testimonial ul.testimonials li:eq('+selected+')');
			
			
			$('.slider-wrapper-testimonial ul.testimonials li').hide();
			$selected_testimonial.show();
			
			$(this).parent().parent().find('a.current').removeClass('current');
			$(this).addClass('current');
			
			return false;
			
		});
	
		function nextTestimonial() {
			
			
			var $currentIndex = $('.slider-wrapper-testimonial div.testimonial-nav a.current').parent().index();
			var $next_testimonial = (($currentIndex+1) == $total_testimonials ? $('.slider-wrapper-testimonial ul.testimonials li:eq(0)') : $('.slider-wrapper-testimonial ul.testimonials li:eq('+($currentIndex+1)+')'));
			
			$('.slider-wrapper-testimonial ul.testimonials li').hide();
			$next_testimonial.show();
			
			
			$('.slider-wrapper-testimonial div.testimonial-nav').find('a.current').removeClass('current');
			$('.slider-wrapper-testimonial div.testimonial-nav ul li:eq('+(($currentIndex+1) == $total_testimonials ? '0' : ($currentIndex+1))+') a').addClass('current');
			
			testimonial_interval = setTimeout(nextTestimonial, 5000);
			
		}
		
		var testimonial_interval = setTimeout(nextTestimonial, 5000);
	}
	

  
 	/***************
	HOMEPAGE SPLASH
	****************/ 
  if($splash.length > 0) {
  
  
	  $(window).on('resize',function(){
			var height = $(window).height(),
			container_height = $('#splash_wrap .container').height();
			
			if(height < container_height) {
				height = container_height;
			}
			$splash.add('.splash_image', $splash).add('#splash_wrap',$splash).height(height);
			
			/*if($mobilewrap.height() < $body.height()) {
				$mobilewrap.height($body.height())
			} else if( width > 992){*/
				//$mobilewrap.height('auto');
			//}
				
			
			$page.css({'min-height':height});
			
		});
  
  
  	$('.view', $splash).on('click',function(e){
			e.preventDefault();
			$("html, body").animate({ scrollTop: $splash.height() }, 1000, 'easeOutExpo');
		});
  
  	$('.splash_image:gt(0)',$splash).hide();
	
		var currentSplash = 0,
		totalSplash = $('.splash_image',$splash).length;
		
		
		function changeSplash(){
			
			var bg = $('.splash_image:eq('+(currentSplash+1)+')',$splash).data('bg');
			
			if(bg) {
				
				var img = new Image();
				img.onload = function(){
					var $img = $('.splash_image:eq('+(currentSplash+1)+')',$splash);
					$img.css({'background-image':'url('+bg+')'});
					$img.removeData('bg');
					$img.removeAttr('data-bg');
					
					changeSplash();
				};
				img.src = bg;
				
			} else {
				currentSplash++;
	
				if(currentSplash >= totalSplash) {
					currentSplash = 0;
					$('.splash_image:gt(0):lt('+(totalSplash-2)+')',$splash).hide();
					$('.splash_image:eq('+(totalSplash-1)+')',$splash).fadeOut(2000,'linear', function(){
						setTimeout(changeSplash, 5000);
					});
				} else {
					$('.splash_image:eq('+currentSplash+')',$splash).hide().fadeIn(2000, 'linear',function(){
						setTimeout(changeSplash, 5000);
					});
				}
			
			}
		}

  
  
  	$(window).on('ready',function(){
		
			if($splash.is(':visible')) {
				setTimeout(changeSplash, 5000);
			}
			
			
		});
  
	  
		var top = 0;
		
		$splash.swipe( {
	
	    
	    swipeStatus:function(event, phase, direction, distance, duration, fingers)
	    {
	    	if($(window).width() < 768) {
		    	switch(phase) {
			    	case 'start':
			    		top = parseInt($splash.css('top'));
			    	break;
			    	case 'move':
			    		if(direction == 'up') {
					      $splash.css({top:top-distance});
					      
				      } else if(direction == 'down') {
				      
				      	if(top+distance > 0) {
					      	$splash.css({top:0});
				      	} else {
					      	$splash.css({top:top+distance});
					      	
				      	}
				      }
			    	break;
			    	case 'end':
			    		height = $splash.height();
			    		if(direction == 'up' && distance > (height/3)) {
			    			$splash.animate({top:-height},function(){
				    			$(this).hide();
			    			});
			    		} else {
			    			$splash.animate({top:0});
			    		}	    	
			    	break;
		    	}
				}
	      
	     
	
	    },
	    //Default is 75px, set to 0 for demo so any distance triggers swipe
	     threshold:200,
	     maxTimeThreshold:5000,
	     fingers:'all'
	  });	  
	  
  }
  
  /***************
	SIDEBAR
	****************/ 
	
	$(document).on('scroll',function(){
		
		var sidebar_height = $sidebar.height(),
		container_height = $('> .container', $content_wrapper).height();
		
		if(container_height > (sidebar_height+40)) {

			var scroll_to = scroll_top = scroll_top = $(this).scrollTop(),
			header_height = $header.height();
		
			if($('header').css('position') == 'static' ) { //homepage is static
				
				scroll_to =  (scroll_top) - $content_wrapper.position().top;
				
			} else {
				
				scroll_to =  (scroll_top+header_height) - $content_wrapper.position().top + 35;
			}
			
			if(scroll_to < 0) {
				scroll_to = 0;
			}
			
			if(container_height-scroll_to < sidebar_height) {
				scroll_to = container_height - sidebar_height;
			}

			
			$sidebar.css({'position':'absolute','right':'15px','left':'15px','top':scroll_to});
			
			//$sidebar.stop().animate({'top':scroll_to});
		
			$('> .container', $content_wrapper).css({'min-height':sidebar_height});
		} else {
			$sidebar.css({'position':'static'});
			
		}
		
	})
  
  $('a.btn-expand').click(function(e) {
	 
	 e.preventDefault();
	 
	 if($('div.footer-menu').is(':visible')) {
		 $(this).css('background-position','center bottom');
		 $('div.footer-menu').slideUp(function(){
			 $(window).trigger('resize');
		 });
	 } else {
		 $(this).css('background-position','center top');
		 $('div.footer-menu').slideDown(function(){
			 $(window).trigger('resize');
		 });
	 }
	 
	 
	  
  });

  
  $(window).trigger('resize');
  
	
});