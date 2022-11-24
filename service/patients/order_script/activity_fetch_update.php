<?php
include '../../connect_db.php';
// echo 'Preecha10564';
// require_once '../connect.php';
// include('../my_function/function.php');
require('../my_function/function_date.php');
if(isset($_POST["activity_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_activity 
		WHERE activity_id = '".$_POST["activity_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		// $sub_array[] = DateBirth($row['birthdate']);
		$output["activity_id"] = $row["activity_id"];
		$output["activity_hn"] = $row["activity_hn"];
		$output["activity_contact"] = $row["activity_contact"];
		$output["activity_date"] = $row['activity_date'];
		$output["activity_time"] = $row["activity_time"];
		$output["activity_opd"] = $row["activity_opd"];
		$output["activity_note"] = $row["activity_note"];
		$output["activity_staff"] = $row["activity_staff"];
		$output["activity_consultant"] = $row["activity_consultant"];
		$output["activity_channel"] = $row["activity_channel"];
		// $output["blood_pressure"] = $row["blood_pressure"];
	}
	echo json_encode($output);
}
?>
 