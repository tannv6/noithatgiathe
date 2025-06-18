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
							<img src="/storages/bbs/<?=$category_code?>/<?= $bbs['thumb'] ?>" alt="" width="100">
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
		initTinyMCE("#description, #content");
	});
</script>