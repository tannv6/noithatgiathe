<main class="archive-news-layout single-layout">
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
		<div class="row">
			<div class="col-12 col-md-6 col-lg-3 sidebar">
				<div class="column-sidebar">
					<div class="block-sidebar">
						<div class="title-sb sidebar-cate-title">
							Chuyên mục
						</div>
						<div class="content">
							<div class="menu-menu-chuyen-muc-container">
								<ul id="menu-cate-sidebar" class="menu-class">
									<li id="menu-item-82500"
										class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-82500">
										<a rel="nofollow" href="/danh-muc-bai-viet/tin-tuc"
											data-wpel-link="internal">Tin tức</a></li>
									<li id="menu-item-82501"
										class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-82501">
										<a rel="nofollow" href="/danh-muc-bai-viet/kinh-nghiem"
											data-wpel-link="internal">Kinh nghiệm</a></li>
									<li id="menu-item-82502"
										class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-82502">
										<a rel="nofollow" href="/danh-muc-bai-viet/thiet-ke"
											data-wpel-link="internal">Thiết kế</a></li>
									<li id="menu-item-82503"
										class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-82503">
										<a rel="nofollow" href="/danh-muc-bai-viet/phong-thuy"
											data-wpel-link="internal">Phong thủy</a></li>
									<li id="menu-item-82504"
										class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-82504">
										<a rel="nofollow" href="/danh-muc-bai-viet/khuyen-mai"
											data-wpel-link="internal">Khuyến mại</a></li>
									<li id="menu-item-82505"
										class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-82505">
										<a rel="nofollow" href="/danh-muc-bai-viet/noi-bo"
											data-wpel-link="internal">Nội bộ</a></li>
									<li id="menu-item-82506"
										class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-82506">
										<a rel="nofollow" href="/danh-muc-bai-viet/tuyen-dung"
											data-wpel-link="internal">Tuyển dụng</a></li>
									<li id="menu-item-82507"
										class="menu-item menu-item-type-taxonomy menu-item-object-category current-menu-item menu-item-82507">
										<a rel="nofollow" href="/danh-muc-bai-viet/video"
											aria-current="page" data-wpel-link="internal">Video</a></li>
									<li id="menu-item-82509"
										class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-82509">
										<a rel="nofollow" href="/danh-muc-bai-viet/noi-that"
											data-wpel-link="internal">Nội thất</a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="block-sidebar news-list-post">
						<div class="title-sb sidebar-cate-title">
							Tin tức đọc nhiều
						</div>
						<div class="list-new-sb">
							<?php foreach ($most_view as $key => $post): ?>
							<div class="card-post small">
								<div class="card-wrap">
									<a rel="nofollow" href="/bai-viet/<?=$post['slug']?>"
										class="img-wrap" data-wpel-link="internal">
										<img src="/uploads/bbs/<?=$post['category_code']?>/<?=$post['thumb']?>"
											alt="" class="thumbnail"
											data-lazy-src="/uploads/bbs/<?=$post['category_code']?>/<?=$post['thumb']?>"><noscript><img
												src="/uploads/bbs/<?=$post['category_code']?>/<?=$post['thumb']?>"
												alt="" class="thumbnail"></noscript>
									</a>
									<div class="card-info">
										<a rel="nofollow"
											href="/bai-viet/<?=$post['slug']?>"
											data-wpel-link="internal">
											<div class="title-post"><?=$post['title']?></div>
										</a>
									</div>
								</div>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-12 col-md-12 col-lg-9">
				<?= $view ?: ""; ?>
			</div>
		</div>
	</div>
</main>