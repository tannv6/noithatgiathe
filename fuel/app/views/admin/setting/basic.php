<form action="" method="post" enctype="multipart/form-data" target="hidden_iframe">
	<div class="d-flex justify-content-end mb-3">
		<button type="submit" class="btn btn-primary">Lưu lại</button>
	</div>
	<div class="row g-3">
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Tên công ty</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="company_name" class="form-control" value="<?= $setting['company_name']; ?>">
				</div>
				<span>COMPANY_NAME</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Tên chủ công ty</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="company_owner" class="form-control" value="<?= $setting['company_owner']; ?>">
				</div>
				<span>COMPANY_OWNER</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Avatar chủ công ty</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="file" name="owner_avatar" class="form-control">
				</div>
				<span>OWNER_AVATAR</span>
			</div>
			<?php if($setting['owner_avatar']): ?>
				<img src="/uploads/settings/<?= $setting['owner_avatar']; ?>" alt="" width="100">
			<?php endif; ?>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Link bài viết về chủ công ty</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="owner_article_link" class="form-control" value="<?= $setting['owner_article_link']; ?>">
				</div>
				<span>OWNER_ARTICLE_LINK</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Tên trang web</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="title" class="form-control" value="<?= $setting['title']; ?>">
				</div>
				<span>TITLE</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Mô tả trang web</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="description" class="form-control" value="<?= $setting['description']; ?>">
				</div>
				<span>DESCRIPTION</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Keywords</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="keywords" class="form-control" value="<?= $setting['keywords']; ?>">
				</div>
				<span>KEYWORDS</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Favicon</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="file" name="favicon" class="form-control">
				</div>
				<span>FAVICON</span>
			</div>
			<?php if($setting['favicon']): ?>
				<img src="/uploads/settings/<?= $setting['favicon']; ?>" alt="" width="100">
			<?php endif; ?>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Logo</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="file" name="logo_header" class="form-control">
				</div>
				<span>LOGO_HEADER</span>
			</div>
			<?php if($setting['logo_header']): ?>
				<img src="/uploads/settings/<?= $setting['logo_header']; ?>" alt="" width="100">
			<?php endif; ?>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Logo trắng</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="file" name="logo_header_reverse" class="form-control">
				</div>
				<span>LOGO_HEADER_REVERSE</span>
			</div>
			<?php if($setting['logo_header_reverse']): ?>
				<img src="/uploads/settings/<?= $setting['logo_header_reverse']; ?>" class="shadow bg-secondary" alt="" width="100">
			<?php endif; ?>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">og_title</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="og_title" class="form-control" value="<?= $setting['og_title']; ?>">
				</div>
				<span>OG_TITLE</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">og_description</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="og_description" class="form-control" value="<?= $setting['og_description']; ?>">
				</div>
				<span>OG_DESCRIPTION</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">og_image</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="file" name="og_image" class="form-control">
				</div>
				<span>OG_IMAGE</span>
			</div>
			<?php if($setting['og_image']): ?>
				<img src="/uploads/settings/<?= $setting['og_image']; ?>" alt="" width="100">
			<?php endif; ?>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">og_url</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="og_url" class="form-control" value="<?= $setting['og_url']; ?>">
				</div>
				<span>OG_URL</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">og_type</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="og_type" class="form-control" value="<?= $setting['og_type']; ?>">
				</div>
				<span>OG_TYPE</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Số chăm sóc khách hàng</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="number" name="customer_care_phone" class="form-control" value="<?= $setting['customer_care_phone']; ?>">
				</div>
				<span>CUSTOMER_CARE_PHONE</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Hotline</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="hotline" class="form-control" value="<?= $setting['hotline']; ?>">
				</div>
				<span>HOTLINE</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Email chăm sóc khách hàng</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="email" name="customer_care_email" class="form-control" value="<?= $setting['customer_care_email']; ?>">
				</div>
				<span>CUSTOMER_CARE_EMAIL</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Email của chủ công ty</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="email" name="director_email" class="form-control" value="<?= $setting['director_email']; ?>">
				</div>
				<span>DIRECTOR_EMAIL</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Email admin</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="email" name="admin_email" class="form-control" value="<?= $setting['admin_email']; ?>">
				</div>
				<span>ADMIN_EMAIL</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Giới thiệu công ty</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="introduction" class="form-control" value="<?= $setting['introduction']; ?>">
				</div>
				<span>INTRODUCTION</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Link hướng dẫn mua hàng</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="buying_guide" class="form-control" value="<?= $setting['buying_guide']; ?>">
				</div>
				<span>BUYING_GUIDE</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Link chính sách bảo hành sản phẩm</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="warranty_policy_link" class="form-control" value="<?= $setting['warranty_policy_link']; ?>">
				</div>
				<span>WARRANTY_POLICY_LINK</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Link chính sách giao hàng</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="shipping_policy_link" class="form-control" value="<?= $setting['shipping_policy_link']; ?>">
				</div>
				<span>SHIPPING_POLICY_LINK</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Link chính sách đổi trả, hoàn tiền</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="return_policy_link" class="form-control" value="<?= $setting['return_policy_link']; ?>">
				</div>
				<span>RETURN_POLICY_LINK</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Link chính sách bảo mật thông tin cá nhân</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="privacy_policy_link" class="form-control" value="<?= $setting['privacy_policy_link']; ?>">
				</div>
				<span>PRIVACY_POLICY_LINK</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Link hướng dẫn lắp đặt </p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="installation_instructions" class="form-control" value="<?= $setting['installation_instructions']; ?>">
				</div>
				<span>INSTALLATION_INSTRUCTIONS</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Link Zalo</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="zalo_link" class="form-control" value="<?= $setting['zalo_link']; ?>">
				</div>
				<span>ZALO_LINK</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Link Facebook</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="facebook_link" class="form-control" value="<?= $setting['facebook_link']; ?>">
				</div>
				<span>FACEBOOK_LINK</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Link Messenger</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="messenger_link" class="form-control" value="<?= $setting['messenger_link']; ?>">
				</div>
				<span>MESSENGER_LINK</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Link Youtube</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="youtube_link" class="form-control" value="<?= $setting['youtube_link']; ?>">
				</div>
				<span>YOUTUBE_LINK</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Link Tiktok</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="tiktok_link" class="form-control" value="<?= $setting['tiktok_link']; ?>">
				</div>
				<span>TIKTOK_LINK</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Link Twitter</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="twitter_link" class="form-control" value="<?= $setting['twitter_link']; ?>">
				</div>
				<span>TWITTER_LINK</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Link LinkedIn</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="linkedin_link" class="form-control" value="<?= $setting['linkedin_link']; ?>">
				</div>
				<span>LINKEDIN_LINK</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Link Pinterest</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="pinterest_link" class="form-control" value="<?= $setting['pinterest_link']; ?>">
				</div>
				<span>PINTEREST_LINK</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Địa chỉ showroom</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="showroom_address" class="form-control" value="<?= $setting['showroom_address']; ?>">
				</div>
				<span>SHOWROOM_ADDRESS</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Link Google Map</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="googlemap_link" class="form-control" value="<?= $setting['googlemap_link']; ?>">
				</div>
				<span>GOOGLEMAP_LINK</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Link Google Map Embed</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="googlemap_embed_link" class="form-control" value="<?= $setting['googlemap_embed_link']; ?>">
				</div>
				<span>GOOGLEMAP_EMBED_LINK</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Địa chỉ kho</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="warehouse_address" class="form-control" value="<?= $setting['warehouse_address']; ?>">
				</div>
				<span>WAREHOUSE_ADDRESS</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Link Google Map Kho</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="warehouse_googlemap_link" class="form-control" value="<?= $setting['warehouse_googlemap_link']; ?>">
				</div>
				<span>WAREHOUSE_GOOGLEMAP_LINK</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Địa chỉ xưởng</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="factory_address" class="form-control" value="<?= $setting['factory_address']; ?>">
				</div>
				<span>FACTORY_ADDRESS</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Link Google Map Xưởng</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<input type="text" name="factory_googlemap_link" class="form-control" value="<?= $setting['factory_googlemap_link']; ?>">
				</div>
				<span>FACTORY_GOOGLEMAP_LINK</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Tiêu đề trang chủ</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<textarea type="text" name="main_intro" class="form-control"><?= $setting['main_intro']; ?></textarea>
				</div>
				<span>MAIN_INTRO</span>
			</div>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Tiêu đề 2 trang chủ</p>
		</div>
		<div class="col-10">
			<div class="d-flex gap-3 align-items-center">
				<div class="flex-fill">
					<textarea type="text" name="main_sub_intro" class="form-control"><?= $setting['main_sub_intro']; ?></textarea>
				</div>
				<span>MAIN_SUB_INTRO</span>
			</div>
		</div>
	</div>
	<div class="d-flex justify-content-end mt-3">
		<button type="submit" class="btn btn-primary">Lưu lại</button>
	</div>
</form>
<?php if($message = \Session::get_flash('message')): ?>
	<script>
		$(document).ready(function() {
			alert('<?= $message; ?>');
		});
	</script>
<?php endif; ?>

<iframe id="hidden_iframe" name="hidden_iframe" class="d-none"></iframe>