<?php
require 'init.php';
require 'controller/profile.php';
    head('marketplace'); 

?>

<div class="container py-4">
    <div class="row g-3">
        <div class="col-12 col-md-6">
            <form action="" method="post" class="card card-body">
                <div class="fs-1 text-center    ">🫂</div> 
                <label for="" class="form-label">ชื่อ - นามสกุล</label>
                    <input type="text" class="form-control mb-2" name="name" value="<?= e($u['name'])?>"required>
                <label for="" class="form-label">อีเมล</label>
                    <input type="email" class="form-control mb-2" name="email" value="<?= e($u['email'])?>" required>
                <label for="" class="form-label">เบอร์โทรศัพท์</label>
                    <input type="tel" class="form-control mb-2" name="phone" pattern="0[0-9]{9}" title="ตัวเลข 10 หลักขึ้นต้นด้วย 0" value="<?= e($u['phone'])?>" required>
                <button class="btn btn-success mt-2" type="submit" name="save">บันทึก</button>
            </form>
        </div>
        <div class="col-12 col-md-6">
            <form action="" method="post" class="card card-body" onsubmit="return checkPassword()">
                <label for="" class="form-label">รหัสผ่านปัจจุบัน</label>
                    <input type="password" class="form-control mb-2" name="current" id="" minlength="8" required>
                <label for="" class="form-label">รหัสผ่านใหม่</label>
                    <input type="password" class="form-control mb-2" name="password" id="2" minlength="8" required>
                <label for="" class="form-label">ยืนยันรหัสผ่านใหม่</label>
                    <input type="password" class="form-control mb-2" name="password2" id="2" minlength="8" required>
                <button class="btn btn-outline-secondary mt-2" type="submit" name="change">เปลี่ยนรหัสผ่าน</button>
            </form>
        </div>
    </div>
</div>
<script>
    function checkPassword() {
        if ($('$1').val() !== $('#2').vall) {
            alert('รหัสผ่านไม่ตรงกันโปรดกรอกใหม่');
            return false;
        }
        return true;
    }
</script>