<?php
  $sql_order = 
  "SELECT * FROM tbl_order 
  LEFT JOIN list_cpap ON tbl_order.order_cpapcode=list_cpap.cpap_code
  WHERE tbl_order.order_hn = :hn_patient";
 $stmt_order = $connection->prepare($sql_order);
$stmt_order->execute(array(":hn_patient" => $_GET['hn_patient']));
 $result_order = $stmt_order->fetchAll(PDO::FETCH_ASSOC);

    ?>

<!-- AS buy
  LEFT JOIN list_cpap AS cpap ON buy.code_cpap_order=cpap.order_cpapcode -->