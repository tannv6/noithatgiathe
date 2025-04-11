jQuery(document).ready(function ($) {
	$(".image-slider").slick({
	infinite: true,
	dots: false,
	autoplay: true,
	autoplaySpeed: 3000,
	slidesToShow: 1,
	slidesToScroll: 1,
	prevArrow: '<i class="fa-solid fa-angle-left left_arrow"></i>',
	nextArrow: '<i class="fa-solid fa-angle-right right_arrow"></i>',
	});
	//Slider Deals
	const dealsCount = $(".brand-slider .img-wrap").length;
	$(".brand-slider").slick({
	dots: true,
	infinite: true,
	speed: 300,
	slidesToShow: dealsCount >= 6 ? 6 : dealsCount,
	slidesToScroll: 3,
	// prevArrow: '<i class="fa-solid fa-angle-left left_arrow"></i>',
	// nextArrow: '<i class="fa-solid fa-angle-right right_arrow"></i>',
	responsive: [
		{
		breakpoint: 1024,
		settings: {
			slidesToShow: 5,
			slidesToScroll: 3,
			infinite: true,
			dots: true,
		},
		},
		{
		breakpoint: 767,
		settings: {
			slidesToShow: 2,
			slidesToScroll: 3,
			infinite: true,
			arrows: false,
			dots: true,
		},
		},
		{
		breakpoint: 480,
		settings: {
			slidesToShow: 2,
			slidesToScroll: 1,
			arrows: false,
		},
		},
	],
	});
	const childCount = $(".child-categories .child-cate").length;
	if (childCount > 3 && window.matchMedia("(max-width: 767px)").matches) {
	// $(".child-categories").slick({
	//   dots: false,
	//   infinite: true,
	//   speed: 300,
	//   slidesToShow: 3,
	//   slidesToScroll: 1,
	//   prevArrow: '<i class="fa-solid fa-angle-left left_arrow"></i>',
	//   nextArrow: '<i class="fa-solid fa-angle-right right_arrow"></i>',
	// });
	} else if (
	childCount > 6 &&
	!window.matchMedia("(max-width: 767px)").matches
	) {
	$(".child-categories").slick({
		dots: true,
		infinite: true,
		arrows: false,
		speed: 300,
		slidesToShow: 6,
		slidesToScroll: 3,
		prevArrow: '<i class="fa-solid fa-angle-left left_arrow"></i>',
		nextArrow: '<i class="fa-solid fa-angle-right right_arrow"></i>',
		responsive: [
		{
			breakpoint: 1024,
			settings: {
			slidesToShow: 3,
			slidesToScroll: 1,
			infinite: true,
			dots: false,
			},
		},
		{
			breakpoint: 767,
			settings: {
			slidesToShow: 2,
			slidesToScroll: 1,
			infinite: true,
			dots: false,
			},
		},
		],
	});
	}

	const viewedItem = $(".list-product-viewed .item-product").length;
	// if (viewedItem > 3) {
	//     $('.slick-slider').show();
	// }
	if (viewedItem > 3) {
	$(".list-product-viewed").slick({
		dots: false,
		infinite: true,
		vertical: true,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 1,
		prevArrow: $(".slick-slider.up"),
		nextArrow: $(".slick-slider.down"),
		responsive: [
		{
			breakpoint: 1024,
			settings: {
			slidesToShow: 3,
			slidesToScroll: 1,
			infinite: true,
			dots: false,
			},
		},
		{
			breakpoint: 767,
			settings: {
			slidesToShow: 2,
			slidesToScroll: 1,
			infinite: true,
			dots: false,
			},
		},
		{
			breakpoint: 480,
			settings: {
			slidesToShow: 3,
			slidesToScroll: 1,
			},
		},
		],
	});
	}

	const pItem = $(".feature_product .list .product").length;
	// if (viewedItem > 3) {
	//     $('.slick-slider').show();
	// }
	if (pItem > 3) {
	$(".feature_product .list").slick({
		dots: false,
		infinite: true,
		vertical: true,
		speed: 300,
		slidesToShow: 3,
		slidesToScroll: 1,
		prevArrow: '<i class="fa-solid fa-angle-left left_arrow"></i>',
		nextArrow: '<i class="fa-solid fa-angle-right right_arrow"></i>',
		responsive: [
		{
			breakpoint: 1024,
			settings: {
			slidesToShow: 3,
			slidesToScroll: 1,
			infinite: true,
			dots: false,
			},
		},
		{
			breakpoint: 767,
			settings: {
			slidesToShow: 2,
			slidesToScroll: 1,
			infinite: true,
			dots: false,
			},
		},
		{
			breakpoint: 480,
			settings: {
			slidesToShow: 3,
			slidesToScroll: 1,
			},
		},
		],
	});
	}
	const sbItem = $(".list-product-sb .product").length;
	if (sbItem > 6) {
	$(".list-product-sb").slick({
		dots: false,
		infinite: true,
		vertical: true,
		speed: 300,
		slidesToShow: 6,
		slidesToScroll: 1,
		prevArrow: '<i class="fa-solid fa-angle-left left_arrow"></i>',
		nextArrow: '<i class="fa-solid fa-angle-right right_arrow"></i>',
		responsive: [
		{
			breakpoint: 1024,
			settings: {
			slidesToShow: 3,
			slidesToScroll: 1,
			infinite: true,
			dots: false,
			},
		},
		{
			breakpoint: 767,
			settings: {
			slidesToShow: 2,
			slidesToScroll: 1,
			infinite: true,
			dots: false,
			},
		},
		{
			breakpoint: 480,
			settings: {
			slidesToShow: 3,
			slidesToScroll: 1,
			},
		},
		],
	});
	}
	if (window.matchMedia("(max-width: 767px)").matches) {
	$(".feature_project .list").slick({
		infinite: true,
		dots: true,
		autoplay: false,
		autoplaySpeed: 3000,
		slidesToShow: 2,
		arrows: false,
		slidesToScroll: 1,
		// prevArrow: '<i class="fa-solid fa-angle-left left_arrow"></i>',
		// nextArrow: '<i class="fa-solid fa-angle-right right_arrow"></i>',
	});
	$(".news_layout .list-promotion").slick({
		infinite: true,
		dots: true,
		autoplay: false,
		autoplaySpeed: 3000,
		slidesToShow: 2,
		arrows: false,
		slidesToScroll: 1,
		// prevArrow: '<i class="fa-solid fa-angle-left left_arrow"></i>',
		// nextArrow: '<i class="fa-solid fa-angle-right right_arrow"></i>',
	});
	$(".development .row").slick({
		infinite: true,
		dots: true,
		autoplay: false,
		autoplaySpeed: 3000,
		slidesToShow: 1,
		arrows: false,
		slidesToScroll: 1,
		// prevArrow: '<i class="fa-solid fa-angle-left left_arrow"></i>',
		// nextArrow: '<i class="fa-solid fa-angle-right right_arrow"></i>',
	});
	}
	const sliderDetail = $(".image-small .item-small").length;
	$(".image-small .item-small").each(function () {
		const width = $(this).width();
		$(this).width(width);
		// $(this).height(width);
	});
	$(".image-big").slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	arrows: false,
	fade: true,
	asNavFor: ".image-small",
	});
	$(".image-small").slick({
	slidesToShow: sliderDetail >= 4 ? 4 : sliderDetail,
	slidesToScroll: 1,
	asNavFor: ".image-big",
	dots: false,
	centerMode: false,
	focusOnSelect: true,
	prevArrow: '<i class="fa-solid fa-angle-left left_arrow"></i>',
	nextArrow: '<i class="fa-solid fa-angle-right right_arrow"></i>',
	responsive: [
		{
		breakpoint: 1024,
		settings: {
			slidesToShow: sliderDetail >= 3 ? 3 : sliderDetail,
			slidesToScroll: 1,
			infinite: true,
			dots: true,
		},
		},
		{
		breakpoint: 769,
		settings: {
			slidesToShow: sliderDetail >= 4 ? 4 : sliderDetail,
			slidesToScroll: 1,
		},
		},
		{
		breakpoint: 480,
		settings: {
			slidesToShow: sliderDetail >= 3 ? 3 : sliderDetail,
			slidesToScroll: 1,
		},
		},
	],
	});
});
