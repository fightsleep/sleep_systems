<?php
include('../../connect_db.php');
// require_once '../connect.php';
// include("function.php");
print_r($_POST);
if(isset($_POST["nextappoint_id"]))
{
	$sql_delete_appointment = "DELETE FROM tbl_next_appoint WHERE nextappoint_id = :nextappoint_id";
	$statement = $connection->prepare($sql_delete_appointment);
	$result = $statement->execute(
		array(
			':nextappoint_id'	=>	$_POST["nextappoint_id"]
		)
	);
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>
