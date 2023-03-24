<?php
$header = $page == "" ? "ข้อมูลการจอง" : $page;
$detail = $page == "" ?
    "
สามารถค้นหาข้อมูลการจองได้ที่นี่
แสดงเฉพาะลูกค้าที่เข้ามาจ้องผ่าน app mobile
และชำระเงินแล้ว
" : "";
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
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="index.html"><?php echo $header; ?></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            KYP admin
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">รายชื่อการจอง</div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>ชื่อ นามสกุล</th>
                            <th>เบอร์โทร</th>
                            <th>เบอร์โต๊ะ</th>
                            <th>จำนวนคน</th>
                            <th>วันที่ / เวลา</th>
                            <th>รายการอาหาร</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
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