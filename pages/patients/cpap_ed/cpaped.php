<div class="tab-pane" id="cpap_ed">
    <?php
	require 'class/list_staff.php';  //รายชื่อเจ้าหน้าที่
	require 'class/opd_list.php'; //รายชื่อ OPD
	require 'class/list_province.php'; //รายชื่อจังหวัด
	require 'class/list_company.php'; //รายชื่อบริ๋ษัท
	require 'cpaped_modal.php';
	require 'cpaped_followup_modal.php';
	require 'cpaped_select.php';   //เรียกข้อมูลมาแสดง
	//  echo '<pre>';
	// print_r($result_cpap_company1);
	// echo '</pre>';
	// exit();
	?>
    <!-- <div class="content"> -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-4 ">
                <h4>
                    <i class="fas fa-user"></i>
                    รายการ CPAP EDUCATION ของผู้ป่วย
                </h4>
                <div align="left">
                    <button name="add" id="add_cpaped" data-toggle="modal" data-target="#cpaped_modal"
                        class="mb-2 btn btn-success add_data"><i class="fas fa-plus"></i> เพิ่มข้อมูล cpap ed </button>
                    <button name="edit" id="edit_cpaped" data-toggle="modal" data-target="#cpaped_modal"
                        class="mb-2 btn btn-warning add_data" data-id=<?php echo $result_cpap_ed->cpaped_id; ?>><i
                            class="fas fa-plus"></i> แก้ไขข้อมูล cpap ed </button>
                </div>
            </div> <!--  col-12 -->
        </div> <!--  row <?php echo $result_cpap_ed->cpaped_id; ?> -->

        <div class="row">
            <div class="col-12">

                <!-- <?php print_r($result_cpap_ed);   ?> -->
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="cpaped_contactdate">วันที่ติดต่อครั้งแรก</label>
                            <input type='text' id='cpaped_contactdate' name='cpaped_contactdate' class='form-control'
                                value="<?php echo DateThai($result_cpap_ed->cpaped_contactdate);  ?>" readonly />
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="">วันที่ได้คิวเข้า class</label>
                            <input type='text' id='cpaped_appointdate' name='cpaped_appointdate' class='form-control'
                                value="<?php echo DateThai($result_cpap_ed->cpaped_appointdate);  ?>" readonly />
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="">ช่องทางที่สะดวกเข้า ed</label>
                            <input type='text' id='cpaped_chanel' name='cpaped_chanel' class='form-control'
                                value="<?php echo $result_cpap_ed->cpaped_chanel;  ?>" readonly />
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="cpaped_opd">OPD</label>
                            <input type='text' id='cpaped_opd' name='cpaped_opd' class='form-control'
                                value="<?php echo $result_cpap_ed->cpaped_opd;  ?>" readonly />
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="cpaped_caseproject">project :</label>
                            <input type='text' id='cpaped_caseproject' name='cpaped_caseproject' class='form-control'
                                value="<?php echo $result_cpap_ed->cpaped_caseproject;  ?>" readonly />
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="">แพทย์ Education</label>
                            <input type='text' id='cpaped_doctor' name='cpaped_doctor' class='form-control'
                                value="<?php echo $result_cpap_ed->cpaped_doctor;  ?>" readonly />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cpaped_order">Order จากแพทย์</label>
                            <input type='text' id='cpaped_order' name='cpaped_order' class='form-control'
                                value="<?php echo $result_cpap_ed->cpaped_order;  ?>" readonly />
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="cpaped_note">หมายเหตุ</label>
                            <input type='text' id='cpaped_note' name='cpaped_note' class='form-control'
                                value="<?php echo $result_cpap_ed->cpaped_note;  ?>" readonly />
                        </div>
                    </div>

                </div>

                <!--  start ผู้ดำเนินการ -->
                <div class="row">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="cpaped_province">จังหวัด</label>
                            <input type='text' id='cpaped_province' name='cpaped_province' class='form-control'
                                value="<?php echo $result_cpap_ed->cpaped_province;  ?>" readonly />
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-group">
                            <label for="cpaped_expenses">ค่าใช้จ่าย</label>
                            <input type='text' id='cpaped_expenses' name='cpaped_expenses' class='form-control'
                                value="<?php echo $result_cpap_ed->cpaped_expenses;  ?>" readonly />
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-group">
                            <label for="cpaped_staff">เจ้าหน้าที่รับเรื่อง</label>
                            <input type='text' id='cpaped_staff_first' name='cpaped_staff_first' class='form-control'
                                value="<?php echo $result_cpap_ed->cpaped_staff_first;  ?>" readonly />
                        </div>
                    </div>
                    <!-- ----- -->
                    <div class="col-2">
                        <div class="form-group">
                            <label for="cpaped_decision">การตัดสินใจ :</label>
                            <input type='text' id='cpaped_decision' name='cpaped_decision' class='form-control'
                                value="<?php echo $result_cpap_ed->cpaped_decision;  ?>" readonly />
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="cpaped_purchase_cpap">ตัดสินใจซื้อเครื่อง</label>
                            <input type='text' id='cpaped_purchase_cpap' name='cpaped_purchase_cpap'
                                class='form-control' value="<?php echo $result_cpap_ed->cpaped_purchase_cpap;  ?>"
                                readonly />
                        </div>
                    </div>

                    <div class="col-2">
                        <div class="form-group">
                            <label for="cpaped_purchase_channel">ช่องทางที่สั่งซื้อ :</label>
                            <input type='text' id='cpaped_purchase_channel' name='cpaped_purchase_channel'
                                class='form-control' value="<?php echo $result_cpap_ed->cpaped_purchase_channel;  ?>"
                                readonly />
                        </div>
                    </div>
                </div>
                <!-- ---------- -->

            </div>
        </div>
        <div align="left">
            <button name="add_cpaped_followup" id="add_cpaped_followup" data-toggle="modal"
                data-target="#followup_modal" class="mb-2 btn btn-info add_data"><i class="fas fa-plus"></i> เพิ่มข้อมูล
                Follow Up </button>

        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="table-responsive">
                    <table id="cpap_ed_data" class="table table-bordered table-striped table-hover" width="100%">
                        <thead class="table-warning">
                            <tr>
                                <th width="2%">ติดตามครั้งที่</th>
                                <th width="5%">วันที่ติดตาม</th>
                                <th width="20%">อาการทีติดตาม</th>
                                <th width="5%">เครื่องที่ใช้</th>
                                <th width="10%">ค่าแรงดันที่ใช้</th>
                                <th width="5%">บริษัท CPAP</th>
                                <th width="7%">นัดครั้งถัดไป</th>
                                <th width="5%">ช่องทางนัดครั้งถัดไป</th>
                                <th width="5%">เจ้าหน้าที่</th>
                                <th width="3%">ดู</th>
                                <th width="3%">แก้ไข</th>
                                <?php if ($_SESSION['AD_STATUS'] == 'admin') {  // มีสิทธิ์ delete เฉพาะ admin
									echo "<th width='3%'>ลบ</th>";
								}
								?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
							$i = 0;
							foreach ($result_followup as $followup) {
								$i++;
							?>
                            <tr>
                                <td><?= $i; ?></td>
                                <td><?= DateThai($followup['followup_date']); ?></td>
                                <td><?= $followup['followup_detail']; ?></td>
                                <td><?= $followup['followup_cpap']; ?></td>
                                <td><?= $followup['followup_setting']; ?></td>
                                <td><?= $followup['followup_company']; ?></td>
                                <td><?= DateThai($followup['followup_appointment']); ?></td>
                                <td><?= $followup['followup_chanal_next']; ?></td>
                                <td><?= $followup['followup_staff']; ?></td>
                                <td><a href="cpap_ed/cpaped_detail.php?cpaped_id=<?= $cpaped['cpaped_id']; ?>"
                                        class="btn btn-info btn-sm">view</a></td>
                                <td>
                                    <button type="button" name="edit_followup"
                                        class="btn btn-warning btn-block edit_followup" id="edit_followup"
                                        data-id=<?= $followup['followup_id']; ?>><i class="far fa-edit"></i></button>
                                </td>
                                <?php if ($_SESSION['AD_STATUS'] == 'admin') {  // มีสิทธิ์ delete เฉพาะ admin
										echo "<td><button type='button' name='delete_followup' class='btn btn-danger'
                                        id='delete_followup' data-id=" . $followup['followup_id'] . "><i
                                            class='far fa-trash-alt'></i></button></td>";
									} ?>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div> <!--  row -->
        </div> <!--  cold-12 -->
    </div> <!--  container-fluid -->
    <!-- </div>   content -->
</div> <!--  tab -->
<?php
require 'cpaped_script.php';
require 'cpaped_followup_script.php';
?>