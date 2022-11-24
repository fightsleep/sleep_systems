<?php
  $sql_borrow = 
  "SELECT * FROM tbl_borrow as borrow 
  WHERE borrow.borrow_hn = :hn_patient";
 $stmt_borrow = $connection->prepare($sql_borrow);
$stmt_borrow->execute(array(":hn_patient" => $_GET['hn_patient']));
 $result_borrow = $stmt_borrow->fetchAll(PDO::FETCH_ASSOC);

    ?>

<!-- AS buy
  LEFT JOIN list_cpap AS cpap ON buy.code_cpap_borrow=cpap.order_cpapcode -->