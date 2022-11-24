<?php
// header('Content-Type: application/json');
require_once '../../connect_db.php';
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();
if (isset($_POST["operation_activity"]))
{
if ($_POST["operation_activity"] == "Add")
{
$sql_activity_insert = ("INSERT INTO tbl_activity (activity_hn, activity_contact, activity_date, activity_time, activity_opd, activity_note, activity_staff, activity_consultant, activity_channel) 
VALUES (:activity_hn, :activity_contact, :activity_date, :activity_time, :activity_opd, :activity_note, :activity_staff, :activity_consultant, :activity_channel) 
");
$statement = $connection->prepare($sql_activity_insert);
$result = $statement->execute(array(
    ":activity_hn" => $_POST['activity_hn'],
    ":activity_contact" => $_POST['activity_contact'],
    ":activity_date" => $_POST['activity_date'],
    ":activity_time" => $_POST['activity_time'],
    ":activity_opd" => $_POST['activity_opd'],
    ":activity_note" => $_POST['activity_note'],
    ":activity_staff" => $_POST['activity_staff'],
    ":activity_consultant" => $_POST['activity_consultant'],
    ":activity_channel" => $_POST['activity_channel'],
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
    if ($_POST["operation_activity"] == "Edit")
    {
        $sql_activity_update = "UPDATE tbl_activity
		SET  
        activity_id = :activity_id,  
        activity_contact = :activity_contact, 
        activity_date = :activity_date, 
        activity_time = :activity_time, 
        activity_opd = :activity_opd, 
        activity_note = :activity_note, 
        activity_staff = :activity_staff, 
        activity_consultant = :activity_consultant, 
        activity_channel = :activity_channel
		WHERE activity_id = :activity_id";
        $statement = $connection->prepare( $sql_activity_update);
        $result = $statement->execute(
            array(
                ":activity_id" => $_POST['activity_id'],
                ":activity_contact" => $_POST['activity_contact'],
                ":activity_date" => $_POST['activity_date'],
                ":activity_time" => $_POST['activity_time'],
                ":activity_opd" => $_POST['activity_opd'],
                ":activity_note" => $_POST['activity_note'],
                ":activity_staff" => $_POST['activity_staff'],
                ":activity_consultant" => $_POST['activity_consultant'],
                ":activity_channel" => $_POST['activity_channel'],
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