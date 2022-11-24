<?php
    // SQL physical
    $sql_physical = ("SELECT * FROM tbl_physical as physical
  WHERE physical.physical_hn = :hn_patient
  ORDER BY physical_date DESC; ");
    $stmt_physical = $connection->prepare($sql_physical);
    $stmt_physical->execute(array(":hn_patient" => $_GET['hn_patient']));
    $result_physical = $stmt_physical->fetchAll(PDO::FETCH_ASSOC);
    // END SQL
    ?>

    