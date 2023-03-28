<?php
require_once "services/booking/booking-service.php";
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
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">รายชื่อการจอง</div>
            <div class="card-body text-center">
                <table class="table table-hover table-striped" id="table1">
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
                        <?php
                        $row = getBooking();
                        foreach ($row as $key => $value) {
                        ?>
                            <tr>
                                <td><?php echo $value["full_name"]; ?></td>
                                <td><?php echo $value["tel"]; ?></td>
                                <td><?php echo $value["table_number"]; ?></td>
                                <td><?php echo $value["person_number"]; ?></td>
                                <td><?php echo $value["date"]; ?></td>
                                <td>
                                    <?php
                                    $count = 1;
                                    while ($count <= count($value["food_menu"])) {
                                        echo "
                                        <div class='d-flex justify-content-between'>
                                            <span>" . $count . ". " . $value["food_menu"][$count - 1]["name"] . "</span>
                                            <span>x" . $value["food_menu"][$count - 1]["quantity"] . "</span>
                                        </div>
                                        ";
                                        $count++;
                                    }
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>