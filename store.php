<?php
require 'init.php';
require 'controller/shop.php';
    head('marketplace'); 
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h1 class="h2 text-success">สินค้า</h1>
        <p class="text-muted mb-0">เลือกสินค้า และนำ GreenPoint มาลดราคา</p>
    </div>
</div>
<div class="row g-3">
    <?php foreach($product as $p): ?>
        <div class="col-sm-6 col-lg-4">
            <article class="card card-body">
                <?php if($p['image_path']): ?>
                    <img src="<?= e($p['image_path'])?>" alt="<?= e($p['name'])?>" class="w-100 rounded mb-3" style="height: 180px;object-fit:cover;">
                <?php endif; ?>
                <h2 class="h5"><?= e($p['name'])?></h2>
                <p class="smalltext-muted"><?= e($p['description'])?></p>
                <strong class="text-success mb-2">฿ <?= number_format((float) $p['price_thb'], 2)?></strong>
                <a href="checkout.php?product=<?= (int) $p['id']?>" class="btn btn-success w-100 mt-2 <?= $p['stock'] < 1 ? 'disabled' : ''?>">ซื้อสินค้า</a>
            </article>
        </div>
    <?php endforeach; ?>
    <?php if(!$product): ?>
        <div class="col-12">
            <div class="alert alert-secondary">ยังไม่มีสินค้าในตอนนี้</div>
        </div>
    <?php endif; ?>
</div>
