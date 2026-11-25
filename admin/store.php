<?php
require '../init.php';
require '../controller/admin_marketplace.php';
    head('marketplace'); 

?>


<h1 class="h-4 mt-4">คำสั่งซื้อรอนุมัติ</h1>
<div class="card card-body">
    <table class="table" id="recycle-table">
        <thead>
            <tr>
                <th>เลขที่</th>
                <th>สมาชิก</th>
                <th>สินค้า</th>
                <th>ที่อยู่จัดส่ง</th>
                <th>ยอด</th>
                <th>สลิป</th>
                <th>อนุมัติ</th>
            </tr>
        </thead>
        <tbody>
            <?php if(!$order): ?>
                <tr>
                    <td colsan="7">ยังไม่มีคำสั่งซื้อในตอนนี้</td>
                </tr>
            <?php endif; ?>
            <?php foreach($order as $o): ?>
                <tr>
                    <td><?= e($o['order_number'])?></td>
                    <td><?= e($o['name'])?></td>
                    <td><?= e($o['item_list'])?></td>
                    <td><?= nl2br($o['shipping_address'])?></td>
                    <td>฿ <?= number_format((float) $o['total'], 2)?>
                        <?php if((int) $o['points_used'] > 0): ?>
                            <small class="d-block text-muted"><?= (int) $o['points_used']?>แต้ม ลด ฿ <?= number_format((float) $o['discount_amount'],2)?></small>
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if($o['payment_slip_path']): ?>
                            <a href="<?= e($o['payment_slip_path'])?>" target="_blank" rel="noopener">
                                <img src="<?= e($o['payment_slip_path'])?>" alt="สลิปการชำระเงิน" stle="max-width: 90px; max-height: 70px; object-fit:cover;">
                            </a>
                        <?php else: ?>
                            -
                        <?php endif; ?>
                    </td>
                    <td>
                        <form action="" method="post">
                            <input type="hidden" name="order_id" value="<?= (int) $o['id']?>">
                            <button class="btn btn-sm btn-success" type="submit" name="order_action" value="approved">อนุมัติ</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function(){
        const table = $('#recycle_table').DataTable();
    });
</script>