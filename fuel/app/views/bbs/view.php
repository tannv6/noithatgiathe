<div class="content-wrap">
	<div class="header-wrapper">
		<div class="info">
			<h1 class="title-thc"><?= $bbs->title ?></h1>
		</div>
	</div>

	<div class="entry-content content-entry">
		<div id="ftwp-postcontent">
			<?= html_entity_decode($bbs->description) ?>
			<?= html_entity_decode($bbs->content) ?>
			<div class="kk-star-ratings kksr-auto kksr-align-left kksr-valign-bottom">
				<div class="kksr-stars">
					<!-- Inactive Stars -->
					<div class="kksr-stars-inactive">
						<?php for ($i = 1; $i <= 5; $i++): ?>
							<div class="kksr-star" data-star="<?= $i ?>" style="padding-right: 5px">
								<div class="kksr-icon" style="width: 18px; height: 18px"></div>
							</div>
						<?php endfor; ?>
					</div>
					<!-- Active Stars -->
					<div class="kksr-stars-active">
						<?php for ($i = 1; $i <= 5; $i++): ?>
							<div class="kksr-star" style="padding-right: 5px; <?= $i > $star ? 'visibility: hidden;' : '' ?>">
								<div class="kksr-icon" style="width: 18px; height: 18px"></div>
							</div>
						<?php endfor; ?>
					</div>
				</div>
				<div class="kksr-legend" style="font-size: 14.4px">
					<?=$star?>/5 - (<?=$cmt_count?> bình chọn)
				</div>
			</div>
		</div>
		<div class="author-box-wrap" itemtype="http://schema.org/Person" itemscope="" itemprop="author">
			<div class="author-box-tab">
				<div class="author-box-gravatar">
					<img src="/storages/settings/<?= OWNER_AVATAR ?>" width="100" height="100"
						alt="" itemprop="image" />
				</div>
				<div class="author-box-authorname">
					<a href="https://noithatgiathe.vn/nguyen-dinh-tuan/" class="vcard author" rel="author"
						itemprop="url" data-wpel-link="internal">
						<span class="fn" itemprop="name"><?= COMPANY_OWNER ?></span>
					</a>
				</div>
				<div class="author-box-desc">
					<div itemprop="description">
						<p>
							Tôi và các cộng sự đã kết hợp lại với nhau thành lập
							Nội Thất Gia Thế với tiêu chí cung cấp trọn gói đầy
							đủ cho khách hàng các sản phẩm từ Nội thất văn phòng
							đến Nội thất gia đình, trường học.
						</p>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="author-box-socials">
					<a target="_self" href="#" rel="nofollow noopener" class="author-box-icon-grey">
						<i class="fa-classic fa-brands fa-square-facebook" aria-hidden="true"></i>
					</a>
					<a target="_self" href="#" rel="nofollow noopener" class="author-box-icon-grey">
						<i class="fa-classic fa-brands fa-google-plus" aria-hidden="true"></i>
					</a>
					<a target="_self" href="#" rel="nofollow noopener" class="author-box-icon-grey">
						<i class="fa-classic fa-brands fa-square-twitter" aria-hidden="true"></i>
					</a>
					<a target="_self" href="#" rel="nofollow noopener" class="author-box-icon-grey">
						<i class="fa-classic fa-brands fa-linkedin" aria-hidden="true"></i>
					</a>
				</div>
			</div>
		</div>
		<section class="section-social">
			<div class="l-container">
				<div class="share-social">
					<div class="text">Chia sẻ:</div>
					<div class="box-ic">
						<ul>
							<li>
								<a class="ic-facebook" rel="nofollow"
									href="javascript:fbShare(&#039;https%3A%2F%2Fnoithatgiathe.vn%2Fban-chan-sat-1m8%2F&#039;, &#039;FbShare&#039;, &#039;Facebook share popup&#039;, &#039;http://goo.gl/dS52U&#039;, 520, 350)"
									data-wpel-link="internal"><i class="fab fa-facebook-f"></i><span>
										Facebook</span></a>
							</li>
							<li>
								<a class="ic-email" rel="nofollow"
									href="javascript:email(&#039;https%3A%2F%2Fnoithatgiathe.vn%2Fban-chan-sat-1m8%2F&#039;, &#039;Bàn Chân Sắt 1m8 | 9 Mẫu UPDATE mới 2025 Hiện đại, Mới Mẻ Cho Văn Phòng&#039;, &#039;admin&#039;, &#039;&#039;, 520, 350)"
									data-wpel-link="internal"><i class="fas fa-envelope"></i><span> Email</span></a>
							</li>
							<li>
								<a rel="nofollow" class="ic-pinterest"
									href="javascript:pinterestShare(&#039;https%3A%2F%2Fnoithatgiathe.vn%2Fban-chan-sat-1m8%2F&#039;,&#039;Bàn Chân Sắt 1m8 | 9 Mẫu UPDATE mới 2025 Hiện đại, Mới Mẻ Cho Văn Phòng&#039;, &#039;https%3A%2F%2Fnoithatgiathe.vn%2Fwp-content%2Fuploads%2F2021%2F08%2Fban-chan-sat-1m8-02-min.png&#039;, &#039;&#039;, 520, 350)"
									data-wpel-link="internal"><i class="fab fa-pinterest-p"></i><span>
										Pinterest</span></a>
							</li>
							<li>
								<a rel="nofollow" class="ic-twitter"
									href="javascript:twitterShare(&#039;https%3A%2F%2Fnoithatgiathe.vn%2Fban-chan-sat-1m8%2F&#039;,&#039;Bàn Chân Sắt 1m8 | 9 Mẫu UPDATE mới 2025 Hiện đại, Mới Mẻ Cho Văn Phòng&#039;, &#039;admin&#039;, &#039;&#039;, 520, 350)"
									data-wpel-link="internal"><i class="fab fa-twitter"></i><span> Twitter</span></a>
							</li>
							<li>
								<a rel="nofollow" class="ic-linkedin"
									href="javascript:linkedinShare(&#039;https%3A%2F%2Fnoithatgiathe.vn%2Fban-chan-sat-1m8%2F&#039;, &#039;Bàn Chân Sắt 1m8 | 9 Mẫu UPDATE mới 2025 Hiện đại, Mới Mẻ Cho Văn Phòng&#039;, &#039;admin&#039;, &#039;&#039;, 520, 350)"
									data-wpel-link="internal"><i class="fab fa-linkedin-in"></i><span>
										Linkedin</span></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</section>
	</div>
	<div id="cm-thc" class="thc-comment">
		<div id="comments" class="comments-area">
			<p class="comments-title uppercase">
				<?=count($comments)?> comment cho bài viết “<span><?=$bbs->title?></span>”
			</p>
			<ol class="comment-list">
				<?php foreach ($comments as $key => $comment) { ?>
				<li class="comment even thread-even depth-1" id="li-comment-<?=$comment['cmt_id']?>">
					<article id="comment-<?=$comment['cmt_id']?>" class="comment-inner">
						<div class="d-flex align-top">
							<div class="d-flex">
								<div class="comment-author mr-half pr-3">
									<img src="" height="70" width="70" alt="">
								</div>
							</div>
							<div class="flex-col flex-grow">
								<!-- <span class="strong author-comment fn"><a href="http://abc.com" class="url"
										rel="nofollow" data-wpel-link="external">1</a> /
									<span class="cm-date">Ngày <?=date("d/m/Y", strtotime($comment['created_at']))?>,</span>
									<span class="cm-time"><?=date("H:i", strtotime($comment['created_at']))?></span>
								</span>
								<em>Câu hỏi của bạng đang được chuyển đến quản trị viên</em>
								<br> -->
								<div class="comment-content">
									<p><?=nl2br($comment['content'])?></p>
								</div>
								<div class="comment-meta commentmetadata uppercase is-xsmall clear">
									<a href="#!"
										data-wpel-link="internal">
										<time datetime="<?=$comment['created_at']?>" class="pull-left">
										<?=date("d/m/Y", strtotime($comment['created_at']))?> lúc <?=date("H:i", strtotime($comment['created_at']))?> </time>
									</a>
									<span class="edit-link ml-half strong"></span>
								</div>
							</div>
						</div>
					</article>
				</li>
				<?php } ?>
			</ol>
			<div id="respond" class="comment-respond">
				<span id="reply-title" class="h4 comment-reply-title">Để lại một bình luận
					<small><a rel="nofollow" id="cancel-comment-reply-link" href="/ban-chan-sat-1m8/#respond"
							style="display: none" data-wpel-link="internal">Hủy</a></small></span>
				<form action="/comment/write" method="post" id="commentform" class="comment-form" novalidate target="hiddenIframe">
					<input type="hidden" name="bbs_id" value="<?=$bbs->bbs_id?>">
					<p class="comment-notes">
						<span id="email-notes">Email của bạn sẽ không được hiển thị công khai.</span>
						<span class="required-field-message">Các trường bắt buộc được đánh dấu
							<span class="required">*</span></span>
					</p>
					<p class="comment-form-comment">
						<label for="content">Bình luận <span class="required">*</span></label>
						<textarea id="content" name="content" cols="45" rows="8" maxlength="65525" required></textarea>
					</p>
					<p class="comment-form-author">
						<label for="author">Tên</label>
						<input id="author" name="author" type="text" value="<?=$comment_author?>" size="30" maxlength="245" autocomplete="name" />
					</p>
					<p class="comment-form-email">
						<label for="email">Email</label>
						<input id="email" name="email" type="email" value="<?=$comment_email?>" size="30" maxlength="100" aria-describedby="email-notes" autocomplete="email" />
					</p>
					<p class="comment-form-cookies-consent">
						<input id="save_info" name="save_info" type="checkbox" value="yes" <?=$comment_remember ? "checked" : ""?> />
						<label for="save_info">Lưu tên của tôi và email trong trình duyệt này cho lần bình luận kế tiếp của tôi.</label>
					</p>
					<p class="form-submit">
						<input name="submit" type="submit" id="submit" class="submit" value="Gửi bình luận" />
						<input type="hidden" name="parent_id" id="parent_id" value="0" />
					</p>
				</form>
			</div>
		</div>
	</div>
</div>
<iframe src="/comment/write" frameborder="0" id="hiddenIframe" name="hiddenIframe" hidden class="d-none"></iframe>