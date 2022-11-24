<?php
include('../../connect_db.php');
// require_once '../connect.php';
// include("function.php");
print_r($_POST);
if(isset($_POST["physical_id"]))
{
	$sql_delete_physical = "DELETE FROM tbl_physical WHERE physical_id = :physical_id";
	$statement = $connection->prepare($sql_delete_physical);
	$result = $statement->execute(
		array(
			':physical_id'	=>	$_POST["physical_id"]
		)
	);
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>
