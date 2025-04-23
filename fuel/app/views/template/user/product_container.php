<?php $categories = getCategoriesWithChildren(); ?>
<?php
$orderby = Input::get('orderby') ?: '';
$price = Input::get('price') ?: [];
?>
<div class="breadcrumb-wrapper">
	<div class="container">
		<nav aria-label="breadcrumbs" class="rank-math-breadcrumb">
			<p>
				<a href="/" data-wpel-link="internal">Trang chủ</a>
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
<div class="container">
	<div class="woocommerce-products-header">
		<h1 class="title-thc"><?=$title?></h1>
	</div>
</div>
<div class="container">
	<?php if($category['category_banner']): ?>
		<div class="banner">
			<div class="img-wrap no-scale-image">
				<img decoding="async" class="img entered lazyloaded" src="/storages/categories/<?=$category['category_banner']?>" alt="<?=$category['category_name']?>">
			</div>
		</div>
	<?php endif; ?>
	<?php if(strip_tags($category['sort_description'])): ?>
		<div class="short_description content-entry mt-2">
			<?=htmlspecialchars_decode($category['sort_description'])?>
		</div>
	<?php endif; ?>
	<style>
		.top_categories_carousel:not(.swiper-initialized) .swiper-wrapper .swiper-slide:nth-child(n+13) {
			display: none;
		}
	</style>
	<?php if($top_categories): ?>
	<div class="swiper child-categories-top top_categories_carousel">
	<div class="swiper-wrapper row g-0">
		<?php foreach($top_categories as $category): ?>
			<div class="swiper-slide col-2">
				<div class="card-cate-item"><a href="/danh-muc-san-pham/<?=$category['slug']?>" data-wpel-link="internal">
						<div class="cover-image border-0">
							<div class="img-wrap thumbnail-wrapper">
								<img src="/storages/categories/<?=$category['category_image']?>" alt="<?=$category['category_name']?>" />
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
	<!-- <div class="swiper-button-prev"></div>
	<div class="swiper-button-next"></div> -->
	<div class="swiper-pagination"></div>
	</div>
	<?php endif; ?>
	<script>
		$(document).ready(function(){
			var swiper = new Swiper(".top_categories_carousel", {
				speed: 1000,
				slidesPerView: 1,
				spaceBetween: 10,
				// navigation: {
				//     nextEl: '.swiper-button-next',
				//     prevEl: '.swiper-button-prev',
				// },
				pagination: {
					el: ".swiper-pagination",
					clickable: true
				},
				breakpoints: {
					769: {
						slidesPerView: 3,
						grid: {
							rows: 2,
							fill: 'columns',
						},
					},
					1024: {
						slidesPerView: 6,
						grid: {
							rows: 2,
							fill: 'columns',
						},
					}
				}
			});
		});
	</script>
	<style>
		.child_categories_carousel:not(.swiper-initialized) .swiper-wrapper {
			display: flex;
			gap: 10px
		}
		.child_categories_carousel:not(.swiper-initialized) .swiper-wrapper .swiper-slide {
			width: calc(16.67% - 50px / 6);
		}
		.child_categories_carousel:not(.swiper-initialized) .swiper-wrapper .swiper-slide:nth-child(n+7) {
			display: none;
		}
		@media screen and (max-width: 1024px) {
			.child_categories_carousel:not(.swiper-initialized) .swiper-wrapper .swiper-slide {
				width: calc(33.33% - 20px / 3);
			}
			.child_categories_carousel:not(.swiper-initialized) .swiper-wrapper .swiper-slide:nth-child(n+4) {
				display: none;
			}
		}
		@media screen and (max-width: 768px) {
			.child_categories_carousel:not(.swiper-initialized) .swiper-wrapper .swiper-slide {
				width: calc(50% - 5px);
			}
			.child_categories_carousel:not(.swiper-initialized) .swiper-wrapper .swiper-slide:nth-child(n+3) {
				display: none;
			}
		}
	</style>
	<?php if($child_categories): ?>
	<div class="swiper child-categories-top child_categories_carousel">
	<div class="swiper-wrapper">
		<?php foreach($child_categories as $category): ?>
			<div class="swiper-slide">
				<div class="card-cate-item"><a href="/danh-muc-san-pham/<?=$category['slug']?>" data-wpel-link="internal">
						<div class="cover-image border-0">
							<div class="img-wrap thumbnail-wrapper">
								<img src="/storages/categories/<?=$category['category_image']?>" alt="<?=$category['category_name']?>" />
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
	<!-- <div class="swiper-button-prev"></div>
	<div class="swiper-button-next"></div> -->
	</div>
	<div class="swiper-pagination swiper-pagination-child position-relative"></div>
	<?php endif; ?>
	<script>
		$(document).ready(function(){
			var swiper = new Swiper(".child_categories_carousel", {
				speed: 1000,
				slidesPerView: 2,
				slidesPerGroup: 2,
				spaceBetween: 10,
				pagination: {
					el: ".swiper-pagination-child",
					clickable: true
				},
				breakpoints: {
					769: {
						slidesPerView: 3,
						slidesPerGroup: 3,
					},
					1025: {
						slidesPerView: 6,
						slidesPerGroup: 3,
					}
				}
			});
		});
	</script>
	<div class="row">
		<div class="col-12 col-md-6 col-lg-3 sidebar">
			<div class="column-sidebar mobile-sidebar ">
				<div class="block-sidebar">
					<div class="title-sb sidebar-cate-title">Danh mục</div>
					<div class="content">
						<div class="menu-danh-muc-san-pham-container">
							<ul id="product-cate-sidebar-new" class="menu-class">
								<?php foreach($categories as $category): ?>
									<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-has-children menu-item-85544">
										<a class="<?=$category_id == $category['category_id'] ? 'active' : ''?>" href="/danh-muc-san-pham/<?=$category['slug']?>" data-wpel-link="external" rel="nofollow external noopener noreferrer"><?=$category['category_name']?></a>
										<?php if(count($category['children']) > 0): ?>
										<ul class="sub-menu <?=in_array($category['category_id'], $parents_category ?: []) || $category_id == $category['category_id'] ? 'active' : ''?>">
											<?php foreach($category['children'] as $category1): ?>
												<li class="menu-item menu-item-type-taxonomy menu-item-object-product_cat menu-item-85484">
													<a class="<?=$category_id == $category1['category_id'] ? 'active' : ''?>" href="/danh-muc-san-pham/<?=$category1['slug']?>" data-wpel-link="external" rel="nofollow external noopener noreferrer">
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
				</div>
				<div class="block-sidebar">
					<div class="title-sb sidebar-cate-title">
						Giá sản phẩm
					</div>
					<div class="content">
						<form action="" method="GET" class="price-filter">
							<input type="hidden" name="orderby" value="<?=$orderby?>">
							<div class="item">
								<input type="checkbox" id="price-0-500000" name="price[]" value="0-500000" <?= (in_array('0-500000', $price)) ? 'checked' : '' ?>>
								<label for="price-0-500000">Giá dưới 500.000đ</label>
							</div>
							<div class="item">
								<input type="checkbox" id="price-500000-1000000" name="price[]" value="500000-1000000" <?= (in_array('500000-1000000', $price)) ? 'checked' : '' ?>>
								<label for="price-500000-1000000">500.000đ - 1.000.000đ</label>
							</div>
							<div class="item">
								<input type="checkbox" id="price-1000000-1500000" name="price[]"
									value="1000000-1500000" <?= (in_array('1000000-1500000', $price)) ? 'checked' : '' ?>>
								<label for="price-1000000-1500000">1.000.000đ - 1.500.000đ</label>
							</div>
							<div class="item">
								<input type="checkbox" id="price-1500000-2000000" name="price[]"
									value="1500000-2000000" <?= (in_array('1500000-2000000', $price)) ? 'checked' : '' ?>>
								<label for="price-1500000-2000000">1.500.000đ - 2.000.000đ</label>
							</div>
							<div class="item">
								<input type="checkbox" id="price-2000000-5000000" name="price[]"
									value="2000000-5000000" <?= (in_array('2000000-5000000', $price)) ? 'checked' : '' ?>>
								<label for="price-2000000-5000000">2.000.000đ - 5.000.000đ</label>
							</div>
							<div class="item">
								<input type="checkbox" id="price-5000000-10000000000" name="price[]"
									value="5000000-10000000000" <?= (in_array('5000000-10000000000', $price)) ? 'checked' : '' ?>>
								<label for="price-5000000-10000000000">Giá trên 5.000.000đ</label>
							</div>
							<button type="submit" class="submit">Lọc</button>
						</form>
					</div>
				</div>
				<div class="block-sidebar news-list-post">
					<div class="title-sb sidebar-cate-title">
						Sản phẩm bán chạy
					</div>
					<div class="list-product-sb">
						<?php foreach($top_sellers as $product): ?>
						<div class="product-card-wrapper col-12 col-md-12 col-lg-12 product type-product post-77864 status-publish first instock product_cat-module-ban-lam-viec product_cat-san-pham-ban-chay product_cat-cum-ban-lam-viec-4-nguoi has-post-thumbnail shipping-taxable purchasable product-type-simple">
							<div class="product-card">
								<div class="img-cover">
									<a rel="nofollow" href="/san-pham/<?=$product['slug']?>"
										class="thumbnail-wrapper" title="<?=$product['product_name']?>" data-wpel-link="internal">
										<img width="300" height="300" src="/storages/products/<?=$product['product_image']?>" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" />
									</a>
									<a title="Chat zalo" class="float-button chat-zalo" target="_blank"
										href="https://zalo.me/3269059400105626655"
										rel="nofollow external noopener noreferrer" data-wpel-link="external">
										<img src="/assets/img/zalo-stick.png" alt=""  />
									</a>
								</div>
								<div class="info-product">
									<!-- <a rel="nofollow" href="https://noithatgiathe.vn/module-ban-lam-viec/"
										class="product-category-link" data-wpel-link="internal">Cụm bàn làm việc
									</a> -->
									<a rel="nofollow"
										href="/san-pham/<?=$product['slug']?>"
										title="<?=$product['product_name']?>" data-wpel-link="internal">
										<div class="woocommerce-loop-product__title">
											<?=$product['product_name']?>
										</div>
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
				<div class="block-sidebar news-list-post">
					<div class="title-sb sidebar-cate-title"><?=$banner['title']?></div>
					<div class="content">
						<a href="<?=$banner['link_url']?>" rel="nofollow external noopener noreferrer"
							target="_blank" data-wpel-link="external">
							<div class="img-wrap">
								<picture>
									<source media="(max-width:768px)" srcset="/storages/banners/<?=$banner['image_url']?>">
									<source media="(max-width:1024px)" srcset="/storages/banners/<?=$banner['image_url']?>">
									<source media="(max-width:1200px)" srcset="/storages/banners/<?=$banner['image_url']?>">
									<img src="/storages/banners/<?=$banner['image_url']?>">
								</picture>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="button-open">
				<i class="fa-solid fa-filter"></i>
			</div>
		</div>
		<?= isset($content) ? $content : '<div class="col-12 col-md-12 col-lg-9"><p>Nội dung đang được cập nhật...</p></div>' ?>
	</div>
</div>