<?php

function getCategoriesWithChildren($parent_id = null) {
    $categories1 = Model_ProductCategory::query()
        ->where('parent_id', $parent_id)
        ->get();

    $categories_array = array_map(function($category) {
        return $category->to_array();
    }, $categories1);

    foreach ($categories_array as &$category) {
        $categories2 = getCategoriesWithChildren($category['category_id']);
        $category['children'] = $categories2;
    }

    return $categories_array;
}

$categories = getCategoriesWithChildren();
?>

<header id="header" style="margin-bottom: 0px;">
    <div class="header-wrap">
        <!-- <div class="top-bar">
            <div class="container">
                <div class="site_name">
                    <h1>NỘI THẤT GIA THẾ - NỘI THẤT VĂN PHÒNG &amp; GIA ĐÌNH</h1>
                </div>
            </div>
        </div> -->
        <div class="main-header">
            <div class="container">
                <div class="row header-inner">
                    <div class="thc-center-horizontal logo-thc-wrap">
                        <div class="mobile-menu-button responsive-menu-toggle thc_center_col">
                            <i class="fa-solid fa-bars"></i>
                        </div>
                        <a href="/" class="logo img-wrap" data-wpel-link="internal">
                            <picture>
                                <source srcset="/uploads/settings/<?=LOGO_HEADER?>" media="(min-width: 770px)" type="image/png">
                                <img decoding="async" class="img lazyload" src="/uploads/settings/<?=LOGO_HEADER_REVERSE?>" alt="Logo">
                            </picture>
                        </a>
                    </div>
                    <div class="right-wrapper">
                        <div class="thc-center-horizontal search-form-wrapper">
                            <form method="get" action="/" class="search-form">
                                <input type="text" id="woocommerce-product-search-field-0" name="s_text" class="search-field"
                                    value="<?=Input::get('s_text')?>" placeholder="Ghế">
                                <button value="Search" type="submit" class="search-btn">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                        </div>
                        <script type="text/javascript" data-wpmeteor-type="text/javascript">
                            var words = ["Bạn muốn tìm kiếm gì?", "Ghế văn phòng", "Bàn văn phòng", "Ghế công thái học", "Giường ngủ", "Tủ quần áo"];
                        </script>
                        <div class="header-support thc-center-horizontal">
                            <div class="support_info thc-center-horizontal">
                                <div class="info">
                                    <div class="title">LIÊN HỆ HOTLINE</div>
                                    <a target="_blank" href="tel:0968585812" rel="nofollow" data-wpel-link="internal">
                                        <div class="desc"><?=CUSTOMER_CARE_PHONE?></div>
                                    </a>
                                </div>
                            </div>
                            <div class="support_info thc-center-horizontal">
                                <div class="info">
                                    <div class="title">TÌM ĐỊA CHỈ</div>
                                    <a target="_blank"
                                        href="<?=GOOGLEMAP_LINK?>"
                                        rel="nofollow" data-wpel-link="external">
                                        <div class="desc">CỬA HÀNG</div>
                                    </a>
                                </div>
                            </div>
                            <div class="support_info thc-center-horizontal thc-center-horizontal-manifest">
                                <p style="padding: 0 16px;"></p>
                                <div class="search-button-toggle" style="padding: 0;">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                                <!-- <a class="img-wrap no-scale-image" href="https://noithatgiathe.vn/gio-hang/"
                                    data-wpel-link="external" rel="nofollow external noopener noreferrer">
                                    <img decoding="async" class="img entered lazyloaded"
                                        src="https://noithatgiathe.vn/wp-content/uploads/2024/03/cart-image.png"
                                        srcset="" alt=""
                                        data-lazy-src="https://noithatgiathe.vn/wp-content/uploads/2024/03/cart-image.png"
                                        data-ll-status="loaded"><noscript><img decoding="async" class="img"
                                            src="https://noithatgiathe.vn/wp-content/uploads/2024/03/cart-image.png"
                                            srcset="" alt=""></noscript>
                                </a>
                                <span class="amount-cart-item">0</span> -->
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="menu-header-wrap">
            <div class="container p-0">
                <div class="row py-1">
                    <!-- <div class="all-product">
                        <i class="fa-solid fa-bars"></i>
                        <span>Danh mục sản phẩm</span>
                        <i class="fa-solid fa-chevron-down"></i>
                        <div class="sub-menu-product" style="opacity: 1; pointer-events: auto;">
                            <div class="menu-danh-muc-san-pham-container thc-scroll">
                                <ul id="menu-all-product-id" class="menu-class">
                                    <?php foreach($categories as $category): ?>
                                    <li id="menu-item-85544"
                                        class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-85544">
                                        <a href="/danh-muc-san-pham/<?=$category['slug']?>" data-wpel-link="external" rel="nofollow external noopener noreferrer"><?=$category['category_name']?></a>
                                        <?php if(count($category['children']) > 0): ?>
                                            <ul class="sub-menu">
                                                <?php foreach($category['children'] as $category1): ?>
                                                    <li id="menu-item-85484" class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-85484">
                                                        <a href="/danh-muc-san-pham/<?=$category1['slug']?>" data-wpel-link="external" rel="nofollow external noopener noreferrer">
                                                            <?=$category1['category_name']?>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        <?php endif; ?>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                        <div class="mega-menu-wrapper" style="width: 270px; top: 120px; left: 266px; position: absolute; z-index: 9999; max-width: none;">
                            <ul class="sub-menu"></ul>
                        </div>
                    </div> -->
                    <div class="menu-menu-chinh-container">
                        <ul id="menu-header" class="menu-header">
                            <li id="menu-item-69879" class="menu-item menu-item-type-custom menu-item-object-custom <?=$active == 'home' ? "current-menu-item current_page_item" : ""?> menu-item-home menu-item-69879">
                                <a href="/" aria-current="page" data-wpel-link="internal">Trang chủ</a>
                            </li>
                            <li id="menu-item-86613" class="menu-item menu-item-type-post_type menu-item-object-page <?=$active == 'gioithieu' ? "current-menu-item current_page_item" : ""?> menu-item-86613">
                                <a rel="nofollow" href="/gioi-thieu" data-wpel-link="internal">Giới thiệu</a></li>
                            <li id="menu-item-69880" class="menu-item menu-item-type-custom <?=$active == 'shop' ? "current-menu-item current_page_item" : ""?> menu-item-object-custom menu-item-69880">
                                <a rel="nofollow" href="/danh-muc-san-pham" data-wpel-link="internal">Sản phẩm</a></li>
                            <li id="menu-item-69888" class="menu-item menu-item-type-taxonomy menu-item-object-category <?=$active == 'du-an' ? "current-menu-item current_page_item" : ""?> menu-item-69888">
                                <a rel="nofollow external noopener noreferrer" href="/danh-muc-bai-viet/du-an" data-wpel-link="external">
                                    Dự Án
                                </a>
                            </li>
                            <li id="menu-item-69891" class="menu-item menu-item-type-taxonomy menu-item-object-category <?=$active == 'video' ? "current-menu-item current_page_item" : ""?> menu-item-69891">
                                <a rel="nofollow" href="/danh-muc-bai-viet/video" data-wpel-link="internal">Video</a>
                            </li>
                            <li id="menu-item-69874" class="menu-item menu-item-type-post_type menu-item-object-page 
                            <?=(in_array($active, ['tin-tuc', 'kinh-nghiem', 'thiet-ke', 'phong-thuy', 'tuyen-dung', 'khuyen-mai'])) ? "current-menu-item current_page_item" : ""?> menu-item-has-children menu-item-69874">
                                <a rel="nofollow" href="/danh-muc-bai-viet/tin-tuc" data-wpel-link="internal">Tin tức</a>
                                <ul class="sub-menu">
                                    <li id="menu-item-69902" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-69902">
                                        <a href="/danh-muc-bai-viet/kinh-nghiem" data-wpel-link="internal">Kinh nghiệm</a>
                                    </li>
                                    <li id="menu-item-69882" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-69882">
                                        <a href="/danh-muc-bai-viet/thiet-ke" data-wpel-link="internal">Thiết kế</a>
                                    </li>
                                    <li id="menu-item-69901" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-69901">
                                        <a rel="nofollow" href="/danh-muc-bai-viet/phong-thuy" data-wpel-link="internal">Phong thủy</a>
                                    </li>
                                    <li id="menu-item-69881" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-69881">
                                        <a rel="nofollow" href="/danh-muc-bai-viet/tuyen-dung" data-wpel-link="internal">Tuyển dụng</a>
                                    </li>
                                    <li id="menu-item-69905" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-69905">
                                        <a rel="nofollow" href="/danh-muc-bai-viet/khuyen-mai" data-wpel-link="internal">Khuyến mại</a>
                                    </li>
                                </ul>
                            </li>
                            <li id="menu-item-69877"
                                class="menu-item menu-item-type-post_type menu-item-object-page <?=$active == 'lienhe' ? "current-menu-item current_page_item" : ""?> menu-item-69877">
                                <a rel="nofollow external noopener noreferrer" href="/lien-he" data-wpel-link="external">Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>