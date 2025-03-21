<!DOCTYPE html>
<html lang="vi">
    <?= View::forge('template/user/head') ?>
    <body <?= isset($body_class) ? 'class="' . $body_class . '"' : '' ?> style="overflow-x: hidden;">
        <?= View::forge('template/user/header', [
            'active' => $active
        ]) ?>
        <?= isset($content) ? $content : '<p>Nội dung đang được cập nhật...</p>' ?>
        <?= View::forge('template/user/footer') ?>
    </body>
</html>