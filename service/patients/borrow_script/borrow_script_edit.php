<?php
//การเพิ่มข้อมูลแบบเก่าของ appz story และแบบ modal ต่างก็ส่งข่อมูลมา run ที่นี่
header('Content-Type: application/json');
require_once '../../connect_db.php';
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();
$sql_update = "UPDATE tbl_psg
SET psg_id = :psg_id, psg_date = :psg_date, psg_old_new = :psg_old_new, psg_opd = :psg_opd, opd_ipd_psg = :opd_ipd_psg, psg_doctor_refering = :psg_doctor_refering, psg_doctor_review = :psg_doctor_review, psg_predx = :psg_predx
WHERE psg_id = :psg_id";
$stmt = $connection->prepare($sql_update);
$stmt->execute(
    array(
        ':psg_id' => $_POST["psg_id"],
        ':psg_date' => $_POST["psg_date"],
        ':psg_old_new'     => $_POST["psg_old_new"],
        ':psg_opd'  => $_POST["psg_opd"],
        ':opd_ipd_psg'   => $_POST["opd_ipd_psg"],
        ':psg_doctor_refering'      => $_POST["psg_doctor_refering"],
        ':psg_doctor_review'  => $_POST["psg_doctor_review"],
        ':psg_predx'  => $_POST["psg_predx"],

    )
);


$sql_update_log = ("INSERT INTO tbl_psg_update_log (ref_psg_id, log_edit_psg) 
VALUES (:psg_id, :user_edit_psg)
");
$stmt2 = $connection->prepare($sql_update_log);
$stmt2->execute(array(
    ":psg_id" => $_POST['psg_id'],
    ":user_edit_psg" => $_POST['user_edit_psg']
   )
);


if(!empty($result)){
    $response = array(
        'status' => true,
        'message' => 'Create Success'
    );    
 }else {
    $response = array(
        'status' => false,
        'message' => 'Not Success'
    ); 
     http_response_code(200);  //code เพิ่มข้อมูลสำเร็จ
     echo json_encode($response);
 }
?>


