<?php
include '../../connect_db.php';
// echo 'Preecha10564';
// require_once '../connect.php';
// include('../../patients/my_function/function.php');
include('function_equipment.php');
	if(isset($_POST["equipment_id"]))
	{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM list_equipment
		WHERE equipment_id = '".$_POST["equipment_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
					// --------------

		$output["equipment_id"] = $row["equipment_id"];
		$output["equipment_code"] = $row["equipment_code"];
		$output["equipment_company"] = $row["equipment_company"];
		$output["equipment_model"] = $row["equipment_model"];
		$output["equipment_type"] = $row["equipment_type"];
		$output["equipment_type_pap"] = $row["equipment_type_pap"];
		$output["equipment_serial"] = $row["equipment_serial"];
		$output["equipment_detail"] = $row["equipment_detail"];
		$output["equipment_status"] = $row["equipment_status"];
		$output["equipment_update_date"] = $row["equipment_update_date"];
		$output["equipment_note"] = $row["equipment_note"];
		$output["equipment_store"] = $row["equipment_store"];
	
		if($row["equipment_image"] != '')
		{
		$output["equipment_image"] = '<img src="../../service/sub_admin/equipment_list_script/equipment_image/'.$row["equipment_image"].'" class="img-fluid" width="300px" />
		
			<input type="text" name="hidden_equipment_image" value="'.$row["equipment_image"].'" />';
		}
		else
		{
			$output['equipment_image'] = '<input type="text" name="hidden_equipment_image" value="" />';
		}
	}
	echo json_encode($output);
}	
?>