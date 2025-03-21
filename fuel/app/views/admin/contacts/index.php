<table class="table w-100">
    <colgroup>
        <col width="5%">
        <col width="*">
        <col width="15%">
        <col width="15%">
        <col width="15%">
        <col width="15%">
        <col width="10%">
    </colgroup>
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên khách hàng</th>
            <th>Email</th>
            <th>Sđt</th>
            <th>Ngày đăng ký</th>
            <th>Trạng thái</th>
            <th>Quản lý</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contacts['data'] as $key => $contact): ?>
            <tr>
                <td><?= $contacts['num']-- ?></td>
                <td><?= $contact->full_name ?></td>
                <td><?= $contact->email ?></td>
                <td><?= $contact->phone ?></td>
                <td><?= $contact->created_at ?></td>
                <td>
                    <select name="status" id="status_<?=$contact->id?>" class="form-select w-auto status_sel" data-id="<?=$contact->id?>">
                        <option value="W" <?= $contact->status == 'W' ? 'selected' : '' ?>>Chờ tư vấn</option>
                        <option value="Y" <?= $contact->status == 'Y' ? 'selected' : '' ?>>Đã tư vấn</option>
                    </select>
                </td>
                <td>
                    <a class="btn btn-primary " href="javascript:showDetail('<?=$contact->id?>')">Xem</a>
                    <a class="btn btn-danger " href="javascript:confirmDelete('<?=$contact->id?>')">Xóa</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<?=renderPagination($contacts['page'], $contacts['total_page'])?>
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nội dung liên hệ</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="content"></div>
            </div>
        </div>
    </div>
</div>
<?php if($message = \Session::get_flash('message')): ?>
    <script>
        $(document).ready(function() {
            alert('<?= $message; ?>');
        });
    </script>
<?php endif; ?>
<script>

    function showDetail(id) {
        $.ajax({
            url: '/admin/contacts/detail/' + id,
            type: 'get',
            dataType: "json",
            success: function(response) {
                $('#myModal .content').html(response.message);
                $('#myModal').modal('show');
            },
            error: function(xhr, status, error) {
                alert('Xem liên hệ thất bại.');
            }
        });
    }

    $(document).ready(function() {
        $('.status_sel').change(function() {
            var id = $(this).attr('data-id');
            var status = $(this).val();
            $.ajax({
                url: '/admin/contacts/write/' + id,
                data: { "status": status },
                type: 'post',
                dataType: "json",
                success: function(response) {
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert('Cập nhật liên hệ thất bại.');
                }
            });
        });
    });

    function confirmDelete(id) {
        if(confirm("Xóa liên hệ này?")) {
            $.ajax({
                url: '/admin/contacts/delete',
                data: { "ids[]": id },
                type: 'post',
                dataType: "json",
                success: function(response) {
                    location.reload();
                },
                error: function(xhr, status, error) {
                    alert('Xóa liên hệ thất bại.');
                }
            });
        }
    }
</script>