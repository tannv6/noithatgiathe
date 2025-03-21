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
  //
  // //Slider news
  // const sliderNews = $(".list-post .item").length;
  // // const wrapper_video = $('.wrapper-video').length
  //
  // $(".list-post").slick({
  //     dots: false,
  //     infinite: true,
  //     arrows: true,
  //     speed: 300,
  //     slidesToShow: sliderNews >= 4 ? 4 : sliderNews,
  //     slidesToScroll: 1,
  //     prevArrow: '<i class="fa-solid fa-angle-left left_arrow"></i>',
  //     nextArrow: '<i class="fa-solid fa-angle-right right_arrow"></i>',
  //     responsive: [
  //         {
  //             breakpoint: 1024,
  //             settings: {
  //                 slidesToShow: 4,
  //                 slidesToScroll: 1,
  //                 infinite: true,
  //                 dots: false,
  //             },
  //         },
  //         {
  //             breakpoint: 767,
  //             settings: {
  //                 slidesToShow: 2,
  //                 slidesToScroll: 1,
  //                 infinite: true,
  //                 dots: false,
  //             },
  //         },
  //         {
  //             breakpoint: 480,
  //             settings: {
  //                 slidesToShow: 1,
  //                 slidesToScroll: 1,
  //             },
  //         },
  //     ],
  // });
  //
  // //Slider logo
  // const sliderLogo = $(".list-logo .item").length;
  // // const wrapper_video = $('.wrapper-video').length
  //
  // $(".list-logo").slick({
  //     dots: false,
  //     infinite: true,
  //     arrows: true,
  //     speed: 300,
  //     slidesToShow: sliderLogo >= 5 ? 5 : sliderLogo,
  //     slidesToScroll: 1,
  //     prevArrow: '<i class="fa-solid fa-angle-left left_arrow"></i>',
  //     nextArrow: '<i class="fa-solid fa-angle-right right_arrow"></i>',
  //     responsive: [
  //         {
  //             breakpoint: 1024,
  //             settings: {
  //                 slidesToShow: 5,
  //                 slidesToScroll: 1,
  //                 infinite: true,
  //                 dots: false,
  //             },
  //         },
  //         {
  //             breakpoint: 767,
  //             settings: {
  //                 slidesToShow: 2,
  //                 slidesToScroll: 1,
  //                 infinite: true,
  //                 dots: false,
  //             },
  //         },
  //         {
  //             breakpoint: 480,
  //             settings: {
  //                 slidesToShow: 1,
  //                 slidesToScroll: 1,
  //             },
  //         },
  //     ],
  // });
  //
  // // Slider View Product
  // const sliderView = $(".list-testimonial .item").length;
  // if (sliderView > 3) {
  //     $(".list-testimonial").slick({
  //         dots: false,
  //         infinite: true,
  //         speed: 300,
  //         autoplay: true,
  //         slidesToShow: 3,
  //         slidesToScroll: 1,
  //         prevArrow: '<i class="fa-solid fa-angle-left left_arrow"></i>',
  //         nextArrow: '<i class="fa-solid fa-angle-right right_arrow"></i>',
  //         responsive: [
  //             {
  //                 breakpoint: 1024,
  //                 settings: {
  //                     slidesToShow: 3,
  //                     slidesToScroll: 1,
  //                     infinite: true,
  //                     dots: false,
  //                 },
  //             },
  //             {
  //                 breakpoint: 767,
  //                 settings: {
  //                     slidesToShow: 1,
  //                     slidesToScroll: 1,
  //                     infinite: true,
  //                     dots: false,
  //                 },
  //             },
  //             {
  //                 breakpoint: 480,
  //                 settings: {
  //                     slidesToShow: 1,
  //                     slidesToScroll: 1,
  //                 },
  //             },
  //         ],
  //     });
  // }
  //
  //
  const sliderDetail = $(".image-small .item-small").length;
  var turnOnSlick = false;
  var number_slide = 3;
  if (sliderDetail >= 4) {
    turnOnSlick = true;
    number_slide = 4;
  }
  // // $('.xzoom').xzoom({tint: '#333', Xoffset: 5});
  // //Slider thumbnails
  //
  // // $('.image-big').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
  // //     console.log(currentSlide);
  // //     $(".image-big [data-slick-index='" + currentSlide + "']").find('img').removeClass('xzoom');
  // //     $(".image-big [data-slick-index='" + nextSlide + "']").find('img').addClass('xzoom');
  // //     $('.xzoom').xzoom({tint: '#333', Xoffset: 5});
  // // });
  $(".image-big").slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: ".image-small",
  });
  if (turnOnSlick == true) {
    $(".image-small").slick({
      slidesToShow: 4,
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
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: true,
            dots: true,
          },
        },
        {
          breakpoint: 991,
          settings: {
            slidesToShow: 4,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 769,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
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
  } else {
    $(".image-small img").on("click", function () {
      const img_url = $(this).attr("src");
      $(".image-big .img-wrap.slick-slide.slick-current.slick-active img").attr(
        "src",
        img_url
      );
    });
  }
});
