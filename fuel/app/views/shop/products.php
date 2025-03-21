<?php
$orderby = Input::get('orderby');
$price = Input::get('price');
?>
<div class="col-12 col-md-12 col-lg-9">
    <div class="order">
        <form action="<?=$_SERVER['REQUEST_URI']?>" class="filter">
            <span>Xếp theo:</span>
            <div class="item">
                <input type="radio"
                    id="title-asc" name="orderby" value="title-asc" <?= ($orderby == 'title-asc') ? 'checked' : '' ?>>
                <label for="title-asc">Tên A-Z</label>
            </div>
            <div class="item">
                <input type="radio"
                    id="title-desc" name="orderby" value="title-desc" <?= ($orderby == 'title-desc') ? 'checked' : '' ?>>
                <label for="title-desc">Tên Z-A</label>
            </div>
            <div class="item">
                <input type="radio"
                    id="price-asc" name="orderby" value="price" <?= ($orderby == 'price') ? 'checked' : '' ?>>
                <label for="price-asc">Giá thấp đến cao</label>
            </div>
            <div class="item">
                <input type="radio"
                    id="price-desc" name="orderby" value="price-desc" <?= ($orderby == 'price-desc') ? 'checked' : '' ?>>
                <label for="price-desc">Giá cao đến thấp</label>
            </div>
            <?php foreach ($price as $key => $value): ?>
                <input type="hidden" name="price[]" value="<?=$value?>">
            <?php endforeach; ?>
        </form>
    </div>
    <div class="row products columns-1">
        <?php foreach ($products as $product) : ?>
        <div class="product-card-wrapper col-6 col-md-3 col-lg-3 product type-product post-<?=$product['product_id']?> status-publish first instock product_cat-noi-that-thanh-ly product_cat-ghe-cong-thai-hoc product_cat-ghe-xoay product_cat-ghe-lam-viec-tai-nha product_cat-ghe-van-phong-gia-re has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
            <div class="product-card">
                <div class="img-cover">
                    <a rel="" href="/san-pham/<?=$product['slug']?>"
                        class="thumbnail-wrapper" title="<?=$product['product_name']?>"
                        data-wpel-link="internal">
                        <span class="onsale">-33%</span>
                        <img width="300" height="300" src="/uploads/products/<?=$product['product_image']?>"
                            class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail entered lazyloaded"
                            alt="" decoding="async" >
                    </a>
                    <a title="Chat zalo" class="float-button chat-zalo" target="_blank"
                        href="https://zalo.me/3269059400105626655" rel="nofollow" data-wpel-link="external">
                        <img src="/assets/img/zalo-stick.png" alt="">
                    </a>
                </div>
                <div class="info-product">
                    <a rel="" href="/san-pham/<?=$product['slug']?>" title="<?=$product['product_name']?>" data-wpel-link="internal">
                        <h3 class="woocommerce-loop-product__title"><?=$product['product_name']?></h3>
                    </a>

                    <span class="price">
                        <del aria-hidden="true">
                            <span class="woocommerce-Price-amount amount">
                                <bdi>
                                    <?=number_format($product['init_price'], 0, ',', '.')?>&nbsp; <span class="woocommerce-Price-currencySymbol">₫</span>
                                </bdi>
                            </span>
                        </del> 
                        <span class="screen-reader-text">Giá gốc là: <?=number_format($product['init_price'], 0, ',', '.')?>&nbsp;₫.</span>
                        <ins aria-hidden="true">
                            <span class="woocommerce-Price-amount amount">
                                <bdi>
                                    <?=number_format($product['sell_price'], 0, ',', '.')?>&nbsp; <span class="woocommerce-Price-currencySymbol">₫</span>
                                </bdi>
                            </span>
                        </ins>
                    <span class="screen-reader-text">Giá hiện tại là: <?=number_format($product['sell_price'], 0, ',', '.')?>&nbsp;₫.</span>
                </span>
                </div>

            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <!-- <nav class="woocommerce-pagination" aria-label="Phân trang sản phẩm">
        <ul class="page-numbers">
            <li><span aria-label="Trang 1" aria-current="page" class="page-numbers current">1</span></li>
            <li><a aria-label="Trang 2" class="page-numbers"
                    href="https://noithatgiathe.vn/noi-that-thanh-ly/page/2/" data-wpel-link="external"
                    rel="nofollow external noopener noreferrer">2</a></li>
            <li><a class="next page-numbers" href="https://noithatgiathe.vn/noi-that-thanh-ly/page/2/"
                    data-wpel-link="external" rel="nofollow external noopener noreferrer">→</a></li>
        </ul>
    </nav> -->
    <div class="row">
        <?=ipagelisting($page, $total_page)?>
    </div>
    <div class="entry-content content-entry archive-content">
        <div class="thc-content-custom">
            <?= htmlspecialchars_decode($content); ?>
            <p class="dtcvmodetail"><span class="read-more-homedy">Xem thêm</span></p>
            <p class="dtchide"><span class="collapse-homedy">Thu gọn</span></p>
        </div>
    </div>
</div>