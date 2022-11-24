<hr>
<?php
// require 'vendor/autoload.php';

// import the PhpSpreadsheet Class
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
// // Set value binder
\PhpOffice\PhpSpreadsheet\Cell\Cell::setValueBinder(new \PhpOffice\PhpSpreadsheet\Cell\AdvancedValueBinder());
$spreadsheet = new Spreadsheet(); // สร้าง speadsheet object
$sheet = $spreadsheet->getActiveSheet(); //
echo '<h1><center>' . 'สถิติ PSG' . '</center></h1>';
require 'date_range.php';

if (isset($_GET['search'])) {
  $txtStartDate = $_GET['date_start'];
  $txtEndDate = $_GET['date_end'];
  $sql_excel_psg = "SELECT * FROM tbl_psg WHERE psg_date BETWEEN '$txtStartDate' AND '$txtEndDate'
    ORDER BY psg_date ASC";
} else {
  echo '<h2 style="color:green"><center>' . 'กรุณาระบุวันที่ก่อนทุกครั้ง' . '</center></h2>';
  exit(); //หยุดการทำงานไว้แค่นี้หากยังไม่กรอกวันที่เพื่อป้องกัน Error
}
?>
<hr>
<div class="container">
  <div class="row">
    <div class="col-md-8">
      <?php
      // echo '<hr>';
      echo '<h4>' . 'ดึงข้อมูลระหว่างวันที่ ' . $txtStartDate . '  ' . 'ถึง' . ' ' . 'วันที่ ' . $txtEndDate . '</h4>';
      // echo '<hr>';
      $stmt_excel_psg = $connection->prepare($sql_excel_psg);
      $stmt_excel_psg->execute();
      $result_excel_psg = $stmt_excel_psg->fetchAll(PDO::FETCH_ASSOC);
      $count = count($result_excel_psg);

      ?>

    </div>
    <div class="col-md-4">
      <?php echo '<h4>' . 'พบข้อมูลทำ Sleep Test  ' . $count . '   เคส' . '</h4>'; ?>
    </div>
  </div>
</div>

<!--start ปุ่ม download -->
<?php
// }
if ($result_excel_psg && $count >= 1) { // คิวรี่ข้อมูลสำเร็จหรือไม่ และมีรายการข้อมูลหรือไม่
  $arrayData = $result_excel_psg;
  $totalRow = count($arrayData); // จำนวนแถวข้อมูลทั้งหมด
  // $result->free();  //สามารถใช้ $result->close() หรือ $result->free_result() แทนได้
  // $result_excel_psg->close();
} else {
  echo 'ไม่พบข้อมูล';
}
$columnName = ['psg_id', '', 'วันทำ Sleep test', 'ผู้ป่วยเก่า/ใหม่', 'แผนก', 'OPD/IPD', 'แพทย์ส่งตรวจ', 'แพทย์รีวิว', 'str_percent', 'str_zerolead', 'psg_predx', 'psg_postdx', '', '', '', 'AHI'];
$sheet->fromArray($columnName) // array ข้อมูลหัวข้อคอลัมน์
  ->fromArray(
    $arrayData, // ตัวแปร array ข้อมูล
    null, // ค่าข้อมูลที่ตรงตามค่านี้ จะไม่ถูกำหนด
    'A2' // จุดพิกัดเริ่มต้น ที่ใช้งานข้อมูล เริ่มทึ่มุมบนซ้าย  หากไม่กำหนดจะเป็น "A1" ค่าเริ่มต้น
  );

// $sheet->getStyle('C2:C'.($totalRow+1)) // จำนวนแถวทั้งหมด + จำนวนแถวที่เป็นหัวข้อ
// ->getNumberFormat()
// ->setFormatCode( \PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_DATE_DDMMYYYY);
// จัดขนาดความกว้างของ cell อย่างง่าย ตามจำนวนฟิลด์คอลัมน์ของฐานข้อมูล
// ในที่นี้เราดึงฟิลด์ข้อมูลทั้งหมดในตาราง tbl_excel1 ซึ่งมีทั้งหมด 12 ฟิลด์ ก็แทนด้วยคอลัมน์ A ถึง L

foreach (range('A', 'L') as $column) {
  $sheet->getColumnDimension($column)->setAutoSize(true);
}
// echo '<pre>';
// print_r($arrayData);
// echo '</pre>';
// exit();
$writer = new Xlsx($spreadsheet);
$output_file = "sleeptest.xlsx"; // กำหนดชื่อไฟล์ excel ที่ต้องการ
$writer->save($output_file); // สร้าง excel

if (file_exists($output_file)) { // ตรวจสอบว่ามีไฟล์ หรือมีการสร้างไฟล์ แล้วหรือไม่
  echo '<a href="' . $output_file . '" target="_blank" class="btn btn-primary">Download</a>';
}
?>
<!--end ปุ่ม download -->