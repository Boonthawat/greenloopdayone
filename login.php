<?php
require 'init.php';

    head('marketplace'); 

?>
<!-- <div class="card card-body mx-auto"> -->
    <form action="controller/login.php" class="card card-body mx-auto" method="post" style="max-width: 540px;">
        <label for="" class="form-label">อีเมล</label>
            <input type="email" class="form-control mb-2" name="email" required>
        <label for="" class="form-label">รหัสผ่าน</label>
            <input type="password" class="form-control mb-2" name="password" id="1" minlength="8" required>
        <button class="btn btn-success">เข้าสู่ระบบ</button>
        <div class="d-flex justify-content-between mt-2">
            <a href="forgot.php">ลืมรหัสผ่าน</a>
            <a href="register.php">สมัครสมาชิก</a>
        </div>
    </form>
<!-- </div> -->