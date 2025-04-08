<?php
$categories = getCategoriesWithChildren();
?>
<div class="woocommerce-notices-wrapper"></div>
<div class="breadcrumb-wrapper">
    <div class="container">
        <nav aria-label="breadcrumbs" class="rank-math-breadcrumb">
            <p>
                <a href="https://noithatgiathe.vn" data-wpel-link="internal">Trang chủ</a>
                <?php foreach ($breadcrumb as $key => $value): ?>
                    <span class="separator"><i class="fa-solid fa-angle-right"></i></span>
                    <?php if ($key == count($breadcrumb) - 1): ?>
                        <span class="last"><?=$value['name']?></span>
                    <?php else: ?>
                        <a href="<?=$value['url']?>" data-wpel-link="internal"><?=$value['name']?></a>
                    <?php endif; ?>
                <?php endforeach; ?>
            </p>
        </nav>
    </div>
</div>
<div id="product-91156" class="product type-product post-91156 status-publish first instock product_cat-noi-that-thanh-ly product_cat-ghe-cong-thai-hoc product_cat-ghe-xoay product_cat-ghe-lam-viec-tai-nha product_cat-ghe-van-phong-gia-re has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
    <div class="container">
        <div class="header-product">
            <h1 class="title"><?=$product['product_name']?></h1>
        </div>
        <div class="row meta-info-product">
            <div class="col-12 col-md-5 col-lg-6 left-part">
                <div class="image-product product image-product-single">
                    <div class="image-big-wrapper">
                        <div class="image-big">
                        <?php foreach ($product['gallery'] as $key => $value): ?>
                            <div class="img-cover">
                                <div class="img-wrap thumbnail-wrapper" id="ex1">
                                    <img id="thumb" src="/uploads/products/<?=$value['image_path']?>" alt="">
                                </div>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                    <div class="image-small">
                    <?php foreach ($product['gallery'] as $key => $value): ?>
                        <div class="item-small img-cover">
                            <div class="thumbnail-wrapper">
                                <img src="/uploads/products/<?=$value['image_path']?>" alt="" >
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-6 right-part">
                <div class="main_product_header">
                    <div>
                        <span class="main-price">
                            <span class="woocommerce-Price-amount amount">
                                <bdi><?=$product['sell_price']?><span class="woocommerce-Price-currencySymbol">&#8363;</span></bdi>
                            </span>
                        </span>
                        <?php if($product['init_price']): ?>
                        <span class="display_regular_price" style="display: inline">Giá thị trường
                            <span class="regular-price">
                                <span class="woocommerce-Price-amount amount">
                                    <bdi><?=$product['init_price']?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></bdi>
                                </span>
                            </span>
                        </span>
                        <?php endif; ?>
                    </div>
                    <?php if($product['save']): ?>
                    <div class="economical_price">
                        <strong>Tiết kiệm</strong>
                        <span>
                            <span class="woocommerce-Price-amount amount">
                                <bdi><?=$product['save']?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></bdi>
                            </span>
                        </span>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="default_info">
                    <p><strong>Miễn Phí:</strong> Tư vấn thiết kế và lắp đặt</p>
                    <p><strong>Miễn Phí:</strong> Vận chuyển với đơn hàng trên 10 Triệu với các Quận nội thành Hà
                        Nội.</p>
                    <p><em>(Hỗ Trợ Vận Chuyển Các Tỉnh Trong Nước)</em><br />
                        Giá chưa có VAT, vui lòng + 8% nếu có nhu cầu</p>
                </div>
                <!-- <form class="cart" action="https://noithatgiathe.vn/ghe-cong-thai-hoc-mau-den-trang-cth526-t/"
                    method="post" enctype="multipart/form-data">
                    <div class="item-wrapper">
                        <div class="title">
                            Số lượng:
                        </div>
                        <div class="quantity">
                            <label class="screen-reader-text" for="quantity_67c49f1490231">Ghế công thái học màu đen
                                trắng CTH526-T số lượng</label>
                            <span class="thc-sharp-no-left qty_btn" data-value="-"><i
                                    class="fa-solid fa-minus"></i></span>
                            <input type="number" id="quantity_67c49f1490231" class="input-text qty text"
                                name="quantity" value="1" aria-label="Số lượng sản phẩm" size="4" min="0" max=""
                                step="1" placeholder="" inputmode="numeric" autocomplete="off" />
                            <span class="thc-sharp-no-right qty_btn" data-value="+"><i
                                    class="fa-solid fa-plus"></i></span>
                        </div>
                    </div>
                    <div class="action-btn">

                        <div class="row mt-4">
                            <div class="col-6 col-md-6 col-lg-6">
                                <div class="buy-now">
                                    <a href="#" class="btn-thc mua-ngay" data-product-id="91156">
                                        <div class="title">Mua Ngay</div>
                                        <div class="sub-info">Giao tận nơi lắp đặt miễn phí</div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-6 col-md-6 col-lg-6">
                                <input type="hidden" name="product_id" value="91156">
                                <input id="variation_id" type="hidden" value="" name="variation_id">
                                <button type="submit" name="add-to-cart" value="91156"
                                    class="btn-thc single_add_to_cart_button">
                                    <div class="title">THÊM VÀO GIỎ HÀNG</div>
                                    <div class="sub-info">Thêm sản phẩm vào giỏ hàng</div>
                                </button>

                            </div>
                        </div>
                    </div>
                </form> -->
                <div class="tu-van-form">
                    <div class="wpcf7 no-js" id="wpcf7-f89728-p91156-o1" lang="vi" dir="ltr" data-wpcf7-id="89728">
                        <div class="screen-reader-response">
                            <p role="status" aria-live="polite" aria-atomic="true"></p>
                            <ul></ul>
                        </div>
                        <form action="/lienhe/write" method="post" class="wpcf7-form init" aria-label="Form liên hệ" data-status="init" target="hiddenIframe">
                            <input type="hidden" name="full_name">
                            <input type="hidden" name="email">
                            <input type="hidden" name="message" value="Tư vấn: <?= $product->product_name?>">
                            <div class="title-quote">
                                <p>Tư vấn
                                </p>
                            </div>
                            <div class="form-quote">
                                <p><span class="wpcf7-form-control-wrap" data-name="tel-71">
                                    <input size="40" maxlength="400" class="wpcf7-form-control wpcf7-tel wpcf7-validates-as-required wpcf7-text wpcf7-validates-as-tel phone-quote" placeholder="Số điện thoại*" required type="tel" name="phone" />
                                </span>
                                <button type="submit" class="submit-quote wpcf7-submit">
                                    Gửi <i class="fas fa-location-arrow"></i>
                                </button>
                                </p>
                            </div>
                            <ul>
                                <li><p>- Tư vấn công năng sắp xếp bố trí phòng </p></li>
                                <li><p>- Tư vấn chất liệu màu sắc, kích thước </p></li>
                                <li><p>- Tư vấn báo giá chi tiết 24/7 </p></li>
                            </ul>
                            <div class="wpcf7-response-output" aria-hidden="true"></div>
                        </form>
                    </div>
                </div>
                <div class="quick-link">
                    <div class="link-wrapper">
                        <a rel="nofollow" href="<?=BUYING_GUIDE?>" data-wpel-link="internal"><i class="fa-solid fa-up-right-from-square"></i>Hướng dẫn mua hàng </a>
                    </div>
                    <div class="link-wrapper">
                        <a rel="nofollow" href="<?=WARRANTY_POLICY_LINK?>" data-wpel-link="internal"><i class="fa-solid fa-up-right-from-square"></i>Chính sách bảo hành sản phẩm </a>
                    </div>
                    <div class="link-wrapper">
                        <a rel="nofollow" href="<?=SHIPPING_POLICY_LINK?>" data-wpel-link="internal"><i class="fa-solid fa-up-right-from-square"></i>Chính sách giao hàng </a>
                    </div>
                    <div class="link-wrapper">
                        <a rel="nofollow" href="<?=RETURN_POLICY_LINK?>" data-wpel-link="internal"><i class="fa-solid fa-up-right-from-square"></i>Chính sách đổi trả, hoàn tiền </a>
                    </div>
                    <div class="link-wrapper">
                        <a rel="nofollow"  href="<?=PRIVACY_POLICY_LINK?>" data-wpel-link="internal"><i class="fa-solid fa-up-right-from-square"></i>Chính sách bảo mật thông tin cá nhân </a>
                    </div>
                    <div class="link-wrapper">
                        <a rel="nofollow external noopener noreferrer" href="<?=INSTALLATION_INSTRUCTIONS?>" data-wpel-link="external"><i class="fa-solid fa-up-right-from-square"></i>Hướng dẫn lắp đặt </a>
                    </div>
                    <div class="link-wrapper">
                        <a rel="nofollow external noopener noreferrer" href="<?=GOOGLEMAP_LINK?>" target="_blank" data-wpel-link="external">
                            <i class="fa-solid fa-up-right-from-square"></i>Showroom: <?=SHOWROOM_ADDRESS?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container p-0">
            <div class="row body-product">
                <div class="col-12 col-md-12 col-lg-9">
                    <div class="nav nav-pills head" id="pills-tab" role="tablist">
                        <div class="nav-link active" id="pills-1" data-bs-toggle="pill"
                            data-bs-target="#pills-tab_1" role="tab" aria-controls="pills-home"
                            aria-selected="true">Mô tả sản phẩm
                        </div>
                        <div class="nav-link " id="pills-2" data-bs-toggle="pill" data-bs-target="#pills-tab_2"
                            role="tab" aria-controls="pills-home" aria-selected="true">Vận chuyển và lắp đặt
                        </div>
                    </div>
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane show active" id="pills-tab_1" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="entry-content content-entry">
                                <?=htmlspecialchars_decode($product['description'])?>
                            </div>
                        </div>
                        <div class="tab-pane" id="pills-tab_2" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="entry-content">
                                <?=SHIPPING_AND_INSTALLATION?>
                            </div>
                        </div>
                    </div>
                    <?=CONSTRUCTION_PROCESS?>
                    <div class="contact_policy_information">
                        <div class="row">
                            <div class="col-12 col-md-6 col-lg-6 mb-4">
                                <div class="wrapper col_1">
                                    <div class="title">
                                        Chính sách nhà thầu, KTS </div>
                                    <a href="#!" data-wpel-link="internal"><i class="fa-solid
                                        fa-hand-point-right"></i>Hỗ trợ trình mẫu với chủ đầu tư </a>
                                    <a href="#!" data-wpel-link="internal"><i class="fa-solid
                                        fa-hand-point-right"></i>Tham quan xưởng sản xuất trong ngày </a>
                                    <a href="#!" data-wpel-link="internal"><i class="fa-solid
                                        fa-hand-point-right"></i>Hỗ trợ khảo sát, đo đạc miễn phí</a>
                                    <a href="#!" data-wpel-link="internal"><i class="fa-solid
                                        fa-hand-point-right"></i>Hỗ trợ dựng thông số kỹ thuật bản vẽ</a>
                                    <a href="#!" data-wpel-link="internal"><i class="fa-solid
                                        fa-hand-point-right"></i>Hỗ trợ đào tạo xuất file CNC</a>
                                </div>
                            </div>
                            <div class="col-12 col-md-6 col-lg-6 mb-4">
                                <div class="wrapper col_2">
                                    <div class="title">
                                        Thông tin liên hệ </div>
                                    <a href="<?=GOOGLEMAP_LINK?>" data-wpel-link="external" rel="nofollow external noopener noreferrer" target="_blank">
                                        <i class="fa-solid fa-hand-point-right"></i>Showroom: <?=SHOWROOM_ADDRESS?>
                                    </a>
                                    <a href="<?= WAREHOUSE_GOOGLEMAP_LINK ?>" data-wpel-link="external" rel="nofollow external noopener noreferrer" target="_blank">
                                        <i class="fa-solid fa-hand-point-right"></i>Tổng kho: <?=WAREHOUSE_ADDRESS?>
                                    </a>
                                    <a href="<?= FACTORY_GOOGLEMAP_LINK ?>" data-wpel-link="external" rel="nofollow external noopener noreferrer" target="_blank">
                                        <i class="fa-solid fa-hand-point-right"></i>Xưởng sản xuất: <?=FACTORY_ADDRESS?>
                                    </a>
                                    <a href="tel:0968585812" data-wpel-link="internal">
                                        <i class="fa-solid fa-hand-point-right"></i>Hotline: <?=HOTLINE?>
                                    </a>
                                    <a href="https://noithatgiathe.vn" data-wpel-link="internal">
                                        <i class="fa-solid fa-hand-point-right"></i>Website: https://noithatgiathe.vn
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-3 sidebar-product">
                    <div class="column-sidebar thc-scroll">
                        <div class="block-sidebar news-list-post">
                            <div class="title-sb sidebar-cate-title">Danh mục</div>
                            <div class="content">
                                <div class="menu-danh-muc-san-pham-container">
                                    <ul id="product-cate-sidebar-new" class="menu-class">
                                        <?php foreach($categories as $category): ?>
                                        <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat current-product-ancestor menu-item-has-children menu-item-85544">
                                            <a href="/danh-muc-san-pham/<?=$category['slug']?>" data-wpel-link="external" rel="nofollow external noopener noreferrer">
                                                <?=$category['category_name']?>
                                            </a>
                                            <?php if(count($category['children']) > 0): ?>
                                            <ul class="sub-menu">
                                            <?php foreach($category['children'] as $category1): ?>
                                                <li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-85484">
                                                    <a href="/danh-muc-san-pham/<?=$category1['slug']?>" data-wpel-link="external" rel="nofollow external noopener noreferrer"><?=$category1['category_name']?></a>
                                                </li>
                                                <?php endforeach; ?>
                                            </ul>
                                            <?php endif; ?>
                                        </li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container p-0">
            <?php if(count($related_products) > 0): ?>
            <section class="related products">
                <div class="title-thc">Sản phẩm tương tự</div>
                <div class="row">
                    <?php foreach($related_products as $product4):
                        $sell_price4 = $product4['sell_price'];
                        $init_price4 = $product4['init_price'];
                        if($init_price4 && $init_price4 > $sell_price4) {
                            $save = '<span class="onsale">-'.number_format(round((($init_price4 - $sell_price4) / $init_price4) * 100, 1), 0, ',', '.').'%</span>';
                            $init_price4_screen = number_format($init_price4, 0, ',', '.');
                        } else {
                            $save = "";
                            $init_price4_screen = "";
                        }
                        $sell_price4 = number_format($sell_price4, 0, ',', '.');
                    ?>
                    <div class="product-card-wrapper col-6 col-md-2 col-lg-2 product type-product post-79751 status-publish instock product_cat-noi-that-thanh-ly product_cat-ghe-xoay product_cat-ghe-van-phong-gia-re has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                        <div class="product-card">
                            <div class="img-cover">
                                <a href="/san-pham/<?=$product4['slug']?>" class="thumbnail-wrapper" title="<?=$product4['product_name']?>" data-wpel-link="internal">
                                    <?= $save ?>
                                    <img width="300" height="300" src="/uploads/products/<?= $product4['product_image'] ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""/>
                                </a>
                                <a title="Chat zalo" class="float-button chat-zalo" target="_blank" href="<?=ZALO_LINK?>" rel="nofollow external noopener noreferrer" data-wpel-link="external">
                                    <img src="/assets/img/zalo-stick.png" alt=""/>
                                </a>
                            </div>
                            <div class="info-product">
                                <a rel="nofollow external noopener noreferrer" href="/danh-muc-san-pham/<?=$product4['category']['slug']?>" class="product-category-link" data-wpel-link="external">
                                    <?=$product4['category']['category_name']?>
                                </a>
                                <a href="/san-pham/<?=$product4['slug']?>" title="<?=$product4['product_name']?>" data-wpel-link="internal">
                                    <h3 class="woocommerce-loop-product__title"><?=$product4['product_name']?></h3>
                                </a>
                                <span class="price">
                                    <ins aria-hidden="true">
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi><?=$sell_price4?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></bdi>
                                        </span>
                                    </ins>
                                    <?php if($init_price4_screen): ?>
                                    <del aria-hidden="true">
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi><?=$init_price4_screen?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></bdi>
                                        </span>
                                    </del>
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>
            <?php endif; ?>
            <?php if(count($top_sell_products) > 0): ?>
            <section class="related products">
                <div class="title-thc">Sản phẩm bán chạy</div>
                <div class="row">
                    <?php foreach($top_sell_products as $product5):
                        $sell_price5 = $product5['sell_price'];
                        $init_price5 = $product5['init_price'];
                        if($init_price5 && $init_price5 > $sell_price5) {
                            $save = '<span class="onsale">-'.number_format(round((($init_price5 - $sell_price5) / $init_price5) * 100, 1), 0, ',', '.').'%</span>';
                            $init_price5_screen = number_format($init_price5, 0, ',', '.');
                        } else {
                            $save = "";
                            $init_price5_screen = "";
                        }
                        $sell_price5 = number_format($sell_price5, 0, ',', '.');
                    ?>
                    <div class="product-card-wrapper col-6 col-md-2 col-lg-2 product type-product post-79751 status-publish instock product_cat-noi-that-thanh-ly product_cat-ghe-xoay product_cat-ghe-van-phong-gia-re has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                        <div class="product-card">
                            <div class="img-cover">
                                <a href="/san-pham/<?=$product5['slug']?>" class="thumbnail-wrapper" title="<?=$product5['product_name']?>" data-wpel-link="internal">
                                    <?= $save ?>
                                    <img width="300" height="300" src="/uploads/products/<?= $product5['product_image'] ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""/>
                                </a>
                                <a title="Chat zalo" class="float-button chat-zalo" target="_blank" href="<?=ZALO_LINK?>" rel="nofollow external noopener noreferrer" data-wpel-link="external">
                                    <img src="/assets/img/zalo-stick.png" alt=""/>
                                </a>
                            </div>
                            <div class="info-product">
                                <a rel="nofollow external noopener noreferrer" href="/danh-muc-san-pham/<?=$product5['category']['slug']?>" class="product-category-link" data-wpel-link="external">
                                    <?=$product5['category']['category_name']?>
                                </a>
                                <a href="/san-pham/<?=$product5['slug']?>" title="<?=$product5['product_name']?>" data-wpel-link="internal">
                                    <h3 class="woocommerce-loop-product__title"><?=$product5['product_name']?></h3>
                                </a>
                                <span class="price">
                                    <ins aria-hidden="true">
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi><?=$sell_price5?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></bdi>
                                        </span>
                                    </ins>
                                    <?php if($init_price5_screen): ?>
                                    <del aria-hidden="true">
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi><?=$init_price5_screen?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></bdi>
                                        </span>
                                    </del>
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>
            <?php endif; ?>
            <?php if(count($flash_sale_products) > 0): ?>
            <section class="related products">
                <div class="title-thc">SẢN PHẨM FLASH SALE</div>
                <div class="row">
                    <?php foreach($flash_sale_products as $product6):
                        $sell_price6 = $product6['sell_price'];
                        $init_price6 = $product6['init_price'];
                        if($init_price6 && $init_price6 > $sell_price6) {
                            $save = '<span class="onsale">-'.number_format(round((($init_price6 - $sell_price6) / $init_price6) * 100, 1), 0, ',', '.').'%</span>';
                            $init_price6_screen = number_format($init_price6, 0, ',', '.');
                        } else {
                            $save = "";
                            $init_price6_screen = "";
                        }
                        $sell_price6 = number_format($sell_price6, 0, ',', '.');
                    ?>
                    <div class="product-card-wrapper col-6 col-md-2 col-lg-2 product type-product post-79751 status-publish instock product_cat-noi-that-thanh-ly product_cat-ghe-xoay product_cat-ghe-van-phong-gia-re has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
                        <div class="product-card">
                            <div class="img-cover">
                                <a href="/san-pham/<?=$product6['slug']?>" class="thumbnail-wrapper" title="<?=$product6['product_name']?>" data-wpel-link="internal">
                                    <?= $save ?>
                                    <img width="300" height="300" src="/uploads/products/<?= $product6['product_image'] ?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""/>
                                </a>
                                <a title="Chat zalo" class="float-button chat-zalo" target="_blank" href="<?=ZALO_LINK?>" rel="nofollow external noopener noreferrer" data-wpel-link="external">
                                    <img src="/assets/img/zalo-stick.png" alt=""/>
                                </a>
                            </div>
                            <div class="info-product">
                                <a rel="nofollow external noopener noreferrer" href="/danh-muc-san-pham/<?=$product6['category']['slug']?>" class="product-category-link" data-wpel-link="external">
                                    <?=$product6['category']['category_name']?>
                                </a>
                                <a href="/san-pham/<?=$product6['slug']?>" title="<?=$product6['product_name']?>" data-wpel-link="internal">
                                    <h3 class="woocommerce-loop-product__title"><?=$product6['product_name']?></h3>
                                </a>
                                <span class="price">
                                    <ins aria-hidden="true">
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi><?=$sell_price6?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></bdi>
                                        </span>
                                    </ins>
                                    <?php if($init_price6_screen): ?>
                                    <del aria-hidden="true">
                                        <span class="woocommerce-Price-amount amount">
                                            <bdi><?=$init_price6_screen?>&nbsp;<span class="woocommerce-Price-currencySymbol">&#8363;</span></bdi>
                                        </span>
                                    </del>
                                    <?php endif; ?>
                                </span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php if($message = \Session::get_flash('message')): ?>
    <script>
        $(document).ready(function() {
            alert('<?= $message; ?>');
        });
    </script>
<?php endif; ?>