<?php
require '../init.php';
require '../controller/admin_user.php';
    head('user'); 

?>

<div class="container py-4 card card-body">
    <table class="table table-stripped bg-white text-middle" id="users_table">
        <thead>
            <tr>
                <th>ชื่อ</th>
                <th>เบอร์</th>
                <th>แต้ม</th>
                <th>สถานะ</th>
                <th>เปลี่ยนสถานะ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rows as $r): ?>
                <tr>
                    <td><?= e($r['name'])?></td>
                    <td><?= e($r['points'])?></td>
                    <td><?= e($r['phone'])?></td>
                    <td><?= e($r['status'] == 'active' ? 'ใช้งานได้' : 'ระงับสิทธ์')?></td>
                    <td>
                        <form action="" class="" method="post">
                            <input type="hidden" name="id" value="<?= $r['id']?>">
                            <button value="1" name="T" class="btn btn-outline-<?= $r['status'] == 'active' ? 'danger' : 'success'?>" onsubmit="return confirm('ยืนยันการเปลียนสถานะผู้ใช้งานหรือไม่?')">
                                <?= $r['status'] == 'active' ? 'ระงับสิทธ์' : 'ยกเลิกระงับเสิทธ์'?>
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function(){
        const table = $('#users_table').DataTable();
    });
</script>