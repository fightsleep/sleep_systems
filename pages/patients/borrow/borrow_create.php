<?php require_once '../../../service/connect_db.php';
if (!isset($_SESSION['AD_ID'])) { //มีการ check ว่ามี session id หรือยัง ถ้าไม่มีให้เด้งกลับไปที่หน้า login
    header('Location: ../../../login.php');
}
$borrow_hn = $_GET['borrow_hn'];?>
<?php include '../../includes/header.php';?>
<div class="wrapper">
    <?php include '../../includes/sidebar.php';
require '../class/list_staff.php'; //รายชื่อเจ้าหน้าที่
require '../class/list_company.php'; //รายชื่อบริ๋ษัท
?>
    <?php
// SQL Crate borrow_create
$sql_borrow_create = ("SELECT * FROM tbl_patient
 WHERE hn_patient = :hn_patient ");
$stmt_borrow_create = $connection->prepare($sql_borrow_create);
$stmt_borrow_create->execute(array(":hn_patient" => $_GET['borrow_hn']));
$row_borrow_create = $stmt_borrow_create->fetch(PDO::FETCH_OBJ);
// SQL PSG --------------------------

?>
    <div class="content-wrapper pt-4">
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-5">
                        <h3>
                            <i class="fas fa-cart-arrow-down"></i>
                            รายการยืมอุปกรณ์ของ<?php echo "คุณ" . $row_borrow_create->firstname . "  " . $row_borrow_create->lastname; ?>
                        </h3>
                    </div>
                    <div class="col-7 d-flex justify-content-end">
                        <h4>สถานะการยืม : .....</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header bborrow_create-0 pt-4">
                                <h3 class="card-title">
                                    <i class="fas fa-cart-arrow-down"></i>
                                    ข้อมูลวันที่ยืม
                                </h3>
                                <div class="d-flex justify-content-end">
                                    <a href="borrow_cpap/print_borrow.php?hn_borrow=<?php echo $row->hn_patient; ?>" class="btn btn-info">
                                        <i class="fa fa-print" aria-hidden="true"></i> Print ใบสั่งยืม </a>
                                </div>
                            </div>
                            <form id="form_add_borrow_create">
                                <div class="card-body">
                                    <!-- <?php print_r($row_psg);?> -->
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                            <input type="hidden" name="borrow_hn" class="form-control" value="<?php echo $borrow_hn; ?>" readonly>
                                                <label for="borrow_date_contact">วันที่มาติดต่อ</label>
                                                <?php $todayDate = date('Y-m-d', strtotime('today'));
echo "<input type='date' id='borrow_date_contact' name='borrow_date_contact' class='form-control' value= '$todayDate' />"
?>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="borrow_tech_contact">เจ้าหน้าที่รับเรื่อง</label>
                                                <select class="form-control" id="borrow_tech_contact" name="borrow_tech_contact">
                                                    <option value="">-เลือกเจ้าหน้าที่-</option>
                                                    <?php foreach ($result_list_staff as $list_staff) {?> -
                                                        <option value="<?php echo $list_staff["staff_name"]; ?>">
                                                            <?php echo $list_staff["staff_name"]; ?>
                                                        </option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="borrow_date_receive">วันที่รับเครื่อง</label>
                                                <?php $todayDate = date('Y-m-d', strtotime('today'));
echo "<input type='date' id='borrow_date_receive' name='borrow_date_receive' class='form-control' value= '$todayDate' />"
?>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="borrow_tech_dem">เจ้าหน้าที่ให้ยืม</label>
                                                <select class="form-control" id="borrow_tech_dem" name="borrow_tech_dem">
                                                    <option value="">-เลือกเจ้าหน้าที่-</option>
                                                    <?php foreach ($result_list_staff as $list_staff) {?> -
                                                        <option value="<?php echo $list_staff["staff_name"]; ?>">
                                                            <?php echo $list_staff["staff_name"]; ?>
                                                        </option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <!--ปิด row -->

                                    <div class="row">
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="borrow_date_return">วันครบกำหนดคืน</label>
                                                <?php $todayDate = date('Y-m-d', strtotime('today'));
echo "<input type='date' id='borrow_date_return' name='borrow_date_return' class='form-control' value= '$todayDate' />"
?>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="borrow_date_give_back">วันที่นำมาคืน</label>
                                                <?php $todayDate = date('Y-m-d', strtotime('today'));
echo "<input type='date' id='borrow_date_give_back' name='borrow_date_give_back' class='form-control' value= '$todayDate' />"
?>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <div class="form-group">
                                                <label for="borrow_tech_return">เจ้าหน้าที่รับคืน</label>
                                                <select class="form-control" id="borrow_tech_return" name="borrow_tech_return">
                                                    <option value="">-เลือกเจ้าหน้าที่-</option>
                                                    <?php foreach ($result_list_staff as $list_staff) {?> -
                                                        <option value="<?php echo $list_staff["staff_name"]; ?>">
                                                            <?php echo $list_staff["staff_name"]; ?>
                                                        </option>
                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="borrow_note">บันทึก</label>
                                                <input type="text" id="borrow_note" name="borrow_note" class="form-control " />
                                            </div>
                                        </div>
                                    </div>

                                    <hr>
                                    <h6 class="d-flex justify-content-center">รายละเอียดอุปกรณ์</h5>
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="borrow_machine">เลือกอุปกรณ์ :</label>
                                                    <select class="form-control" id="borrow_machine" name="borrow_machine">
                                                        <option value="">เลือกอุปกรณ์</option>
                                                        <option value="CPAP">- CPAP -</option>
                                                        <option value="AutoPAP">- AutoPAP -</option>
                                                        <option value="BiPAP">- BiPAP -</option>
                                                        <option value="Palmsat ">- Palmsat -</option>
                                                        <option value="ApneaLink">- ApneaLink[4] -</option>
                                                        <option value="Titanium">- Titanium[2] -</option>
                                                        <option value="ActiWatch">- ActiWatch -</option>
                                                        <option value="Stardus">- Stardus[4] -</option>
                                                        <option value="NOX">- NOX[3] -</option>
                                                        <option value="SomnoTouchRESP">- SomnoTouchRESP[3] -</option>
                                                        <option value="NIBP">- NIBP -</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="borrow_machine_type">ประเภทอุปกรณ์ :</label>
                                                    <select class="form-control" id="borrow_machine_type" name="borrow_machine_type">
                                                        <option value="">เลือกประเภทอุปกรณ์</option>
                                                        <option value="CPAP">- CPAP -</option>
                                                        <option value="Ambu">- Ambu -</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="borrow_whose">เครื่องของ :</label>
                                                    <select class="form-control" id="borrow_whose" name="borrow_whose">
                                                        <option value="">เครื่องของ</option>
                                                        <option value="CPAP">- บริษัท -</option>
                                                        <option value="Ambu">- ศูนย์ฯ -</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div> <!-- ปิด row -->

                                        <div class="row">
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="borrow_name_cpap">ชื่อรุ่นอุปกรณ์</label>
                                                    <input type="text" id="borrow_name_cpap" name="borrow_name_cpap" class="form-control " />
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="borrow_serial">SN เครื่อง</label>
                                                    <input type="text" id="borrow_serial" name="borrow_serial" class="form-control " />
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="borrow_company">บริษัท CPAP</label>
                                                    <select class="form-control" id="borrow_company" name="borrow_company">
                                                        <option value="">-เครื่องของบริษัท-</option>
                                                        <?php foreach ($result_cpap_company as $list_company_ed) {?> -
                                                            <option value="<?php echo $list_company_ed["cpap_company_list"]; ?>">
                                                                <?php echo $list_company_ed["cpap_company_list"]; ?>
                                                            </option>
                                                        <?php }?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="">Mask ที่ใช้</label>
                                                    <input type="text" id="borrow_mask" name="borrow_mask" class="form-control " />
                                                </div>
                                            </div>

                                        </div> <!-- ปิด row -->
                                        <hr>
                                    <h6 class="d-flex justify-content-center">รายการชำระเงิน</h5>
                                    <div class="row">
                                    <div class="col-3">
                                                <div class="form-group">
                                                    <label for="borrow_service_code">CODE ชำระเงิน :</label>
                                                    <select class="form-control" id="borrow_service_code" name="borrow_service_code">
                                                        <option value="">เลือกCODE ชำระเงิน</option>
                                                        <option value="M179">- M179 -</option>
                                                        <option value="M295">- M295 -</option>
                                                        <option value="M296">- M296 -</option>
                                                        <option value="M312">- M312 -</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="borrow_status_payment">สถานะการชำระเงิน :</label>
                                                    <select class="form-control" id="borrow_status_payment" name="borrow_status_payment">
                                                        <option value="">เลือก</option>
                                                        <option value="ยังไม่ชำระ">- ยังไม่ชำระ -</option>
                                                        <option value="ชำระแล้ว">- ชำระแล้ว -</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="borrow_invoice">เลขที่ใบเสร็จ</label>
                                                    <input type="text" id="borrow_invoice" name="borrow_invoice" class="form-control " />
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <div class="form-group">
                                                    <label for="borrow_deposit">การมัดจำ :</label>
                                                    <select class="form-control" id="borrow_deposit" name="borrow_deposit">
                                                        <option value="">เลือก</option>
                                                        <option value="ยังไม่ชำระ">- ไม่มัดจำ -</option>
                                                        <option value="ชำระแล้ว">- มัดจำ -</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3">
                                                <div class="form-group">
                                                    <label for="borrow_amount_deposit">จำนวนเงินมัดจำ</label>
                                                    <input type="text" id="borrow_amount_deposit" name="borrow_amount_deposit" class="form-control " />
                                                </div>
                                            </div>
                                        </div> <!-- ปิด row -->
                                </div> <!-- ปิด card body -->
                                <div class="card-footer">
                                <button type="submit" class="btn btn-success btn-block mx-auto w-50" name="submit">บันทึกข้อมูล</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<?php include '../../includes/footer.php'?>
</div>
<!-- scripts Ajax -->
<script>
    $(function() {
        $('#form_add_borrow_create').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: '../../../service/patients/borrow_script/borrow_script_create.php',
                data: $('#form_add_borrow_create').serialize()
            }).done(function(resp) {
                Swal.fire({
                        text: 'เพิ่มข้อมูล PSG เรียบร้อย',
                        icon: 'success',
                        confirmButtonText: 'ตกลง',
                    })
                    .then((result) => {
                        window.history.back()
                    });
            })
        });
    });
</script>
</body>

</html>