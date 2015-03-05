$(function() {

    $("#banner .rslides").responsiveSlides({
		speed: 1000,
		timeout: 6000	
	});
	
	$('#menu ul.nav-menu > li > a').hover(
		function() {
			if($(this).parent().find('ul.sub-menu').size() > 0) {
				$(this).parent().find('ul.sub-menu').slideDown();
			} else {
				$('#menu ul.sub-menu').slideUp();
			}
		},
		function() {
			//hover out
		}
	);
	
	$('#gallery div.popup-gallery').each(function() {
		$(this).magnificPopup({
			delegate: 'a', // the container for each your gallery items
			type: 'image',
			gallery: {
				enabled: true,
				navigateByImgClick: true,
				preload: [0,1] // Will preload 0 - before current, and 1 after the current image
			}
		});
	});
	
});