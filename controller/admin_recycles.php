<?php
require_once __DIR__ . '/../init.php';
$admin = me();
$adminId = (int) $admin['id'] ;
if(!$admin) go('../login.php' , 'กรุณาเข้าสู่ระบบ' , 'danger');
if($admin['role'] !== 'admin') go('../index.php' , 'สำหรับกน้าแอดมิน' , 'danger');


if(isset($_POST['reject'])){
    $id = $_POST['id'];
    $db->query("UPDATE recycles SET status = 'rejected' WHERE id = $id");
    $db->commit();
    go('recycle.php' , 'ปฎิเสธ' , 'danger');
}


if(isset($_POST['approve'])){
    $rId = (int) $_POST['id']?? 0;

    $r = $db->query("SELECT r.weight_kg,r.user_id,c.co2_per_kg FROM recycles r JOIN categories c on c.id = r.category_id where r.id = $rId  AND status = 'pending'")->fetch_assoc();


    $points = round($r['weight_kg'] * 20);
    $co2 = $r['weight_kg'] * $r['co2_per_kg'];
    $userId = $r['user_id'];

    $db->query("UPDATE recycles SET points = $points , co2_kg = $co2 , status = 'done' WHERE id = $rId");
    $db->query("UPDATE users SET points = points + $points WHERE id = $userId");
    $db->commit();

    go('recycle.php' , "ได้รับ $points แต้ม");
}

$rows = $db->query("SELECT r.id,r.image, r.item_name , r.delivery_type , r.address , r.weight_kg , r.status , u.name AS member FROM users u  JOIN recycles r ON r.user_id = u.id ORDER BY id DESC")->fetch_all(1);

?>