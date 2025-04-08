<div class="mb-2 d-flex justify-content-between">
    <a class="btn btn-primary" href="/admin/bbs/write?category_code=<?= $category_code ?>"> <i
            class="fa-solid fa-plus"></i> Thêm bài viết mới</a>
    <div>
        <button class="btn btn-success" onclick="F1.submit()">Thay đổi thứ tự ưu tiên</button>
    </div>
</div>
<form action="" method="get" class="mb-2 border border-secondary p-2 rounded">
    <input type="hidden" name="category_code" value="<?= $category_code ?>">
    <table class="table">
        <colgroup>
            <col width="200px">
            <col width="*">
        </colgroup>
        <tbody>
            <tr>
                <th>Tiêu đề</th>
                <td>
                    <input type="text" name="title" value="<?= $title ?>" class="form-control">
                </td>
            <tr>
                <th>Sắp sếp theo</th>
                <td>
                    <select name="sort" id="sort" class="form-select w-auto">
                        <option value="">Mới nhất</option>
                        <option value="title-asc" <?= $sort == "title-asc" ? "selected" : "" ?>>Tên A-Z
                        </option>
                        <option value="title-desc" <?= $sort == "title-desc" ? "selected" : "" ?>>Tên Z-A
                        </option>
                        <option value="o_num-desc" <?= $sort == "o_num-desc" ? "selected" : "" ?>>Ưu tiên giảm dần</option>
                    </select>
                </td>
            </tr>
            </tr>
        </tbody>
    </table>
    <button class="btn btn-primary">Tìm kiếm</button>
</form>
<form action="/admin/bbs/change" name="F1" id="F1" target="hiddenIframe" method="post">
    <table class="table w-100">
        <colgroup>
            <col width="5%">
            <col width="*">
            <col width="20%">
            <col width="20%">
            <col width="10%">
            <col width="15%">
        </colgroup>
        <thead>
            <tr>
                <th>ID</th>
                <th>Tiêu đề</th>
                <th>Ảnh</th>
                <th>Trạng thái</th>
                <th>Ưu tiên</th>
                <th>Quản lý</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result['data'] as $key => $bbs): ?>
                <tr>
                    <td>
                        <input type="hidden" name="bbs_id[]" value="<?= $bbs->bbs_id ?>">
                        <?= $result['num']-- ?>
                    </td>
                    <td><?= $bbs->title ?></td>
                    <td>
                        <?php if ($bbs->thumb): ?>
                            <img src="/uploads/bbs/<?= $category_code ?>/<?= $bbs->thumb ?>" alt="" width="100">
                        <?php endif; ?>
                    </td>
                    <td><?= $bbs->status == "Y" ? 'Hiển thị' : 'Ẩn' ?></td>
                    <td>
                        <input type="text" value="<?= $bbs->o_num ?>" name="o_num[]" data-id="<?= $bbs->bbs_id ?>"
                            class="form-control o_num" style="width: 60px">
                    </td>
                    <td>
                    <a class="btn btn-info" href="<?= Uri::create('/bai-viet/' . $bbs->slug) ?>" target="_blank">Xem</a>
                        <a class="btn btn-primary "
                            href="<?= Uri::create('admin/bbs/write/' . $bbs->bbs_id) ?>?category_code=<?= $category_code ?>">Sửa</a>
                        <a class="btn btn-danger " href="javascript:confirmDelete('<?= $bbs->bbs_id ?>')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</form>
<?= renderPagination($result['page'], $result['total_page']) ?>
<script>
    function confirmDelete(id) {
        if (confirm("Xóa bài viết này?")) {
            $.ajax({
                url: '/admin/bbs/delete',
                data: { "ids[]": id },
                type: 'post',
                dataType: "json",
                success: function (response) {
                    location.reload();
                },
                error: function (xhr, status, error) {
                    alert('Xóa bài viết thất bại.');
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