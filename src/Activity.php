<?php
include 'connect_db.php';
class activity {
	// SQL activity
    public function getAllactivity(){
	$sql_activity = ("SELECT * FROM tbl_activity as activity
  WHERE activity.activity_hn = :hn_patient ; ");
	$stmt_activity = $connection->prepare($sql_activity);
	$stmt_activity->execute(array(":hn_patient" => $_GET['hn_patient']));
	$result_activity = $stmt_activity->fetchAll();
    return $result_activity;
    }
	// END SQL
}
?>