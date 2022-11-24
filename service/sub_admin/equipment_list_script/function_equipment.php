<?php

function upload_image()
{
	if(isset($_FILES["equipment_image"]))
	{
		$extension = explode('.', $_FILES['equipment_image']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = './equipment_image/' . $new_name;
		move_uploaded_file($_FILES['equipment_image']['tmp_name'], $destination);
		return $new_name;
	}
}

function get_image_name($equipment_id)
{
	include('../../connect_db.php');
	$statement = $connection->prepare("SELECT equipment_image FROM list_equipment WHERE equipment_id = '$equipment_id'");
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		return $row["equipment_image"];
	}
}

function get_total_all_records()
{
	include('../../connect_db.php');
	// require_once '../connect.php';
	$statement = $connection->prepare("SELECT * FROM list_equipment");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>