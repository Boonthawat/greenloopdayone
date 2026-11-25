<?php
require 'init.php';
head('marketplace'); 

?>
    <form action="controller/register.php" class="card card-body mx-auto" method="post" onsubmit="return checkPassword()" style="max-width: 540px;">
        <label for="" class="form-label">ชื่อ - นามสกุล</label>
            <input type="text" class="form-control mb-2" name="name" required>
        <label for="" class="form-label">อีเมล</label>
            <input type="email" class="form-control mb-2" name="email" required>
        <label for="" class="form-label">เบอร์โทรศัพท์</label>
            <input type="tel" class="form-control mb-2" name="phone" pattern="0[0-9]{9}" title="ตัวเลข 10 หลักขึ้นต้นด้วย 0" required>
        <label for="" class="form-label">รหัสผ่าน</label>
            <input type="password" class="form-control mb-2" name="password" id="1" minlength="8" required>
        <label for="" class="form-label">ยืนยันรหัสผ่าน</label>
            <input type="password" class="form-control mb-2" name="password2" id="2" minlength="8" required>
        <label for="" class="form-label">เลือกตำถามกันลืมรหัสผ่าน</label>
            <select name="question" id="question" class="form-control mb-2">
                <option value="">เลือกคำถาม</option>
                <option value="สัตว์เลี้ยง">สัตว์เลี้ยงตัวแรกชื่ออะไร</option>
            </select>
        <label for="" class="form-label">คำตอบเมื่อลืมรหัสผ่าน</label>
            <input type="text" class="form-control mb-2" name="answer" required>
        <button class="btn btn-success mt-4">สมัครสมาชิก</button>
    </form>
<script>
    function checkPassword() {
        if ($('$1').val() !== $('#2').vall) {
            alert('รหัสผ่านไม่ตรงกันโปรดกรอกใหม่');
            return false;
        }
        return true;
    }
</script>