<!DOCTYPE html>
<html lang="vi">
	<?= View::forge('template/user/head', [
		'title' => $title,
		'description' => $description,
		'og_image' => $og_image,
		'og_url' => $og_url
	]) ?>
	<body <?= isset($body_class) ? 'class="' . $body_class . '"' : '' ?> style="overflow-x: hidden;">
		<?= View::forge('template/user/header', [
			'active' => $active,
			'category_id' => $category_id
		]) ?>
		<?= isset($content) ? $content : '<p>Nội dung đang được cập nhật...</p>' ?>
		<?= View::forge('template/user/footer') ?>
	</body>
</html>