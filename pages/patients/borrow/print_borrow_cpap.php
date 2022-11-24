<?php
require_once __DIR__ . '/../../../vendor/autoload.php';
include '../../../service/connect_db.php';
require '../../../service/patients/my_function/function_date.php';
$borrow_id = $_GET['borrow_id'];
// echo '<pre>';
// print_r ($hn_borrow);
// echo '</pre>';
// exit();
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];
$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];
$mpdf = new \Mpdf\Mpdf([
	'mode' => 'utf-8',
	'format' => 'A4',
	'margin_left' => 15,
	'margin_right' => 15,
	'margin_top' => 16,
	'margin_bottom' => 16,
	'margin_header' => 9,
	'margin_footer' => 9,
	'mirrorMargins' => true,

	'fontDir' => array_merge($fontDirs, [
		__DIR__ . 'vendor/mpdf/mpdf/custom/font/directory',
	]),
	'fontdata' => $fontData + [
		'thsarabun' => [
			'R' => 'THSarabunNew.ttf',
			'I' => 'THSarabunNew Italic.ttf',
			'B' => 'THSarabunNew Bold.ttf',
			'U' => 'THSarabunNew BoldItalic.ttf',
		],
	],
	'default_font' => 'thsarabun',
	'defaultPageNumStyle' => 1,
]);
$mpdf->setFooter('{PAGENO}'); //ตัวรันหน้า

//SQL ฺBorrow
$statement = $connection->prepare("SELECT *  FROM tbl_borrow
	LEFT JOIN tbl_patient ON tbl_borrow.borrow_hn=tbl_patient.hn_patient
	LEFT JOIN tbl_contact ON tbl_borrow.borrow_hn=tbl_contact.contact_hn
	LEFT JOIN tbl_psg ON tbl_borrow.borrow_hn=tbl_psg.psg_hn
	WHERE borrow_id = $borrow_id");
$statement->execute();
$result_borrow = $statement->fetchAll();
$count = count($result_borrow);
$body_1 = '
	<style>
		body{
			  font-family: "thsarabun";
		}
	</style>';
$header = '<table><tr>'
	. '<td width="70"><img src="1.png" width="100" /></td>'
	. '<td width="400" align="center"><h1>ศูนย์โรคการนอนหลับโรงพยาบาลรามาธิบดี</h1>
			<h3>Ramathibodi Hospital Sleep Disorder Center</h3>
			<p>Service ande Research since 1989</p></td></tr>'
	. '</table><hr />';
// -------------Start $header2  -------------------------------
$header2 = '
			<div class="row">
			<div class="col-12">
			<h1 style="text-align:center"> แบบฟอร์มการขอยืมเครื่องปรับอากาศแรงดันบวก </h1>
			</div>
			</div>
			';

foreach ($result_borrow as $body1) {
	$patient_profile = '
	<style>
	div{
		}
	table {
		border: 0.5px solid #696969;
	  border-collapse: collapse;
	  width: 100%;
	  font-size: 35px;
	}
	th, td{
		padding: 5px; 
		text-align: left;  
	  }
	</style>
	<table>' .
		// แถวที่ 1
		'<tr><td width="400" align="left"><p>ชื่อ-สกุลผู้ป่วย :' . $body1['firstname'] . '&nbsp;' . $body1['lastname'] . '</p></td>' .
		'<td width="400" align="left"><p>บัตรโรงพยาบาล :' . $body1['borrow_hn'] . '</p></td>' .
		'<td width="400" align="left"><p>เพศ :' . $body1['sex'] . '</p>
			</td></tr>' .
		//แถวที่ 2
		'<tr><td width="400" align="left"><p>สิทธิการรักษา :&nbsp;' . $body1['claim'] . '</p></td>' .
		'<td width="400" align="left"><p>เกิดวันที่ :&nbsp;' . DateThai($body1['birthdate']) . '</p></td>' .
		'<td width="400" align="left"><p>อายุ :' . $body1['#'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ปี' . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;เดือน' . '</p>
			</td></tr>' .
		//แถวที่ 3
		'<tr><td width="400" align="left"><p>เบอร์ติดต่อ :&nbsp;' . $body1['contact_mobile1'] . '</p></td>' .
		'<td width="400" align="left"><p>แผนก :&nbsp;' . $body1['psg_opd'] . '</p></td>' .
		'<td width="400" align="left"><p>สถานะการชำระเงิน :' . $body1['#'] .  '</p>
			</td></tr>'
		. '</table>';
}

$tableh1 = '
	<h3 align="center">รายละเอียด</h3>
	<p style="font-size:14pt;">ติดต่อเมื่อวันที่ :&nbsp;' . DateThai($body1['borrow_date_contact']) . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
	. 'สถานะการมัดจำ :' . $body1['borrow_deposit'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' .
	'จำนวนเงินมัดจำ : ' . '&nbsp;&nbsp;&nbsp;' . $body1['borrow_amount_deposit'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; บาท<br>' .
	'ด้วยแพทย์ :&nbsp;' . $body1['borrow_doctor'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' .
	'มีความประสงค์ให้ข้าพเจ้ายืมเครื่องอัดอากาศแรงดันบวกไปทดลองใช้' . '<br>' .
	'ข้าพเจ้าจึงติดต่อยืม เครื่องปรับแรงดันบวกชนิด &nbsp; &nbsp;' . $body1['borrow_machine_type'] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . 'พร้อมอุปกรณ์ที่ระบุตามด้านล่างของเอกสาร<br>' .
	'พร้อมกระเป๋าใส่เครื่อง' . '&nbsp;&nbsp;' . 'ตามที่แพทย์แนะนำไว้เมื่อวันที่&nbsp; &nbsp;' .  DateThai($body1['borrow_date_receive']) . '&nbsp; &nbsp;เป็นระยะเวลา&nbsp;' . $body1['borrow_duration'] .
	'<br>เครื่องที่ได้รับไปเป็นเครื่อง&nbsp; &nbsp;' . $body1['borrow_machine'] . '&nbsp; &nbsp;Serial No.&nbsp; &nbsp;' . $body1['borrow_serial'] .
	'<br>โดยกำหนดส่งคืนศูนย์โรคการนอนหลับ&nbsp;วันที่&nbsp;' . DateThai($body1['borrow_date_return']) .
	'<br>หมายเหตุ&nbsp;1.&nbsp; เครื่องและอุปกรณ์ทั้งหมดที่ยืมไป ต้องอยู่ในสภาพใช้งานได้เป็นปกติเหมือนก่อนยืมไปใช้' .
	'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2.&nbsp; หากมีการชำรุดเสียหายส่วนใดส่วนหนึ่ง ข้าพเจ้ายินดีรับผิดชอบและชดใช้ตามความเป็นจริงทุกประการ' .
	'<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;3.&nbsp; ทั้งนี้หากไม่นำเครื่องมาคืนตามกำหนดที่ได้นัดหมายไว้ จะต้องเสียค่าใช้จ่ายเพิ่มวันละ 500 บาท' .
	'<br>อื่นๆ .............................................................................................................................................................................................'
	. '</p>' .

	$check_pap = '
<style>
	div{
		}
	table th, td{
		border: 0.5px solid #696969;

	  width: 80%;
	  font-size: 90px;
	}
	th, td{
		text-align: left;  
	  }
	</style>
	<table>
    <thead>
        <tr>
            <th align="center">อุปกรณ์</th>
            <th colspan="3" align="center">สภาพก่อนนำเครื่องไปใช้</th>
            <th colspan="2" align="center">สภาพวันนำเครื่องมาส่ง</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td align="center"  rowspan="2">ตัวเครื่อง</td>
            <td align="center">&#9634;&nbsp;&nbsp;มี</td>
            <td align="center">&#9634;&nbsp;&nbsp;ชำรุด</td>
            <td align="center">&#9634;&nbsp;&nbsp;สะอาด</td>
            <td align="center">&#9634;&nbsp;&nbsp;มี</td>
            <td align="center">&#9634;&nbsp;&nbsp;ชำรุด</td>
        </tr>
        <tr>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่มี</td>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่ชำรุด</td>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่สะอาด</td>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่มี</td>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่ชำรุด</td>
        </tr>
        <tr>
            <td align="center" rowspan="2">สายรัดศีรษะ</td>
            <td align="center">&#9634;&nbsp;&nbsp;มี</td>
            <td align="center">&#9634;&nbsp;&nbsp;ชำรุด</td>
            <td align="center">&#9634;&nbsp;&nbsp;สะอาด</td>
            <td align="center">&#9634;&nbsp;&nbsp;มี</td>
            <td align="center">&#9634;&nbsp;&nbsp;ชำรุด</td>
        </tr>&#9634;&nbsp;&nbsp;
        <tr>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่มี</td>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่ชำรุด</td>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่สะอาด</td>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่มี</td>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่ชำรุด</td>
        </tr>
        <tr>
            <td align="center"  rowspan="2">หน้ากาก</td>
            <td align="center">&#9634;&nbsp;&nbsp;มี</td>
            <td align="center">&#9634;&nbsp;&nbsp;ชำรุด</td>
            <td align="center">&#9634;&nbsp;&nbsp;สะอาด</td>
            <td align="center">&#9634;&nbsp;&nbsp;มี</td>
            <td align="center">&#9634;&nbsp;&nbsp;ชำรุด</td>
        </tr>
        <tr>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่มี</td>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่ชำรุด</td>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่สะอาด</td>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่มี</td>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่ชำรุด</td>
        </tr>
        <tr>
            <td align="center"  rowspan="2">ท่อส่งลม</td>
            <td align="center">&#9634;&nbsp;&nbsp;มี</td>
            <td align="center">&#9634;&nbsp;&nbsp;ชำรุด</td>
            <td align="center">&#9634;&nbsp;&nbsp;สะอาด</td>
            <td align="center">&#9634;&nbsp;&nbsp;มี</td>
            <td align="center">&#9634;&nbsp;&nbsp;ชำรุด</td>
        </tr>
        <tr>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่มี</td>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่ชำรุด</td>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่สะอาด</td>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่มี</td>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่ชำรุด</td>
        </tr>
        <tr>
            <td align="center"  rowspan="2">ปลั๊กไฟ</td>
            <td align="center">&#9634;&nbsp;&nbsp;มี</td>
            <td align="center">&#9634;&nbsp;&nbsp;ชำรุด</td>
            <td align="center">&#9634;&nbsp;&nbsp;สะอาด</td>
            <td align="center">&#9634;&nbsp;&nbsp;มี</td>
            <td align="center">&#9634;&nbsp;&nbsp;ชำรุด</td>
        </tr>
        <tr>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่มี</td>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่ชำรุด</td>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่สะอาด</td>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่มี</td>
            <td align="center">&nbsp;&nbsp;&nbsp;&#9634;&nbsp;&nbsp;ไม่ชำรุด</td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr>
            <td colspan="3">&nbsp;&nbsp;ลงชื่อ<br/> ........................................................................................ (ผู้รับเครื่อง)</td>
            <td colspan="3">&nbsp;&nbsp;ลงชื่อ<br/> ........................................................................ (ผู้รับเครื่อง/เจ้าหน้าที่)</td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;&nbsp;ลงชื่อ<br/> .......................................................................... (เจ้าหน้าที่ตรวจสอบ)</td>
            <td colspan="3">&nbsp;&nbsp;ลงชื่อ<br/> .................................................................................. (เจ้าหน้าที่ให้ยืม)</td>
        </tr>
    </tbody>
</table>
	';
$mpdf->WriteHTML($header);
$mpdf->WriteHTML($header2);
$mpdf->WriteHTML($patient_profile);
$mpdf->WriteHTML($tableh1);
$mpdf->Output($output, 'I');