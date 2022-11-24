<?php
// header('Content-Type: application/json');
require_once '../../connect_db.php';
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();
if (isset($_POST["operation_followup"]))
{
if ($_POST["operation_followup"] == "Add")
{
$sql_cpaped_insert = ("INSERT INTO tbl_cpaped_followup(
followup_hn, 
followup_date, 
followup_setting,
followup_detail,  
followup_cpap,  
followup_company,   
followup_staff, 
followup_chanal_next, 
followup_appointment
)
VALUES (
:followup_hn, 
:followup_date, 
:followup_setting,  
:followup_detail, 
:followup_cpap, 
:followup_company, 
:followup_staff, 
:followup_chanal_next, 
:followup_appointment
) 
");
$statement = $connection->prepare($sql_cpaped_insert);
$result = $statement->execute(array(
    ":followup_hn" => $_POST['followup_hn'],
    ":followup_date" => $_POST['followup_date'],
    ":followup_detail" => $_POST['followup_detail'],
    ":followup_cpap" => $_POST['followup_cpap'],
    ":followup_setting" => $_POST['followup_setting'],
    ":followup_company" => $_POST['followup_company'],
    ":followup_staff" => $_POST['followup_staff'],
    ":followup_chanal_next" => $_POST['followup_chanal_next'],
    ":followup_appointment" => $_POST['followup_appointment']
   )
);
if (!empty($result ))
{
    echo 'Inserted Success';
}else{
    echo 'Inserted Not Success';
}

}
    //------ Start ถ้า $_POST "operation" == Edit  
    if ($_POST["operation_followup"] == "Edit")
    {
        $sql_cpaped_update = "UPDATE tbl_cpaped_followup
		SET  followup_id = :followup_id,  
        followup_hn = :followup_hn, 
        followup_date = :followup_date, 
        followup_detail = :followup_detail, 
        followup_cpap = :followup_cpap, 
        followup_setting = :followup_setting, 
        followup_staff = :followup_staff, 
        followup_chanal_next = :followup_chanal_next, 
        followup_appointment = :followup_appointment,
        followup_company = :followup_company
		WHERE followup_id = :followup_id";
        $statement = $connection->prepare( $sql_cpaped_update);
        $result = $statement->execute(
            array(
                ":followup_id" => $_POST['followup_id'],
                ":followup_hn" => $_POST['followup_hn'],
                ":followup_date" => $_POST['followup_date'],
                ":followup_detail" => $_POST['followup_detail'],
                ":followup_cpap" => $_POST['followup_cpap'],
                ":followup_setting" => $_POST['followup_setting'],
                ":followup_staff" => $_POST['followup_staff'],
                ":followup_chanal_next" => $_POST['followup_chanal_next'],
                ":followup_appointment" => $_POST['followup_appointment'],
                ":followup_company" => $_POST['followup_company']
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