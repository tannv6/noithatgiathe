<div class="mb-2 d-flex justify-content-between">
	<a class="btn btn-primary" href="/admin/popup/write"> <i class="fa-solid fa-plus"></i> Thêm popup mới</a>
</div>
<table class="table w-100">
	<colgroup>
		<col width="5%">
		<col width="*">
		<col width="20%">
		<col width="15%">
		<col width="10%">
	</colgroup>
	<thead>
		<tr>
			<th>ID</th>
			<th>Tiêu đề</th>
			<th>Thời gian hiển thị</th>
			<th>Ngày tạo</th>
			<th>Quản lý</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($popups as $key => $popup): ?>
			<tr>
				<td><?= $key + 1 ?></td>
				<td>
					<?= $popup->title ?>
				</td>
				<td><?= $popup->always_hide == "Y" ? 'Luôn ẩn' : ($popup->always_show == "Y" ? 'Luôn hiện' : (date('Y-m-d', strtotime($popup->start_date)) . ' - ' . date('Y-m-d', strtotime($popup->end_date)))) ?>
				</td>
				<td><?= $popup->created_at ?></td>
				<td>
					<a class="btn btn-primary "
						href="<?= Uri::create('admin/popup/write/' . $popup->id) ?>">Sửa</a>
					<a class="btn btn-danger " href="javascript:confirmDelete('<?= $popup->id ?>')">Xóa</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<script>
	function confirmDelete(id) {
		if (confirm("Xóa popup này?")) {
			$.ajax({
				url: '/admin/popup/delete',
				data: { "ids[]": id },
				type: 'post',
				dataType: "json",
				success: function (response) {
					location.reload();
				},
				error: function (xhr, status, error) {
					alert('Xóa popup thất bại.');
				}
			});
		}
	}
</script>