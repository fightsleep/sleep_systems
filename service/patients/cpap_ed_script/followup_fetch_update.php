<?php
include '../../connect_db.php';
// echo 'Preecha10564';
// require_once '../connect.php';
// include('../my_function/function.php');
// print_r($_POST);
// exit();
if(isset($_POST["followup_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_cpaped_followup
		WHERE followup_id = '".$_POST["followup_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["followup_id"] = $row["followup_id"];
		$output["followup_hn"] = $row["followup_hn"];
		$output["followup_date"] = $row["followup_date"];
		$output["followup_detail"] = $row["followup_detail"];
		$output["followup_cpap"] = $row["followup_cpap"];
		$output["followup_setting"] = $row["followup_setting"];
		$output["followup_company"] = $row["followup_company"];
		$output["followup_appointment"] = $row["followup_appointment"];
		$output["followup_staff"] = $row["followup_staff"];
		$output["followup_chanal_next"] = $row["followup_chanal_next"];
	}
	echo json_encode($output);
}
?>
 