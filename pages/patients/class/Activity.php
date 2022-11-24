<?php

// class activity {
	// SQL activity
//     public function getAllactivity(){
	$sql_activity = ("SELECT * FROM tbl_activity as activity
	-- LEFT JOIN tbl_staff AS staff ON activity.activity_staff=staff.staff_id
  WHERE activity.activity_hn = :hn_patient ; ");
	$stmt_activity = $connection->prepare($sql_activity);
	$stmt_activity->execute(array(":hn_patient" => $_GET['hn_patient']));
	$result_activity = $stmt_activity->fetchAll(PDO::FETCH_ASSOC);
    return $result_activity;
//     }
// 	// END SQL
// }
?>