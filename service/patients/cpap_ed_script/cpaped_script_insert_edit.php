<?php
// header('Content-Type: application/json');
require_once '../../connect_db.php';
echo '<pre>';
print_r($_POST);
echo '</pre>';
// exit();
if (isset($_POST["operation_cpaped"]))
{
if ($_POST["operation_cpaped"] == "Add")
{
$sql_cpaped_insert = ("INSERT INTO tbl_cpap_ed(
cpaped_hn, 
cpaped_opd, 
cpaped_chanel,
cpaped_contactdate,  
cpaped_appointdate,  
cpaped_caseproject,   
cpaped_doctor, 
cpaped_order, 
cpaped_note, 
cpaped_province, 
cpaped_expenses, 
cpaped_decision, 
cpaped_purchase_cpap, 
cpaped_staff_first,
cpaped_purchase_channel
)
VALUES (
:cpaped_hn, 
:cpaped_opd, 
:cpaped_chanel,  
:cpaped_contactdate, 
:cpaped_appointdate, 
:cpaped_caseproject, 
:cpaped_doctor, 
:cpaped_order, 
:cpaped_note, 
:cpaped_province, 
:cpaped_expenses, 
:cpaped_decision, 
:cpaped_purchase_cpap, 
:cpaped_staff_first,
:cpaped_purchase_channel
) 
");
$statement = $connection->prepare($sql_cpaped_insert);
$result = $statement->execute(array(
    ":cpaped_hn" => $_POST['cpaped_hn'],
    ":cpaped_opd" => $_POST['cpaped_opd'],
    ":cpaped_contactdate" => $_POST['cpaped_contactdate'],
    ":cpaped_appointdate" => $_POST['cpaped_appointdate'],
    ":cpaped_chanel" => $_POST['cpaped_chanel'],
    ":cpaped_caseproject" => $_POST['cpaped_caseproject'],
    ":cpaped_doctor" => $_POST['cpaped_doctor'],
    ":cpaped_order" => $_POST['cpaped_order'],
    ":cpaped_note" => $_POST['cpaped_note'],
    ":cpaped_province" => $_POST['cpaped_province'],
    ":cpaped_expenses" => $_POST['cpaped_expenses'],
    ":cpaped_decision" => $_POST['cpaped_decision'],
    ":cpaped_purchase_cpap" => $_POST['cpaped_purchase_cpap'],
    ":cpaped_staff_first" => $_POST['cpaped_staff_first'],
    ":cpaped_purchase_channel" => $_POST['cpaped_purchase_channel']
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
    if ($_POST["operation_cpaped"] == "Edit")
    {
        $sql_cpaped_update = "UPDATE tbl_cpap_ed
		SET  cpaped_id = :cpaped_id,  
        cpaped_hn = :cpaped_hn, 
        cpaped_opd = :cpaped_opd, 
        cpaped_contactdate = :cpaped_contactdate, 
        cpaped_appointdate = :cpaped_appointdate, 
        cpaped_chanel = :cpaped_chanel, 
        cpaped_doctor = :cpaped_doctor, 
        cpaped_order = :cpaped_order, 
        cpaped_note = :cpaped_note,
        cpaped_staff_first = :cpaped_staff_first,
        cpaped_province = :cpaped_province,
        cpaped_expenses = :cpaped_expenses,
        cpaped_purchase_cpap = :cpaped_purchase_cpap,
        cpaped_purchase_channel = :cpaped_purchase_channel,
        cpaped_caseproject = :cpaped_caseproject,
        cpaped_decision = :cpaped_decision
		WHERE cpaped_id = :cpaped_id";
        $statement = $connection->prepare( $sql_cpaped_update);
        $result = $statement->execute(
            array(
                ":cpaped_id" => $_POST['cpaped_id'],
                ":cpaped_hn" => $_POST['cpaped_hn'],
                ":cpaped_opd" => $_POST['cpaped_opd'],
                ":cpaped_contactdate" => $_POST['cpaped_contactdate'],
                ":cpaped_appointdate" => $_POST['cpaped_appointdate'],
                ":cpaped_chanel" => $_POST['cpaped_chanel'],
                ":cpaped_doctor" => $_POST['cpaped_doctor'],
                ":cpaped_order" => $_POST['cpaped_order'],
                ":cpaped_note" => $_POST['cpaped_note'],
                ":cpaped_staff_first" => $_POST['cpaped_staff_first'],
                ":cpaped_province" => $_POST['cpaped_province'],
                ":cpaped_expenses" => $_POST['cpaped_expenses'],
                ":cpaped_purchase_cpap" => $_POST['cpaped_purchase_cpap'],
                ":cpaped_purchase_channel" => $_POST['cpaped_purchase_channel'],
                ":cpaped_caseproject" => $_POST['cpaped_caseproject'],
                ":cpaped_decision" => $_POST['cpaped_decision']
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