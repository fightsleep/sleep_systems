<?php
  // SQL CPAP Ed
  $sql_cpap_ed = "SELECT * FROM tbl_cpap_ed as cpap_ed
  WHERE cpap_ed.cpaped_hn = :hn_patient
  ORDER BY cpaped_id DESC
  LIMIT 1
  ; ";
  $stmt_cpap_ed = $connection->prepare($sql_cpap_ed);
  $stmt_cpap_ed->execute(array(":hn_patient" => $_GET['hn_patient']));
  $result_cpap_ed = $stmt_cpap_ed->fetch(PDO::FETCH_OBJ);
//----------------------------------------------------
// SQL followup
$sql_followup = ("SELECT * FROM tbl_cpaped_followup
WHERE followup_hn = :hn_patient
ORDER BY followup_id DESC; ");
$stmt_followup = $connection->prepare($sql_followup);
$stmt_followup->execute(array(":hn_patient" => $_GET['hn_patient']));
$result_followup = $stmt_followup->fetchAll(PDO::FETCH_ASSOC);
  
  ?>
  