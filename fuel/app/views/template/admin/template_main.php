<!DOCTYPE html>
<html lang="vi">
	<?= View::forge('template/admin/head') ?>
	<body>
		<div class="wrapper">
			<?= View::forge('template/admin/header', compact('active_menu')) ?>
			<div class="main" style="background: url('/assets/admin/img/bg.png')">
				<div class="p-2 text-white border d-flex justify-content-between align-items-center" id="navbar">
					<div class="nav_title fs-5">
						<?= isset($title) ? $title : 'Nội thất Gia Thế' ?>
					</div>
					<a href="/admin/logout" class="text-white me-2">
						<i class="fa-solid fa-right-from-bracket"></i>
						<span>Logout</span>
					</a>
				</div>
				<main class="p-3">
					<?= isset($content) ? $content : '<p>Nội dung đang được cập nhật...</p>' ?>
				</main>
			</div>
		</div>
		<?= View::forge('template/admin/footer') ?>
	</body>
</html>