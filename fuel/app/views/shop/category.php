<div class="col-12 col-md-12 col-lg-9">
	<div class="row">
		<?php foreach ($categories as $category): ?>
			<div class="col-6 col-md-3 col-lg-3">
				<div class="card-cate-item"><a href="/danh-muc-san-pham/<?= $category['slug']?>"
						data-wpel-link="internal">
						<div class="cover-image">
							<div class="img-wrap thumbnail-wrapper">
								<img src="/storages/categories/<?=$category['category_image']?>" alt="<?=$category['category_name']?>" />
							</div>
						</div>
					</a>
					<h3 class="title"><a href="/danh-muc-san-pham/<?= $category['slug']?>"
							data-wpel-link="internal"><?=$category['category_name']?></a></h3>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>