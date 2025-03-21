<div class="mb-2 d-flex justify-content-between">
    <a class="btn btn-primary" href="/admin/productcategories/write<?= $parent_id ? "?parent_id=$parent_id" : "" ?>"> <i class="fa-solid fa-plus"></i> Thêm danh mục mới</a>
    <a class="btn btn-secondary" href="/admin/productcategories?parent_id=<?=$grand_parent_id?>"><i class="fa-solid fa-list"></i> Về danh sách</a>
</div>
<table class="table w-100">
    <colgroup>
        <col width="5%">
        <col width="*">
        <col width="20%">
        <col width="20%">
        <col width="30%">
    </colgroup>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Hình ảnh</th>
            <th>Trạng thái</th>
            <th>Quản lý</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $key => $category): ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $category->category_name ?></td>
                <td><img src="/uploads/categories/<?= $category->category_image ?>" width="50"></td>
                <td><?= $category->status == "Y" ? 'Hiển thị' : 'Ẩn' ?></td>
                <td>
                    <a class="btn btn-success " href="<?= Uri::create('admin/productcategories?parent_id=' . $category->category_id) ?>">Danh sách con</a>
                    <a class="btn btn-primary " href="<?= Uri::create('admin/productcategories/write/' . $category->category_id) ?>">Sửa</a>
                    <a class="btn btn-danger " href="javascript:confirmDelete(<?=$category->hasChild ? "true" : "false"?>, '<?=$category->category_id?>')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
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