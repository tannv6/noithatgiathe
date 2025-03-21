<style>
    .image-card {
        position: relative;
        width: 150px;
        height: 150px;
        overflow: hidden;
    }
    .image-card img {
        object-fit: cover;
    }
    .buttons {
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 30px;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .btn-edit {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color:rgba(0, 123, 255, 0.52);
        color: #fff;
        cursor: pointer;
        margin: 0;
        height: 100%;
    }
    .delete-image {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        background-color:rgba(220, 53, 70, 0.45);
        color: #fff;
        border: none;
        cursor: pointer;
        padding: 0;
        margin: 0;
        outline: none;
        height: 100%;
    }
    #addImage ~ .buttons {
        height: 100%;
    }
    #addImage ~ .buttons .btn-edit {
        background-color: rgba(0, 123, 255);
    }
</style>
<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="deleted_images" id="deleted_images">
    <div class="d-flex justify-content-end gap-2">
        <a href="/admin/products" class="btn btn-secondary px-3"><i class="fa-solid fa-list"></i> Về danh sách</a>
        <button class="btn btn-primary px-3"><i class="fa-solid fa-floppy-disk"></i> Lưu</button>
    </div>
    <table class="table mt-3 align-middle">
        <colgroup>
        <col width="200px">
        <col width="*">
    </colgroup>
        <tbody>
            <tr>
                <th>Tên sản phẩm:</th>
                <td><input type="text" name="product_name" value="<?=$product['product_name']?>" required class="form-control"></td>
            </tr>
            <?php if($product['product_id']): ?>
                <tr>
                    <th>Slug</th>
                    <td><input type="text" name="slug" value="<?=$product['slug']?>" class="form-control"></td>
                </tr>
            <?php endif; ?>
            <tr>
                <th>Danh mục:</th>
                <td>
                    <select name="category_id" class="form-select w-auto">
                        <option value="">Chọn danh mục</option>
                        <?php foreach ($categories as $category1): ?>
                            <option value="<?= $category1['category_id'] ?>" <?=$category1['level'] == 1 ? "disabled" : ""?> <?=$category1['category_id'] == $product['category_id'] ? "selected" : ""?> >
                                <?php for ($i = 1; $i < $category1['level']; $i++): ?>-<?php endfor; ?>
                                <?= $category1['category_name'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Giá niêm yết:</th>
                <td><input type="text" name="init_price" value="<?=intval($product['init_price'])?>" required class="form-control"></td>
            </tr>
            <tr>
                <th>Giá khuyến mãi:</th>
                <td><input type="text" name="sell_price" value="<?=intval($product['sell_price'])?>" required class="form-control"></td>
            </tr>
            <tr>
                <th>Mô tả sản phẩm:</th>
                <td>
                    <textarea name="description" id="description" class="form-control"><?=$product['description']?></textarea>
                </td>
            </tr>
            <tr>
                <th>Ảnh:</th>
                <td>
                    <input type="file" name="product_image" class="form-control">
                    <?php if ($product['product_image']): ?>
                        <div class="mt-2">
                            <img src="/uploads/products/<?= $product['product_image'] ?>" alt="" width="150">
                        </div>
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <th>Gallery:</th>
                <td>
                    <div class="gallery mt-2 d-flex flex-wrap gap-2" id="imageGallery">
                        <?php foreach ($product_gallery as $img) : ?>
                            <div class="image-card" data-id="<?= $img['gallery_id'] ?>">
                                <input type="file" id="img_<?= $img['gallery_id'] ?>" name="product_gallery_<?= $img['gallery_id'] ?>" class="has-image" hidden accept="image/*">
                                <img width="100%" height="100%" src="/uploads/products/<?= $img['image_path'] ?>" alt="Image">
                                <div class="buttons">
                                    <label class="btn-edit" for="img_<?= $img['gallery_id'] ?>">Sửa</label>
                                    <button type="button" class="delete-image" data-id="<?= $img['gallery_id'] ?>">Xóa</button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <div class="image-card">
                            <input type="file" id="addImage" name="product_gallery_1" hidden accept="image/*">
                            <img width="100%" height="100%" alt="Image">
                            <div class="buttons">
                                <label class="btn-edit" for="addImage">Thêm</label>
                                <button style="display: none;" type="button" class="delete-image">Xóa</button>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <th>Trạng thái:</th>
                <td>
                    <select name="status" class="form-select w-auto">
                        <option <?=$product['status'] == "Y" ? "selected" : ""?> value="Y">Hiển thị</option>
                        <option <?=$product['status'] == "N" ? "selected" : ""?> value="N">Ẩn</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Mục hiển thị:</th>
                <td>
                    <div class="d-flex flex-wrap gap-4">
                        <div class="form-check">
                            <input type="checkbox" name="is_new" id="is_new" value="Y" <?=$product['is_new'] == "Y" ? "checked" : ""?> class="form-check-input">
                            <label role="button" class="user-select-none" for="is_new">Mới về</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="top_seller" id="top_seller" value="Y" <?=$product['top_seller'] == "Y" ? "checked" : ""?> class="form-check-input">
                            <label role="button" class="user-select-none" for="top_seller">Bán chạy</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="is_flash_sale" id="is_flash_sale" value="Y" <?=$product['is_flash_sale'] == "Y" ? "checked" : ""?> class="form-check-input">
                            <label role="button" class="user-select-none" for="is_flash_sale">Flash sale</label>
                        </div>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</form>
<script>
    $(document).ready(function() {
        ClassicEditor.create(document.querySelector("#description"));
        $(document).on('change', '#addImage', function (evt) {
            var file = evt.target.files[0];
            if(!file) return;
            var reader = new FileReader();
            reader.onload = function (e) {
                const newId = Date.now();
                $('#imageGallery').append(`
                    <div class="image-card">
                        <input type="file" id="addImage" hidden name="product_gallery_${newId}" accept="image/*">
                        <img width="100%" height="100%" src="" alt="Image">
                        <div class="buttons">
                            <label class="btn-edit" for="addImage">Thêm</label>
                            <button style="display: none;" type="button" class="delete-image">Xóa</button>
                        </div>
                    </div>
                `);
                $(evt.target).attr("id", `img_${newId}`).addClass("has-image").siblings(".buttons").find(".delete-image").show();
                $(evt.target).siblings(".buttons").find(".btn-edit").text("Sửa").attr("for", `img_${newId}`);
                $(evt.target).next("img").attr("src", e.target.result);
            };
            reader.readAsDataURL(file);
        });

        $(document).on('change', '.has-image', function (evt) {
            var file = evt.target.files[0];
            if(!file) return;
            var reader = new FileReader();
            reader.onload = function (e) {
                $(evt.target).siblings("img").attr("src", e.target.result);
            };
            reader.readAsDataURL(file);
            if($(evt.target).closest(".image-card").data("id")) {
                const id = $(evt.target).closest(".image-card").data("id");
                const deleted_images = $('#deleted_images').val().split(',').filter(Boolean);
                deleted_images.push(id);
                $('#deleted_images').val(deleted_images.join(','));
                $(evt.target).closest(".image-card").data("id", null).find(".delete-image").data("id", null);
            }
        });

        $(document).on('click', '.delete-image', function () {
            var id = $(this).data('id');
            if (id) {
                const deleted_images = $('#deleted_images').val().split(',').filter(Boolean);
                deleted_images.push(id);
                $('#deleted_images').val(deleted_images.join(','));
            }
            $(this).closest('.image-card').remove();
        });
    });
</script>