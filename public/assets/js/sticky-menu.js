jQuery(document).ready(function ($) {
    //Backtotop
    const main_menu_scroll = $('.top-header');
    const header = $('#header');
    const top_menu = $('.top-bar');
    const main_header = $('.main-header');
    const headerwrap = $('.header-wrap');
    const menu = $('.menu-header-wrap');
    const header_buffer_height = header.outerHeight() - menu.outerHeight();
    const header_h = header.outerHeight();
    const top_menu_h = top_menu.outerHeight() || 0;
    const main_header_h = main_header.outerHeight();
    if (menu) {
        $(window).scroll(function () {
            const start_y = 0;
            var window_y = $(window).scrollTop();
            if (!window.matchMedia("(max-width: 767px)").matches) {
                if (window_y > header_buffer_height) {
                    if (!menu.hasClass('sticky')) {
                        menu.addClass('sticky');
                        header.css('margin-bottom', menu.outerHeight());
                    }
                } else {
                    if (menu.hasClass('sticky')) {
                        menu.removeClass('sticky');
                        header.css('margin-bottom', 0);
                    }
                }
            } else {
            if (window_y >= top_menu_h) {
                    if (!main_header.hasClass('sticky')) {
                        main_header.addClass('sticky');
                        header.css('margin-bottom', main_header_h);
                    }
                } else {
                    if (main_header.hasClass('sticky')) {
                        main_header.removeClass('sticky');
                        header.css('margin-bottom', 0);
                    }
                }

            }
        });
    }
});
