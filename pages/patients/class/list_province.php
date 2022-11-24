<?php
$sql_list_province = ("SELECT * FROM list_province");
$stmt_list_province = $connection->prepare($sql_list_province);
$stmt_list_province->execute();
$result_list_province = $stmt_list_province->fetchAll(PDO::FETCH_ASSOC);
?>