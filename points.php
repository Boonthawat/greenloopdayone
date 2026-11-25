<?php
require 'init.php';
require 'controller/points.php';
    head('marketplace'); 


    $points = (int) $u['points'];
    $currentlevel = $points >= 600 ? '🌍์ Net Hero Zero' : ($poitns >= 300 ? '🌳 ต้นไม้' : ($points >= 100 ? '🌱 ต้นกล้า' : '😊 มือใหม่'));
?>
<div class="hero mb-4 text-center">
    <div></div>
    <h2><?- number_format($u['points'])?></h2>
    <h2 class=""><?= $currentlevel?></h2>
</div>
<div class="row g-3 justify-content-center">
    <div class="col-6 col-lg-3">
        <div class="card card-body text-center mt-2">
            <span clas="text-muted"></span>
            <h4 class="text-success"></h4>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="card card-body text-center mt-2">
            <span clas="text-muted"></span>
            <h4 class="text-success"></h4>
        </div>
    </div>
    <div class="col-6 col-lg-3">
        <div class="card card-body text-center mt-2">
            <span clas="text-muted"></span>
            <h4 class="text-success"></h4>
        </div>
    </div>
</div>
<div class="card card-body mt-4">
    <table class="table bg-white mb-0" id="points_table">
        <thead>
            <tr>
                <th>ชื่อ</th>
                <th>ระดับแต้ม</th>
                <th class="text-end">แต้ม</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($topUser as $i => $t): ?>
                <?php $memberLevel = match(true) {
                    $t['points'] >= 600 => '🌍 Net Zero Hero',
                    $t['points'] >= 300 => '🌳 ต้นไม้',
                    $t['points'] >= 600 => '🌱 ต้นกล้า',
                    default => '😊 มือใหม่'
                }
                ?>
                <tr class="<?= $t['id'] == $u['id'] ? 'table-success' : ''?>">
                    <td><?= e($t['name'])?></td>
                    <td><?= $memberLevel?></td>
                    <td class="text-end"><?= number_format($t['points'])?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        const table = $('#points_table').DataTable();
    });
</script>