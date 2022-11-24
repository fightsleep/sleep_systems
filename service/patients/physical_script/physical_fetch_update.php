<?php
include '../../connect_db.php';
// echo 'Preecha10564';
// require_once '../connect.php';
include('../my_function/function.php');
if(isset($_POST["physical_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_physical 
		WHERE physical_id = '".$_POST["physical_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["physical_id"] = $row["physical_id"];
		$output["physical_hn"] = $row["physical_hn"];
		$output["physical_date"] = $row["physical_date"];
		$output["weight1"] = $row["weight"];
		$output["height"] = $row["height"];
		$output["neck"] = $row["neck"];
		$output["waist"] = $row["waist"];
		$output["hip"] = $row["hip"];
		$output["pulse_rate"] = $row["pulse"];
		$output["blood_pressure"] = $row["blood_pressure"];
		// $output["blood_pressure"] = $row["blood_pressure"];
	}
	echo json_encode($output);
}
?>