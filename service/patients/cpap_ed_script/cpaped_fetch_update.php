<?php
include '../../connect_db.php';
// echo 'Preecha10564';
// require_once '../connect.php';
// include('../my_function/function.php');
// print_r($_POST);
// exit();
if(isset($_POST["cpaped_id"]))
{
	$output = array();
	$statement = $connection->prepare(
		"SELECT * FROM tbl_cpap_ed
		WHERE cpaped_id = '".$_POST["cpaped_id"]."' 
		LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["cpaped_id"] = $row["cpaped_id"];
		$output["cpaped_hn"] = $row["cpaped_hn"];
		$output["cpaped_contactdate"] = $row["cpaped_contactdate"];
		$output["cpaped_appointdate"] = $row["cpaped_appointdate"];
		$output["cpaped_chanel"] = $row["cpaped_chanel"];
		$output["cpaped_opd"] = $row["cpaped_opd"];
		$output["cpaped_caseproject"] = $row["cpaped_caseproject"];
		$output["cpaped_doctor"] = $row["cpaped_doctor"];
		$output["cpaped_order"] = $row["cpaped_order"];
		$output["cpaped_note"] = $row["cpaped_note"];
		$output["cpaped_province"] = $row["cpaped_province"];
		$output["cpaped_expenses"] = $row["cpaped_expenses"];
		$output["cpaped_decision"] = $row["cpaped_decision"];
		$output["cpaped_purchase_cpap"] = $row["cpaped_purchase_cpap"];
		$output["cpaped_staff_first"] = $row["cpaped_staff_first"];
		$output["cpaped_purchase_channel"] = $row["cpaped_purchase_channel"];

	}
	echo json_encode($output);
}
?>
 