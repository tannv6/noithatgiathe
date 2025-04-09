<h1>
	<div class="title-thc"><?= $title ?></div>
</h1>
<div class="row list-main-post">
	<?php foreach($posts as $post): ?>
		<div class="col-12 col-md-12 col-lg-12">
			<div class="card-post">
				<div class="card-wrap">
					<div class="wrapper-thumb">
						<a href="/bai-viet/<?= $post['slug']?>"
							class="img-wrap thumbnail-wrapper" rel="" data-wpel-link="internal">
							<img decoding="async" class="img" src="/uploads/bbs/<?= $post['category_code'] ?>/<?= $post['thumb']?>" alt="">
						</a>
					</div>
					<div class="card-info">
						<a href="/bai-viet/<?= $post['slug']?>" rel="" data-wpel-link="internal">
							<h3>
								<div class="title-post"><?= $post->title ?></div>
							</h3>
						</a>
						<div class="desc"><?= strip_tags($post->description) ?></div>
					</div>
					<div class="view-more">
						<a href="/bai-viet/<?= $post['slug']?>" rel="" data-wpel-link="internal">
							Xem chi tiết <i class="fa-solid fa-angles-right"></i>
						</a>
					</div>

				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
<div class="row">
	<?=ipagelisting($page,$total_page,$url)?>
</div>