<?php
require_once __DIR__ . '/../init.php';
$admin = me();
$adminId = (int) $admin['id'] ;
if(!$admin) go('../login.php' , 'กรุณาเข้าสู่ระบบ' , 'danger');
if($admin['role'] !== 'admin') go('../index.php' , 'สำหรับกน้าแอดมิน' , 'danger');

if(isset($_POST['order_action'])){
   $orderId = filter_var($_POST['order_id']?? '' , FILTER_VALIDATE_INT);
   $action = $_POST['order_action'];

    $db->brgin_transaction();
    $acc = $db->query("SELECT * FROM orders WHERE id = $orderId AND FOR UPDATE")->fetch_assoc()
    
    $db->query("UPDATE orders SET status = 'approved' WHERE id = $orderId AND status = 'pending'");
    $db->commit();
    go('store.php' , 'ตรวจรับ');
    
    
    }

$order = $db->query("SELECT o.* , u.name ,
(SELECT GROUP_CONCAT(CONCAT(product_name, 'x' , quantity)) FROM orders_items WHERE order_id = o.id) AS item_list,
(SELECT COALESCE(SUM(unit_price * quantity), 0) FROM orders_items WHERE order_id = o.id) - o.discount_amount AS total
 FROM orders o JOIN users u ON o.user_id = u.id WHERE o.status = 'pending' ORDER BY created_at")->fetch_all(1);