<?php
require_once __DIR__ . '/../init.php';
$u = me();
if(!$u) go('../login.php' , 'เข้าสู่ระบบ' , 'danger');


if(isset($_POST['save'])){
    $uId = $u['id'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    $db->query("UPDATE users SET email ='$email' , name = '$name' , phone = '$phone' WHERE id = $uId");

    $_SESSION['user']['email'] = trim($_POST['email']);
    $_SESSION['user']['name'] = trim($_POST['name']);
    $_SESSION['user']['phone'] = trim($_POST['phone']);

    go('profile.php' , 'อัพเดทข้อมูลส่วนตัว');

}
if(isset($_POST['change'])){
      $uId = $u['id'];
    $cur = $_POST['current'];
    $password1 = $_POST['password'];
    $password2 = $_POST['password2'];

    if($cur === '' || $password1 === '' || $password2 === ''){
        go('profile.php' , 'กีอกข้อมุลให้ครบถ้วน' , 'danger'); 
    }
    if($password1 !== $password2){
        go('profile.php' , 'รหัสผ่านไม่ตรงกัน'  , 'danger');
    }
    $acc = $db->query("SELECT password FROM users WHERE id = $uId")->fetch_assoc();

    if(!$acc || !password_verify($cur, $acc['password'])){
        go('profile.php' , 'รหัสผ่านไม่ถูกต้อง' , 'danger');
    }
    $passhash = password_hash($password1 , PASSWORD_DEFAULT);

    if(!$db->query("UPDATE users SET password = '$passhash' WHERE id = $uId ")){
        go('profile.php' , 'เปลี่ยนรหัสผ่านไม่สำเร็จ' , 'danger');
    }

    go('profile.php' ,'สำเร็จ' );
}

?>