
<?php
require_once __DIR__ . '/../init.php';

if(isset($_POST['change'])){
    $email = $_POST['email'];
    
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $question = $_POST['question'];
    $answer = $_POST['answer'];


    if($password !== $password2){
        go('forgot.php' , 'รหัสผ่านไม่ตรงกัน' , 'danger');
    }


    $emailhash = $db->real_escape_string($email);
    $acc = $db->query("SELECT * FROM email = '$emailhash'")->fetch_assoc();

    if(!$user || $acc['question'] !== $question || !password_verify($answer , $user['answer'])){
        go('forgot.php' , 'คำถามหรือคำตอบไม่ถูกต้อง' , 'danger');
    }

    $ph = password_hash($password , PASSWORD_DEFAULT);
    $ah = password_hash($answer , PASSWORD_DEFAULT);

    $uId = $user['id'];

    if(!$db->query("UPDATE users SET password = '$ph' , answer = '$ah' WHERE id = $uId")){
        go('forgot.php' , 'รหัสหรือคำตอบไม่ถูกต้อง' , 'danger');
    }
    go('../login.php' , 'เปลี่ยนรหัสผ่านสำเร็จ');


}