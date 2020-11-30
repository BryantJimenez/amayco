(function($) {

	"use strict";

	$('[data-toggle="tooltip"]').tooltip();

 	// loader
 	var loader = function() {
 		setTimeout(function() { 
 			if($('#ftco-loader').length > 0) {
 				$('#ftco-loader').removeClass('show');
 			}
 		}, 1);
 	};
 	loader();

 	// Mobile Navigation
 	if ($('#nav-menu-container').length) {
 		var $mobile_nav = $('#nav-menu-container').clone().prop({
 			id: 'mobile-nav'
 		});
 		$mobile_nav.find('> ul').attr({
 			'class': '',
 			'id': ''
 		});
 		$('body').append($mobile_nav);
 		$('body').prepend('<button type="button" id="mobile-nav-toggle"><i class="fa fa-bars"></i></button>');
 		$('body').append('<div id="mobile-body-overly"></div>');
 		$('#mobile-nav').find('.menu-has-children').prepend('<i class="fa fa-chevron-down"></i>');

 		$(document).on('click', '.menu-has-children i', function(e) {
 			$(this).next().toggleClass('menu-item-active');
 			$(this).nextAll('ul').eq(0).slideToggle();
 			$(this).toggleClass("fa-chevron-up fa-chevron-down");
 		});

 		$(document).on('click', '#mobile-nav-toggle', function(e) {
 			$('body').toggleClass('mobile-nav-active');
 			$('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
 			$('#mobile-body-overly').toggle();
 		});

 		$(document).click(function(e) {
 			var container = $("#mobile-nav, #mobile-nav-toggle");
 			if (!container.is(e.target) && container.has(e.target).length === 0) {
 				if ($('body').hasClass('mobile-nav-active')) {
 					$('body').removeClass('mobile-nav-active');
 					$('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
 					$('#mobile-body-overly').fadeOut();
 				}
 			}
 		});
 	} else if ($("#mobile-nav, #mobile-nav-toggle").length) {
 		$("#mobile-nav, #mobile-nav-toggle").hide();
 	}

 	if ($(window).scrollTop() > 100) {
 		$('#header').addClass('header-scrolled');
 		if ($('#header').hasClass('navbar-fixed')) {
 			$('#header').removeClass('header-fixed-top');
 		}
 	} else {
 		$('#header').removeClass('header-scrolled');
 		if ($('#header').hasClass('navbar-fixed')) {
 			$('#header').addClass('header-fixed-top');
 		}
 	}

 	// Intro carousel
  var introCarousel = $(".carousel");
  var introCarouselIndicators = $(".carousel-indicators");
  introCarousel.find(".carousel-inner").children(".carousel-item").each(function(index) {
    (index === 0) ?
    introCarouselIndicators.append("<li data-target='#introCarousel' data-slide-to='" + index + "' class='active'></li>") :
    introCarouselIndicators.append("<li data-target='#introCarousel' data-slide-to='" + index + "'></li>");

    $(this).css("background-image", "url('" + $(this).children('.carousel-background').children('img').attr('src') +"')");
    $(this).children('.carousel-background').remove();
  });

 })(jQuery);

// Scroll header
$(window).scroll(function() {
	if ($(this).scrollTop() > 100) {
		$('#header').addClass('header-scrolled');
		if ($('#header').hasClass('navbar-fixed')) {
			$('#header').removeClass('header-fixed-top');
		}
	} else {
		$('#header').removeClass('header-scrolled');
		if ($('#header').hasClass('navbar-fixed')) {
			$('#header').addClass('header-fixed-top');
		}
	}
});

//Abrir excursion en el modal
$('.openExcursion').click(function(event) {
	var slug=$(this).attr('slug'), img=$(this).attr('image');
	$.ajax({
		url: '/excursiones/buscar',
		type: 'POST',
		dataType: 'json',
		data: {slug: slug},
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	})
	.done(function(obj) {
		if (obj.status) {
			$('#titleExcursion').text(obj.title);
			$('#descriptionExcursion').html(obj.description);
			$('#imgExcursion').attr('src', img);
			$('#modalExcursion').modal();
		} else {
			Lobibox.notify('error', {
				title: 'Error',
				sound: true,
				msg: 'Ha ocurrido un problema, intentelo nuevamente.'
			});
		}
	});
});

//Filtro de categorias
$('#filter button').click(function(event) {
	$('#filter button').addClass('btn-secondary');
	$('#filter button').removeClass('btn-primary');
	$(this).addClass('btn-primary');
	var category=$(this).attr('category');
	if(category=="all") {
		$('#items-gallery .item-gallery').fadeIn();
	} else {
		$('#items-gallery .item-gallery[category!="'+category+'"]').fadeOut();
		$('#items-gallery .item-gallery[category="'+category+'"]').fadeIn();
	}
});