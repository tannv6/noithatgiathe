jQuery(document).ready(function ($) {
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
