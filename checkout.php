<?php
require 'init.php';
require 'controller/checkout.php';
    head('marketplace'); 
?>
<section class="card card-body"> 
    <h1 class="h3 text-success"></h1>
    <h2 class="h5"><?= e($product['name'])?></h2>  
    <p>ราคาฃิ้นละ ฿<?= number_format((float) $product['price_thb'], 2)?> | คงเหลือ <?= ((int) $product['stock'])?>ชิ้น</p>
    <form action="" class="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="csrf_token" value="<?= e($crsfToken)?>">
        <input type="hidden" name="product_id" value="<?= (int) $product['id']?>">
        <label for="" class="form-label">จำนวน</label>
            <input type="number" class="form-control mb-2" id="quantity" name="quantity" min="1" max="<?= min(99, (int) $product['stock'])?>" value="1" required>
        <label for="" class="form-label">ใช้ GreenPoints คุณมี <?= number_format($userPoints)?> แต้ม</label>
            <input type="number" class="form-control mb-2" id="points_to_use" name="points_to_use" min="0" max="<?= $maxRedeemPoints?>" step="10" value="0">
        <small class="text-muted">ใช้ 10 แต้ม ลด ฿1 </small>
        <p class="mt-3 mb-1">ยอดก่อนลด: ฿<span id="subtotal"><?= number_format((float) $product['price_thb'], 2)?></span></p>
        <p class="mb-1">ส่วนลดจากแต้ม: ฿<strong id="payment-total"><?= number_format((float) $product['price_thb'], 2)?></strong></p>
        <div id="payment=instructions" class="border rounded p-3 mb-3 text-center">
            <img src="assets\images\qr\Screenshot 2026-11-25 132924.png" alt="รูปคิวอาร์" style="max-width: 70px; max-height: 50px; object-fit: cover;">
        </div>
            <label for="" class="form-label">ที่อยู่จัดส่ง</label>
            <textarea name="shipping_address" class="form-control mb-2" rows="3" minlength="5" maxlength="500" id="shipping_address" required></textarea>
            <label for="" class="form-label">แนบสลิปการโอน</label>
            <input type="file" class="form-control mb-3" id="payment_slip" name="payment_slip" accept=".jpg,.jpeg,.png,.webp">
            <small class="text-muted">รองรับ JPG, PNG, WEBP ขนาดไม่เกิน 5 MB ระบบจะส่งคำสั่งซื้อให้แอดมินตรวจสอบก่อนยืนยัน</small>
            <div>
                <button class="btn btn-success mt-3" type="submit" id="submit-order" name="buy_now" <?= $product['stock'] < 1 ? 'disabled' : ''?>>ส่งคำขอสั่งซื้อและสลิป</button>
                <a href="shop.php" class="btn btn-outline-secondary">ยกเลิก</a>
            </div>
    </form> 
</section>
<script>
    $(function () {
        const price = <?= (float) $product['price_thb']?>;
        const maxQty = <?= min(99, (int) $product['stock'])?>;
        const maxPts = <?= (int) $userPoints ?>;
        const fmt = n => n.toLocaleString('th-TH', {minimumFractionDigits: 2, maximumFractionDigits: 2});

        const render = () => {
            const qty = Math.min(maxQty, Math.max(1, +$('#quantity').val() || 1));
            const sub = qty * price;
            const cap = Math.min(maxPts, Math.floor(sub) * 10);
            const pts = Math.min(cap, Math.max(0, +$('#points_to_use').val() || 0));
            const disc = Math.floor(pts/10);
            const due = Math.max(0, sub - disc);

            $('#points_to_use').attr('max', cap);   
            $.each({'#subtotal' : sub, '#point-discount' : disc, '#payment-total': due}, (sel, val) => $(sel).text(fmt(val)));
            $('#payment_slip').prop({ required: due > 0, disabled: due <= 0});
            $('#payment-instructions').toggle(due > 0);
            $('#submit-order').text(due > 0 ? 'ส่งคำสั่งซื้อ' : 'ยืนยันคำสั่งซื้อโดยใช้แต้ม');
        };
        $('#quantity, #points_to_use').on('input', render).trigger('input');
    });
</script>