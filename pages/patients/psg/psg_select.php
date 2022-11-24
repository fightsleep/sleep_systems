<?php
    // SQL PSG --------------------------
    $sql_psg = ("SELECT * FROM tbl_psg as psg
    LEFT JOIN tbl_patient AS patient ON psg.psg_hn=patient.hn_patient
     WHERE psg.psg_hn = :hn_patient
     ORDER BY psg_date DESC; ");
    $stmt_psg = $connection->prepare($sql_psg);
    $stmt_psg->execute(array(":hn_patient" => $_GET['hn_patient']));
    $result_psg = $stmt_psg->fetchAll(PDO::FETCH_ASSOC);
    //END SQL PSG 
    
    ?>