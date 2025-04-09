<table class="table w-100">
	<colgroup>
		<col width="5%">
		<col width="*">
		<col width="15%">
		<col width="15%">
		<col width="15%">
		<col width="10%">
	</colgroup>
	<thead>
		<tr>
			<th>ID</th>
			<th>Tên khách hàng</th>
			<th>Email</th>
			<th>Ngày đăng ký</th>
			<th>Trạng thái</th>
			<th>Quản lý</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($comments as $key => $comment): ?>
			<tr>
				<td><?= $key + 1 ?></td>
				<td><?= $comment->author ?></td>
				<td><?= $comment->email ?></td>
				<td><?= $comment->created_at ?></td>
				<td>
					<select name="status" id="status_<?=$comment->cmt_id?>" class="form-select w-auto status_sel" data-id="<?=$comment->cmt_id?>">
						<option value="W" <?= $comment->status == 'W' ? 'selected' : '' ?>>Chờ duyệt</option>
						<option value="Y" <?= $comment->status == 'Y' ? 'selected' : '' ?>>Đã duyệt</option>
					</select>
				</td>
				<td>
					<a class="btn btn-primary " href="javascript:showDetail('<?=$comment->cmt_id?>')">Xem</a>
					<a class="btn btn-danger " href="javascript:confirmDelete('<?=$comment->cmt_id?>')">Xóa</a>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Nội dung bình luận</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<div class="content"></div>
			</div>
		</div>
	</div>
</div>
<?php if($message = \Session::get_flash('message')): ?>
	<script>
		$(document).ready(function() {
			alert('<?= $message; ?>');
		});
	</script>
<?php endif; ?>
<script>

	function showDetail(id) {
		$.ajax({
			url: '/admin/comment/detail/' + id,
			type: 'get',
			dataType: "json",
			success: function(response) {
				$('#myModal .content').html(response.content);
				$('#myModal').modal('show');
			},
			error: function(xhr, status, error) {
				alert('Xem bình luận thất bại.');
			}
		});
	}

	$(document).ready(function() {
		$('.status_sel').change(function() {
			var id = $(this).attr('data-id');
			var status = $(this).val();
			$.ajax({
				url: '/admin/comment/write/' + id,
				data: { "status": status },
				type: 'post',
				dataType: "json",
				success: function(response) {
					location.reload();
				},
				error: function(xhr, status, error) {
					alert('Cập nhật bình luận thất bại.');
				}
			});
		});
	});

	function confirmDelete(id) {
		if(confirm("Xóa bình luận này?")) {
			$.ajax({
				url: '/admin/comment/delete',
				data: { "ids[]": id },
				type: 'post',
				dataType: "json",
				success: function(response) {
					location.reload();
				},
				error: function(xhr, status, error) {
					alert('Xóa bình luận thất bại.');
				}
			});
		}
	}
</script>