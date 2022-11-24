<?php require_once '../../../service/connect_db.php';
if (!isset($_SESSION['AD_ID'])) {      //มีการ check ว่ามี session id หรือยัง ถ้าไม่มีให้เด้งกลับไปที่หน้า login
    header('Location: ../../../login.php');
}
$hn_borrow = $_GET['borrow_hn'];  ?>
<?php include('../../includes/header.php'); ?>
<div class="wrapper">
    <?php include '../../includes/sidebar.php';
    // require 'borrow_modal_add.php';
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
            <h3>
                                    <i class="fas fa-cart-arrow-down"></i>
                                    รายการยืมอุปกรณ์ของ<?php echo "คุณ" . $row_borrow_create->firstname . "  " . $row_borrow_create->lastname; ?>
                                </h3>
                <div class="row">
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header bborrow_create-0 pt-4">
                                <h3 class="card-title">
                                    <i class="fas fa-cart-arrow-down"></i>
                                   ข้อมูลการยืมเบื้องต้น
                                </h3>
                                <div class="d-flex justify-content-end">
                                <a href="borrow_cpap/print_borrow.php?hn_borrow=<?php echo $row->hn_patient;?>" class="btn btn-info" >
								<i class="fa fa-print" aria-hidden="true"></i> Print ใบสั่งยืม </a>
                                </div>
                            </div>
                            <form id="form_add_borrow_create">
                                <div class="card-body">
                                    <!-- <?php print_r($row_psg);   ?> -->
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="date_buy">วันที่มาติดต่อ</label>
                                                <?php $todayDate = date('Y-m-d', strtotime('today'));
                                                echo  "<input type='date' id='date_buy' name='date_buy' class='form-control' value= '$todayDate' />"
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="date_receive">วันที่รับเครื่อง</label>
                                                <?php $todayDate = date('Y-m-d', strtotime('today'));
                                                echo  "<input type='date' id='date_receive' name='date_receive' class='form-control' value= '$todayDate' />"
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="">Level</label>
                                                <input type="text" id="staff_level" name="staff_level" class="form-control " value="" placeholder="กรอกตำแหน่ง" />
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="form-group">
                                                <label for="staff_status">สถานะ</label>
                                                <div class="form-group">
                                                    <select class="form-control" id="staff_status" name="staff_status">
                                                        <option value="คงสภาพ">คงสภาพ</option>
                                                        <option value="พ้นสภาพ">พ้นสภาพ</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="">วันที่ทำ sleep test ล่าสุด</label>
                                                <input type='text' id='date_buy' name='date_buy' class='form-control' value="<?php echo $row_psg->psg_date; ?>" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="">name</label>
                                                <input type="text" id="name" name="name" class="form-control " value="" placeholder="กรอกตำแหน่ง" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="">email</label>
                                                <input type="text" id="email" name="email" class="form-control " value="" placeholder="กรอกตำแหน่ง" />
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <div class="card-footer">
                                 
                                </div>
                            </form>
            
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card">
                            <div class="card-header bborrow_create-0 pt-4">
                                <h3 class="card-title">
                                    <i class="fas fa-cart-arrow-down"></i>
                                   ข้อมูลการยืมเบื้องต้น
                                </h3>
                                <div class="d-flex justify-content-end">
                                <a href="borrow_cpap/print_borrow.php?hn_borrow=<?php echo $row->hn_patient;?>" class="btn btn-info" >
								<i class="fa fa-print" aria-hidden="true"></i> Print ใบสั่งยืม </a>
                                </div>
                            </div>
                            <form id="form_add_borrow_create">
                                <div class="card-body">
                                    <!-- <?php print_r($row_psg);   ?> -->
                                    <div class="row">
                                     
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="date_receive">วันที่มาติดต่อ</label>
                                                <?php $todayDate = date('Y-m-d', strtotime('today'));
                                                echo  "<input type='date' id='date_receive' name='date_receive' class='form-control' value= '$todayDate' />"
                                                ?>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="form-group">
                                                <label for="date_receive">เจ้าหน้าที่ติดต่อ</label>
                                                <?php $todayDate = date('Y-m-d', strtotime('today'));
                                                echo  "<input type='date' id='date_receive' name='date_receive' class='form-control' value= '$todayDate' />"
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="">วันที่ทำ sleep test ล่าสุด</label>
                                                <input type='text' id='date_buy' name='date_buy' class='form-control' value="<?php echo $row_psg->psg_date; ?>" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="">name</label>
                                                <input type="text" id="name" name="name" class="form-control " value="" placeholder="กรอกตำแหน่ง" />
                                            </div>
                                        </div>
                                        <div class="col-4">
                                            <div class="form-group">
                                                <label for="">email</label>
                                                <input type="text" id="email" name="email" class="form-control " value="" placeholder="กรอกตำแหน่ง" />
                                            </div>
                                        </div>
                                    </div>
                                </div>  
                                <div class="card-footer">
                                 
                                </div>
                            </form>
            
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-block mx-auto w-50" name="submit">บันทึกข้อมูล</button>
            </div>

        </div>
    </div>
</div>
<?php include '../../includes/footer.php' ?>
</div>
    <!-- scripts Ajax -->
    <script>
        $(function() {
            $('#formData').on('submit', function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: '../../../service/patients/psg_script/psg_script_create.php',
                    data: $('#formData').serialize()
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