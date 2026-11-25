<?php
require_once __DIR__ . '/../init.php';
 
$admin = me();
if(!$admin) go('../login.php' , 'กรุณาเข้าสู่ระบบ' , 'danger');
if($admin['role'] !== 'admin') go('../index.php' , 'สำหรับกน้าแอดมิน' , 'danger');

if(isset($_POST['delete'])){
    $uId = (int) $_POST['id'];
    $db->query("DELETE FROM contents where id = $uId ");
    go('content.php' , 'ลบ' , 'danger');
}

if($_POST){
    $uId = (int) $_POST['id'];
    $start = $_POST['start_at'];
    $end = $_POST['end_at'];
    $title = $_POST['title'];
    $body = $_POST['body'];

    if($uId > 0){
        $db->query("UPDATE contents SET title = '$title' , body = '$body' , start_at = '$start' , end_at = '$end' WHERE id = $uId");
    } else {
        $adminId = (int) $admin['id'];
        $db->query("INSERT INTO contents (title , body , start_at , end_at , user_id) VALUES ('$title' , '$body' , '$start' , '$end' , $adminId)");
    }

    go('content.php' , 'บันทึก');
}
$edit = [
    'id' => '',
    'title' => '',
    'body' => '',
    'start_at' => '',
    'end_at' => ''
];

$rowContents = $db->query("SELECT * , IF(start_at > NOW() , 'รอแสดง' , IF(end_at < NOW() , 'หมดเวลา' , 'กำลังแสดง')) AS live FROM contents ORDER BY start_at DESC")->fetch_all(1);


$local = function($q){
    return $q ? date('Y-m-d' , strtotime($q)): null;
}

?>
