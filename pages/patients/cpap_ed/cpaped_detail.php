<?php  require_once '../../../service/connect_db.php' ; 
    if( !isset($_SESSION['AD_ID'] ) ){     
        header('Location: ../../../login.php');  
    }
$cpaped_id = $_GET['cpaped_id'];
if ($cpaped_id) {
    $sql_cpaped_detail = ("SELECT * FROM tbl_cpaped as cpaped
LEFT JOIN tbl_patient AS patient ON cpaped.cpaped_hn=patient.hn_patient 
LEFT JOIN tbl_cpaped_update_log AS cpaped_log ON cpaped.cpaped_id=cpaped_log.ref_cpaped_id 
 WHERE cpaped.cpaped_id = :cpaped_id
 ORDER BY id DESC
--  LEFT JOIN tbl_cpaped_update_log AS cpaped_log ON cpaped.cpaped_id=cpaped_log.ref_cpaped_id
--  WHERE cpaped.cpaped_id = :cpaped_id
 ;
 ");
    $stmt_cpaped_detail = $connection->prepare($sql_cpaped_detail);
    $stmt_cpaped_detail->execute(array(":cpaped_id" => $_GET['cpaped_id']));
    $result_cpaped_detail = $stmt_cpaped_detail->fetch(PDO::FETCH_OBJ); }
?>

<?php include('../../includes/header.php');  ?>
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
                                       รายละเอียด CPAP Education ของคุณ <?php echo $result_cpaped_detail->firstname; ?> เมื่อวันที่ <?php echo DateThai($result_cpaped_detail->cpaped_date); ?>
                                    </h4>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-9">
                                            </div>
                                            <div class="col-md-3">
                                            <a href="/sleeprama_systems/pages/patients/cpaped/form_cpaped_edit.php?cpaped_id=<?php echo $result_cpaped_detail->cpaped_id; ?>" class="mt-3 btn btn-secondary">
                    <i class="fas fa-tools"></i>
                        แก้ไข </a>
                                            <a href="javascript:history.back()" class="mt-3 btn btn-warning">
                    <i class="far fa-hand-point-left"></i>
                        กลับหน้าหลัก
                    </a>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    วันที่ได้คิว : <h5><?php echo DateThai($result_cpaped_detail->cpaped_date); ?></h5>
                                                    แผนกที่ส่งตรวจ : <h5><?php echo $result_cpaped_detail->cpaped_opd; ?></h5>
                                                    แพทย์ส่งตรวจ : <h5><?php echo $result_cpaped_detail->cpaped_doctor_refering; ?></h5>
                                                    แพทย์อ่านผล : <h5><?php echo $result_cpaped_detail->cpaped_doctor_review; ?></h5>
                                                   Technician : <h5><?php echo $result_cpaped_detail->cpaped_technician; ?></h5>
                                                </div>
                                                <div class="col-md-4">
                                                    Apnea : <h5><?php echo $result_cpaped_detail->apnea_index; ?></h5>
                                                    Hypopnae : <h5><?php echo $result_cpaped_detail->hypopnae_index; ?></h5>
                                                    AHI : <h5><?php echo $result_cpaped_detail->ahi; ?></h5>
                                                    Pre Dx : <h5><?php echo $result_cpaped_detail->cpaped_predx; ?></h5>

                                                </div>
                                                <div class="col-md-4">
                                                    RDI : <h5><?php echo $result_cpaped_detail->rdi; ?></h5>
                                                    RERA : <h5><?php echo $result_cpaped_detail->rera_index; ?></h5>
                                                    Min Sat : <h5><?php echo $result_cpaped_detail->min_sat; ?></h5>
                                                    Post Dx : <h5><?php echo $result_cpaped_detail->cpaped_postdx; ?></h5>
                                                </div>
                                            </div>
                                            <hr>
    
                                      <!-- ---------------------------- -->
<h4>การติดตามผลของคนไข้</h4>
                                      <div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table id="cpap_ed_data" class="table table-bordered table-striped table-hover" width="100%">
						<thead class="table-success">
							<tr>
								<th width="5%">ลำดับ</th>
								<th width="10%">วันที่ติดตาม</th>
								<th width="10%">วันที่ได้คิว</th>
								<th width="30%">บันทึกผลการติดตาม</th>
								<th width="15%">รุ่น CPAP</th>
                                <th width="15%">บริษัท</th>
								<th width="5%">ค่าแรงดันที่ใข้</th>
								<th width="5%">แก้ไข</th>
								<th width="5%">ลบ</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							foreach ($result_cpap_ed as $cpap_ed) {
								$i++;
							?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= $cpap_ed['cpaped_hn']; ?></td>
									<td><?= DateThai($cpap_ed['cpaped_contactdate']); ?></td>
									<td><?= DateThai($cpap_ed['cpaped_appointdate']); ?></td>
									<td><?= $cpap_ed['cpaped_opd']; ?></td>
									<td><?= $cpap_ed['cpaped_note']; ?></td>
									<td><a href="cpap_ed/cpaped_detail.php?cpaped_id=<?= $cpaped['cpaped_id']; ?>" class="btn btn-info btn-sm">view</a></td>
									<td>
										<button type="button" name="update_cpap_ed" class="btn btn-warning btn-block update_cpap_ed" id="update_cpap_ed" data-id=<?= $cpap_ed['cpaped_id']; ?>><i class="far fa-edit"></i></button>
									</td>
									<td><button type="button" name="delete_cpap_ed" class="btn btn-danger" id="delete_cpap_ed" data-id=<?= $cpap_ed['cpaped_id']; ?>><i class="far fa-trash-alt"></i></button></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div> <!--  row -->
		</div> <!--  cold-12 -->
                                      <!-- ---------------------------------------------- -->
                                            <div class="row">
                                                <div class="col-4">
                                                    <p>ผู้แก้ไขข้อมูลล่าสุด : <?php echo $result_cpaped_detail->log_edit_cpaped;  ?></p>
                                                </div>
                                                <div class="col-4">
                                                    <p>เวลาที่แก้ไขข้อมูล : <?php echo $result_cpaped_detail->date_edit_cpaped;  ?></p>
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
    </div>
    <?php include '../../includes/footer.php' ?>
    </div>
</body>
</html>