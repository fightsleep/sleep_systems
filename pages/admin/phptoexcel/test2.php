<?php  require_once '../../../service/connect_db.php' ; 
    if( !isset($_SESSION['AD_ID'] ) ){     
        header('Location: ../../../login.php');  
    }
    require 'vendor/autoload.php';
    
// import the PhpSpreadsheet Class
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// Set value binder
\PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder( new \PhpOffice\PhpSpreadsheet\Cell\AdvancedValueBinder() );
$spreadsheet = new Spreadsheet(); // สร้าง speadsheet object
$sheet = $spreadsheet->getActiveSheet(); // 
?>

<?php include('../../includes/header.php');  ?>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <?php include '../../includes/sidebar.php' ?>
        <?php require '../../../service/patients/my_function/function_date.php' ?>
        <div class="pt-3 content-wrapper" id="content_profile">
            <div class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-12">
                            <div class="shadow card">
                                <div class="pt-4 border-0 card-header">
                                    <h4>
                                        <i class="fas fa-user text-green"></i>
                                        การดึงสถิติทั้งหมดในระบบ
                                    </h4>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-9">
                                            </div>
                                            <div class="col-md-3">
        
                                            <a href="javascript:history.back()" class="mt-3 btn btn-warning">
                    <i class="far fa-hand-point-left"></i>
                        กลับหน้าหลัก
                    </a>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="card-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-md-10">
                                                 <h4>กรุณาระบุช่วงวันที่</h4>
                                                 <?php
                                                 if(isset($_POST['search']))
{
    $txtStartDate=$_POST['txtStartDate'];
    $txtEndDate=$_POST['txtEndDate'];
    $sql_excel_psg = "SELECT * FROM tbl_psg WHERE psg_date BETWEEN '$txtStartDate' AND '$txtEndDate'
    ORDER BY psg_date ASC";
    }else{
        echo 'กรุณาระบุวันที่';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
   <input type="date" name="txtStartDate" id="">
   <input type="date" name="txtEndDate" id="">
   <input type="submit" name="search" value="OK">
    </form>
    
<?php
echo '<hr>';
echo 'ดึงข้อมูลระหว่างวันที่ '.$txtStartDate.'  '.'ถึง'.' '.'วันที่ '.$txtEndDate ;
echo '<hr>';
$stmt_excel_psg = $connection->prepare($sql_excel_psg);
$stmt_excel_psg->execute();
$result_excel_psg = $stmt_excel_psg->fetchAll(PDO::FETCH_ASSOC);
$count = count($result_excel_psg);
// $result_excel_psg = $PDO->query($sql_excel_psg);
// while($fetchResult = $result->fetch(PDO::FETCH_ASSOC)){
//     print_r($fetchResult);

// }
if($result_excel_psg && $count >= 1){   // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
    $arrayData = $result_excel_psg;
    $totalRow = count($arrayData);  // จำนวนแถวข้อมูลทั้งหมด 
    // $result->free();  //สามารถใช้ $result->close() หรือ $result->free_result() แทนได้
    // $result_excel_psg->close();
}else{
    echo 'ไม่พบข้อมูล';
}
$columnName = ['psg_id','','วันทำ Sleep test','ผู้ป่วยเก่า/ใหม่','แผนก','OPD/IPD','แพทย์ส่งตรวจ','แพทย์รีวิว','str_percent','str_zerolead','psg_predx','psg_postdx','','','','AHI'];
$sheet->fromArray($columnName) // array ข้อมูลหัวข้อคอลัมน์
->fromArray(
    $arrayData,  // ตัวแปร array ข้อมูล
    NULL,        // ค่าข้อมูลที่ตรงตามค่านี้ จะไม่ถูกำหนด
    'A2'         // จุดพิกัดเริ่มต้น ที่ใช้งานข้อมูล เริ่มทึ่มุมบนซ้าย  หากไม่กำหนดจะเป็น "A1" ค่าเริ่มต้น
);

// $sheet->getStyle('C2:C'.($totalRow+1)) // จำนวนแถวทั้งหมด + จำนวนแถวที่เป็นหัวข้อ 
// ->getNumberFormat()
// ->setFormatCode( \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DDMMYYYY);
// จัดขนาดความกว้างของ cell อย่างง่าย ตามจำนวนฟิลด์คอลัมน์ของฐานข้อมูล 
// ในที่นี้เราดึงฟิลด์ข้อมูลทั้งหมดในตาราง tbl_excel1 ซึ่งมีทั้งหมด 12 ฟิลด์ ก็แทนด้วยคอลัมน์ A ถึง L

foreach(range('A','L') as $column) {
    $sheet->getColumnDimension($column)->setAutoSize(true); 
}
// echo '<pre>';
// print_r($arrayData);
// echo '</pre>';
// exit();
$writer = new Xlsx($spreadsheet);
$output_file = "a.xlsx"; // กำหนดชื่อไฟล์ excel ที่ต้องการ
$writer->save($output_file); // สร้าง excel 
 
if(file_exists($output_file)){ // ตรวจสอบว่ามีไฟล์ หรือมีการสร้างไฟล์ แล้วหรือไม่
    echo '<a href="'.$output_file.'" target="_blank">Download</a>';
}
?>

                                                </div>
                                                <div class="col-md-2">
                                                <h1>Export2</h1>

                                                </div>
                                       
                                            </div>
                                            <hr>
                        
                                 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include '../../includes/footer.php' ?>
    </div>
</body>
</html>