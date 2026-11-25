<?php
require_once __DIR__ . '/../init.php';
$u = me();
if(!$u) go('../login.php' , 'เข้าสู่ระบบ' , 'danger');

$uId = (int) $u['id'];
$user = $db->query("SELECT points FROM users WHERE id = $uId")->fetch_assoc();

$u['points'] = (int) $user['points'];
$_SESSION['user']['points'] = $u['points'];

$sumRecycles = $db->query("SELECT COUNT(*) AS n , COALESCE(sum(weight_kg), 0) AS kg, COALESCE(sum(co2_kg), 0) AS co2 FROM recycles WHERE status = 'done'")->fetch_assoc();
$topUser = $db->query("SELECT id,name,points FROM users WHERE role = 'user' AND status = 'active' ORDER BY id , points ASC")->fetch_all(1);