<form method="post" enctype="multipart/form-data">
	<input type="hidden" name="deleted_images" id="deleted_images">
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
				<th>Link:</th>
				<td><input type="text" name="content" value="<?=$popup['content']?>" class="form-control"></td>
			</tr>
			<tr>
				<th>Thời gian hiển thị:</th>
				<td>
					<span>
						<input type="hidden" name="always_show" value="N"/>
						<input type="checkbox" <?=$popup['always_show'] == "Y" ? "checked" : ""?> name="always_show" id="always_show" value="Y">
						<label for="always_show">Luôn hiện</label>
					</span>
					<span class="ms-2">
						<input type="hidden" name="always_hide" value="N"/>
						<input type="checkbox" <?=$popup['always_hide'] == "Y" ? "checked" : ""?> name="always_hide" id="always_hide" value="Y">
						<label for="always_hide">Luôn ẩn</label>
					</span>
					<div id="show_time" style="<?=$popup['always_show'] == "Y" || $popup['always_hide'] == "Y" ? "display: none;" : ""?>">
						<div class="d-flex gap-2 mt-1">
							<span>Hiển thị từ:</span>
							<input name="start_date" value="<?=$popup['start_date']?>" class="datetimepicker form-control form-control-sm w-auto"/>
							<span>đến:</span>
							<input name="end_date" value="<?=$popup['end_date']?>" class="datetimepicker form-control form-control-sm w-auto"/>
						</div>
					</div>
				</td>
			</tr>
			<tr>
				<th>Kích thước:</th>
				<td>
					<div class="d-flex align-items-center gap-1">
						<span>Rộng:</span>
						<input type="text" name="width" value="<?=$popup['width']?>" class="form-control w-auto">
						<span>X Cao:</span>
						<input type="text" name="height" value="<?=$popup['height']?>" class="form-control w-auto">
					</div>
				</td>
			</tr>
			<tr>
				<th>Vị trí:</th>
				<td>
					<div class="d-flex align-items-center gap-1">
						<span>Top:</span>
						<input type="text" name="position_x" value="<?=$popup['position_x']?>" class="form-control w-auto">
						<span>Left:</span>
						<input type="text" name="position_y" value="<?=$popup['position_y']?>" class="form-control w-auto">
					</div>
				</td>
			</tr>
			<tr>
				<th>Loại thiết bị:</th>
				<td>
					<select name="device" class="form-select w-auto">
						<option <?=$popup['device'] == "P" ? "selected" : ""?> value="P">PC</option>
						<option <?=$popup['device'] == "M" ? "selected" : ""?> value="M">Mobile</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>Ảnh:</th>
				<td>
					<div class="gallery mt-2 d-flex flex-wrap gap-2" id="imageGallery">
						<?php foreach ($popup_gallery as $img) : ?>
							<div class="image-card" data-id="<?= $img['id'] ?>">
								<input type="file" id="img_<?= $img['id'] ?>" name="popup_gallery_<?= $img['id'] ?>" class="has-image" hidden accept="image/*">
								<img width="100%" height="100%" src="/storages/popups/<?= $img['image_url'] ?>" alt="Image">
								<div class="buttons">
									<label class="btn-edit" for="img_<?= $img['id'] ?>">Sửa</label>
									<button type="button" class="delete-image" data-id="<?= $img['id'] ?>">Xóa</button>
								</div>
							</div>
						<?php endforeach; ?>
						<div class="image-card">
							<input type="file" id="addImage" name="popup_gallery_<?= time() ?>" hidden accept="image/*">
							<img width="100%" height="100%" alt="Image">
							<div class="buttons">
								<label class="btn-edit" for="addImage">Thêm</label>
								<button style="display: none;" type="button" class="delete-image">Xóa</button>
							</div>
						</div>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</form>
<script>
	$(function() {
		$('.datetimepicker').datetimepicker();
		$("#always_show").change(function(e) {
			if($(e.target).is(":checked")) {
				$("#show_time").hide();
				$("#always_hide").prop("checked", false);
			} else {
				$("#show_time").show();
			}
		})
		$("#always_hide").change(function(e) {
			if($(e.target).is(":checked")) {
				$("#show_time").hide();
				$("#always_show").prop("checked", false);
			} else {
				$("#show_time").show();
			}
		})
		$(document).on('change', '#addImage', function (evt) {
			var file = evt.target.files[0];
			if(!file) return;
			var reader = new FileReader();
			reader.onload = function (e) {
				const newId = Date.now();
				$('#imageGallery').append(`
					<div class="image-card">
						<input type="file" id="addImage" hidden name="product_gallery_${newId}" accept="image/*">
						<img width="100%" height="100%" src="" alt="Image">
						<div class="buttons">
							<label class="btn-edit" for="addImage">Thêm</label>
							<button style="display: none;" type="button" class="delete-image">Xóa</button>
						</div>
					</div>
				`);
				$(evt.target).attr("id", `img_${newId}`).addClass("has-image").siblings(".buttons").find(".delete-image").show();
				$(evt.target).siblings(".buttons").find(".btn-edit").text("Sửa").attr("for", `img_${newId}`);
				$(evt.target).next("img").attr("src", e.target.result);
			};
			reader.readAsDataURL(file);
		});

		$(document).on('change', '.has-image', function (evt) {
			var file = evt.target.files[0];
			if(!file) return;
			var reader = new FileReader();
			reader.onload = function (e) {
				$(evt.target).siblings("img").attr("src", e.target.result);
			};
			reader.readAsDataURL(file);
			if($(evt.target).closest(".image-card").data("id")) {
				const id = $(evt.target).closest(".image-card").data("id");
				const deleted_images = $('#deleted_images').val().split(',').filter(Boolean);
				deleted_images.push(id);
				$('#deleted_images').val(deleted_images.join(','));
				$(evt.target).closest(".image-card").data("id", null).find(".delete-image").data("id", null);
			}
		});

		$(document).on('click', '.delete-image', function () {
			var id = $(this).data('id');
			if (id) {
				const deleted_images = $('#deleted_images').val().split(',').filter(Boolean);
				deleted_images.push(id);
				$('#deleted_images').val(deleted_images.join(','));
			}
			$(this).closest('.image-card').remove();
		});
	});
</script>