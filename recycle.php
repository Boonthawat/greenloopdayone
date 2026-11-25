<?php
require 'init.php';
require 'controller/recycle.php';
    head('marketplace'); 

?>

<div class="hero mb-4">
    <div>
        <span class="text-bold text-uppercase opacity-75"></span>
        <p></p>
        <h2>สะสมแล้ว <?= number_format($u['points'])?></h2>
    </div>
</div>
<form action="" class="card border-0 shadow-0 ronnded-4" method="post" enctype="multipart/form-data">
    <div class="row">
        <aside class="col-md-4 d-flex justify-content-center flex-column p-4" style="background: #cbe2d8; border-radius: 12px;">
            <div class="text-success fs-1">♻️</div>
            <p class="fw-uppercase fw-bold text-success">GIVE IT A NEW LIFE</p>
            <h3 class="text-success fw-bold mb-2">เริ่มต้นจากของชิ้นเล็กๆ</h3>
            <div class="d-block bg-white px-2 py-2 fw-semibold">✨ รับแต้มเมื่อรีไซเคิลสำเร็จ ✨</div>
        </aside>
        <div class="col-md-8 p-4 text-align-center">
            <h4 class="mt-2 fw-bold">แจ้งรายการรีไซเคิล</h4>
            <p>กรอกข้อมูลอุปกรณ์ที่ต้องการรีไซเคิล</p>
            <label for="" class="form-label mt-2">หมวดอุปกรณ์</label>
                <select name="category_id" id="recycle-category" class="form-select mb-2" required>
                    <option value="">เลือกหมวด</option>
                    <?php foreach($cats as $c): ?>
                        <option value="<?= $c['id']?>" data-factor="<?= $c['co2_per_kg']?>">
                            <?= $c['name']?>(ลด <?= $c['co2_per_kg']?> kgCO2 ต่อ กก.)
                        </option>
                    <?php endforeach; ?>
                </select>
            <label for="" class="form-label">รายการ</label>
                <input type="text" class="form-control mb-2" name="item_name" required>
            <label for="" class="form-label">น้ำหนักโดยประมาณ</label>
                <input type="number" class="form-control mb-2" name="weight_kg" id="recycle-weight" required>
            <label for="" class="form-label">ประเภทขนส่ง</label>
                <select name="delivery_type" id="" class="form-select mb-2">
                    <option value="">เลือกหมวด</option>
                    <option value="pickup">นัดรับที่บ้าน</option>
                    <option value="self">นำส่งเอง</option>
                </select>
            <label for="" class="form-label">ที่อยู่สำหรับจัดส่ง</label>
                <textarea name="address" id="" class="form-control" maxlength="500"></textarea>
            <div>
                <p class="text-success small" id="recycle-estimate">เลือกหมวและกรอกน้ำหนักดูปริมาณคาร์บอนที่คาดว่าจะได้ลด</p>
                <label for="" class="form-label">รูปสิ้นค้า ขนาดไม่เกิน 5MB</label>
                <input type="file" class="form-control" name="image" accept=".png.,jpeg.,jpg">
                <button class="btn btn-success mt-4" type="submit">ส่งคำขอ</button>
            </div>
        </div>
    </div>
</form>
<script>
    $(function(){
        const $category = $('#recycle-category');
        const $weight = $('#recycler-weight');
        const $estimateDisplay = $('#recycler-estimate');
        const updateEstimate = () => {
            const factor = parseFloat($category.find(:selected).data('factor')) || 0;
            const weight = parseFloat($weight.val()) || 0 ;
            if (!factor || weight <= 0){
                $estimateDislplay.text('เลือกหมวดหมู่และกรอกสินค้าใหม่');
                return;
            }
            const totalEstimate = factor * weight;
            $estimateDisplay.text(`คาดว่าจะได้รับ ${totalEstimate.toFixed(2)} kgCO2e`);
            return;
        };
        $category.on(change, updateEstimate);
        $weight.on(input, updateEstimate);
    });
</script>