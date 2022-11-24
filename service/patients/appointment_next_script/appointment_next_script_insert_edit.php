<?php
// header('Content-Type: application/json');
require_once '../../connect_db.php';
echo '<pre>';
print_r($_POST);
echo '</pre>';
// exit();
if (isset($_POST["operation_appointment_next"]))
{
if ($_POST["operation_appointment_next"] == "Add")
{
$sql_appointment_next_insert = ("INSERT INTO tbl_next_appoint(
nextappoint_count_postpone, 
nextappoint_note, 
appointment_id_fornext,
nextappoint_datecontact, 
nextappoint_date, 
nextappoint_staff) 
VALUES(
:nextappoint_count_postpone, 
:nextappoint_note, 
:appointment_id_fornext, 
:nextappoint_datecontact, 
:nextappoint_date, 
:nextappoint_staff) 
");
$statement = $connection->prepare($sql_appointment_next_insert);
$result = $statement->execute(array(
    ":nextappoint_count_postpone" => $_POST['nextappoint_count_postpone'],
    ":nextappoint_note" => $_POST['nextappoint_note'],
    ":appointment_id_fornext" => $_POST['appointment_id_fornext'],
    ":nextappoint_datecontact" => $_POST['nextappoint_datecontact'],
    ":nextappoint_date" => $_POST['nextappoint_date'],
    ":nextappoint_staff" => $_POST['nextappoint_staff'],
   )
);
if (!empty($result))
{
    echo 'Inserted Success';
}else{
    echo 'Inserted Not Success';
}

}
    //------ Start ถ้า $_POST "operation" == Edit  
    if ($_POST["operation_appointment_next"] == "Edit")
    {
        $sql_appointment_next_update = "UPDATE tbl_appointment_next
		SET  appointment_next_id = :appointment_next_id,  nextappoint_datecontact = :nextappoint_datecontact, nextappoint_date = :nextappoint_date, nextappoint_count_postpone = :nextappoint_count_postpone, nextappoint_note = :nextappoint_note,  = :, nextappoint_staff = :nextappoint_staff
		WHERE appointment_next_id = :appointment_next_id";
        $statement = $connection->prepare( $sql_appointment_next_update);
        $result = $statement->execute(
            array(
                ":appointment_next_id" => $_POST['appointment_next_id'],
                ":nextappoint_datecontact" => $_POST['nextappoint_datecontact'],
                ":nextappoint_date" => $_POST['nextappoint_date'],
                ":nextappoint_count_postpone" => $_POST['nextappoint_count_postpone'],
                ":nextappoint_note" => $_POST['nextappoint_note'],
                ":" => $_POST[''],
                ":nextappoint_staff" => $_POST['nextappoint_staff']
            )
        );
        if (!empty($result))
        {
            echo 'Updated Success';
        }else{
            echo 'Updated Not Success';
        } 
    }
    http_response_code(200);  //code เพิ่มข้อมูลสำเร็จ
    echo json_encode($response);
}