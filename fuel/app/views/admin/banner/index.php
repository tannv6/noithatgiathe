<div class="mb-2 d-flex justify-content-between">
    <a class="btn btn-primary" href="/admin/banner/write?code=<?=$code?>"> <i class="fa-solid fa-plus"></i> Thêm banner mới</a>
</div>
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
                        <img src="/uploads/banners/<?= $banner->image_url ?>" alt="" width="100">
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
</script>