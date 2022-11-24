<?php require_once '../../../service/connect_db.php';
require 'vendor/autoload.php';  //เพื่อเรียกใช้ php to excel
;
if (!isset($_SESSION['AD_ID'])) {
    header('Location: ../../../login.php');
}
?>
<?php include '../../includes/header.php'; ?>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include '../../includes/sidebar.php' ?>
        <?php require '../../../service/patients/my_function/function_date.php' ?>
        <div class="pt-3 content-wrapper" id="content_profile">
            <div class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="shadow card">
                                <div class="pt-4 border-0 card-header">
                                    <h4>
                                        <i class="fas fa-user text-green"></i>
                                        การดึงสถิติทั้งหมดในระบบ
                                    </h4>  
                                    <hr>
                                    <div class="card-body">
                                        <div class="container">
 
                                            <div class="container">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <!-- start -->
                                                        <a href="export_excel.php?act=psg_stat" class="btn btn-success">สถิติ Sleep Test</a>
                                                        <a href="export_excel.php?act=cpap_stat" class="btn btn-warning">สถิติ CPAP</a>
                                                        <a href="report.php?act=m" class="btn btn-success">สถิตินัดตรวจ</a>
                                                        <a href="report.php?act=y" class="btn btn-info">ยอดขาย CPAP และอุปกรณ์</a>
                                                        <a href="report.php?act=date" class="btn btn-danger">สถิติ CPAP Education</a>

                                            <?php
                                                      $act = (isset($_GET['act']) ? $_GET['act'] : '');
                                                    if ($act == 'psg_stat') {
                                                        include 'excel_psg.php';
                                                    } elseif ($act == 'cpap_stat') {
                                                        include 'excel_cpap.php';
                                                    } elseif ($act == 'date') {
                                                        include 'report_daily.php';
                                                    } elseif ($act == 'rangedate') {
                                                        include 'report_rangedate.php';
                                                    } else {
                                                        include 'excel_psg.php';
                                                    }
                                             ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <?php include '../../includes/footer.php' ?>
                    </div>
                </div>
            </div>
</body>
</html>