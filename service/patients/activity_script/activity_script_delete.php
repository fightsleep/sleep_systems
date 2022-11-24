<?php
include('../../connect_db.php');
// require_once '../connect.php';
// include("function.php");
// print_r($_POST);
if(isset($_POST["activity_id"]))
{
	$sql_delete_activity = "DELETE FROM tbl_activity WHERE activity_id = :activity_id";
	$statement = $connection->prepare($sql_delete_activity);
	$result = $statement->execute(
		array(
			':activity_id'	=>	$_POST["activity_id"]
		)
	);
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>
