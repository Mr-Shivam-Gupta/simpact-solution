(function ($) {
	"user strict";
	// Preloader Js
	$(window).on('load', function () {
		$('.overlayer').fadeOut(1000);
		var img = $('.bg_img');
		img.css('background-image', function () {
			var bg = ('url(' + $(this).data('background') + ')');
			return bg;
		});
		galleryMasonary();
	});
	// Gallery Masonary
	function galleryMasonary() {
		// filter functions
		var $grid = $(".work-wrapper");
		var filterFns = {};
		$grid.isotope({
			itemSelector: '.work-item',
			masonry: {
				columnWidth: 0,
			}
		});
		// bind filter button click
		$('ul.filter').on('click', 'li', function () {
			var filterValue = $(this).attr('data-filter');
			// use filterFn if matches value
			filterValue = filterFns[filterValue] || filterValue;
			$grid.isotope({
				filter: filterValue
			});
		});
		// change is-checked class on buttons
		$('ul.filter').each(function (i, buttonGroup) {
			var $buttonGroup = $(buttonGroup);
			$buttonGroup.on('click', 'li', function () {
				$buttonGroup.find('.active').removeClass('active');
				$(this).addClass('active');
			});
		});
	}
	$(document).ready(function () {
		// Nice Select
		$('.select-bar').niceSelect();
		// PoPuP 
		$('.popup').magnificPopup({
			disableOn: 700,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false,
			disableOn: 300
		});
		$("body").each(function () {
			$(this).find(".img-pop").magnificPopup({
				type: "image",
				gallery: {
					enabled: true
				}
			});
		});
		// aos js active
		new WOW().init()
		//Faq
		$('.faq-wrapper .faq-title').on('click', function (e) {
			var element = $(this).parent('.faq-item');
			if (element.hasClass('open')) {
				element.removeClass('open');
				element.find('.faq-content').removeClass('open');
				element.find('.faq-content').slideUp(200, "swing");
			} else {
				element.addClass('open');
				element.children('.faq-content').slideDown(200, "swing");
				element.siblings('.faq-item').children('.faq-content').slideUp(200, "swing");
				element.siblings('.faq-item').removeClass('open');
				element.siblings('.faq-item').find('.faq-title').removeClass('open');
				element.siblings('.faq-item').find('.faq-content').slideUp(200, "swing");
			}
		});
		//Menu Dropdown Icon Adding
		$("ul>li>.submenu").parent("li").addClass("menu-item-has-children");
		// drop down menu width overflow problem fix
		$('ul').parent('li').hover(function () {
			var menu = $(this).find("ul");
			var menupos = $(menu).offset();
			if (menupos.left + menu.width() > $(window).width()) {
			}
		});
		$('.menu li a').on('click', function (e) {
			var element = $(this).parent('li');
			if (element.hasClass('open')) {
				element.removeClass('open');
				element.find('li').removeClass('open');
				element.find('ul').slideUp(300, "swing");
			} else {
				element.addClass('open');
				element.children('ul').slideDown(300, "swing");
				element.siblings('li').children('ul').slideUp(300, "swing");
				element.siblings('li').removeClass('open');
				element.siblings('li').find('li').removeClass('open');
				element.siblings('li').find('ul').slideUp(300, "swing");
			}
		})
		// Scroll To Top 
		var scrollTop = $(".scrollToTop");
		$(window).on('scroll', function () {
			if ($(this).scrollTop() < 500) {
				scrollTop.removeClass("active");
			} else {
				scrollTop.addClass("active");
			}
		});
		//header
		// var header = $("header");
		// $(window) .on('scroll', function () {
		//   if ($(this).scrollTop() < 200) {
		//     header.removeClass("active");
		//     $('.header-bottom').removeClass('active');
		//   } else {
		//     header.addClass("active");
		//     $('.header-bottom').addClass('active');
		//   }
		// });

		// ========================= Header Sticky Js Start =====================
		$(window).on('scroll', function () {
			if ($(window).scrollTop() >= 300) {
				$('.header-bottom').addClass('fixed-header');
			}
			else {
				$('.header-bottom').removeClass('fixed-header');
			}
		});
		// ========================= Header Sticky Js End=====================

		//Click event to scroll to top
		$('.scrollToTop').on('click', function () {
			$('html, body').animate({
				scrollTop: 0
			}, 500);
			return false;
		});
		//Header Bar
		$('.header-bar').on('click', function () {
			$(this).toggleClass('active');
			$('.overlay').toggleClass('active');
			$('.menu').toggleClass('active');
		})
		$('.overlay').on('click', function () {
			$('.header-bar').removeClass('active');
			$('.overlay').removeClass('active');
			$('.menu').removeClass('active');
		});
		//Tab Section
		$('.tab ul.tab-menu').addClass('active').find('> li:eq(0)').addClass('active');
		$('.tab ul.tab-menu li').on('click', function (g) {
			var tab = $(this).closest('.tab'),
				index = $(this).closest('li').index();
			tab.find('li').siblings('li').removeClass('active');
			$(this).closest('li').addClass('active');
			tab.find('.tab-area').find('div.tab-item').not('div.tab-item:eq(' + index + ')').hide(10);
			tab.find('.tab-area').find('div.tab-item:eq(' + index + ')').fadeIn(10);
			g.preventDefault();
		});
		//Odometer
		$(".counter-item").each(function () {
			$(this).isInViewport(function (status) {
				if (status === "entered") {
					for (var i = 0; i < document.querySelectorAll(".odometer").length; i++) {
						var el = document.querySelectorAll('.odometer')[i];
						el.innerHTML = el.getAttribute("data-odometer-final");
					}
				}
			});
		});
		var swiper = new Swiper('.client-slider', {
			loop: true,
			spaceBetween: 30,
			slidesPerView: 2,
			autoplay: {
				delay: 2000,
				disableOnInteraction: false,
			},
			speed: 1000,
			breakpoints: {
				767: {
					slidesPerView: 1,
				},
			},
		});
		var swiper = new Swiper('.banner-slider', {
			loop: true,
			slidesPerView: 1,
			autoplay: {
				delay: 5000,
				disableOnInteraction: false,
			},
			autoHeight: true,
			navigation: {
				nextEl: '.banner-next',
				prevEl: '.banner-prev',
			},
			// pagination: true,
			speed: 1000,
		});
		//The Password Show
		$('.show-pass-one').on('click', function () {
			var x = document.getElementById("myInput");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		});
		$('.show-pass-two').on('click', function () {
			var x = document.getElementById("myInputTwo");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		});
		$('.show-pass-three').on('click', function () {
			var x = document.getElementById("myInputThree");
			if (x.type === "password") {
				x.type = "text";
			} else {
				x.type = "password";
			}
		});

	});
})(jQuery);
