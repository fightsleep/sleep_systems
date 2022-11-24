<?php
//การเพิ่มข้อมูลแบบเก่าของ appz story และแบบ modal ต่างก็ส่งข่อมูลมา run ที่นี่
header('Content-Type: application/json');
require_once '../../connect_db.php';
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// borrow_hn: 9999999
// [borrow_date_contact] => 2022-09-01 /
//     [borrow_tech_contact] => วิจิตรา  /
//     [borrow_date_receive] => 2022-09-01 /
//     [borrow_tech_dem] => วรกต /
//     [borrow_date_return] => 2022-09-01  /
//     [borrow_date_give_back] => 2022-09-01 /
//     [borrow_tech_return] => วิจิตรา /
//     [borrow_note] => a  /
//     [borrow_machine] => Palmsat  /
//     [borrow_machine_type] => CPAP  /
//     [borrow_whose] => CPAP  /
//     [borrow_name_cpap] => aa /
//     [borrow_serial] => a  /
//     [borrow_company] => เอ็มดีอี  /
//     [borrow_mask] => aa  /
//     [borrow_service_code] => /
//     [borrow_status_payment] => /
//     [borrow_invoice] => /
//     [borrow_deposit] => /
//     [borrow_amount_deposit] =>
// exit();
$sql = ("INSERT INTO tbl_borrow (borrow_hn,
borrow_date_contact,
borrow_tech_contact,
borrow_date_receive,
borrow_tech_dem,
borrow_date_return,
borrow_date_give_back,
borrow_tech_return,
borrow_note,
borrow_machine,
borrow_machine_type,
borrow_whose,
borrow_name_cpap,
borrow_serial,
borrow_company,
borrow_mask,
borrow_service_code,
borrow_status_payment,
borrow_invoice,
borrow_deposit,
borrow_amount_deposit

)
VALUES (:borrow_hn, :borrow_date_contact, :borrow_tech_contact, :borrow_date_receive, :borrow_tech_dem, :borrow_date_return, :borrow_date_give_back,
:borrow_tech_return,
:borrow_note,
:borrow_machine,
:borrow_machine_type,
:borrow_whose,
:borrow_name_cpap,
:borrow_serial,
:borrow_company,
:borrow_mask,
:borrow_service_code,
:borrow_status_payment,
:borrow_invoice,
:borrow_deposit,
:borrow_amount_deposit)
");
$stmt = $connection->prepare($sql);
$stmt->execute(
    array(
        ":borrow_hn" => $_POST['borrow_hn'],
        ":borrow_date_contact" => $_POST['borrow_date_contact'],
        ":borrow_tech_contact" => $_POST['borrow_tech_contact'],
        ":borrow_date_receive" => $_POST['borrow_date_receive'],
        ":borrow_tech_dem" => $_POST['borrow_tech_dem'],
        ":borrow_date_return" => $_POST['borrow_date_return'],
        ":borrow_date_give_back" => $_POST['borrow_date_give_back'],
        ":borrow_tech_return" => $_POST['borrow_tech_return'],
        ":borrow_note" => $_POST['borrow_note'],
        ":borrow_machine" => $_POST['borrow_machine'],
        ":borrow_machine_type" => $_POST['borrow_machine_type'],
        ":borrow_whose" => $_POST['borrow_whose'],
        ":borrow_name_cpap" => $_POST['borrow_name_cpap'],
        ":borrow_serial" => $_POST['borrow_serial'],
        ":borrow_company" => $_POST['borrow_company'],
        ":borrow_mask" => $_POST['borrow_mask'],
        ":borrow_service_code" => $_POST['borrow_service_code'],
        ":borrow_status_payment" => $_POST['borrow_status_payment'],
        ":borrow_invoice" => $_POST['borrow_invoice'],
        ":borrow_deposit" => $_POST['borrow_deposit'],
        ":borrow_amount_deposit" => $_POST['borrow_amount_deposit'])
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
