<?php
// SQL next_appoint
$sql_next_appoint = ("SELECT * FROM tbl_next_appoint as next_appoint
     WHERE next_appoint.appointment_id_fornext = :appointment_id_fornext
  ; ");
//   $appointment['appointment_id_fornext']
$stmt_next_appoint = $connection->prepare($sql_next_appoint);
$stmt_next_appoint->execute(array(":appointment_id_fornext" => $appointment['appointment_id']));
$result_next_appoint = $stmt_next_appoint->fetchAll();
// END SQL  $appointment['appointment_id_fornext']
?>
<?php require 'appointment_next_modal.php';  ?>
<div align="left">
    <button name="add" id="add_appointment_next" data-toggle="modal" data-target="#appointment_next_modal"
        class="mb-2 mt-2 btn btn-info add_data"><i class="fas fa-plus"></i> เพิ่มข้อมูลเลื่อนนัด </button>
</div>
<table id="" class="table table-bordered table-striped table-hover" width="100%">
    <thead class="table-info">
        <tr>
            <th width="3%">ลำดับ</th>
            <th width=7%">ครั้งที่เลื่อน</th>
            <th width="40%">หมายเหตุการเลื่อนนัด</th>
            <th width="10%">วันที่ติดต่อเลื่อน</th>
            <th width="5%">appoint id</th>
            <th width="5%">แก้ไข</th>
            <?php if ($_SESSION['AD_STATUS'] == 'admin') {  // มีสิทธิ์ delete เฉพาะ admin
                echo "<th width='5%'>ลบ</th> ";
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        $i = 0;
        foreach ($result_next_appoint as $next_appoint) {
            $i++;
        ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $next_appoint['nextappoint_count_postpone']; ?></td>
            <td><?= $next_appoint['nextappoint_note']; ?></td>
            <td><?= DateThai($next_appoint['nextappoint_datecontact']); ?></td>
            <td><?= $next_appoint['appointment_id_fornext']; ?></td>
            <td>
                <button type="button" name="update_next_appoint" class="btn btn-warning btn-block update_next_appoint"
                    id="update_next_appoint" data-id=<?= $next_appoint['nextappoint_id']; ?>><i
                        class="far fa-edit"></i></button>
            </td>
            <?php if ($_SESSION['AD_STATUS'] == 'admin') {  // มีสิทธิ์ delete เฉพาะ admin
                    echo "<td><button type='button' name='delete_appointment_next' class='btn btn-danger' id='delete_appointment_next'
                    data-id=" . $next_appoint['nextappoint_id'] . "><i class='far fa-trash-alt'></i></button></td>";
                } ?>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php require 'appointment_next_script.php';  ?>