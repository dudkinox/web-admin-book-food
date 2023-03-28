<?php
require_once "services/tables/table-service.php";
$header = $page == "" ? "จัดการโต๊ะ" : $page;
$detail = $page == "จัดการโต๊ะ" ?
    "
สามารถค้นหาข้อมูลอาหารได้ที่นี่
แสดงข้อมูลอาหารทั้งหมด
สามารถลบ แก้ไข และเพิ่มอาหารได้
" : "";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    deleteTable($id, $page);
}
if (isset($_GET["add"])) {
    $add = $_GET["add"];
    addTable($add, $page);
}
?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3><?php echo $header; ?></h3>
                <p class="text-subtitle text-muted">
                    <?php echo $detail; ?>
                </p>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div>
                    จัดการเมนูอาหาร
                </div>
            </div>
            <div class="card-body text-center">
                <table class="table table-hover table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>ชื่อ</th>
                            <th>ราคา</th>
                            <th>แคลอรี่</th>
                            <th>รูปภาพ</th>
                            <th>ลบ / แก้ไข</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
<script>
</script>