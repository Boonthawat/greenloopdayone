<?php
require_once __DIR__ . '/../controller/admin_notifications.php';
head('noti');

?>


<div class="container py-4">
    <?php foreach($rownoti as $r): ?>
        <div class="card card-body mt-3">
            <b><?= $r['title']?></b>
            <br>
            <?= e($r['message'])?>
            <br>
            <span><?= $r['created_at'] ? date('d/m/Y H:i', strtotime($r['created_at'])) : ''?></span>
        </div>
    <?php endforeach; ?>
    <?php if(!$rownoti): ?>
        <div class="alert alert-secondary">ยังไม่มีการแจ้งเตือนในตอนนี้</div>
    <?php endif; ?>
</div>