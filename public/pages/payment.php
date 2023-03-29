<?php
require_once "services/payment/payment-service.php";
require_once "services/tables/table-service.php";
$header = $page == "" ? "การชำระเงิน" : $page;
$detail = $page == "การชำระเงิน" ?
    "
สามารถค้นหาโต๊ะอาหารได้ที่นี่
แสดงเฉพาะลูกค้าที่เข้ามาสั่งอาหารแล้วยังไม่ชำระเงิน
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
            <div class="card-header">การชำระเงิน</div>
            <div class="card-body text-center">
                <table class="table table-hover table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>เบอร์โต๊ะ</th>
                            <th>รายการอาหาร</th>
                            <th>ราคารวม</th>
                            <th>ทำรายการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $row = getPaymentList();
                        foreach ($row as $key => $value) {
                        ?>
                        <tr>
                            <td><?php echo $value["table_number"]; ?></td>
                            <td>
                                <?php
                                    $count = 1;
                                    $total = 0;
                                    while ($count <= count($value["food_menu"])) {
                                        echo "
                                        <div class='d-flex justify-content-between'>
                                            <span>" . $count . ". " . $value["food_menu"][$count - 1]["name"] . "</span>
                                            <span>x" . $value["food_menu"][$count - 1]["quantity"] . "</span>
                                        </div>
                                        ";
                                        $total += $value["food_menu"][$count - 1]["price"] * $value["food_menu"][$count - 1]["quantity"];
                                        $count++;
                                    }
                                    ?>
                            </td>
                            <td>
                                <?php
                                    echo number_format($total);
                                    ?> บาท</td>
                            <td>
                                <a href="?page=<?php echo $page; ?>&done=<?php echo $value["table_number"]; ?>">
                                    <button class="btn btn-primary">ชำระเงินเรียบร้อย</button>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>