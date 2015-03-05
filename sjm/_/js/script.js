$(function() {

	/*main menu*/
	var $openMenu = $('#main-menu-wrapper ul.main-menu').find('ul.sub-menu:visible');
	
	$('#main-menu-wrapper ul.main-menu > li > a').click(function() {
		
		var $submenu = $(this).parent().find('ul.sub-menu');
		
		if($submenu.length == 1) {
			$submenu.show();
			
			if($openMenu != '') {
				$openMenu.hide();
			}
			
			$openMenu = $submenu;
			
			return false;
		}
		
	});
	
	/*scroll to top*/
	$('#back-to-top').click(function() {
		
		var multipier = 200;
		var durationRange = {
			min: 200,
			max: 1000
		};

		var winHeight = $(window).height();
		var docHeight = $(document).height();
		var proportion = Math.floor(docHeight / winHeight);

		var duration = proportion * multipier;

		if (duration < durationRange.min) {
			duration = durationRange.min;
		}

		if (duration > durationRange.max) {
			duration = durationRange.max;
		}

		$('html, body').animate({
			scrollTop: $("#page").offset().top
		}, duration);
		
		return false;
		
	});
	
	/*sliders*/
	$('#slider-wrapper .flexslider').flexslider({
		animation: "fade",
		slideDirection: "horizontal",
		slideshow: false,
		slideshowSpeed: 8000,
		animationDuration: 500,
		directionNav: false,
		controlNav: true,
		controlsContainer: "div.slider-nav"
    });
    
    /*google maps*/
    $('.acf-map').each(function() {
		render_map($(this));
	});
	
	var $current_image = $('#collection-single div.image ul li:first-child');
	
	/*collection images*/
	$('#collection-single div.images a').click(function() {
		
		//new image
		var $img = $(this).attr('href');
		var $rel = $(this).attr('rel');
		
		//set new image
		var $target_image = $('#collection-single div.image ul').find('a[rel="'+$rel+'"]');
		$target_image.parent().css('display','inline-block');
		$current_image.hide();
		$current_image = $target_image.parent(); 
		
		//update selected image
		$(this).parent().parent().find('span.bar-active').removeClass('bar-active');
		$(this).parent().find('span.bar').addClass('bar-active');
		
		return false;
		
	});
	
	$("#collection-single div.image ul > li > a").click(function() {
		
		if($current_image.next().length != 0) {
			$current_image.next().css('display','inline-block');
			$current_image.hide();
			$current_image = $current_image.next();
			var $current_selected = $('#collection-single div.images').find('span.bar-active');
			$current_selected.removeClass('bar-active');
			$current_selected.parent().next().find('span.bar').addClass('bar-active');
		} else {
			$('#collection-single div.image ul li:first-child').css('display','inline-block');
			$current_image.hide();
			$current_image = $('#collection-single div.image ul li:first-child');
			var $current_selected = $('#collection-single div.images').find('span.bar-active');
			$current_selected.removeClass('bar-active');
			$('#collection-single div.images ul li:first-child').find('span.bar').addClass('bar-active');
		}
		
		return false;
		
	});
	
	$("#collection-single div.image").swipe({
		swipe:function(event, direction, distance, duration, fingerCount) {
	    	
	    	console.log('swiped');
	    	
	    	switch(direction) {
		    	
		    	case 'left':
		    	
		    		if($current_image.next().length != 0) {
						$current_image.next().css('display','inline-block');
						$current_image.hide();
						$current_image = $current_image.next();
						var $current_selected = $('#collection-single div.images').find('span.bar-active');
						$current_selected.removeClass('bar-active');
						$current_selected.parent().next().find('span.bar').addClass('bar-active');
					} else {
						$('#collection-single div.image ul li:first-child').css('display','inline-block');
						$current_image.hide();
						$current_image = $('#collection-single div.image ul li:first-child');
						var $current_selected = $('#collection-single div.images').find('span.bar-active');
						$current_selected.removeClass('bar-active');
						$('#collection-single div.images ul li:first-child').find('span.bar').addClass('bar-active');
					}
		    	
		    	break;
		    	
		    	case 'right':
		    	
		    	break;
		    	
	    	}
	    	
		}
	});
	
	/*collection image caption*/
	$('#collection-single div.caption-button a').click(function() {
	
		$('#collection-single div.caption').toggle();
		
		return false;
	
	});
	
});

function render_map($el) {
 
	//var
	var $markers = $el.find('.marker');
 
	//vars
	var args = {
		zoom		: 16,
		center		: new google.maps.LatLng(0, 0),
		mapTypeId	: google.maps.MapTypeId.ROADMAP
	};
 
	//create map	        	
	var map = new google.maps.Map($el[0],args);
 
	//add a markers reference
	map.markers = [];
 
	//add markers
	$markers.each(function(){
 
    	add_marker($(this),map);
 
	});
 
	//center map
	center_map( map );
 
}

function add_marker($marker,map) {

	//var
	var latlng = new google.maps.LatLng( $marker.attr('data-lat'), $marker.attr('data-lng') );
 
	//create marker
	var marker = new google.maps.Marker({
		position	: latlng,
		map			: map
	});
 
	//add to array
	map.markers.push( marker );
 
	//if marker contains HTML, add it to an infoWindow
	if( $marker.html() )
	{
		//create info window
		var infowindow = new google.maps.InfoWindow({
			content		: $marker.html()
		});
 
		//show info window when marker is clicked
		google.maps.event.addListener(marker, 'click', function() {
 
			infowindow.open( map, marker );
 
		});
	}
 
}

function center_map(map) {

	//vars
	var bounds = new google.maps.LatLngBounds();
 
	//loop through all markers and create bounds
	$.each( map.markers, function( i, marker ){
 
		var latlng = new google.maps.LatLng( marker.position.lat(), marker.position.lng() );
 
		bounds.extend( latlng );
 
	});
 
	//only 1 marker?
	if( map.markers.length == 1 )
	{
		//set center of map
	    map.setCenter( bounds.getCenter() );
	    map.setZoom( 16 );
	}
	else
	{
		//fit to bounds
		map.fitBounds( bounds );
	}
 
}