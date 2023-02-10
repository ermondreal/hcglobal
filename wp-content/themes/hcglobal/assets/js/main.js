jQuery(document).ready(function($){
	console.log('main JS loaded');

	$('.banner-carousel').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		dots: true
	});

});