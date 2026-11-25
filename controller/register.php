<?php

require_once __DIR__ . '/../init.php';

$email = $_POST['email'];
$name = $_POST['name'];
$phone = $_POST['phone'];
$password =$_POST['password'];
$question = $_POST['question'];
$answer = $_POST['answer'];

    $ph = password_hash($password , PASSWORD_DEFAULT);
    $ah = password_hash($answer , PASSWORD_DEFAULT);
    $db->query("INSERT INTO users (email , name , phone , password , question , answer) VALUES ('$email' , '$name' , '$phone' , '$ph' , '$question' , '$ah')");

    $nameHash = $db->real_escape_string($name);

    $db->query("INSERT INTO notifications (user_id , title , message ) SELECT id , 'สมาชิกใหม่' , '$nameHash สมัครสมาชิกแล้ว' FROM users WHERE role = 'admin'");
    go('login.php' , 'สมัครสมาชิกสำเร็จ');




?>