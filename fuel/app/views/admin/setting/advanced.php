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
		initTinyMCE("#shipping_and_installation, #construction_process");
	});
</script>