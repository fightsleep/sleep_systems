<?php
$sql_cpap_company = ("SELECT * FROM list_cpap_company");
$stmt_cpap_company = $connection->prepare($sql_cpap_company);
$stmt_cpap_company->execute(array());
$result_cpap_company = $stmt_cpap_company->fetchAll(PDO::FETCH_ASSOC);