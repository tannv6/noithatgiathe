<div class="mb-2 d-flex justify-content-between">
	<a class="btn btn-primary" href="/admin/productcategories/write<?= $parent_id ? "?parent_id=$parent_id" : "" ?>"> <i class="fa-solid fa-plus"></i> Thêm danh mục mới</a>
	<div>
		<a class="btn btn-secondary" href="/admin/productcategories?parent_id=<?=$grand_parent_id?>"><i class="fa-solid fa-list"></i> Về danh sách</a>
		<button class="btn btn-success" onclick="F1.submit()">Thay đổi thứ tự ưu tiên</button>
	</div>
</div>
<form action="/admin/productcategories/change" name="F1" id="F1" target="hiddenIframe" method="post">
<div class="gallery">
	<table class="table w-100">
		<colgroup>
			<col width="5%">
			<col width="*">
			<col width="20%">
			<col width="20%">
			<col width="10%">
			<col width="20%">
		</colgroup>
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên</th>
				<th>Hình ảnh</th>
				<th>Trạng thái</th>
				<th>Thứ tự</th>
				<th>Quản lý</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($categories as $key => $category): ?>
				<tr>
					<td>
						<input type="hidden" name="category_id[]" value="<?= $category->category_id ?>">
						<?= $key + 1 ?>
					</td>
					<td><?= $category->category_name ?></td>
					<td>
						<a href="javascript:;" data-src="/storages/categories/<?= $category->category_image ?>" data-fancybox="gallery" data-caption="<?=$category->category_name?>">
							<img src="/storages/categories/<?= $category->category_image ?>" width="50">
						</a>
					</td>
					<td><?= $category->status == "Y" ? 'Hiển thị' : 'Ẩn' ?></td>
					<td>
						<input type="text" name="o_num[]" value="<?= $category->o_num ?>" class="form-control">
					</td>
					<td>
						<a class="btn btn-success " href="<?= Uri::create('admin/productcategories?parent_id=' . $category->category_id) ?>">Danh mục con</a>
						<a class="btn btn-primary " href="<?= Uri::create('admin/productcategories/write/' . $category->category_id) ?>">Sửa</a>
						<a class="btn btn-danger " href="javascript:confirmDelete(<?=$category->hasChild ? "true" : "false"?>, '<?=$category->category_id?>')">Xóa</a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</div>
</form>
<script>
	function confirmDelete(hasChild, id) {
		if(hasChild) {
			alert("Vui lòng xóa mục con trước!");
			return;
		}
		if(confirm("Xóa danh mục này?")) {
			$.ajax({
				url: '/admin/productcategories/delete',
				data: { "id[]": id },
				type: 'post',
				dataType: "json",
				success: function(response) {
					location.reload();
				},
				error: function(xhr, status, error) {
					alert('Xóa danh mục thất bại.');
				}
			});
		}
	}
</script>
<iframe frameborder="0" id="hiddenIframe" name="hiddenIframe" hidden class="d-none"></iframe>
<?php if ($message = \Session::get_flash('message')): ?>
	<script>
		$(document).ready(function () {
			alert('<?= $message; ?>');
		});
	</script>
<?php endif; ?>