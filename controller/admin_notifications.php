<?php
require_once __DIR__ . '/../init.php';


$admin = me();
$adminId = (int) $admin['id'] ;
if(!$admin) go('../login.php' , 'กรุณาเข้าสู่ระบบ' , 'danger');
if($admin['role'] !== 'admin') go('../index.php' , 'สำหรับกน้าแอดมิน' , 'danger');

$adminId = $admin['id'];
$where = "(user_id = $adminId OR user_id IS NULL) AND title = 'สมาชิกใหม่'";

$db->query("UPDATE notifications SET is_read = 1 WHERE $where AND is_read = 0 ");
$rownoti = $db->query("SELECT title , message , created_at FROM notifications WHERE $where ORDER BY id DESC")->fetch_all(1);
