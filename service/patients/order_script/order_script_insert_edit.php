<?php
// header('Content-Type: application/json');
require_once '../../connect_db.php';
$arr = $_POST['arrOrders'];   //รับข้อมูล
$name = $_POST['dataset']['name'];
$email = $_POST['dataset']['email'];
$date_buy = $_POST['dataset']['date_buy'];
$order_hn = $_POST['order_hn'];

// echo '<pre>';
// print_r ($_POST);
// echo '</pre>';

// exit();
foreach($arr as $row){
    $params = array(
     'order_hn' => $order_hn,
     'order_cpapcode' => $row['cpap_code'],
     'order_doctor' => $name,
     'order_serial_cpap' => $row['serial_no'],
     'order_date' => $date_buy,
    );
    $stmt = $connection->prepare('INSERT INTO tbl_order (order_hn, order_cpapcode, order_date, order_serial_cpap, order_doctor) 
    VALUES ( :order_hn, :order_cpapcode, :order_date, :order_serial_cpap, :order_doctor)');
    $stmt->execute($params);       

	// foreach($stmt as $row)
	// {
	// 	// $sub_array[] = DateBirth($row['birthdate']);
	// 	$output["order_id"] = $row["order_id"];
	// 	$output["order_cpapcode"] = $row["order_cpapcode"];
	// }
    $output = array();
	$statement = $connection->prepare(
		"SELECT order_id, order_hn, order_cpapcode  FROM tbl_order 
		WHERE order_hn = '".$_POST["order_hn"]."' AND DATE(order_date) = DATE(NOW()) 
        ORDER BY order_id DESC 
        "
    
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		// $sub_array[] = DateBirth($row['birthdate']);
		// $output["order_id"] = $row["order_id"];
		$output["order_hn"] = $row["order_hn"];
		// $output["order_cpapcode"] = $row["order_cpapcode"];
	}
if (!empty($stmt))
{
    $response = array(
        'status' => true,
        'message' => 'Create Success',
        // 'order_cpapcode' => $row['order_cpapcode'],
        'order_hn' => $order_hn,
        // 'order_id' =>  $row["order_id"],
        
    ); 
    http_response_code(200); 
    echo json_encode($response);
}else{
    $response = array(
        'status' => false,
        'message' => 'Not Success'
    ); 
    http_response_code(400);
    echo json_encode($response);
}

}
   
