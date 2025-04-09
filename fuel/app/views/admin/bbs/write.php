<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="category_code" value="<?=$category_code?>">
	<div class="d-flex justify-content-end gap-2">
		<a href="/bai-viet/<?=$bbs['slug']?>" class="btn btn-info px-3" target="_blank">Xem</a>
		<a href="/admin/bbs?category_code=<?=$category_code?>" class="btn btn-secondary px-3"><i class="fa-solid fa-list"></i> Về danh sách</a>
		<button class="btn btn-primary px-3"><i class="fa-solid fa-floppy-disk"></i> Lưu</button>
	</div>
	<table class="table mt-3 align-middle">
		<colgroup>
		<col width="200px">
		<col width="*">
	</colgroup>
		<tbody>
			<tr>
				<th>Tiêu đề:</th>
				<td><input type="text" name="title" value="<?=$bbs['title']?>" required class="form-control"></td>
			</tr>
			<tr>
				<th>Slug:</th>
				<td><input type="text" name="slug" value="<?=$bbs['slug']?>" class="form-control"></td>
			</tr>
			<tr>
				<th>Ảnh:</th>
				<td>
					<input type="file" name="image" class="form-control">
					<?php if ($bbs['thumb']): ?>
						<div class="mt-2">
							<img src="/uploads/bbs/<?=$category_code?>/<?= $bbs['thumb'] ?>" alt="" width="100">
						</div>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<th>Mô tả:</th>
				<td>
					<textarea name="description" id="description" class="form-control"><?=$bbs['description']?></textarea>
				</td>
			</tr>
			<tr>
				<th>Nội dung:</th>
				<td>
					<textarea name="content" id="content" class="form-control"><?=$bbs['content']?></textarea>
				</td>
			</tr>
			<tr>
				<th>Trạng thái:</th>
				<td>
					<select name="status" class="form-select w-auto">
						<option <?=$bbs['status'] == "Y" ? "selected" : ""?> value="Y">Hiển thị</option>
						<option <?=$bbs['status'] == "N" ? "selected" : ""?> value="N">Ẩn</option>
					</select>
				</td>
			</tr>
		</tbody>
	</table>
</form>
<script>
	$(document).ready(function() {
		tinymce.init({
			selector: "#description, #content",
			content_css: 'https://noithatgiathe.vn/assets/vendor/all.min.css, https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css, https://noithatgiathe.vn/assets/css/component.css',
			plugins: "image code table autoresize fullscreen media",
			toolbar: "undo redo | styles fontsize fontfamily | bold italic underline | alignleft aligncenter alignright | table | image | media | code | fullscreen",
			images_upload_url: "/api/upload/editor",
			automatic_uploads: true,
			elementpath: false,
			menubar: false,
			autoresize_bottom_margin: 20,
			autoresize_min_height: 200,
			font_size_formats: '8px 10px 12px 14px 16px 18px 24px 36px 48px',
			toolbar_sticky: true,
			media_live_embeds: true,
			setup: function(editor) {
				editor.on('init', function() {
					editor.getBody().classList.add('container', 'mt-3');
					$(editor.getDoc()).find("html").css({
						fontSize: '14px'
					});
				});
			}
		});
		$("form").submit(function (e) {
			tinymce.triggerSave();
		})
	});
</script>