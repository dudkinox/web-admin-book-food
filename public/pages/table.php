<?php
require_once "services/booking/booking-service.php";
$header = $page == "" ? "จัดการโต๊ะ" : $page;
$detail = $page == "" ?
    "
สามารถค้นหาข้อมูลโต๊ะได้ที่นี่
แสดงโต๊ะว่าง กับไม่ว่าง
สามารถลบ และเพิ่มโต๊ะได้
" : "";
?>
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">เพิ่มโต๊ะ</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body" id="show-menu"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">ปิด</span>
                </button>
            </div>
        </div>
    </div>
</div>
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
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModalLong">
                    <i class="bi bi-plus"></i>
                </button>
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
                        <!-- <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <button class="btn btn-danger">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>