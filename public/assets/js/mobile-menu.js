jQuery(document).ready(function ($) {
	/**
	 * Content: File js cấu hình mobile menu
	 * @creator Tuyên
	 * @time 17/02/2022 18:50
	 */
	var menu_id = "#menu-danh-muc-san-pham-2";
	var menu_button = $(".responsive-menu-toggle");
	var body = $("body");
	// console.log('hẻeeerr');
	$(menu_id + " li.menu-item-has-children").append(
	'<i class="fas open fa-solid fa-angle-down"></i>'
	);
	$(menu_id + " li.menu-item-has-children > .fas").on("click", function () {
	console.log("click", $(this).prev("ul"));

	$(this).parent().toggleClass("active").siblings().removeClass("active");
	$(this).prev("ul").slideToggle();
	$(this).find("i").toggleClass("clicked");
	$(this).parent().siblings().find("ul").slideUp();
	return false;
	});

	// $('html').click(function(event) {
	//     if ($(event.target).closest(menu_id).length === 0) {
	//         $(menu_id).removeClass('active');
	//         body.removeClass('mobile-slide-menu');
	//     }
	// });
	var mobile_init_W = 1240;
	var slide = $("#Side_slide");
	var overlay = $("#body_overlay");
	var ss_mobile_init_W = mobile_init_W;
	var pos = "left";

	// constructor ----------

	var constructor = function () {
	if (!slide.hasClass("enabled")) {
		$("nav#menu").detach().appendTo("#Side_slide .menu_wrapper");
		slide.addClass("enabled");
	}
	};

	// destructor ----------

	var destructor = function () {
	if (slide.hasClass("enabled")) {
		close();
		$("nav#menu").detach().prependTo("#Top_bar .menu_wrapper");
		slide.removeClass("enabled");
	}
	};

	// reload ----------

	var reload = function () {
	if ($(document).width() < ss_mobile_init_W) {
		constructor();
	} else {
		destructor();
	}
	};

	// init ----------

	var init = function () {
	if (slide.hasClass("left")) {
		pos = "left";
	}

	if (body.hasClass("header-simple")) {
		ss_mobile_init_W = 9999;
	}

	reload();
	};

	// reset to default ----------

	var reset = function (time) {
	$(".lang-active.active", slide)
		.removeClass("active")
		.children("i")
		.attr("class", "icon-down-open-mini");
	$(".lang-wrapper", slide).fadeOut(0);

	$(".icon.search.active", slide).removeClass("active");
	$(".search-wrapper", slide).fadeOut(0);

	$(".menu_wrapper, .social", slide).fadeIn(time);
	};

	// menu button ----------

	var button = function () {
	// show
	if (pos == "left") {
		slide.animate({ left: 0 }, 300);
		body.animate({ right: -125 }, 300);
	} else {
		slide.animate({ right: 0 }, 300);
		body.animate({ left: -125 }, 300);
	}

	overlay.fadeIn(300);

	// reset
	reset(0);
	};

	// close ----------

	var close = function () {
	if (pos == "left") {
		slide.animate({ left: -270 }, 300);
		body.animate({ right: 0 }, 300);
	} else {
		slide.animate({ right: -270 }, 300);
		body.animate({ left: 0 }, 300);
	}

	overlay.fadeOut(300);
	};

	// search ----------

	$(".icon.search", slide).on("click", function (e) {
	e.preventDefault();

	var el = $(this);

	if (el.hasClass("active")) {
		$(".search-wrapper", slide).fadeOut(0);
		$(".menu_wrapper, .social", slide).fadeIn(300);
	} else {
		$(".search-wrapper", slide).fadeIn(300);
		$(".menu_wrapper, .social", slide).fadeOut(0);

		$(".lang-active.active", slide)
		.removeClass("active")
		.children("i")
		.attr("class", "icon-down-open-mini");
		$(".lang-wrapper", slide).fadeOut(0);
	}

	el.toggleClass("active");
	});

	// search form submit ----------

	$("a.submit", slide).on("click", function (e) {
	e.preventDefault();
	$("#side-form").submit();
	});

	// lang menu ----------

	$(".lang-active", slide).on("click", function (e) {
	e.preventDefault();

	var el = $(this);

	if (el.hasClass("active")) {
		$(".lang-wrapper", slide).fadeOut(0);
		$(".menu_wrapper, .social", slide).fadeIn(300);
		el.children("i").attr("class", "icon-down-open-mini");
	} else {
		$(".lang-wrapper", slide).fadeIn(300);
		$(".menu_wrapper, .social", slide).fadeOut(0);
		el.children("i").attr("class", "icon-up-open-mini");

		$(".icon.search.active", slide).removeClass("active");
		$(".search-wrapper", slide).fadeOut(0);
	}

	el.toggleClass("active");
	});

	// init, click, debouncedresize ----------

	// init

	init();

	// click | menu button

	menu_button.off("click");

	menu_button.on("click", function (e) {
	e.preventDefault();
	// body.toggleClass('mobile-slide-menu');
	$(".menu-menu-chinh-container").toggleClass("active");
	button();
	});

	// click | close

	overlay.on("click", function (e) {
	// if (body.hasClass('mobile-slide-menu')) {
	//     body.toggleClass('mobile-slide-menu');
	// }
	close();
	});

	$(".close", slide).on("click", function (e) {
	e.preventDefault();
	close();
	});

	// click | below search or languages menu

	$(slide).on("click", function (e) {
	if ($(e.target).is(slide)) {
		reset(300);
	}
	});

	// debouncedresize

	$(window).on("debouncedresize", reload);
	function sideSlide() {}

	// menu-mobile
	$(".responsive-menu-toggle .far.fa-bars").click(function () {
	$(".nav-menu-mobile").addClass("show");
	});

	$(".icon-cancel").click(function () {
	$(".nav-menu-mobile").removeClass("show");
	});
});
