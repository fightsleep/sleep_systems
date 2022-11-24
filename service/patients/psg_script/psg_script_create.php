<?php
//การเพิ่มข้อมูลแบบเก่าของ appz story และแบบ modal ต่างก็ส่งข่อมูลมา run ที่นี่
header('Content-Type: application/json');
require_once '../../connect_db.php';
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();
$sql = ("INSERT INTO tbl_psg (psg_hn, psg_date, psg_old_new, psg_opd, psg_opd_ipd, psg_doctor_refering, psg_doctor_review, psg_predx)
VALUES (:psg_hn, :psg_date, :psg_old_new, :psg_opd, :psg_opd_ipd, :psg_doctor_refering, :psg_doctor_review, :psg_predx)
");
$stmt = $connection->prepare($sql);
$stmt->execute(array(
    ":psg_hn" => $_POST['psg_hn'],
    ":psg_date" => $_POST['psg_date'],
    ":psg_old_new" => $_POST['psg_old_new'],
    ":psg_opd" => $_POST['psg_opd'],
    ":psg_opd_ipd" => $_POST['psg_opd_ipd'],
    ":psg_doctor_refering" => $_POST['psg_doctor_refering'],
    ":psg_doctor_review" => $_POST['psg_doctor_review'],
    ":psg_predx" => $_POST['psg_predx'],
)
);
if (!empty($result)) {
    $response = array(
        'status' => true,
        'message' => 'Create Success',
    );
} else {
    $response = array(
        'status' => false,
        'message' => 'Not Success',
    );
}
http_response_code(200); //code เพิ่มข้อมูลสำเร็จ
echo json_encode($response);
