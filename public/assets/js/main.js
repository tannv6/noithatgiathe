// window.addEventListener('load', function () {
//     AOS.init({
//         duration: 1000,
//         once: true,
//         offset: 100,
//         delay: 0,
//     });
// });
jQuery(document).ready(function ($) {
  // $('img').bind('contextmenu', function (e) {
  //     return false;
  // });
  $('p:contains(">>>>")').has("a").addClass("quotes-customs");
  $(".item-wrapper").click(function () {
    $(this).toggleClass("service-title-clicked");
    $(this).find("div.content").slideToggle("fast");
  });

  $(".read-more-homedy").click(function () {
    $(".dtcvmodetail").addClass("open-read");
    $(".dtchide").addClass("collapse");
    $(".thc-content-custom").addClass("open-full-height");
  });
  $(".collapse-homedy").click(function () {
    $(".dtcvmodetail").removeClass("open-read");
    $(".dtchide").removeClass("collapse");
    $(".thc-content-custom").removeClass("open-full-height");
    $([document.documentElement, document.body]).animate(
      {
        scrollTop: $("#content").offset().top,
      },
      500
    );
  });
  var process = $(".process-item");
  var activeIndex = $(".process-item.active").attr("index");
  process.click(function () {
    process.removeClass("active");
    $(this).addClass("active");
    activeIndex = $(this).attr("index");
    $(".detail-process").find(".detail").removeClass("active");
    $(".detail-process").find(".detail").eq(activeIndex).addClass("active");
  });
  process.hover(
    function () {
      $(this).addClass("active");
      const index = $(this).attr("index");
      $(".detail-process").find(".detail").removeClass("active");
      $(".detail-process").find(".detail").eq(index).addClass("active");
    },
    function () {
      const index = $(this).attr("index");
      if (index !== activeIndex) {
        $(this).removeClass("active");
      }
      $(".detail-process").find(".detail").removeClass("active");
      $(".detail-process").find(".detail").eq(activeIndex).addClass("active");
    }
  );

  const menuCat = $(".sc-banner .menu-danh-muc-san-pham-container");
  const headerHeight = $("header").height();
  const menuHeight = menuCat.height();
  stickyHandle({
    header: "#header",
    target: ".header__bottom ",
    offset: headerHeight,
    offset2: headerHeight - $(".header__bottom ").height(),
    callback: (is_sticky) => {
      if (is_sticky) {
        $(".scrollToTop").addClass("btn-show");
      } else {
        $(".scrollToTop").removeClass("btn-show");
      }
    },
  });
  if (menuCat[0]) {
    stickyHandle({
      offset: headerHeight + menuHeight,
      offset2: headerHeight + menuHeight,
      callback: (is_sticky) => {
        if (is_sticky) {
          $(".header__bottom  .menu-left").addClass("can-hover");
        } else {
          $(".header__bottom  .menu-left").removeClass("can-hover");
        }
      },
    });
  }

  function stickyHandle({ header, target, offset, offset2, callback }) {
    const offsetRemove = offset2 || offset / 2;
    const targetSticky = target || header;
    const dataPading = parseInt($(header).next().css("padding-top"));
    if ($(header)[0] || (callback && !header && !target)) {
      let prev_sticky = false;
      let is_sticky = false;
      $(window).scroll(function () {
        var window_y = $(window).scrollTop();
        if (window_y > offset) {
          is_sticky = true;
          if (!$(targetSticky).hasClass("sticky")) {
            $(header)
              .next()
              .css("padding-top", $(targetSticky).height() + dataPading);
            $(targetSticky).addClass("sticky");
          }
        } else if (window_y <= offsetRemove) {
          is_sticky = false;
          if ($(targetSticky).hasClass("sticky")) {
            $(targetSticky).removeClass("sticky");
            $(header).next().css("padding-top", "");
          }
        }
        if (callback && is_sticky != prev_sticky) {
          callback(is_sticky);
          prev_sticky = is_sticky;
        }
      });
    }
  }

  $(".scrollToTop").click(function () {
    $(window).scrollTop(0);
    return false;
  });

  /**
   * Content: get params
   * @creator Tuyên
   * @time 13/07/2022 15:23
   */

  var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
      sURLVariables = sPageURL.split("&"),
      sParameterName,
      i;

    for (i = 0; i < sURLVariables.length; i++) {
      sParameterName = sURLVariables[i].split("=");

      if (sParameterName[0] === sParam) {
        return sParameterName[1] === undefined
          ? true
          : decodeURIComponent(sParameterName[1]);
      }
    }
    return false;
  };

  var tech = getUrlParameter("orderby");

  $(".filter   input[type=radio]").click(function () {
    $(this).closest("form").submit();
  });

  if ($("#urlField")) {
    // JUST TO PREVENT JS ERRORS BUT SHOULD ALLWAYS BE DIFFERENT TO NULL
    $("#urlField").val(window.location.href);
  }

  /**
   * Content: Tự động noffolow ahref
   * @creator Tuyên
   * @time 2021-09-25 09:50
   */
  var comp = new RegExp(location.host);
  $("a").each(function () {
    if (comp.test($(this).attr("href"))) {
      // a link that contains the current host
    } else {
      // a link that does not contain the current host
      $(this).attr("rel", "nofollow");
    }
  });

  function fbShare(url, title, descr, image, winWidth, winHeight) {
    var winTop = screen.height / 2 - winHeight / 2;
    var winLeft = screen.width / 2 - winWidth / 2;
    window.open(
      "http://www.facebook.com/sharer.php?s=100&p[title]=" +
        title +
        "&p[summary]=" +
        descr +
        "&p[url]=" +
        url +
        "&p[images][0]=" +
        image,
      "sharer",
      "top=" +
        winTop +
        ",left=" +
        winLeft +
        ",toolbar=0,status=0,width=" +
        winWidth +
        ",height=" +
        winHeight
    );
  }

  function twitterShare(url, title, username, winWidth, winHeight) {
    var winTop = screen.height / 2 - winHeight / 2;
    var winLeft = screen.width / 2 - winWidth / 2;
    window.open(
      "https://twitter.com/intent/tweet?" +
        "url=" +
        url +
        "&text=" +
        title +
        "&via=" +
        username,
      "top=" +
        winTop +
        ",left=" +
        winLeft +
        ",toolbar=0,resizable=yes,scrollbars=yes,status=0,width=" +
        winWidth +
        ",height=" +
        winHeight
    );
  }

  function pinterestShare(url, title, media, winWidth, winHeight) {
    var winTop = screen.height / 2 - winHeight / 2;
    var winLeft = screen.width / 2 - winWidth / 2;
    window.open(
      "http://pinterest.com/pin/create/button/?url=" +
        url +
        "&media=" +
        media +
        "&description=" +
        title,
      "top=" +
        winTop +
        ",left=" +
        winLeft +
        ",toolbar=0,resizable=yes,scrollbars=yes,status=0,width=" +
        winWidth +
        ",height=" +
        winHeight
    );
  }

  function email(url, title, username, winWidth, winHeight) {
    var winTop = screen.height / 2 - winHeight / 2;
    var winLeft = screen.width / 2 - winWidth / 2;
    window.open(
      "mailto:?subject=" + title + "&body=" + url,
      "top=" +
        winTop +
        ",left=" +
        winLeft +
        ",toolbar=0,resizable=yes,scrollbars=yes,status=0,width=" +
        winWidth +
        ",height=" +
        winHeight
    );
  }

  function messengerShare(url, title, username, winWidth, winHeight) {
    var winTop = screen.height / 2 - winHeight / 2;
    var winLeft = screen.width / 2 - winWidth / 2;
    window.open(
      "https://www.facebook.com/dialog/send?app_id=140586622674265&link=" +
        url +
        ".YLYHKM_Fp2Y.messenger&redirect_uri=https%3A%2F%2Fwww.google\n" +
        ".com%2Fmessengerredirect",
      "top=" +
        winTop +
        ",left=" +
        winLeft +
        ",toolbar=0,resizable=yes,scrollbars=yes,status=0,width=" +
        winWidth +
        ",height=" +
        winHeight
    );
  }

  function linkedinShare(url, title, username, winWidth, winHeight) {
    var winTop = screen.height / 2 - winHeight / 2;
    var winLeft = screen.width / 2 - winWidth / 2;
    window.open(
      "https://www.linkedin.com/shareArticle?mini=true&url=" +
        "https://lamtheatmonline.com/the-atm-tpbank-rut-duoc-o-cay-nao.html" +
        "&title=" +
        title +
        "&source=" +
        username,
      "top=" +
        winTop +
        ",left=" +
        winLeft +
        ",toolbar=0,resizable=yes,scrollbars=yes,status=0,width=" +
        winWidth +
        ",height=" +
        winHeight
    );
  }

  $(".content-entry table").wrap('<div class="table-container"></div>');

  // Ẩn các menu item từ item thứ 13 trở đi
  // $('#menu-all-product-id > li').slice(12).hide();
  //
  // // Thêm menu item "Xem thêm"
  // $('#menu-all-product-id').append('<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat' +
  //     '  view-more"><a href="#">Xem thêm ...</a></li>');
  // $('#menu-all-product-id').append('<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat' +
  //     '  collapse"><a href="#">Thu gọn ...</a></li>');
  // $('.collapse').hide();
  // // Xử lý sự kiện click cho nút "Xem thêm"
  // $('.view-more').on('click', function (e) {
  //     e.preventDefault();
  //     $('#menu-all-product-id > li').slideDown(); // Hiển thị tất cả các menu item
  //     $('.view-more').hide(); // Ẩn nút "Xem thêm"
  //     $('.collapse').show(); // Hiển thị nút "Thu gọn"
  // });
  //
  // // Xử lý sự kiện click cho nút "Thu gọn"
  // $('.collapse').on('click', function (e) {
  //     e.preventDefault();
  //     $('#menu-all-product-id > li').slice(12).slideUp(); // Ẩn các menu item từ item thứ 13 trở đi
  //     $('.collapse').hide(); // Ẩn nút "Thu gọn"
  //     $('.view-more').show(); // Hiển thị nút "Xem thêm"
  // });

  // Mảng chứa các từ bạn muốn hiển thị
  // var words = ["Hello", "World", "Typing", "Effect"];

  // Biến để theo dõi từ hiện tại
  var currentWordIndex = 0;

  // Hàm để thực hiện hiệu ứng ghi và xóa chữ
  function typeAndDeleteEffect() {
    var currentWord = words[currentWordIndex];
    var placeholder = "";
    var interval = 100; // Thời gian giữa các ký tự (milliseconds)

    // Ghi từng chữ
    for (var i = 0; i < currentWord.length; i++) {
      setTimeout(
        (function (index) {
          return function () {
            placeholder += currentWord[index];
            $("#woocommerce-product-search-field-0").attr(
              "placeholder",
              placeholder
            );
          };
        })(i),
        i * interval
      );
    }

    // Khoảng nghỉ 1 giây sau khi ghi xong từ
    setTimeout(function () {
      // Xóa từng chữ
      for (var i = 0; i < currentWord.length; i++) {
        setTimeout(
          (function (index) {
            return function () {
              placeholder = placeholder.slice(0, -1);
              $("#woocommerce-product-search-field-0").attr(
                "placeholder",
                placeholder
              );
            };
          })(i),
          (currentWord.length + i) * interval
        );
      }

      // Khoảng nghỉ 1 giây sau khi xóa xong từ
      setTimeout(function () {
        // Chuyển sang từ tiếp theo sau khi hiệu ứng hoàn thành
        currentWordIndex = (currentWordIndex + 1) % words.length;
        typeAndDeleteEffect();
      }, (currentWord.length * 2 + 1) * interval);
    }, (currentWord.length + 1) * interval);
  }

  // Bắt đầu hiệu ứng khi trang đã tải
  $(document).ready(function () {
    typeAndDeleteEffect();
  });

  function convertToCurrency(number) {
    // Sử dụng hàm toLocaleString để chuyển đổi số thành chuỗi có định dạng tiền tệ
    var formattedNumber = Number(number).toLocaleString("vi-VN", {
      style: "currency",
      currency: "VND",
    });

    // Thay thế ký tự đơn vị mặc định bằng ký tự 'đ'
    // formattedNumber = formattedNumber.replace('₫', 'đ');

    return formattedNumber;
  }

  // Hàm cập nhật biến thể sản phẩm
  function updateProductVariant() {
    // Lấy giá trị của các select và input radio
    var kichThuoc = $("[name=kich_thuoc]").val();
    var mauSac = $("[name=mau_sac]:checked").val();
    var chatLieu = $("[name=chat_lieu]:checked").val();
    var doDay = $("[name=do_day]:checked").val();

    // Kiểm tra nếu có tồn tại select kichThuoc và có giá trị
    var hasKichThuoc = $("[name=kich_thuoc]").length > 0;
    // Kiểm tra nếu có tồn tại select mauSac và có giá trị
    var hasMauSac = $("[name=mau_sac]").length > 0;
    // Kiểm tra nếu có tồn tại select chatLieu và có giá trị
    var hasChatLieu = $("[name=chat_lieu]").length > 0;
    var hasDoDay = $("[name=do_day]").length > 0;
    // console.log(hasKichThuoc)

    // Tìm biến thể phù hợp
    if (hasKichThuoc || hasMauSac || hasChatLieu || hasDoDay) {
      var matchedVariation = variations.find(function (variation) {
        // var matchKichThuoc = !hasKichThuoc || variation.attributes.attribute_pa_kich_thuoc === kichThuoc;
        // var matchMauSac = !hasMauSac || variation.attributes.attribute_pa_mau_sac === mauSac;
        // var matchChatLieu = !hasChatLieu || variation.attributes.attribute_pa_chat_lieu === chatLieu;
        // var matchDoDay = !hasDoDay || variation.attributes.attribute_pa_do_day === doDay;
        //
        // // Trả về biến thể nếu các thuộc tính khớp
        // return (hasKichThuoc && hasMauSac && hasChatLieu) ? (matchKichThuoc && matchMauSac && matchChatLieu)
        //     : (hasKichThuoc && hasMauSac) ? (matchKichThuoc && matchMauSac)
        //         : (hasKichThuoc && hasChatLieu) ? (matchKichThuoc && matchChatLieu)
        //             : (hasMauSac && hasChatLieu) ? (matchMauSac && matchChatLieu)
        //                 : (hasKichThuoc) ? matchKichThuoc
        //                     : (hasMauSac) ? matchMauSac
        //                         : (hasChatLieu) ? matchChatLieu
        //                             : false;

        var match = true;

        // Kiểm tra từng điều kiện, nếu không khớp thì gán match là false
        if (hasKichThuoc)
          match =
            match && variation.attributes.attribute_pa_kich_thuoc === kichThuoc;
        if (hasMauSac)
          match = match && variation.attributes.attribute_pa_mau_sac === mauSac;
        if (hasChatLieu)
          match =
            match && variation.attributes.attribute_pa_chat_lieu === chatLieu;
        if (hasDoDay)
          match = match && variation.attributes.attribute_pa_do_day === doDay;

        // Nếu tất cả điều kiện đều khớp, trả về true
        return match;
      });
      // console.log(matchedVariation)
      // Nếu tìm thấy biến thể phù hợp, cập nhật ảnh sản phẩm
      if (matchedVariation) {
        $("#variation_id").val(matchedVariation.variation_id);
        $(".image-big_variable").show();
        $(".image-big").hide();
        $(".notice-att").hide();
        $(".main_product_header .main-price").text(
          convertToCurrency(matchedVariation.display_price)
        );
        var display_price = matchedVariation.display_price;
        var regular_price = matchedVariation.display_regular_price;
        // console.log(display_price)
        // console.log(regular_price)
        if (regular_price && regular_price > display_price) {
          $(".main_product_header .display_regular_price").show();
          $(".main_product_header .regular-price").text(
            convertToCurrency(matchedVariation.display_regular_price)
          );
        } else {
          $(".main_product_header .display_regular_price").hide();
        }
        if (matchedVariation.sku) {
          $(".header-product .sku span").text(matchedVariation.sku);
        }
        $(".image-big_variable img").attr("src", matchedVariation.image.url);
      } else {
        // $('.image-big_variable').hide()
        $(".notice-att").show();
        // alert('Xin vui lòng chọn sản phẩm phù hợp')
      }
    }
  }

  // Sự kiện click trên swatch-element
  $(".swatch-element").click(function () {
    var $this = $(this); // Lưu tham chiếu đến swatch được click

    // Gỡ bỏ class active khỏi tất cả các swatch khác và bỏ chọn radio
    $this
      .siblings(".swatch-element")
      .removeClass("active")
      .find('input[type="radio"]')
      .prop("checked", false);

    // Thêm class active và đánh dấu radio tương ứng
    $this.addClass("active").find('input[type="radio"]').prop("checked", true);

    // Cập nhật biến thể sản phẩm sau khi thay đổi lựa chọn
    updateProductVariant();
  });

  // Sự kiện thay đổi trên product-attribute
  $(".product-attribute").change(updateProductVariant);
  $(".item-small").click(function () {
    $(".image-big_variable").hide();
    $(".image-big").show();
  });
  $(".recent-button").click(function () {
    $(".viewed-product").toggleClass("active");
  });
  $(".search-button-toggle").click(function () {
    $(".search-form-wrapper").toggleClass("active");
  });
  $(".button-open ").click(function () {
    $(this).toggleClass("active");
    $(".mobile-sidebar").toggleClass("active");
  });
  $("select.product-attribute").on("change", function () {
    var selectedValue = $(this).val(); // Lấy giá trị của select đang thay đổi

    // Đặt giá trị đã chọn vào tất cả các select khác
    $("select.product-attribute").not(this).val(selectedValue);
  });
  // Lắng nghe sự kiện thay đổi giá trị trong ô input số lượng
  // $('input.qty').change(function() {
  //     // Lấy giá trị số lượng từ ô input hiện tại
  //     var quantity = $(this).val();
  //     // Cập nhật giá trị của tất cả các ô input số lượng khác cùng trên trang
  //     $('input.qty').not(this).val(quantity);
  // });
  // Khi click vào bất kỳ input radio nào trong class swatch-element
  $('.swatch-element input[type="radio"]').on("click", function () {
    var name = $(this).attr("name"); // Lấy tên của input radio được click
    var value = $(this).val(); // Lấy giá trị của input radio được click

    // Đặt thuộc tính checked và class active cho input radio và swatch-element tương ứng
    $(`.swatch-element input[name="${name}"]`).each(function () {
      var swatchElement = $(this).closest(".swatch-element");
      if ($(this).val() === value) {
        $(this).prop("checked", true);
        swatchElement.addClass("active");
      } else {
        $(this).prop("checked", false);
        swatchElement.removeClass("active");
      }
    });
  });

  // Tính toán chiều rộng container trừ đi 270px
  var containerWidth = $(".container").outerWidth();
  // console.log(containerWidth)
  var megaMenuWidth = containerWidth - 270;

  // Gán chiều rộng cho mega-menu-wrapper
  $(".mega-menu-wrapper").css("width", megaMenuWidth + "px");

  // Khi hover vào menu has child
  $(".sub-menu-product .menu-item-has-children").mouseenter(function () {
    var $submenu = $(this).children(".sub-menu").clone();

    // Nếu có sub-menu thì append vào .mega-menu-wrapper
    if ($submenu.length) {
      $(".mega-menu-wrapper").html($submenu);

      // Thiết lập vị trí của mega menu
      var $li = $(this);
      var liWidth = $li.outerWidth();
      var liPosition = $li.position();
      var $megaMenu = $(".mega-menu-wrapper");

      $megaMenu.addClass("active");
      $megaMenu.css({
        top: liPosition.top + 40 + "px",
        left: liPosition.left + liWidth + "px",
        position: "absolute",
        "z-index": "9999",
        width: "270px",
        "max-width": "none",
      });
    }
  });

  // Khi rời chuột khỏi menu has child hoặc mega-menu-wrapper
  $(".sub-menu-product .menu-item-has-children, .mega-menu-wrapper").mouseleave(
    function (e) {
      var $relatedTarget = $(e.relatedTarget);
      var isRelatedToMegaMenu =
        $relatedTarget.closest(".mega-menu-wrapper").length > 0;
      var isRelatedToMenuItem =
        $relatedTarget.closest(".sub-menu-product .menu-item-has-children")
          .length > 0;

      if (!isRelatedToMegaMenu && !isRelatedToMenuItem) {
        // Ẩn mega-menu-wrapper
        $(".mega-menu-wrapper").removeClass("active");
      }
    }
  );
  // Khi hover vào menu has child
  // $('.sub-menu-product .menu-item-has-children').mouseenter(function () {
  //     var $submenu = $(this).children('.sub-menu').clone();
  //
  //     // Nếu có sub-menu thì append vào .mega-menu-wrapper
  //     if ($submenu.length) {
  //         $('.mega-menu-wrapper').html($submenu);
  //
  //         // Thiết lập vị trí của mega menu
  //         var $li = $(this);
  //         updateMegaMenuPosition($li);
  //     }
  // });
  //
  // // Khi rời chuột khỏi menu has child hoặc mega-menu-wrapper
  // $('.sub-menu-product .menu-item-has-children, .mega-menu-wrapper').mouseleave(function (e) {
  //     var $relatedTarget = $(e.relatedTarget);
  //     var isRelatedToMegaMenu = $relatedTarget.closest('.mega-menu-wrapper').length > 0;
  //     var isRelatedToMenuItem = $relatedTarget.closest('.sub-menu-product .menu-item-has-children').length > 0;
  //
  //     if (!isRelatedToMegaMenu && !isRelatedToMenuItem) {
  //         // Ẩn mega-menu-wrapper
  //         $('.mega-menu-wrapper').removeClass('active');
  //     }
  // });
  //
  // // Khi di chuyển chuột trên toàn trang
  // $(document).on('mousemove', function (event) {
  //     var $hoveredLi = $('.sub-menu-product .menu-item-has-children:hover');
  //     if ($hoveredLi.length) {
  //         updateMegaMenuPosition($hoveredLi);
  //     }
  // });
  //
  // function updateMegaMenuPosition($li) {
  //     var liWidth = $li.outerWidth();
  //     var liPosition = $li.position();
  //     var $megaMenu = $('.mega-menu-wrapper');
  //
  //     $megaMenu.addClass('active');
  //     $megaMenu.css({
  //         'top': liPosition.top + 40 + 'px',
  //         'left': (liPosition.left + liWidth) + 'px',
  //         'position': 'absolute',
  //         'z-index': '9999',
  //         'width': '270px',
  //         'max-width': 'none'
  //     });
  // }
  // Lắng nghe sự kiện hover vào menu item có submenu
  // $('.sub-menu-product .menu-item-has-children').hover(function() {
  //     var $submenu = $(this).children('.sub-menu').clone();
  //
  //     // Nếu có sub-menu thì append vào .mega-menu-wrapper
  //     if ($submenu.length) {
  //         $('.mega-menu-wrapper').html($submenu);
  //
  //         // Cập nhật vị trí của mega menu
  //         updateMegaMenuPosition($(this));
  //     }
  // });
  //
  // // Khi rời chuột khỏi menu item có sub-menu hoặc mega-menu-wrapper
  // $('.sub-menu-product .menu-item-has-children, .mega-menu-wrapper').mouseleave(function(e) {
  //     var $relatedTarget = $(e.relatedTarget);
  //     var isRelatedToMegaMenu = $relatedTarget.closest('.mega-menu-wrapper').length > 0;
  //     var isRelatedToMenuItem = $relatedTarget.closest('.sub-menu-product .menu-item-has-children').length > 0;
  //
  //     if (!isRelatedToMegaMenu && !isRelatedToMenuItem) {
  //         // Ẩn mega-menu-wrapper
  //         $('.mega-menu-wrapper').removeClass('active');
  //     }
  // });
  //
  // // Lắng nghe sự kiện thay đổi kích thước cửa sổ để cập nhật vị trí của mega menu
  // $(window).resize(function() {
  //     $('.sub-menu-product .menu-item-has-children').each(function() {
  //         if ($(this).is(':hover')) {
  //             updateMegaMenuPosition($(this));
  //         }
  //     });
  // });
  //
  // // Hàm cập nhật vị trí của mega menu
  // function updateMegaMenuPosition($menuItem) {
  //     var $megaMenu = $('.mega-menu-wrapper');
  //     var liWidth = $menuItem.outerWidth();
  //     var liPosition = $menuItem.position();
  //
  //     $megaMenu.addClass('active');
  //     $megaMenu.css({
  //         'top': liPosition.top + 40 + 'px',
  //         'left': (liPosition.left + liWidth) + 'px',
  //         'position': 'absolute',
  //         'z-index': '9999',
  //         'width': '270px',
  //         'max-width': 'none'
  //     });
  // }

  $(".sub-menu-product").css({
    opacity: "1",
    "pointer-events": "auto",
  });
  $("#Side_slide .sub-menu-product li.menu-item-has-children").each(
    function () {
      // Thêm nút toggle chỉ khi có submenu
      if ($(this).children(".sub-menu").length > 0) {
        $(this).append(
          '<button class="submenu-toggle"><i class="fa-solid fa-sort-down"></i></button>'
        );
      }
    }
  );

  // Xử lý sự kiện khi click vào nút toggle
  $(
    "#Side_slide .sub-menu-product li.menu-item-has-children .submenu-toggle"
  ).on("click", function (e) {
    e.preventDefault();

    // Tìm submenu tương ứng của li
    var submenu = $(this).siblings(".sub-menu");

    // Kiểm tra nếu submenu đang ẩn thì hiển thị, ngược lại ẩn đi
    submenu.toggleClass("active");

    // Đổi icon nút toggle
  });
  $("#product-cate-sidebar-new  li.menu-item-has-children").each(function () {
    // Thêm nút toggle chỉ khi có submenu
    if ($(this).children(".sub-menu").length > 0) {
      $(this).append(
        '<button class="submenu-toggle"><i class="fa-solid fa-angle-down"></i></button>'
      );
    }
  });

  // Xử lý sự kiện khi click vào nút toggle
  $("#product-cate-sidebar-new li.menu-item-has-children .submenu-toggle").on(
    "click",
    function (e) {
      e.preventDefault();

      // Tìm submenu tương ứng của li
      var submenu = $(this).siblings(".sub-menu");

      // Kiểm tra nếu submenu đang ẩn thì hiển thị, ngược lại ẩn đi
      submenu.toggleClass("active");

      // Đổi icon nút toggle
    }
  );
  function isScrolledIntoView(elem) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return elemBottom <= docViewBottom && elemTop >= docViewTop;
  }

  $(window).on("scroll", function () {
    $(".number").each(function () {
      if (isScrolledIntoView(this) && !$(this).hasClass("counted")) {
        $(this).addClass("counted");
        var $this = $(this);
        var countTo = $this.text().replace(/[^0-9.]+/g, "");
        countTo = parseInt(countTo, 10);

        $this.prop("Counter", 0).animate(
          {
            Counter: countTo,
          },
          {
            duration: 1000,
            easing: "swing",
            step: function (now) {
              $this.text(Math.ceil(now).toLocaleString("en"));
            },
            complete: function () {
              $this.text($this.attr("data-original"));
            },
          }
        );
      }
    });
  });
});

jQuery(document).ready(function ($) {
  if (typeof ngayKetthuc !== "undefined") {
    let clock;

    // Grab the current date
    let currentDate = new Date();

    // Target future date/24 hour time/Timezone
    let targetDate = moment.tz(ngayKetthuc, "Asia/Ho_Chi_Minh");

    // Calculate the difference in seconds between the future and current date
    let diff = targetDate / 1000 - currentDate.getTime() / 1000;

    if (diff <= 0) {
      // If remaining countdown is 0
      clock = $(".clock").FlipClock(0, {
        clockFace: "DailyCounter",
        countdown: true,
        autostart: false,
      });
      console.log("Date has already passed!");
    } else {
      // Run countdown timer
      clock = $(".clock").FlipClock(diff, {
        clockFace: "DailyCounter",
        countdown: true,
        callbacks: {
          stop: function () {
            console.log("Timer has ended!");
          },
        },
      });

      // Check when timer reaches 0, then stop at 0
      setTimeout(function () {
        checktime();
      }, 1000);

      function checktime() {
        t = clock.getTime();
        if (t <= 0) {
          clock.setTime(0);
        }
        setTimeout(function () {
          checktime();
        }, 1000);
      }
    }
  }
});
