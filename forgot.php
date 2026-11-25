<?php
require 'init.php';
require 'controller/forgot.php';
    head('marketplace'); 

?>

<div class="container py-4">
    <form action="" class="card card-body mx-auto" method="post" onsubmit="return checkPassword()" style="max-width: 540px;">
        <label for="" class="form-label mt-2">อีเมล</label>
            <input type="email" class="form-control mb-2" name="email" required>
        <label for="" class="form-label">ตำถามกันลืมรหัสผ่าน</label>
            <select name="question" id="question" class="form-control mb-2">
                <option value="">เลือกคำถาม</option>
                <option value="สัตว์เลี้ยง">สัตว์เลี้ยงตัวแรกชื่ออะไร</option>
            </select>
        <label for="" class="form-label">คำตอบเมื่อลืมรหัสผ่าน</label>
            <input type="text" class="form-control mb-2" name="answer" required>
        <label for="" class="form-label">รหัสผ่านใหม่</label>
            <input type="password" class="form-control mb-2" name="password" id="1" minlength="8" required>
        <label for="" class="form-label">ยืนยันรหัสผ่านใหม่</label>
            <input type="password" class="form-control mb-2" name="password2" id="2" minlength="8" required>
        <button class="btn btn-success mt-4">เปลี่ยนรหัสผ่านห</button>

    </form>
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