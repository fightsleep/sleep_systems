<div class="tab-pane active" id="activity">
    <?php
    require 'class/list_staff.php';
    require 'class/activity.php';
    require 'class/opd_list.php';
    require 'activity_modal.php';
    require 'activity_modal_view.php';
    //  echo '<pre>';
    // print_r($result_activity);
    // echo '</pre>';
    // exit();
    ?>
    <!-- <div class="content"> -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-4 ">
                <h4>
                    <i class="fas fa-user"></i>
                    รายการ activity ของผู้ป่วย
                </h4>
                <div align="left">
                    <button name="add" id="add_activity" data-toggle="modal" data-target="#activity_modal"
                        class="mb-2 btn btn-success add_data"><i class="fas fa-plus"></i> เพิ่มข้อมูล activity </button>
                </div>
            </div> <!--  col-12 -->
        </div> <!--  row -->
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="activity_data" class="table table-bordered table-striped table-hover" width="100%">
                        <thead class="table-warning">
                            <tr>
                                <th width="5%">ลำดับ</th>
                                <th width="30%">รายการ activity</th>
                                <th width="10%">วันที่</th>
                                <th width="5%">เวลา</th>
                                <th width="5%">แผนก</th>
                                <th width="5%">note</th>
                                <th width="10%">ผู้ดำเนินการ</th>
                                <th width="5%">ช่องทาง</th>
                                <th width="5%">view</th>
                                <th width="5%">แก้ไข</th>
                                <?php if ($_SESSION['AD_STATUS'] == 'admin') {  // มีสิทธิ์ delete เฉพาะ admin
                                    echo "<th width='5%'>ลบ</th>";
                                }
                                ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($result_activity as $activity) {
                                $i++;
                            ?> <tr>
                                <td><?= $i; ?></td>
                                <td><?= $activity['activity_contact']; ?></td>
                                <td><?= DateThai($activity['activity_date']); ?></td>
                                <td><?= $activity['activity_time']; ?></td>
                                <td><?= $activity['activity_opd']; ?></td>
                                <td><?= $activity['activity_note']; ?></td>
                                <td><?= $activity['staff_name']; ?></td>
                                <td><?= $activity['activity_channel']; ?></td>
                                <td>
                                    <button type="button" name="view_activity" class="btn btn-info btn-block"
                                        id="view_activity" data-id=<?= $activity['activity_id']; ?>><i
                                            class="fa fa-eye"></i></button>
                                </td>
                                <td>
                                    <button type="button" name="upactivity_date" class="btn btn-warning btn-block"
                                        id="upactivity_date" data-id=<?= $activity['activity_id']; ?>><i
                                            class="far fa-edit"></i></button>
                                </td>
                                <?php if ($_SESSION['AD_STATUS'] == 'admin') {  // มีสิทธิ์ delete เฉพาะ admin
                                        echo "<td>
                                        <button type='button' name='delete_activity' class='btn btn-danger'
                                        id='delete_activity' data-id=" . $activity['activity_id'] . "><i class='far fa-trash-alt'></i></button>
                                         </td>";
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
require 'activity_script.php';
?>