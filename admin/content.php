<?php
    require '../init.php';
    require '../controller/admin_content.php';
    head('content');
    if(!empty($_GET['edit'])){
    $id = $_GET['edit'];
    $row = $db->query("SELECT * FROM contents WHERE id = $id")->fetch_assoc();
?>

<div class="container py-4">
    <form method="post" action="" class="card card-body">
        <h3><?= $row['id'] ? 'แก้ไขเนื้อหา' : 'เพิ่มเนื้อหา'?></h3>
        <input type="hidden" name="id" value="<?= $row['id']?>">
        <label for="" class="form-label mt-2">หัวข้อ</label>
        <input type="text" class="form-control mb-2" name="title" value="<?= e($row['title'])?>" minlength="3" required>
        <label for="" class="form-label mt-2">เนื้อหา</label>
        <textarea type="text" class="form-control mb-2" name="body" maxlength="500"required><?= e($row['body'])?></textarea>
        <div class="row">
            <div class="col-mb-6">
                <label for="" class="form-label">เริ่มแสดงผล</label>
                <input type="datetime-local" class="form-control" name="start_at" value="<?= e($local($row['start_at']))?>">
            </div>
            <div class="col-mb-6">
                <label for="" class="form-label">เริ่มแสดงผล</label>
                <input type="datetime-local" class="form-control" name="end_at" value="<?= e($local($row['end_at']))?>">
            </div>
            <input type="hidden" id="Id" value="<?= $id?>">
        </div>
        <div class="mt-2">
            <button class="btn btn-success" name="editId">บันทึก</button>
            <a href="admin/content.php" class="btn btn-outline-danger">ล้างฟอร์ม</a>
        </div>
    </form>
<?php 
}else{
?>
    <form method="post" action="" class="card card-body">
        <h3><?= $edit['id'] ? 'แก้ไขเนื้อหา' : 'เพิ่มเนื้อหา'?></h3>
        <input type="hidden" name="id" value="<?= $edit['id']?>">
        <label for="" class="form-label mt-2">หัวข้อ</label>
        <input type="text" class="form-control mb-2" name="title" value="<?= e($edit['title'])?>" minlength="3" required>
        <label for="" class="form-label mt-2">เนื้อหา</label>
        <textarea type="text" class="form-control mb-2" name="body" maxlength="500"required><?= e($edit['body'])?></textarea>
        <div class="row">
            <div class="col-mb-6">
                <label for="" class="form-label">เริ่มแสดงผล</label>
                <input type="datetime-local" class="form-control" name="start_at" value="<?= e($local($edit['start_at']))?>">
            </div>
            <div class="col-mb-6">
                <label for="" class="form-label">เริ่มแสดงผล</label>
                <input type="datetime-local" class="form-control" name="end_at" value="<?= e($local($edit['end_at']))?>">
            </div>
            <input type="hidden" id="Id" value="<?= $id?>">
        </div>
        <div class="mt-2">
            <button class="btn btn-success" name="editId">บันทึก</button>
            <a href="admin/content.php" class="btn btn-outline-danger">ล้างฟอร์ม</a>
        </div>
    </form>
<?php
}
?>
<div class="card card-body">
    <table class="table table-stripped bg-white text-middle">
        <thead>
            <tr>
                <th>หัวข้อ</th>
                <th>เริ่มแสดงผล</th>
                <th>สิ้นสุด</th>
                <th>สถานะ</th>
                <th>จัดการข้อมูลเนื้อหา</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rowContents as $r):?>
                <tr>
                    <td><?= e($r['title'])?></td>
                    <td><?= $r['start_at'] ? date('d/m/Y H:i', strtotime($r['start_at'])) : ''?></td>
                    <td><?= $r['end_at'] ? date('d/m/Y H:i', strtotime($r['end_at'])) : ''?></td>
                    <td><?= e($r['live'])?></td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="id" value="<?= $r['id']?>">
                            <a href="admin/content.php?edit=<?= $r['id']?>" type="button" class="btn btn-outline-success" name="edit">แก้ไข</a>
                            <button class="btn btn-outline-danger" name="delete" onclick="return confirm('ยืนยันการลบเนื้อหานี้')">ลบ</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>
<script>
    $(document).ready(function(){
        const table = $('#content_table').DateTable();
    });
</script>