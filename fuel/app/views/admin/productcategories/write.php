<form method="post" enctype="multipart/form-data">
    <div class="d-flex justify-content-end gap-2">
        <a href="/admin/productcategories?parent_id=<?=$category['parent_id']?>" class="btn btn-secondary px-3"><i class="fa-solid fa-list"></i> Về danh sách</a>
        <button class="btn btn-primary px-3"><i class="fa-solid fa-floppy-disk"></i> Lưu</button>
    </div>
    <table class="table mt-3 align-middle">
        <colgroup>
        <col width="200px">
        <col width="*">
    </colgroup>
        <tbody>
            <tr>
                <th>Danh mục cha:</th>
                <td>
                    <select name="parent_id" class="form-select w-auto">
                        <option value="">Chọn danh mục cha (nếu có)</option>
                        <?php foreach ($categories as $category1): ?>
                            <option value="<?= $category1['category_id'] ?>" <?=$category1['category_id'] == $category['parent_id'] ? "selected" : ""?> >
                                <?php for ($i = 1; $i < $category1['level']; $i++): ?>-<?php endfor; ?>
                                <?= $category1['category_name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Tên danh mục:</th>
                <td><input type="text" name="category_name" value="<?=$category['category_name']?>" required class="form-control"></td>
            </tr>
            <?php if($category['category_id']): ?>
                <tr>
                    <th>Slug</th>
                    <td><input type="text" name="slug" value="<?=$category['slug']?>" class="form-control"></td>
                </tr>
            <?php endif; ?>
            <tr>
                <th>Hình ảnh:</th>
                <td>
                    <input type="file" name="category_image" class="form-control">
                    <?php if($category['category_image']): ?>
                        <div class="mt-2">Hình ảnh hiện tại: <br/>
                        <img src="/uploads/categories/<?=$category['category_image']?>" class="img-thumbnail" width="100">
                    </div>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Banner:</th>
                <td>
                    <input type="file" name="category_banner" class="form-control">
                    <?php if($category['category_banner']): ?>
                        <div class="mt-2">Hình ảnh hiện tại: <br/>
                        <img src="/uploads/categories/<?=$category['category_banner']?>" class="img-thumbnail" width="200">
                    </div>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Trạng thái:</th>
                <td>
                    <select name="status" class="form-select w-auto">
                        <option <?=$category['status'] == "Y" ? "selected" : ""?> value="Y">Hiển thị</option>
                        <option <?=$category['status'] == "N" ? "selected" : ""?> value="N">Ẩn</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Mô tả:</th>
                <td>
                    <textarea name="sort_description" id="sort_description"><?=$category['sort_description']?></textarea>
                </td>
            </tr>
        </tbody>
    </table>
</form>
<script>
    $(document).ready(function () {
        ClassicEditor.create(document.querySelector("#sort_description"));
    });
</script>
