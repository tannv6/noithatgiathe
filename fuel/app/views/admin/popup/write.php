<form method="post" enctype="multipart/form-data">
	<div class="d-flex justify-content-end gap-2">
		<a href="/admin/popup" class="btn btn-secondary px-3"><i class="fa-solid fa-list"></i> Về danh sách</a>
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
				<td><input type="text" name="title" value="<?=$popup['title']?>" class="form-control"></td>
			</tr>
			<tr>
				<th>Ảnh:</th>
				<td>
					<input type="file" name="image" class="form-control">
					<?php if ($popup['image_url']): ?>
						<div class="mt-2">
							<img src="/uploads/popups/<?= $popup['image_url'] ?>" alt="" width="100">
						</div>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<th>Trạng thái:</th>
				<td>
					<select name="status" class="form-select w-auto">
						<option <?=$popup['status'] == "Y" ? "selected" : ""?> value="Y">Hiển thị</option>
						<option <?=$popup['status'] == "N" ? "selected" : ""?> value="N">Ẩn</option>
					</select>
				</td>
			</tr>
		</tbody>
	</table>
</form>