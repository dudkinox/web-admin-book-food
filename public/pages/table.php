<?php
require_once "services/tables/table-service.php";
$header = $page == "" ? "จัดการโต๊ะ" : $page;
$detail = $page == "จัดการโต๊ะ" ?
    "
สามารถค้นหาข้อมูลโต๊ะได้ที่นี่
แสดงโต๊ะว่าง กับไม่ว่าง
สามารถลบ และเพิ่มโต๊ะได้
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
                    จัดการโต๊ะ
                </div>
                <div class="row">
                    <div class="col-10">
                        <input type="text" class="form-control" id="add-table" placeholder="กรอกเลขโต๊ะที่ต้องการเพิ่ม" />
                    </div>
                    <div class="col-2">
                        <button class="btn btn-primary" onclick="addTable()">
                            <i class="bi bi-plus"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="card-body text-center">
                <table class="table table-hover table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>เบอร์โต๊ะ</th>
                            <th>สถานะ</th>
                            <th>ลบ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $row = getTables();
                        foreach ($row as $key => $value) {
                        ?>
                            <tr>
                                <td><?php echo $value["number"]; ?></td>
                                <td><?php echo $value["status"] ? "ว่าง" : "ไม่ว่าง"; ?></td>
                                <td>
                                    <a href="?page=<?php echo $page; ?>&id=<?php echo $value['id']; ?>">
                                        <button class="btn btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
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
<script>
    function addTable() {
        const number = document.getElementById("add-table").value;
        window.location.href += "&add=" + number;
    }
</script>