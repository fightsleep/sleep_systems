<?php
// header('Content-Type: application/json');
require_once '../../connect_db.php';
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();
if (isset($_POST["operation_physical"]))
{
if ($_POST["operation_physical"] == "Add")
{
$sql_physical_insert = ("INSERT INTO tbl_physical (physical_hn, physical_date, weight, height, neck, waist, hip, pulse, blood_pressure) 
VALUES (:physical_hn, :physical_date, :weight1, :height, :neck, :waist, :hip, :pulse, :blood_pressure ) 
");
$statement = $connection->prepare($sql_physical_insert);
$result = $statement->execute(array(
    ":physical_hn" => $_POST['physical_hn'],
    ":physical_date" => $_POST['physical_date'],
    ":weight1" => $_POST['weight1'],
    ":height" => $_POST['height'],
    ":neck" => $_POST['neck'],
    ":waist" => $_POST['waist'],
    ":hip" => $_POST['hip'],
    ":pulse" => $_POST['pulse_rate'],
    ":blood_pressure" => $_POST['blood_pressure']
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
    if ($_POST["operation_physical"] == "Edit")
    {
        $sql_physical_update = "UPDATE tbl_physical
		SET  physical_id = :physical_id, physical_date = :physical_date, weight = :weight1, height = :height, neck = :neck, waist = :waist, hip = :hip, pulse = :pulse, blood_pressure = :blood_pressure
		WHERE physical_id = :physical_id";
        $statement = $connection->prepare( $sql_physical_update);
        $result = $statement->execute(
            array(
                ":physical_id" => $_POST['physical_id'],
                ":physical_date" => $_POST['physical_date'],
                ":weight1" => $_POST['weight1'],
                ":height" => $_POST['height'],
                ":neck" => $_POST['neck'],
                ":waist" => $_POST['waist'],
                ":hip" => $_POST['hip'],
                ":pulse" => $_POST['pulse_rate'],
                ":blood_pressure" => $_POST['blood_pressure'],
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