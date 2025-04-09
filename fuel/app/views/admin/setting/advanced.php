<form action="" method="post" enctype="multipart/form-data">

	<div class="d-flex justify-content-end mb-3">
		<button type="submit" class="btn btn-primary">Lưu lại</button>
	</div>
	<div class="row g-3">
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Vận chuyển và lắp đặt</p>
		</div>
		<div class="col-10">
			<p>SHIPPING_AND_INSTALLATION</p>
			<textarea name="shipping_and_installation" id="shipping_and_installation"><?= $setting['shipping_and_installation']; ?></textarea>
		</div>
		<div class="col-2">
			<p class="fw-bold h-100 border-bottom m-0">Quy trình thi công</p>
		</div>
		<div class="col-10">
			<p>CONSTRUCTION_PROCESS</p>
			<textarea name="construction_process" id="construction_process"><?= $setting['construction_process']; ?></textarea>
		</div>
	</div>
	<div class="d-flex justify-content-end mt-3">
		<button type="submit" class="btn btn-primary">Lưu lại</button>
	</div>
</form>
<script>
	$(document).ready(function() {
		tinymce.init({
			selector: "#shipping_and_installation, #construction_process",
			content_css: 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css',
			plugins: "image code table autoresize",
			toolbar: "undo redo | styles fontsize fontfamily | bold italic underline | alignleft aligncenter alignright | table | image | code",
			images_upload_url: "/api/upload/editor",
			automatic_uploads: true,
			elementpath: false,
			menubar: false,
			autoresize_bottom_margin: 20,
			autoresize_min_height: 200,
			font_size_formats: '8px 10px 12px 14px 16px 18px 24px 36px 48px',
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