<div class="breadcrumb-wrapper">
	<div class="container">
		<nav aria-label="breadcrumbs" class="rank-math-breadcrumb">
			<p>
				<a href="https://noithatgiathe.vn" data-wpel-link="internal">Trang chủ</a>
				<span class="separator"><i class="fa-solid fa-angle-right"></i></span>
				<span class="last">Kết quả tìm kiếm</span>
			</p>
		</nav>
	</div>
</div>
<div class="container">
	<div class="">
		<div class="woocommerce-products-header">
			<h1 class="title-thc">Kết quả tìm kiếm: “<?=$s_text?>”</h1>
		</div>
		<div class="archive-meta mb-4 mt-4">
			<div class="total">
				Có <?=$products['total']?> kết quả được tìm thấy. </div>
		</div>
		<div class="row row-cols-lg-5">
			<?php if(count($products) > 0): ?>
					<?php foreach($products['data'] as $product4):
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
					 <div
				class="product-card-wrapper col-sm-6 col-6 product type-product post-94105 status-publish first instock product_cat-noi-that-thanh-ly has-post-thumbnail sale shipping-taxable purchasable product-type-simple">
				<div class="product-card">
					<div class="img-cover">
						<a rel="" href="/san-pham/<?=$product4['slug']?>" class="thumbnail-wrapper" title="<?=$product4['product_name']?>" data-wpel-link="internal">
							<?= $save ?>
							<img width="300" height="300" src="/uploads/products/<?= $product4['product_image'] ?>"
								class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt=""
								decoding="async" fetchpriority="high" sizes="(max-width: 300px) 100vw, 300px">
						</a>
						<a title="Chat zalo" class="float-button chat-zalo" target="_blank" href="<?=ZALO_LINK?>" rel="nofollow" data-wpel-link="external">
							<img src="/assets/img/zalo-stick.png" alt="">
						</a>
					</div>
					<div class="info-product">
						<a rel="nofollow external noopener noreferrer"
							href="/danh-muc-san-pham/<?=$product4['category']['slug']?>" class="product-category-link"
							data-wpel-link="external"><?=$product4['category']['category_name']?></a>
						<a rel="" href="/san-pham/<?=$product4['slug']?>"
							title="<?=$product4['product_name']?>" data-wpel-link="internal">
							<h3 class="woocommerce-loop-product__title"><?=$product4['product_name']?></h3>
						</a>

						<span class="price">
							<ins aria-hidden="true">
								<span class="woocommerce-Price-amount amount">
								<bdi><?=$sell_price4?>&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></bdi>
								</span>
							</ins>
							<?php if($init_price4_screen): ?>
							<del aria-hidden="true">
								<span class="woocommerce-Price-amount amount">
									<bdi><?=$init_price4_screen?>&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></bdi>
								</span>
							</del>
							<?php endif; ?>
						</span>
					</div>
				</div>
			</div>
					<?php endforeach; ?>
			<?php endif; ?>
		</div>
		<?php if(count($products['data']) > 0): ?>
		<div class="row">
			<?= ipagelisting2($products['page'], $products['total_page']) ?>
		</div>
		<?php endif; ?>
	</div>


</div>