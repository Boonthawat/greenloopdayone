<?php
require_once __DIR__ . '/../init.php';
$u = me();

$uId = (int) $u['id'];

if($_POST && isset($_POST['buy_now'])){
    $productId = filter_var($_POST['product_id']?? '' , FILTER_VALIDATE_INT);
    $quantity = filter_var($_POST['quantity']?? '' , FILTER_VALIDATE_INT);
    $pointUsed = $_POST['points_to_use']?? '0' ;
    $addres = trim($_POST['shipping_address']?? '');

    $db->begin_transaction();

    $products = $db->query("SELECT * FROM products WHERE id = $productId AND is_active = 1")->fetch_assoc();
    $acc = $db->query("SELECT points FROM users WHERE id = $uId FOR UPDATE")->fetch_assoc();


    $uPrice = (int) round((float) $products['price_thb'] * 100);
    $subtotal = $uPrice * $quantity;

    $discount = $pointUsed * 10;
    $amount = $subtotal - $discount;
    $slipname = upload('peyment_slip');

    $slip = 'upload/' . $slipname;

    $sub = number_format($subtotal / 100 , 2 , '.' . '');
    $dis = number_format($discount / 100, 2 , '.' . '');
    $status = $amount > 0 ? 'pending' : 'approved';
    $orderNum = date('Ymd') . random_int(100 , 999);
    $db->query("INSERT INTO orders   (order_number, user_id, subtotal, points_used, discount_amount, shipping_address, status, payment_slip_path) 
    VALUES ('$orderNum' , $uId , '$sub' , $pointUsed , '$dis' , '$addres' , '$status' , '$slip')");

    $id = (int) $db->insert_id;
    $name = $db->real_escape_string($products['name']);
    $im = $db->real_escape_string($products['eco_impact']);
    $price = number_format($uPrice / 100 , 2 , '.' . '');

    $db->query("INSERT INTO orders_items( order_id, product_id, product_name, quantity, unit_price, eco_impact) 
    VALUES ($id,$productId ,'$name','$quantity','$price',' $im')");

    $db->query("UPDATE products SET stock = stock - '$quantity' WHERE id = $productId ");

    if($pointUsed > 0){
        $db->query("UPDATE users SET points = points - $pointUsed WHERE id = $uId");
    }

    $db->commit();
    go('store.php' , 'เลขที่' . $orderNum);


}
$productId = (int) filter_var($_GET['product']?? '' , FILTER_VALIDATE_INT);
$product = $db->query("SELECT * FROM products WHERE id = $productId AND is_active = 1")->fetch_assoc();

$userPoints = (int) $db->query("SELECT points FROM users WHERE id = $uId")->fetch_assoc()['points'] ?? 0;



?>