<?php
include('../../connect_db.php');
// require_once '../connect.php';
// include("function.php");
// print_r($_POST);
if(isset($_POST["order_id"]))
{
	$sql_delete_order = "DELETE FROM tbl_order WHERE order_id = :order_id";
	$statement = $connection->prepare($sql_delete_order);
	$result = $statement->execute(
		array(
			':order_id'	=>	$_POST["order_id"]
		)
	);
	if(!empty($result))
	{
		echo 'Data Deleted';
	}
}
?>
