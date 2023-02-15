jQuery(document).ready(function($){

	// Slick
	$('.banner-carousel').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		dots: true
	});

	// Basic Animation
	function scrollLoad(){
		if ($(".animated")[0]) {
			$(".animated").each(function () {
				var wH = $(window).height();
				var sT = $(window).scrollTop();
				var oT = $(this).offset().top;
				var s = wH + sT - 10;
				var fadeInUpAnim = $(this).attr("data-animation") == "fadeInUp";
				var fadeInDownAnim = $(this).attr("data-animation") == "fadeInDown";
				var fadeInLeftAnim = $(this).attr("data-animation") == "fadeInLeft";
				var fadeInRightAnim = $(this).attr("data-animation") == "fadeInRight";
				if (s > oT && fadeInUpAnim) {
					$(this).addClass("fadeInUp");
				} else if (s > oT && fadeInDownAnim) {
					$(this).addClass("fadeInDown");
				} else if (s > oT && fadeInLeftAnim) {
					$(this).addClass("fadeInLeft");
				} else if (s > oT && fadeInRightAnim) {
					$(this).addClass("fadeInRight");
				} else {
				}
			});
		}
	};
	scrollLoad();
	$(window).scroll(scrollLoad);

	// Accordion
	function accordion(){
		var wW = $(window).width();
		if(wW <= 768){
			$('.accordion-button').click(function(){
				if($(this).hasClass('collapsed')){
					$(this).closest('.accordion-item').removeClass('active');
				}else{
					$('.accordion-item').removeClass('active');
					$(this).closest('.accordion-item').addClass('active');
				}
			});
		}else{
			$('.accordion-item').removeClass('active');
			$('.accordion-item').each(function(){
				var header_h = $(this).find('.accordion-header').height() + 3;
				var body_h = $(this).find('.accordion-collapse').height();
				var full_h = header_h + body_h;

				var header_w = $(this).find('.accordion-header').width();
				var full_w = $(this).width();
				var line_w = full_w - header_w - 105;

				$(this).height(header_h);
				$(this).find('._line').css('left', header_w);
				$(this).hover(
					function(){
						$(this).height(full_h);
						$(this).find('._line').width(line_w);
					},
					function(){
						$(this).height(header_h);
						$(this).find('._line').width(0);
					}
				);
			});
		}
	}
	accordion();
	$(window).resize(accordion);

	// Add background color to header nav
	function addBG_nav(){
		if($(window).scrollTop() > 2){
			$('header').addClass('header-nav-bg');
		} else {
			$('header').removeClass('header-nav-bg');
		}

	}
	addBG_nav();
	$(window).scroll(addBG_nav);

	// Pie chart
	var pieChart = document.getElementsByClassName('pie-chart-container');
	for (var i = 0; i < pieChart.length; i++) {
		document.querySelectorAll('.pie-chart')[i].piechart1 = function() { 
			var colors = ['#6D0F16','#842027','#87484D','#BC5E65','#DB525C', '#591D21','#600007','#49050A', '#200406', 'maroon']; 
			var slices = []; var values = []; 
			var percents = [i]; var n = 0; 
			var lengthz = document.querySelectorAll('.pie-chart')[i].length-1;
			var totalz = 0;

			for(var z = 0; z < lengthz; z++){
				totalz += parseFloat(document.querySelectorAll('.pie-chart')[i].elements[z].value); 
				values.push(document.querySelectorAll('.pie-chart')[i].elements[z].value);
			}

			for (var zz = 0; zz < lengthz; zz++){
				percents.push(document.querySelectorAll('.pie-chart')[i].elements[zz].value/totalz*100);
				n += percents[zz]; 
				slices.push('<circle cx="50%" cy="50%" r="16" stroke="' + colors[zz] + '" stroke-dasharray="'+ percents[zz+1].toFixed(2) +' 100" stroke-dashoffset="-'+n.toFixed(2)+'"></circle>');
			}
			var h = document.querySelectorAll('.pie-chart-view')[i];
			var svgstring = slices.join("");
			h.innerHTML = svgstring;
			pie_result.value = totalz;
		}
		document.querySelectorAll('.pie-chart')[i].piechart1();
	}
		
});

