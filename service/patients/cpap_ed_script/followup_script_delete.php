<?php
include('../../connect_db.php');
// require_once '../connect.php';
// include("function.php");
print_r($_POST);
// exit();
if(isset($_POST["followup_id"]))
{
	$sql_delete_activity = "DELETE FROM tbl_cpaped_followup WHERE followup_id = :followup_id";
	$statement = $connection->prepare($sql_delete_activity);
	$result = $statement->execute(
		array(
			':followup_id'	=>	$_POST["followup_id"]
		)
	);
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>