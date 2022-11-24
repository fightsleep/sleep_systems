<?php
// SQL Profile
$sql_profile = ("SELECT * FROM tbl_patient as p
-- LEFT JOIN tbl_psg AS psg ON p.hn_patient=psg.psg_hn
-- LEFT JOIN tbl_physical as a ON p.hn_patient=a.physical_hn
 WHERE p.hn_patient = :hn_patient ");
$stmt = $connection->prepare($sql_profile);
$stmt->execute(array(":hn_patient" => $_GET['hn_patient']));
$row = $stmt->fetch(PDO::FETCH_OBJ);