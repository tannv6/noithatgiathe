<?php
$categories = getCategoriesWithChildren();
?>
<main>
	<style>
		.header_slide_carousel.owl-carousel .item {
			padding-top: <?=round($main_banner_config['ratio_height'] / $main_banner_config['ratio_width'] * 100)?>%;
		}
		@media only screen and (max-width: 769px) {
			.header_slide_carousel.owl-carousel .item {
				padding-top: <?=round($main_banner_config['mobile_ratio_height'] / $main_banner_config['mobile_ratio_width'] * 100)?>%;
			}
		}
	</style>
	<section id="header_slide" class="header_slide mt-0 mt-md-2">
		<div class="container">
			<div style="margin-left: -1px;">
				<div class="header_slide_carousel owl-carousel owl-theme">
					<?php foreach ($banners as $banner): ?>
						<div class="item">
							<picture>
								<source media="(min-width:769px)" srcset="/uploads/banners/<?= $banner['image_url'] ?>">
								<img src="/uploads/banners/<?= $banner['image_url_m'] ?>">
							</picture>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
	<script>
		$(document).ready(function(){
			const carousel = $(".header_slide_carousel").owlCarousel({
				loop: true,
				margin: 10,
				dots: true,
				autoplay: true,
				autoplayTimeout: 6000,
				smartSpeed: 1500,
				autoplayHoverPause: true,
				nav: false,
				items: 1,
				responsive: {
					679: {
						dots: false,
						nav: true,
						navText: ['<i class="fa-solid fa-chevron-left fs-5"></i>', '<i class="fa-solid fa-chevron-right fs-5"></i>'],
					}
				}
			});
		});
	</script>
	<!-- <section id="content" class="content">
		<div class="container">
			<div class="content-entry">
				<p style="text-align: center;" data-aos="fade-down">
					<strong><span class="fs-5 fs-md-1"><?=MAIN_INTRO?></span></strong>
				</p>
				<div data-aos="fade-up">
					<p style="text-align: center;line-height: 1.8;">
						<span class="fs-6"><?=nl2br(MAIN_SUB_INTRO)?></span>
					</p>
				</div>
			</div>
		</div>
	</section> -->
	<style>
		.ads_banner_carousel .swiper-slide {
			width: 100%;
		}
		@media only screen and (min-width: 769px) {
			.ads_banner_carousel .swiper-slide {
				width: calc( (100% - 20px) / 3 );
				margin-right: 10px;
			}
		}
		@media only screen and (min-width: 1200px) {
			.ads_banner_carousel .swiper-slide {
				width: calc( (100% - 40px) / 5 );
			}
		}
	</style>
	<!-- <section id="ads_banner" class="ads_banner mt-5">
		<div class="container">
			<h1 class="fs-4 m-0 text-uppercase fw-bold text-center">Khi mua nội thất, tại sao bạn nên chọn nội thất Gia Thế ?</h1>
			<div class="swiper ads_banner_carousel mt-3">
				<div class="swiper-wrapper">
				<?php foreach ($ads as $ad): ?>
					<div class="position-relative swiper-slide rounded-1 overflow-hidden">
						<picture class="ratio ratio-16x9">
							<source media="(min-width:769px)" srcset="/uploads/banners/<?= $ad['image_url'] ?>">
							<img src="/uploads/banners/<?= $ad['image_url_m'] ?>">
						</picture>
						<div class="position-absolute top-50 translate-middle-y px-2">
							<h2 class="fs-6 m-0 fw-bold">
								<?=htmlspecialchars_decode($ad['title'])?>
							</h2>
							<h3 class="fs-6 m-0">
								<small><?=htmlspecialchars_decode($ad['sub_title'])?></small>
							</h3>
						</div>
					</div>
				<?php endforeach; ?>
				</div>
				<div class="swiper-pagination"></div>
			</div>
		</div>
	</section> -->
	<script>
		$(document).ready(function(){
			var swiper = new Swiper(".ads_banner_carousel", {
				autoplay: {
					delay: 5000,
					pauseOnMouseEnter: true,
				},
				speed: 1000,
				loop: <?=count($ads) > 0 ? 'true' : 'false'?>,
				slidesPerView: 1,
				spaceBetween: 10,
				pagination: {
					el: ".swiper-pagination",
				},
				breakpoints: {
					679: {
						slidesPerView: 3,
						loop: <?=count($ads) > 3 ? 'true' : 'false'?>
					},
					1024: {
						slidesPerView: 5,
						loop: <?=count($ads) > 5 ? 'true' : 'false'?>
					}
				}
			});
		});
	</script>
	<!-- <section id="feature_project" class="feature_project">
		<div class="container">
			<div class="wrapper rocket-lazyload entered lazyloaded"
				style="background-image: url(&quot;/assets/img/backdground-feature-1.svg&quot;);" data-ll-status="loaded">
				<div class="fs-4 m-0 text-uppercase fw-bold text-center text-white mb-3" data-aos="fade-up"> Dự án tiêu biểu </div>
				<div class="desc" data-aos="fade-up">
					<p style="text-align: center;">Cung cấp cho khách hàng những hình ảnh sản phẩm thực tế qua những
						dự án chúng tôi đã thực hiện. Kính mời quý khách hàng cùng xem!</p>
				</div>
				<div class="row g-2">
					<?php $cnt = 0; foreach ($projects as $project): ?>
						<div class="col-6 col-md-3 col-lg-3" data-aos="fade-up" data-aos-delay="<?= $cnt++ * 0 ?>">
							<div class="card-post">
								<div class="card-wrap">
									<div class="wrapper-thumb">
										<a href="/bai-viet/<?= $project['slug'] ?>" class="img-wrap thumbnail-wrapper"
											rel="nofollow" data-wpel-link="internal">
											<img decoding="async" class="img entered lazyloaded"
												src="/uploads/bbs/project/<?= $project['thumb'] ?>" alt="">
										</a>
									</div>
									<div class="card-info">
										<a href="/bai-viet/<?= $project['slug'] ?>" rel="nofollow" data-wpel-link="internal">
											<h3>
												<div class="title-post"><?= $project['title'] ?></div>
											</h3>
										</a>
									</div>
									<div class="view-more">
										<a href="/bai-viet/<?= $project['slug'] ?>" rel="nofollow" data-wpel-link="internal">
											Xem chi tiết <i class="fa-solid fa-angles-right"></i>
										</a>
									</div>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
				<div class="primary-button small" data-aos="fade-up">
					<a href="/danh-muc-bai-viet/du-an" rel="nofollow external noopener noreferrer" data-wpel-link="external">
						Xem thêm<i class="fa-solid fa-arrow-right-long"></i>
					</a>
				</div>
			</div>
		</div>
	</section> -->
	<style>
		.top_categories_carousel:not(.swiper-initialized) .swiper-wrapper .swiper-slide:nth-child(n+13) {
			display: none;
		}
		@media screen and (max-width: 1024px) {
			.top_categories_carousel:not(.swiper-initialized) .swiper-wrapper .swiper-slide:nth-child(n+9) {
				display: none;
			}
		}
		@media screen and (max-width: 768px) {
			.top_categories_carousel:not(.swiper-initialized) .swiper-wrapper .swiper-slide:nth-child(n+7) {
				display: none;
			}
		}
	</style>
	<section>
		<div class="container">
			<div class="swiper child-categories-top top_categories_carousel">
			<div class="swiper-wrapper row g-0">
				<?php foreach($top_categories as $category): ?>
					<div class="swiper-slide col-4 col-md-3 col-lg-2">
						<div class="card-cate-item"><a href="/danh-muc-san-pham/<?=$category['slug']?>" data-wpel-link="internal">
								<div class="cover-image border-0">
									<div class="img-wrap thumbnail-wrapper">
										<img src="/uploads/categories/<?=$category['category_image']?>" alt="<?=$category['category_name']?>" />
									</div>
								</div>
							</a>
							<div class="title">
								<a href="/danh-muc-san-pham/<?=$category['slug']?>" data-wpel-link="internal"><?=$category['category_name']?></a>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
			<div class="swiper-pagination"></div>
			<!-- <div class="d-flex gap-2 justify-content-center">
				<div class="swiper-button-prev-top_categories_carousel">
					<i class="fa-solid fa-chevron-left"></i>
				</div>
				<div class="swiper-button-next-top_categories_carousel">
					<i class="fa-solid fa-chevron-right"></i>
				</div>
			</div> -->
			</div>
		</div>
	</section>
	<script>
		$(document).ready(function(){
			var swiper = new Swiper(".top_categories_carousel", {
				speed: 1000,
				slidesPerView: 3,
				slidesPerGroup: 3,
				spaceBetween: 5,
				navigation: false,
				grid: {
					rows: 2,
					fill: 'columns',
				},
				pagination: {
					el: ".swiper-pagination",
					clickable: true
				},
				breakpoints: {
					679: {
						spaceBetween: 10,
						slidesPerView: 4,
						navigation: false,
						pagination: {
							el: ".swiper-pagination",
							clickable: true
						},
					},
					1025: {
						spaceBetween: 10,
						slidesPerView: 6,
						navigation: false,
						pagination: {
							el: ".swiper-pagination",
							clickable: true
						},
					}
				}
			});
		});
	</script>
	<section id="new_product" class="new_product pt-5" data-aos="fade-up">
		<div class="container">
			<h1 class="fs-4 m-0 text-uppercase fw-bold text-center"><span class="prd-title prd-title-new">Sản phẩm mới về</span></h1>
			<div class="mt-4">
				<div class="row">
					<?php $cnt = 0; foreach ($new_products as $product):
						$sell_price = $product['sell_price'];
						$init_price = $product['init_price'];
						if($init_price && $init_price > $sell_price) {
							$product['init_price'] = number_format($init_price, 0, ',', '.');

							$product['save'] = number_format($init_price - $sell_price, 0, ',', '.');
						}
						?>
						<div class="col-6 col-md-3 col-lg-2" data-aos-delay="<?= $cnt++ * 0 ?>">
							<div class="h-100 d-flex flex-column">
								<a rel="nofollow" href="/san-pham/<?=$product['slug']?>" class="ratio ratio ratio-1x1 ratio-hover" title="<?=$product['product_name']?>" data-wpel-link="internal">
									<img src="/uploads/products/<?= $product['product_image'] ?>" class="" alt="<?=$product['product_name']?>">
								</a>
								<div class="flex-fill d-flex flex-column justify-content-between">
									<!-- <a rel="nofollow" href="https://noithatgiathe.vn/ghe-cong-thai-hoc/"
										class="text-dark" data-wpel-link="internal"><?=$product['category']['category_name']?></a> -->
									<a rel="nofollow" class="text-dark fs-6 mt-1 d-block" href="/san-pham/<?=$product['slug']?>" title="<?=$product['product_name']?>" data-wpel-link="internal">
										<?=$product['product_name']?>
									</a>
									<span class="fs-6 fw-bold">
										<bdi>
											<?=number_format($product['sell_price'], 0, ',', '.')?><span class="woocommerce-Price-currencySymbol">&#8363;</span>
										</bdi>
									</span>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
	<section id="top_product" class="top_product mt-5">
		<div class="container">
			<h1 class="fs-4 m-0 text-uppercase fw-bold text-center" data-aos="fade-up"><span class="prd-title prd-title-top">Sản phẩm bán chạy</span></h1>
			<div class="mt-4">
				<div class="row">
					<?php $cnt = 0; foreach ($top_sell_products as $product):
						$sell_price = $product['sell_price'];
						$init_price = $product['init_price'];
						if($init_price && $init_price > $sell_price) {
							$product['init_price'] = number_format($init_price, 0, ',', '.');

							$product['save'] = number_format($init_price - $sell_price, 0, ',', '.');
						}
						?>
						<div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="<?= $cnt++ * 0 ?>">
							<div class="h-100 d-flex flex-column">
								<a rel="nofollow" href="/san-pham/<?=$product['slug']?>" class="ratio ratio ratio-1x1 ratio-hover" title="<?=$product['product_name']?>" data-wpel-link="internal">
									<img src="/uploads/products/<?= $product['product_image'] ?>" class="" alt="<?=$product['product_name']?>">
								</a>
								<div class="flex-fill d-flex flex-column justify-content-between">
									<!-- <a rel="nofollow" href="https://noithatgiathe.vn/ghe-cong-thai-hoc/"
										class="text-dark" data-wpel-link="internal"><?=$product['category']['category_name']?></a> -->
									<a rel="nofollow" class="text-dark fs-6 mt-1 d-block" href="/san-pham/<?=$product['slug']?>" title="<?=$product['product_name']?>" data-wpel-link="internal">
										<?=$product['product_name']?>
									</a>
									<span class="fs-6 fw-bold">
										<bdi>
											<?=number_format($product['sell_price'], 0, ',', '.')?><span class="woocommerce-Price-currencySymbol">&#8363;</span>
										</bdi>
									</span>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
	<section id="sale_product" class="sale_product mt-5">
		<div class="container">
			<h1 class="fs-4 m-0 text-uppercase fw-bold text-center" data-aos="fade-up"><span class="prd-title prd-title-sale">Sản phẩm flash sale</span></h1>
			<div class="mt-4">
				<div class="row">
					<?php $cnt = 0; foreach ($flash_sale_products as $product):
						$sell_price = $product['sell_price'];
						$init_price = $product['init_price'];
						if($init_price && $init_price > $sell_price) {
							$product['init_price'] = number_format($init_price, 0, ',', '.');

							$save = round(($init_price - $sell_price) / $init_price * 100);
						} else {
							$product['init_price'] = "";
							$save = 0;
						}
						?>
						<div class="col-6 col-md-3 col-lg-2" data-aos="fade-up" data-aos-delay="<?= $cnt++ * 0 ?>">
							<div class="h-100 d-flex flex-column">
								<a rel="nofollow" href="/san-pham/<?=$product['slug']?>" class="ratio ratio ratio-1x1 ratio-hover" title="<?=$product['product_name']?>" data-wpel-link="internal">
									<img src="/uploads/products/<?= $product['product_image'] ?>" class="" alt="<?=$product['product_name']?>">
									<?php if($save > 0): ?>
										<span class="badge discount-badge">-<?=$save?>%</span>
									<?php endif; ?>
								</a>
								<div class="flex-fill d-flex flex-column justify-content-between">
									<!-- <a rel="nofollow" href="https://noithatgiathe.vn/ghe-cong-thai-hoc/"
										class="text-dark" data-wpel-link="internal"><?=$product['category']['category_name']?></a> -->
									<a rel="nofollow" class="text-dark fs-6 mt-1 d-block" href="/san-pham/<?=$product['slug']?>" title="<?=$product['product_name']?>" data-wpel-link="internal">
										<?=$product['product_name']?>
									</a>
									<span class="fs-6 fw-bold">
										<bdi>
											<?=number_format($product['sell_price'], 0, ',', '.')?><span class="woocommerce-Price-currencySymbol">&#8363;</span>
										</bdi>
									</span>
								</div>
							</div>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
	<section id="feature_product" class="feature_product d-none">
		<div class="container">
			<div class="row list-promotion">
				<div class="col-12 col-md-4 col-lg-4" data-aos="fade-up">
					<a href="#!"
						rel="nofollow external noopener noreferrer" data-wpel-link="external">
						<h1 class="title-thc">
							Mới về </h1>
					</a>
					<div class="list">
						<?php foreach ($new_products as $product):
								$sell_price = $product['sell_price'];
								$init_price = $product['init_price'];
								if($init_price && $init_price > $sell_price) {
									$product['init_price'] = number_format($init_price, 0, ',', '.');

									$product['save'] = number_format($init_price - $sell_price, 0, ',', '.');
								}
							?>
							<div
								class="product-card-wrapper product type-product post-91167 status-publish first instock product_cat-san-pham-moi-ve has-post-thumbnail shipping-taxable purchasable product-type-simple">
								<div class="product-card">
									<div class="img-cover">
										<a rel="nofollow" href="/san-pham/<?=$product['slug']?>"
											class="thumbnail-wrapper" title="<?=$product['product_name']?>"
											data-wpel-link="internal">
											<img width="300" height="300"
												src="/uploads/products/<?= $product['product_image'] ?>"
												class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">
										</a>
										<a title="Chat zalo" class="float-button chat-zalo" target="_blank"
											href="<?=ZALO_LINK?>"
											rel="nofollow external noopener noreferrer" data-wpel-link="external">
											<img src="/assets/img/zalo-stick.png" alt="" />
										</a>
									</div>
									<div class="info-product">
										<a rel="nofollow" href="https://noithatgiathe.vn/ghe-cong-thai-hoc/"
											class="product-category-link" data-wpel-link="internal"><?=$product['category']['category_name']?></a>
										<a rel="nofollow" href="/san-pham/<?=$product['slug']?>"
											title="<?=$product['product_name']?>" data-wpel-link="internal">
											<h3 class="woocommerce-loop-product__title"><?=$product['product_name']?></h3>
										</a>
										<span class="price">
											<span class="woocommerce-Price-amount amount">
												<bdi>
													<?=number_format($product['sell_price'], 0, ',', '.')?>&nbsp;
													<span class="woocommerce-Price-currencySymbol">&#8363;</span>
												</bdi>
											</span>
										</span>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="col-12 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="200">
					<a href="#!"
						rel="nofollow external noopener noreferrer" data-wpel-link="external">
						<div class="title-thc">
							Bán chạy </div>
					</a>
					<div class="list">
						<?php foreach ($top_sell_products as $product): ?>
							<div
								class="product-card-wrapper product type-product post-91167 status-publish first instock product_cat-ghe-cong-thai-hoc product_cat-san-pham-moi-ve product_cat-ghe-lam-viec-tai-nha product_cat-ghe-van-phong-gia-re has-post-thumbnail shipping-taxable purchasable product-type-simple">
								<div class="product-card">
									<div class="img-cover">
										<a rel="nofollow" href="/san-pham/<?=$product['slug']?>"
											class="thumbnail-wrapper" title="<?=$product['product_name']?>"
											data-wpel-link="internal">
											<img width="300" height="300"
												src="/uploads/products/<?= $product['product_image'] ?>"
												class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">
										</a>
										<a title="Chat zalo" class="float-button chat-zalo" target="_blank"
											href="<?=ZALO_LINK?>"
											rel="nofollow external noopener noreferrer" data-wpel-link="external">
											<img src="/assets/img/zalo-stick.png" alt="" />
										</a>
									</div>
									<div class="info-product">
										<a rel="nofollow" href="https://noithatgiathe.vn/ghe-cong-thai-hoc/"
											class="product-category-link" data-wpel-link="internal"><?=$product['category']['category_name']?></a>
										<a rel="nofollow" href="/san-pham/<?=$product['slug']?>"
											title="<?=$product['product_name']?>" data-wpel-link="internal">
											<h3 class="woocommerce-loop-product__title"><?=$product['product_name']?></h3>
										</a>
										<span class="price"><span
												class="woocommerce-Price-amount amount"><bdi><?=number_format($product['sell_price'], 0, ',', '.')?>&nbsp;<span
														class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></span>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="col-12 col-md-4 col-lg-4" data-aos="fade-up" data-aos-delay="400">
					<a href="#!"
						rel="nofollow external noopener noreferrer" data-wpel-link="external">
						<div class="title-thc">
							Flash Sale </div>
					</a>
					<div class="list">
						<?php foreach ($flash_sale_products as $product): ?>
							<div
								class="product-card-wrapper product type-product post-91167 status-publish first instock product_cat-ghe-cong-thai-hoc product_cat-san-pham-moi-ve product_cat-ghe-lam-viec-tai-nha product_cat-ghe-van-phong-gia-re has-post-thumbnail shipping-taxable purchasable product-type-simple">
								<div class="product-card">
									<div class="img-cover">
										<a rel="nofollow" href="/san-pham/<?=$product['slug']?>"
											class="thumbnail-wrapper" title="<?=$product['product_name']?>"
											data-wpel-link="internal">
											<img width="300" height="300"
												src="/uploads/products/<?= $product['product_image'] ?>"
												class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="">
										</a>
										<a title="Chat zalo" class="float-button chat-zalo" target="_blank"
											href="<?=ZALO_LINK?>"
											rel="nofollow external noopener noreferrer" data-wpel-link="external">
											<img src="/assets/img/zalo-stick.png" alt="" />
										</a>
									</div>
									<div class="info-product">
										<a rel="nofollow" href="https://noithatgiathe.vn/ghe-cong-thai-hoc/"
											class="product-category-link" data-wpel-link="internal"><?=$product['category']['category_name']?></a>
										<a rel="nofollow" href="/san-pham/<?=$product['slug']?>"
											title="<?=$product['product_name']?>" data-wpel-link="internal">
											<h3 class="woocommerce-loop-product__title"><?=$product['product_name']?></h3>
										</a>
										<span class="price"><span
												class="woocommerce-Price-amount amount"><bdi><?=number_format($product['sell_price'], 0, ',', '.')?>&nbsp;<span
														class="woocommerce-Price-currencySymbol">&#8363;</span></bdi></span></span>
									</div>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
	</section>
	<section id="promotions" class="promotions">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-12 col-lg-6 mb-md-4" data-aos="fade-right">
					<div class="row left">
						<div class="col-6 col-md-6 col-lg-6">
							<div class="img-wrap">
								<picture>
									<source media="(max-width:768px)" srcset="/uploads/banners/<?=$banners_middle[0]['image_url']?>">
									<img src="/uploads/banners/<?=$banners_middle[0]['image_url']?>" alt="">
								</picture>
							</div>
						</div>
						<div class="col-6 col-md-6 col-lg-6">
							<div class="content">
								<div class="sub_menu_1"><?=$banners_middle[0]['title']?></div>
								<div class="title_1"><?=$banners_middle[0]['sub_title']?></div>
								<div class="primary-button small">
									<a href="<?=$banners_middle[0]['link_url']?>" rel="nofollow" data-wpel-link="internal">
										Xem thêm<i class="fa-solid fa-arrow-right-long"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-12 col-md-12 col-lg-6 mb-md-4" data-aos="fade-left">
					<div class="row right">
						<div class="col-6 col-md-6 col-lg-6">
							<div class="img-wrap">
								<picture>
									<source media="(max-width:768px)" srcset="/uploads/banners/<?=$banners_middle[1]['image_url']?>">
									<img src="/uploads/banners/<?=$banners_middle[1]['image_url']?>" alt="">
								</picture>
							</div>
						</div>
						<div class="col-6 col-md-6 col-lg-6">
							<div class="content">
								<div class="sub_menu_1">
									<?=$banners_middle[1]['title']?> </div>
								<div class="title_1">
									<?=$banners_middle[1]['sub_title']?> </div>
								<div class="primary-button small"><a
										href="<?=$banners_middle[1]['link_url']?>"
										rel="nofollow" data-wpel-link="internal">Xem thêm<i
											class="fa-solid fa-arrow-right-long"></i></a></div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</section>
<?php foreach ($product_list_by_category as $category): ?>
	<section class="product_list">
		<div class="container">
			<a href="#!" data-wpel-link="internal" data-aos="fade-up">
				<h2><div class="title-thc"><?=$category['category_name']?></div></h2>
			</a>
			<div class="wrapper-nav" data-aos="fade-up">
				<div class="nav nav-pills head" id="pills-tab" role="tablist">
					<?php $cnt=0; foreach ($category['children'] as $key => $category1): ?>
						<div class="nav-link <?=$cnt == 0 ? "active" : ""?>" id="pills-<?=$category1['category_id']?>" data-bs-toggle="pill" data-bs-target="#pills-tab_<?=$category1['category_id']?>"
							role="tab" aria-controls="pills-home" aria-selected="true"><?=$category1['category_name']?></div>
					<?php $cnt++; endforeach; ?>
				</div>
			</div>
			<div class="tab-content" id="pills-tabContent">
			<?php  $cnt=0;foreach ($category['children'] as $key => $category1): ?>
				<div class="tab-pane fade <?=$cnt == 0 ? "show active" : ""?>" id="pills-tab_<?=$category1['category_id']?>" role="tabpanel"
					aria-labelledby="pills-home-tab">
					<div class="row row-cols-lg-5 row-cols-md-5">
						<?php $cnt=0; foreach ($category1['products'] as $product): ?>
						<div data-aos="fade-up" data-aos-delay="<?= $cnt++ * 0 ?>"
							class="product-card-wrapper col-sm-6 col-6 product type-product post-93654 status-publish last instock product_cat-ghe-giam-doc product_cat-ghe-van-phong-gia-re has-post-thumbnail shipping-taxable purchasable product-type-simple">
							<div class="product-card">
								<div class="img-cover">
									<a href="/san-pham/<?=$product['slug']?>"
										class="thumbnail-wrapper" title="<?=$product['product_name']?>"
										data-wpel-link="internal">
										<img width="300" height="300" src="/uploads/products/<?=$product['product_image']?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail entered lazyloaded" alt="">
									</a>
									<a title="Chat zalo" class="float-button chat-zalo" target="_blank"
										href="<?= ZALO_LINK ?>" rel="nofollow" data-wpel-link="external">
										<img src="/assets/img/zalo-stick.png" alt=""">
									</a>
								</div>
								<div class="info-product">
									<a rel="" href="/danh-muc-san-pham/<?=$category1['slug']?>"
										class="product-category-link" data-wpel-link="internal"><?=$category1['category_name']?></a>
									<a rel="" href="/san-pham/<?=$product['slug']?>""
										title="<?=$product['product_name']?>" data-wpel-link="internal">
										<h3 class="woocommerce-loop-product__title"><?=$product['product_name']?></h3>
									</a>
									<span class="price">
										<span class="woocommerce-Price-amount amount">
											<bdi><?php echo number_format($product['sell_price'], 0, ',', '.'); ?>&nbsp;<span class="woocommerce-Price-currencySymbol">₫</span></bdi>
										</span>
									</span>
								</div>
							</div>
						</div>
						<?php endforeach; ?>
					</div>
					<div class="primary-button small"><a
							href="/danh-muc-san-pham/<?=$category1['slug']?>" rel="nofollow"
							data-wpel-link="internal">Xem thêm<i class="fa-solid fa-arrow-right-long"></i></a></div>
				</div>
			<?php $cnt++; endforeach; ?>
			</div>
		</div>
	</section>
<?php endforeach; ?>
</main>