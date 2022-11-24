<?php
// header('Content-Type: application/json');
include '../../connect_db.php';
include 'function_equipment.php';
// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
// exit();
if (isset($_POST["operation_equipment"])) {
    $equipment_image = '';
    if ($_FILES["equipment_image"]["name"] != '') {
        $equipment_image = upload_image();
    }

    if ($_POST["operation_equipment"] == "Add") {
        $sql_equipment_insert = ("INSERT INTO list_equipment 
(
equipment_code, 
equipment_model, 
equipment_type, 
equipment_type_pap, 
equipment_serial, 
equipment_company,
equipment_detail,
equipment_status,
equipment_store,
equipment_update_date,
equipment_note,
equipment_image
) 
VALUES 
(:equipment_code, 
:equipment_model, 
:equipment_type, 
:equipment_type_pap, 
:equipment_serial, 
:equipment_company, 
:equipment_detail,
:equipment_status,
:equipment_store,
:equipment_update_date,
:equipment_note,
:equipment_image
) 
");
        $statement = $connection->prepare($sql_equipment_insert);
        $result = $statement->execute(
            array(
                ":equipment_code" => $_POST['equipment_code'],
                ":equipment_model" => $_POST['equipment_model'],
                ":equipment_type" => $_POST['equipment_type'],
                ":equipment_type_pap" => $_POST['equipment_type_pap'],
                ":equipment_serial" => $_POST['equipment_serial'],
                ":equipment_company" => $_POST['equipment_company'],
                ":equipment_detail" => $_POST['equipment_detail'],
                ":equipment_status" => $_POST['equipment_status'],
                ":equipment_store" => $_POST['equipment_store'],
                ":equipment_update_date" => $_POST['equipment_update_date'],
                ":equipment_note" => $_POST['equipment_note'],
                ":equipment_image" => $equipment_image
            )
        );
        if (!empty($result)) {
            echo 'Inserted Success';
        } else {
            echo 'Inserted Not Success';
        }
    }
    //------ Start ถ้า $_POST "operation" == Edit    <img src="../../service/sub_admin/equipment_list_script/equipment_image/'.$equipment["equipment_image"].
    if ($_POST["operation_equipment"] == "Edit") {
        $equipment_image = '';
        if ($_FILES["equipment_image"]["name"] != '')
        //  if($_FILES["../../service/sub_admin/equipment_list_script/equipment_image/"]["name"] != '')
        {
            $equipment_image = $_POST["hidden_equipment_image"];
            //$equipment_image = upload_image();
        } else {
            $equipment_image = $_POST["hidden_equipment_image"];
        }


        $sql_equipment_update = "UPDATE list_equipment
		SET  
        equipment_id = :equipment_id,
        equipment_code = :equipment_code,
        equipment_name  = :equipment_name,
        equipment_model = :equipment_model,
        equipment_type = :equipment_type, 
        equipment_download_type = : equipment_download_type,
        equipment_type_pap  = :equipment_type_pap , 
        equipment_serial = :equipment_serial,
        equipment_selling_price = :equipment_selling_price,
        equipment_wholesale_price = :equipment_wholesale_price,
        equipment_company = :equipment_company,
        equipment_detail = :equipment_detail,
        equipment_status = :equipment_status,
        equipment_store = :equipment_store,
        equipment_update_date = :equipment_update_date,
        equipment_note = :equipment_note,
        equipment_image = :equipment_image
		WHERE equipment_id = :equipment_id";
        $statement = $connection->prepare($sql_equipment_update);
        $result = $statement->execute(
            array(
                ":equipment_id" => $_POST['equipment_id'],
                ":equipment_code" => $_POST['equipment_code'],
                ":equipment_name" => $_POST['equipment_name'],
                ":equipment_model" => $_POST['equipment_model'],
                ":equipment_type" => $_POST['equipment_type'],
                ":equipment_download_type" => $_POST['equipment_download_type'],
                ":equipment_type_pap" => $_POST['equipment_type_pap'],
                ":equipment_serial" => $_POST['equipment_serial'],
                ":equipment_selling_price" => $_POST['equipment_selling_price'],
                ":equipment_wholesale_price" => $_POST['equipment_wholesale_price'],
                ":equipment_company" => $_POST['equipment_company'],
                ":equipment_detail" => $_POST['equipment_detail'],
                ":equipment_status" => $_POST['equipment_status'],
                ":equipment_store" => $_POST['equipment_store'],
                ":equipment_update_date" => $_POST['equipment_update_date'],
                ":equipment_note" => $_POST['equipment_note'],
                ":equipment_image" => $equipment_image
            )
        );
        if (!empty($result)) {
            echo 'Updated Success';
        } else {
            echo 'Updated Not Success';
        }
    }
    http_response_code(200);  //code เพิ่มข้อมูลสำเร็จ
    echo json_encode($response);
}