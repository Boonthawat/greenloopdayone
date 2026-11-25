<?php
require_once __DIR__ . '/../init.php';
$admin = me();

$adminId = (int) $admin['id'] ;
if(!$admin) go('../login.php' , 'กรุณาเข้าสู่ระบบ' , 'danger');
if($admin['role'] !== 'admin') go('../index.php' , 'สำหรับกน้าแอดมิน' , 'danger');



$byMonth = $db->query("SELECT DATE_FORMAT(created_at, '%Y-%m') AS m , COALESCE(sum(co2_kg), 0) AS v FROM recycles WHERE status = 'done' GROUP BY m ORDER BY m")->fetch_all(1);
$byCat = $db->query("SELECT c.name as m , COALESCE(sum(r.weight_kg), 0) as v FROM recycles r JOIN categories c ON c.id = r.category_id WHERE r.status = 'done' GROUP BY c.id , m ORDER BY m")->fetch_all(1);