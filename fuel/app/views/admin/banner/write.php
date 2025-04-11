<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="banner_code" value="<?=$code?>">
	<div class="d-flex justify-content-end gap-2">
		<a href="/admin/banner?code=<?=$code?>" class="btn btn-secondary px-3"><i class="fa-solid fa-list"></i> Về danh sách</a>
		<button class="btn btn-primary px-3"><i class="fa-solid fa-floppy-disk"></i> Lưu</button>
	</div>
	<table class="table mt-3 align-middle">
		<colgroup>
		<col width="200px">
		<col width="*">
	</colgroup>
		<tbody>
			<tr>
				<th>Url:</th>
				<td><input type="text" name="link_url" value="<?=$banner['link_url']?>" class="form-control"></td>
			</tr>
			<tr>
				<th>Tiêu đề:</th>
				<td><input type="text" name="title" value="<?=$banner['title']?>" class="form-control"></td>
			</tr>
			<tr>
				<th>Tiêu đề phụ:</th>
				<td><input type="text" name="sub_title" value="<?=$banner['sub_title']?>" class="form-control"></td>
			</tr>
			<tr>
				<th>Ảnh PC:<br/>(<?=$config['ratio_width'] ?? '0'?>px X <?=$config['ratio_height'] ?? '0'?>px)</th>
				<td>
					<input type="file" name="image" class="form-control">
					<!-- <div class="d-flex mt-1 gap-3">
						<div class="d-flex align-items-center gap-2">
							<label for="ratio" class="text-nowrap">Tỉ lệ</label>
							<input type="text" id="ratio" name="ratio" value="<?=$banner['ratio']?>" class="form-control">
						</div>
					</div> -->
					<?php if ($banner['image_url']): ?>
						<div class="mt-2">
							<img src="/storages/banners/<?= $banner['image_url'] ?>" alt="" width="100">
						</div>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<th>Ảnh Mobile:<br/>(<?=$config['mobile_ratio_width'] ?? '0'?>px X <?=$config['mobile_ratio_height'] ?? '0'?>px)</th>
				<td>
					<input type="file" name="image_mobile" class="form-control">
					<!-- <div class="d-flex mt-1 gap-3">
						<div class="d-flex align-items-center gap-2">
							<label for="ratio_m" class="text-nowrap">Tỉ lệ</label>
							<input type="text" id="ratio_m" name="ratio_m" value="<?=$banner['ratio_m']?>" class="form-control">
						</div>
					</div> -->
					<?php if ($banner['image_url_m']): ?>
						<div class="mt-2">
							<img src="/storages/banners/<?= $banner['image_url_m'] ?>" alt="" width="100">
						</div>
					<?php endif; ?>
				</td>
			</tr>
			<tr>
				<th>Trạng thái:</th>
				<td>
					<select name="status" class="form-select w-auto">
						<option <?=$banner['status'] == "Y" ? "selected" : ""?> value="Y">Hiển thị</option>
						<option <?=$banner['status'] == "N" ? "selected" : ""?> value="N">Ẩn</option>
					</select>
				</td>
			</tr>
		</tbody>
	</table>
</form>