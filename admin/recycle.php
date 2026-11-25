<?php
require '../init.php';
require '../controller/admin_recycles.php';
    if(($_GET['export'] ?? '') === 'csv') {
        while (ob_get_level() > 0) {
            ob_end_clean();
        }
        header('Content-type: text/csv; charset=UTF-8');
        header('Content-Disposition: attachment; filename="recycle-report.csv"');

        $csv = fopen('php://output', 'w');
        fwrite($csv,"\xED\xBB\xBF");
        fputcsv($csv, ['สมาชิก','รายการ','ประเภทขนส่ง','ที่อยู่','กก.', 'สถานะ']);
        foreach ($rows as $r) {
            fputcsv($csv, [
                $r['member'],
                $r['item_name'],
                $r['delivery_type'] === 'pickup' ? 'นัดรับที่บ้าน' : 'นำส่งเอง',
                $r['address'],
                $r['weight_kg'],
                $r['status'] === 'pending' ? 'รอตรวจ' : ($r['status'] === 'done' ? 'สำเร็จ' : 'ปฏิเสธ'),
            ]);
        }
        fclose($csv);
        exit;
    }
    $baseUrl = strtok($_SERVER['REQUEST_URI'], '?');
    $csvUrl = $baseUrl . '?' . http_build_query(array_merge($_GET,['export' => 'csv']));
    head('recylce'); 
?>
<div class="mb-3">  
    <a href="<?= e($csvUrl)?>" class="btn btn-success" >ดาวน์โหลด CSV</a>
</div>
<div class="container py-4 card card-body">
    <table class="table" id="recycle_table">
        <thead>
            <tr>
                <th>รูป</th>
                <th>สมาชิก</th>
                <th>รายการ</th>
                <th>ขนส่ง</th>
                <th>น้ำหนัก</th>
                <th>ที่อยู่</th>
                <th>สถานะ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rows as $r): ?>
                <tr>
                    <td>
                        <?php if($r['image'] !== ''): ?>
                            <a href="upload/<?= $r['image']?>">
                                <img src="upload/<?= $r['image']?>" alt="รูปสินค้า" style="max-width: 70px; max-height: 50px; object-fit: cover;">
                            </a>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td><?= e($r['member'])?></td>
                    <td><?= e($r['item_name'])?></td>
                    <td><?= e($r['delivery_type'])?></td>
                    <td><?= e($r['weight_kg'])?></td>
                    <td><?= nl2br($r['address'])?></td>
                    <td>
                        <?php if($r['status'] == 'pending'): ?>
                            <form action="" method="post" class="d-flex gap-2">
                                <input type="hidden" name="id" value="<?= $r['id']?>">
                                <button class="btn btn-success" type="submit" name="approve">ตรวจรับ</button>
                                <button class="btn btn-sm btn-danger" type="submit" name="reject" formnovalidation onclick="return confirm('ปฏิเสธคำขอนี้')">ปฏิเสธ</button>
                            </form>
                        <?php else: ?>
                            <?= e($r['status'] === 'done' ? 'สำเร็จ' : 'ปฏิเสธ')?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function(){
        const table = $('#recycle_table').DateTable();
    });
</script>