
<?php

require 'init.php';
if(!me()) go('login.php');
require 'controller/home.php';
    head('หน้าแรก', false);
    $u = me();
    $steps = [
        ['','','',''],
        ['','','',''],
        ['','','',''],
    ];
    $slide = [
        ['assets\images\4-5-1024x576.jpg'],
        ['assets\images\1-Harnessing-Innovation_-The-Role-of-Green-Technology-in-Sustainable-Development.webp'],
        ['assets\images\Cover-1.jpg'],
        ['assets\images\istockphoto-1414916304-612x612.jpg'],
    ];
?>
<div class="carousel slide carousel-fade mt-5 shadow" id="homeCarousel" style="border-radius: 1.5rem; overflow-hidden;" data-bs-="carousel" data-bs-interval="2000" data-bs-pause="false">
    <div class="carousel-indicators">
        <?php foreach($slide as $i => $s): ?>
            <button type="button" data-bs-target="#homeCarousel" data-bs-slide-to="<?= $i ?>" class="<?= $i === 0 ? 'active' : ''?>"></button>
        <?php endforeach; ?>
    </div>
    <div class="carousel-inner" style="border-radius: 1.5rem; overflow:hidden;">
        <?php foreach ($slide as $i =>$s): ?>
            <div class="carousel-item <?= $i === 0 ? 'active' : ''?>" style="background: 1f5c35;">
                <img src="<?= $s[0]?>" alt="" clas="d-block w-100" style="height: 420px; width: 100%;object-fit:cover;">
                <div class="position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,.6);"></div>
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-center align-items-center text-center text-white px-4">
                    <?php if($u): ?>
                        <h1 class="fw-bold display-3 display-md-1">GREENLOOP</h1>
                        <h2 class="fw-bold">สวัสดี <?= $u['name']?></h2>
                        <p class="fs-1">สะสมแล้ว <?= $u['points']?></p>
                        <div>
                            <a href="" class="btn btn-light"></a>
                            <a href="" class="btn btn-light"></a>
                            <a href="" class="btn btn-light"></a>
                            <a href="" class="btn btn-light"></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#homeCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#homeCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
<section class="home-impact-section">
    <div class="home-section-heading mt-4 mb-6">
        <span class="section-eyebrow">SMALL ACTION, BIG IMPACT</span>
        <h2 class="mt-2 fw-bold">ผลกระทบที่เราสร้างร่วมกัน</h2>
        <p>ทุกชิ้นที่ส่งเข้าระบบคือ อีกก้าวหนึ่งของการจัดการ E-waste อย่างยั่งยืน</p>
    </div>
    <div class="row g-3 home-impact-grid">
        <div class="col-6 col-xl-3">
            <div class="card impact-card h-100 p-4 bg-white">
                <span class="impact-icon"></span>
                <span class="impact-label"></span>
                <strong class="d-block text-success fs-1"></strong>
                <small></small>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="card impact-card h-100 p-4 bg-white">
                <span class="impact-icon"></span>
                <span class="impact-label"></span>
                <strong class="d-block text-success fs-1"></strong>
                <small></small>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="card impact-card h-100 p-4 bg-white">
                <span class="impact-icon"></span>
                <span class="impact-label"></span>
                <strong class="d-block text-success fs-1"></strong>
                <small></small>
            </div>
        </div>
        <div class="col-6 col-xl-3">
            <div class="card impact-card h-100 p-4 bg-white">
                <span class="impact-icon"></span>
                <span class="impact-label"></span>
                <strong class="d-block text-success fs-1"></strong>
                <small></small>
            </div>
        </div>
    </div>
    <p class="impact-section-footnote">สรุปรายการจากรายการที่ผู้ดูแลตรวตจสอบแล้ว</p>
</section>
<section class="home-journy-section">
    <div class="home-section-heading mt-2 mb-4">
        <span class="section-eyebrow">SMALL ACTION, BIG IMPACT</span>
        <h2 class="mt-2 fw-bold">ผลกระทบที่เราสร้างร่วมกัน</h2>
        <p>ทุกชิ้นที่ส่งเข้าระบบคือ อีกก้าวหนึ่งของการจัดการ E-waste อย่างยั่งยืน</p>
    </div>
    <div class="row g-3">
        <?php foreach($steps as $index => $s): ?>
            <div class="col-md-4">
                <a href="<?= $s[3]?>" class="card card-journy h-100 p-4 text-decoration-none">
                    <div class="journy-card-top d-flex justify-content-between gap-3">
                        <span class="journy-icon"><?= $s[0]?></span>
                        <span class="journy-icon"></span>
                    </div>
                    <h3><?= $s[1]?></h3>
                    <p><?= $s[2]?></p>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<section class="home-campaign gap-4 mt-5 rounded-4 d-flex justify-content-between">
    <div class="campaign-decoration fs-1">🌍</div>
    <div class="campaign-copy">
        <span class="section-eyebrow">ชวนกันเปลี่ยนของเก่าให้เป็นคุณค่าใหม่</span>
        <h2>ลิ้นชักของคุณอาจมี "ก้าวเล็กๆ" ซ่อนอยู่</h2>
        <p>โทรศัพท์เสีย สายชาร์จเก่า อุปกรณ์ที่ไม่ได้ใช้ ไม่ควรถูกทิ้งรวมกัน เริ่มส่งต่ออย่างถู฿กวิธีแล้วชวนคนรอบตัวมาสร้างโลกที่ดีไปด้วยกัน</p>
    </div>
    <a href="recycle.php" class="btn btn-light">♻️ เริ่มรีไซเคิล</a>
</section>
<section class="article-heading">
    <div class="article-heading mt-5 mb-4 d-flex justify-content-between align-items-center">
        <div>
            <span>GREENLOOP JOURNAL</span>
            <h3>เรื่องเล็กๆ ที่ช่วยโลกได้</h3>
            <p>ช่าวสาวและความรู้เรื่อง E-waste ที่อ่านง่าย และนำไปใช้ได้จริง</p>
        </div>
        <span class="article-count"><??= $FN count($newContent) + 1 : 0 ?>เรื่อง</span>
    </div>
    <?php if($FN): ?>
        <article class="card article-feature row g-3 m-0 overflow-hidden">
            <div class="article-art col-md-5 d-gride justify-content-between align-items-center position-relative"></div>
            <div class="article-feature-content col-md-4 pg-4 p-lg-5">
                <span class="article-label">เรื่องเด่น</span>
                <h4 class="mt-2"><?= e($FN['title'])?></h4>
                <p><?= e($FN['body'])?></p>
                <small class="text-muted"><?= $FN['start_at'] ? date('d/m/Y H:i', strtotime($FN['start_at'])) : ''?></small>
            </div>
        </article>
        <?php if($newContent): ?>
            <div class="row mt-4">
                <?php foreach($newContent as $index => $n): ?>
                    <div class="col-md-6 col-xl-4">
                        <article class="card h-100 p-4 mb-2">
                            <div class="article-card-top d-flex justify-content-between align-items-center gap-3">
                                <span>🌍</span>
                                <small class="text-muted"><?= $n['stat_at'] ? date('d/m/Y H:i',strtotime($n['start_at'])) : ''?></small>
                            </div>
                            <h4><?= e($n['title'])?></h4>
                            <p><?= nl2br($n['body'])?></p>
                            <small>GREENLOOP JOURNAL</small>
                        </article>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="alert alert-secondary">ยังไม่มีข่าวสารในตอนนี้</div>
    <?php endif; ?>
</section>
<?php foot() ?>