<div class="mb-2 d-flex justify-content-between">
	<a class="btn btn-primary" href="/admin/banner/write?code=<?=$code?>"> <i class="fa-solid fa-plus"></i> Thêm banner mới</a>
</div>
<div class="gallery">
	<table class="table w-100">
		<colgroup>
			<col width="5%">
			<col width="150px">
			<col width="*">
			<col width="20%">
			<col width="10%">
		</colgroup>
		<thead>
			<tr>
				<th>ID</th>
				<th>Ảnh</th>
				<th>Tiêu đề</th>
				<th>Trạng thái</th>
				<th>Quản lý</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($banners as $key => $banner): ?>
				<tr>
					<td><?= $key + 1 ?></td>
					<td>
						<?php if($banner->image_url): ?>
							<a href="javascript:;" data-src="/storages/banners/<?= $banner->image_url ?>" data-fancybox="gallery" data-caption="<?= $banner->title ?> <?= $banner->sub_title ? " - " . $banner->sub_title : "" ?>">
								<img src="/storages/banners/<?= $banner->image_url ?>" alt="" width="100">
							</a>
						<?php endif; ?>
					</td>
					<td>
						<?= $banner->title ?> <?= $banner->sub_title ? " - " . $banner->sub_title : "" ?>
					</td>
					<td><?= $banner->status == "Y" ? 'Hiển thị' : 'Ẩn' ?></td>
					<td>
						<a class="btn btn-primary " href="<?= Uri::create('admin/banner/write/' . $banner->banner_id . '?code=' . $code) ?>">Sửa</a>
						<a class="btn btn-danger " href="javascript:confirmDelete('<?=$banner->banner_id?>')">Xóa</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
<h4>Điều chỉnh tỉ lệ </h4>
<div>
	<div class="d-inline-flex align-items-center gap-2">
		PC
		<input type="text" name="ratio_width" id="ratio_width" value="<?=$config['ratio_width'] ?? ''?>" class="form-control" style="width: 60px;">
		X
		<input type="text" name="ratio_height" id="ratio_height" value="<?=$config['ratio_height'] ?? ''?>" class="form-control" style="width: 60px;">
	</div>
	<div class="d-inline-flex align-items-center gap-2">
		Mobile
		<input type="text" name="mobile_ratio_width" id="mobile_ratio_width" value="<?=$config['mobile_ratio_width'] ?? ''?>" class="form-control" style="width: 60px;">
		X
		<input type="text" name="mobile_ratio_height" id="mobile_ratio_height" value="<?=$config['mobile_ratio_height'] ?? ''?>" class="form-control" style="width: 60px;">
	</div>
	<button class="btn btn-primary" id="update_ratio">Cập nhật</button>
</div>
<script>
	function confirmDelete(id) {
		if(confirm("Xóa banner này?")) {
			$.ajax({
				url: '/admin/banner/delete',
				data: { "ids[]": id },
				type: 'post',
				dataType: "json",
				success: function(response) {
					location.reload();
				},
				error: function(xhr, status, error) {
					alert('Xóa banner thất bại.');
				}
			});
		}
	}
	$(document).ready(function() {
		$("#update_ratio").click(function() {
			$.ajax({
				url: '/admin/banner/updateratio',
				data: {
					"ratio_width": $("#ratio_width").val(),
					"ratio_height": $("#ratio_height").val(),
					"mobile_ratio_width": $("#mobile_ratio_width").val(),
					"mobile_ratio_height": $("#mobile_ratio_height").val(),
					"banner_code": "<?=$code?>"
				},
				type: 'post',
				dataType: "json",
				success: function(response) {
					alert('Cập nhật tỉ lệ thành công');
					location.reload();
				},
				error: function(xhr, status, error) {
					alert('Cập nhật tỉ lệ thất bại');
				}
			});
		});
	});
</script>