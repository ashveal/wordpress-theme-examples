$(document).ready( function() {
	
	$(".clearit input, .clearit textarea, .clearit").live({
		focus: function() {
		    if( this.value == this.defaultValue ) {
				this.value = "";
			}
		},
		blur: function() {
		    if( !this.value.length ) {
				this.value = this.defaultValue;
			}
		}
	});
	
	$('header div.flexslider').flexslider({
		animation: "fade",              //String: Select your animation type, "fade" or "slide"
		slideDirection: "horizontal",   //String: Select the sliding direction, "horizontal" or "vertical"
		slideshow: true,                //Boolean: Animate slider automatically
		slideshowSpeed: 6000, 			//Integer: Set the speed of the slideshow cycling, in milliseconds
		animationDuration: 500,         //Integer: Set the speed of animations, in milliseconds
		directionNav: true,             //Boolean: Create navigation for previous/next navigation? (true/false)
		controlNav: false,              //Boolean: Create navigation for paging control of each slide? Note: Leave true for manualControls usage
		keyboardNav: true,              //Boolean: Allow slider navigating via keyboard left/right keys
		mousewheel: false,              //Boolean: Allow slider navigating via mousewheel
		prevText: "",           //String: Set the text for the "previous" directionNav item
		nextText: "",               //String: Set the text for the "next" directionNav item
		pausePlay: false,               //Boolean: Create pause/play dynamic element
		pauseText: 'Pause',             //String: Set the text for the "pause" pausePlay item
		playText: 'Play',               //String: Set the text for the "play" pausePlay item
		randomize: false,               //Boolean: Randomize slide order
		slideToStart: 0,                //Integer: The slide that the slider should start on. Array notation (0 = first slide)
		animationLoop: true,            //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
		pauseOnAction: true,            //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
		pauseOnHover: false,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
		controlsContainer: ".slider-nav",          //Selector: Declare which container the navigation elements should be appended too. Default container is the flexSlider element. Example use would be ".flexslider-container", "#container", etc. If the given element is not found, the default action will be taken.
		manualControls: "",             //Selector: Declare custom control navigation. Example would be ".flex-control-nav li" or "#tabs-nav li img", etc. The number of elements in your controlNav should match the number of slides/tabs.
		start: function(){},            //Callback: function(slider) - Fires when the slider loads the first slide
		before: function(){},           //Callback: function(slider) - Fires asynchronously with each slider animation
		after: function(){},            //Callback: function(slider) - Fires after each slider animation completes
		end: function(){}
    });
    
    
    var opened = '';
    
	$('header ul.main-menu > li > a').hover(function() {
		
		if(opened != '') {
			opened.hide();
		}
	   
	    var submenu = $(this).parent().find('ul.sub-menu');
	   
	    if(submenu.length == 1) {
			
			/*if($(submenu)[0] == $(opened)[0]) {
				submenu.hide();
			} else {
				submenu.show();
		    }*/
		    
		    submenu.show();
		    
		    opened = submenu;
		    
		    if($(this).parent.hasClass('allowclick')) {
			    return true;
		    } else {
			    return false;
		    }
		    
		    return false;
		    
	    }
	    
    });
    
    $('header ul.sub-menu').hover(
		function() {
			//do nothing
		}, function() {
			opened.hide();
		}
	);
    
    $('#venues div.flexslider').flexslider({
    	slideshow: false,
    	controlNav: true,
    	directionNav: false,
    	controlsContainer: ".slider-nav"
    });
    
    $('#venues div.venue-images ul.slides').magnificPopup({
		delegate: 'a',
		type: 'image',
		tLoading: 'Loading image #%curr%...',
		mainClass: 'mfp-img-mobile',
		gallery: {
			enabled: true,
			navigateByImgClick: true,
			preload: [0,1] // Will preload 0 - before current, and 1 after the current image
		},
		image: {
			tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
			titleSrc: function(item) {
				return item.el.attr('title');
			}
		}
	});
	
	$('#menu ul.submenu a').click(function() {
		
		var target = $(this).attr('href');
		
		$('html, body').animate({
        	scrollTop: $(target).offset().top
		}, 500);
		
		return false;
		
	});
	
	$(window).scroll(function() {
	
		//this will calculate header's full height, with borders, margins, paddings
		var headerH = $('header').outerHeight(true);
		var scrollTopVal = $(this).scrollTop();
		if(scrollTopVal > headerH) {
        	$('#menu div.menu-menu').css({'position':'fixed','top' :'20px'});
        	$('#menu div.menu-content').css({'marginLeft':'200px'});
        	$('#content div.content-menu').css({'position':'fixed','top' :'20px'});
        	$('#content div.content-main').css({'marginLeft':'200px'});
		} else {
        	$('#content div.content-menu').css({'position':'static','top':'0px'});
        	$('#content div.content-main').css({'marginLeft':'0px'});
		}
	
	
	
	});
	
});