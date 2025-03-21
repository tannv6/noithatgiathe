<div class="mb-2 d-flex justify-content-between">
    <a class="btn btn-primary" href="/admin/products/write"> <i class="fa-solid fa-plus"></i> Thêm sản phẩm mới</a>
</div>
<table class="table w-100">
    <colgroup>
        <col width="5%">
        <col width="120px">
        <col width="30%">
        <col width="20%">
        <col width="20%">
        <col width="10%">
    </colgroup>
    <thead>
        <tr>
            <th>ID</th>
            <th>Ảnh</th>
            <th>Tên sản phẩm</th>
            <th>Giá bán</th>
            <th>Trạng thái</th>
            <th>Quản lý</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products['data'] as $product): ?>
            <tr>
                <td><?= $products['num']-- ?></td>
                <td>
                    <?php if($product->product_image): ?>
                        <img src="/uploads/products/<?= $product->product_image ?>" alt="" width="100">
                    <?php endif; ?>
                </td>
                <td><?=$product->product_name?></td>
                <td><?=number_format($product->sell_price, 0, ',', '.')?>đ</td>
                <td><?= $product->status == "Y" ? 'Hiển thị' : 'Ẩn' ?></td>
                <td>
                    <a class="btn btn-primary " href="<?= Uri::create('admin/products/write/' . $product->product_id) ?>">Sửa</a>
                    <a class="btn btn-danger " href="javascript:confirmDelete('<?=$product->product_id?>')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?=renderPagination($products['page'], $products['total_page'])?>
<script>
    function confirmDelete(id) {
        if(confirm("Xóa sản phẩm này?")) {
            $.ajax({
                url: '/admin/products/delete',
                data: { "ids[]": id },
                type: 'post',
                dataType: "json",
                success: function(response) {
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert('Xóa sản phẩm thất bại.');
                }
            });
        }
    }
</script>