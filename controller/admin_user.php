<?php
require_once __DIR__ . '/../init.php';
$admin = me();
$adminId = (int) $admin['id'] ;
if(!$admin) go('../login.php' , 'กรุณาเข้าสู่ระบบ' , 'danger');
if($admin['role'] !== 'admin') go('../index.php' , 'สำหรับกน้าแอดมิน' , 'danger');


if(isset($_POST['T'])){
    $id = $_POST['id'];
    if($id > 0){
        $db->query("UPDATE users SET status = IF(status = 'active' , 'suspended' , 'active') WHERE id = $id AND role = 'user'");
    }
    go('user.php' , 'อัพเดท');
}
$rows = $db->query("SELECT * FROM users WHERE role = 'user' ORDER BY id DESC")->fetch_all(1);