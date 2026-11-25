<?php

require_once __DIR__ . '/../init.php';
$u = me();
if(!$u) go('../login.php' , 'กรุณาเข้าสู่ระบบ' , 'danger');

$uId = (int) $u['id'] ;
$cats = $db->query("SELECT * FROM categories ORDER BY id DESC")->fetch_all(1);

if($_POST){
    $cateId = (int) $_POST['category_id'];
    $item = $_POST['item_name'];
    $deli = $_POST['delivery_type'];
    $address = $_POST['address'];
    $weight = $_POST['weight_kg'];
    $img = upload('image');

    $db->query("INSERT INTO recycles (user_id , category_id , item_name , delivery_type , address , weight_kg ,image) 
    VALUES ($uId , $cateId , '$item' , '$deli' , '$address' , $weight , '$img')");


    go('recycle.php#recycle-form.php' , 'ส่งคำขอ');
}

$rowRecycle = $db->query("SELECT COALESCE(sum(weight_kg), 0) AS total FROM recycles WHERE user_id = $uId AND status = 'done'")->fetch_row()['total']?? null;


?>