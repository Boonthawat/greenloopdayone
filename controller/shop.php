<?php

$u = me();

if(!$u) go('../login.php' , 'กรุณาเข้าสู่ระบบ' , 'danger');


$uId = (int) $u['id'];
$user = $db->query("SELECT points FROM users WHERE id = $uId")->fetch_assoc();

$u['points'] = (int) $user['points'];
$_SESSION['user']['points'] = $u['points'];

$product = $db->query("SELECT * FROM products WHERE is_active = 1 ORDER BY created_at DESC")->fetch_all(1);


?>