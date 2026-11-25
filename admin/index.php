<?php
require '../init.php';
require '../controller/admin_index.php';
    head('index'); 

?>
<div>
    <h1 class="text-left">รายงาน DashBoard</h1>
    <button class="btn btn-success" onclick="return window.print()">รายงาน</button>
</div>
<div class="row g-3 mt-5">
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="card card-body box text-center mb-3" style="background-color: #198754;">
            <small class="text-muted"></small>
            <h4 class="text-white">20 </h4>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="card card-body box text-center mb-3" style="background-color: #198754;">
            <small class="text-muted"></small>
            <h4 class="text-white">20 </h4>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="card card-body box text-center mb-3" style="background-color: #198754;">
            <small class="text-muted"></small>
            <h4 class="text-white">20 </h4>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="card card-body box text-center mb-3" style="background-color: #198754;">
            <small class="text-muted"></small>
            <h4 class="text-white">20 </h4>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="card card-body box text-center mb-3" style="background-color: #198754;">
            <small class="text-muted"></small>
            <h4 class="text-white">20 </h4>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="card card-body box text-center mb-3" style="background-color: #198754;">
            <small class="text-muted"></small>
            <h4 class="text-white">20 </h4>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="card card-body box text-center mb-3" style="background-color: #198754;">
            <small class="text-muted"></small>
            <h4 class="text-white">20 </h4>
        </div>
    </div>
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="card card-body box text-center mb-3" style="background-color: #198754;">
            <small class="text-muted"></small>
            <h4 class="text-white">20 </h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="card card-body mb-3" style="background-color: #198754;">
            <h6 class="text-white">คาร์บอนทีลดได้รายเดือน (kgCO2e)</h6>
            <canvas id="carbon-chart"></canvas>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card card-body mb-3" style="background-color: #198754;">
            <h6 class="text-white">น้ำหนักรีไซเคิลตามหมวด (กก.)</h6>
            <canvas class="text-white" id="category-chart"></canvas>
        </div>
    </div>
</div>
<script>

    Chart.defaults.color = '#ffffff';
    
        new Chart(document.getElementById('carbon-chart'), {
            type: 'bar',
            data: {
                labels: <?= json_encode(array_column($byMonth, 'm'), JSON_HEX_TAG |
                JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP)?>,
                datasets: [{
                    label: 'คาร์บอนที่ลดได้รายเดือน (kgCO2e)',
                    data: <?= json_encode(array_column($byMonth,'v'))?>,
                    backgroundColor: '#dae63e'
                }]
            },
            options: {
                scales: { y: { beginAtZero: true } }
            }
        });
        new Chart(document.getElementById('category-chart'), {
        type: 'doughnut',
        data: {
            labels: <?= json_encode(array_column($byCat, 'm'), JSON_HEX_TAG |
            JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP)?>,
            datasets: [{
                label: 'น้ำหนักที่รีไซเคิลตามหมวด (กก.)',
                data: <?= json_encode(array_column($byCat,'v'))?>
            }]
        }
    });
</script>