<?php
require_once __DIR__ . '/../init.php';


$newContent = $db->query("SELECT * FROM contents WHERE start_at <= NOW() AND (end_at > NOW()) ORDER BY start_at DESC")->fetch_all(1);
$FN = $newContent ? array_shift($newContent) : null;

$sumRecycles = $db->query("SELECT COUNT(*) AS n , COALESCE(sum(weight_kg), 0) AS kg, COALESCE(sum(co2_kg), 0) AS co2 FROM recycles WHERE status = 'done'")->fetch_assoc();
$MC = $db->query("SELECT COUNT(*) FROM users WHERE role = 'user' AND status ='active'")->fetch_row()[0];



?>