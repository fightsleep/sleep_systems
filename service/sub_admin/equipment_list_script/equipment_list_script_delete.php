<?php
include('../../connect_db.php');
include('function_equipment.php');
// require_once '../connect.php';
// include("function.php");
// print_r($_POST);
if(isset($_POST["equipment_id"]))
{
	$equipment_image  = get_image_name($_POST["equipment_id"]);
	if($equipment_image != '')
	{
		unlink("equipment_image/".$equipment_image);
	}

	$sql_delete_equipment = "DELETE FROM list_equipment WHERE equipment_id = :equipment_id";
	$statement = $connection->prepare($sql_delete_equipment);
	$result = $statement->execute(
		array(
			':equipment_id'	=>	$_POST["equipment_id"]
		)
	);
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>
