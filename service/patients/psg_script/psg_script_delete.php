<?php
include('../../connect_db.php');
// require_once '../connect.php';
// include("function.php");
// print_r($_POST);
if(isset($_POST["psg_id"]))
{
	$sql_delete_psg = "DELETE FROM tbl_psg WHERE psg_id = :psg_id";
	$statement = $connection->prepare($sql_delete_psg);
	$result = $statement->execute(
		array(
			':psg_id'	=>	$_POST["psg_id"]
		)
	);
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>
