<?php
require_once "services/menu/menu-service.php";
$header = $page == "" ? "จัดการเมนูอาหาร" : $page;
$detail = $page == "จัดการเมนูอาหาร" ?
    "
สามารถค้นหาข้อมูลอาหารได้ที่นี่
แสดงข้อมูลอาหารทั้งหมด
สามารถลบ แก้ไข และเพิ่มอาหารได้
" : "";
$insert = isset($_GET["insert"]) ? $_GET["insert"] : '';
$edit = isset($_GET["edit"]) ? $_GET["edit"] : '';

if (isset($_GET["delete"])) {
    $edit = $_GET["delete"];
    deleteMenu($edit, $page);
}
if (
    isset($_GET["name"]) &&
    isset($_GET["price"]) &&
    isset($_GET["calories"]) &&
    isset($_GET["image"])
) {
    $name = $_GET["name"];
    $price = $_GET["price"];
    $calories = $_GET["calories"];
    $image = $_GET["image"];
    addMenu($calories, $image, $name, $price, $page);
}
if (
    isset($_GET["name"]) &&
    isset($_GET["price"]) &&
    isset($_GET["calories"]) &&
    isset($_GET["image"]) &&
    isset($_GET["edit"])
) {
    $name = $_GET["name"];
    $price = $_GET["price"];
    $calories = $_GET["calories"];
    $image = $_GET["image"];
    $id = $_GET["edit"];
    editMenu($id, $calories, $image, $name, $price, $page);
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
                <div>
                    <?php if ($insert == "1") { ?>
                    <a href="?page=<?php echo $page; ?>">
                        <button class="btn btn-primary">ย้อนกลับไปหน้าแสดงข้อมูล</button>
                    </a>
                    <?php } ?>
                    <a href="?page=<?php echo $page; ?>&insert=1">
                        <button class="btn btn-primary">
                            <i class="bi bi-plus h4"></i>
                        </button>
                    </a>
                </div>
            </div>
            <div class="card-body text-center">
                <?php if ($insert != 1 && $edit == '') { ?>
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
                        <?php
                            $row = getMenu();
                            foreach ($row as $key => $value) {
                            ?>
                        <tr>
                            <td><?php echo $value["name"]; ?></td>
                            <td><?php echo $value["price"]; ?> บาท</td>
                            <td><?php echo $value["calories"]; ?></td>
                            <td><img src="<?php echo $value["image"]; ?>" width="120" height="120"></td>
                            <td>
                                <a href="?page=<?php echo $page; ?>&edit=<?php echo $value['id']; ?>">
                                    <button class="btn btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </button>
                                </a>
                                <a href="?page=<?php echo $page; ?>&delete=<?php echo $value['id']; ?>">
                                    <button class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php } else if ($edit == '' && $insert != '') { ?>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">เพิ่มรายการอาหาร</h4>
                    </div>

                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basicInput">ชื่อ</label>
                                    <input type="text" class="form-control" id="name-menu">
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">แคลอรี่</label>
                                    <input type="number" class="form-control" id="calories-menu">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basicInput">ราคา</label>
                                    <input type="number" class="form-control" id="price-menu">
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">รูปภาพ</label>
                                    <input type="text" class="form-control" id="image-menu">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary col-3 mt-3" onclick="insertMenu()">
                            เพิ่ม
                        </button>
                    </div>
                </div>
                <?php } else { ?>
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">แก้ไขรายการอาหาร</h4>
                    </div>
                    <?php
                        $row = findMenu($edit);
                        ?>
                    <div class="card-body text-center">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basicInput">ชื่อ</label>
                                    <input type="text" class="form-control" id="name-menu-edit"
                                        value="<?php echo $row["name"]; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">แคลอรี่</label>
                                    <input type="number" class="form-control" id="calories-menu-edit"
                                        value="<?php echo $row["calories"]; ?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="basicInput">ราคา</label>
                                    <input type="number" class="form-control" id="price-menu-edit"
                                        value="<?php echo $row["price"]; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">รูปภาพ</label>
                                    <input type="text" class="form-control" id="image-menu-edit"
                                        value="<?php echo $row["image"]; ?>">
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary col-3 mt-3" onclick="editMenu()">
                            แก้ไข
                        </button>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </section>
</div>
<script>
function insertMenu() {
    const name = document.getElementById("name-menu").value;
    const calories = document.getElementById("calories-menu").value;
    const price = document.getElementById("price-menu").value;
    const image = document.getElementById("image-menu").value;
    if (name == "" || calories == "" || price == "" || image == "") {
        alert("กรุณากรอกข้อมูลให้ครบ");
    } else {
        window.location.href =
            `?page=<?php echo $page; ?>&name=${name}&calories=${calories}&price=${price}&image=${image}`;
    }
}

function editMenu() {
    const name = document.getElementById("name-menu-edit").value;
    const calories = document.getElementById("calories-menu-edit").value;
    const price = document.getElementById("price-menu-edit").value;
    const image = document.getElementById("image-menu-edit").value;
    if (name == "" || calories == "" || price == "" || image == "") {
        alert("กรุณากรอกข้อมูลให้ครบ");
    } else {
        window.location.href =
            `?page=<?php echo $page; ?>&name=${name}&calories=${calories}&price=${price}&image=${image}&edit=<?php echo $edit; ?>`;
    }
}
</script>