<?php
$sql_equipment = ("SELECT * FROM list_equipment as equipment ; ");
$stmt_equipment = $connection->prepare($sql_equipment);
$stmt_equipment->execute(array());
$result_equipment = $stmt_equipment->fetchAll(PDO::FETCH_ASSOC);

$sql_equipment_company = ("SELECT * FROM list_cpap_company as cpap_company ; ");
$stmt_equipment_company = $connection->prepare($sql_cpap_company);
$stmt_equipment_company->execute(array());
$result_equipment_company = $stmt_equipment_company->fetchAll(PDO::FETCH_ASSOC);

    require 'equipment_modal.php'; 
  ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 mb-4 ">
				<h4 align="center">
					<i class="fas fa-user"></i>
					รายการอุปกรณ์สำหรับให้ยืมของศูนย์ฯ
				</h4>
				<div align="right">
					<button name="add" id="add_equipment" data-toggle="modal" data-target="#equipment_modal" class="mb-2 btn btn-info add_data"><i class="fas fa-plus"></i> เพิ่มอุปกรณ์ใหม่</button>
				</div>
			</div> <!--  col-12 -->
		</div> <!--  row -->
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table id="equipment_data" class="table table-bordered table-striped table-hover" width="100%">
						<thead class="table-warning">
							<tr>
								<th width="2%">ลำดับ</th>
								<th width="2%">Code</th>
								<th width="15%">pic</th>
								<th width="5%">ชื่อ</th>
								<th width="20%">Model</th>
								<th width="5%">ประเภท</th>
								<th width="10%">บริษัท</th>
								<th width="5%">Serial</th>
								<th width="5%">สถานะ</th>
								<th width="5%">แก้ไข</th>
								<th width="5%">ลบ</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							foreach ($result_equipment as $equipment) {
								$i++;
							?>
								<tr>
								<!-- `<img src="equipment_image/${item.equipment_image}" class="img-fluid" width="150px">`, -->
								<!-- $image = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />'; -->
									<td><?= $i; ?></td>
									<td><?= $equipment['equipment_code']; ?></td>
									<td><?= '<img src="../../service/sub_admin/equipment_list_script/equipment_image/'.$equipment["equipment_image"].'" class="img-fluid" width="300px" />'; ?></td>
									<td><?= $equipment['equipment_name']; ?></td>
									<td><?= $equipment['equipment_model']; ?></td>
									<td><?= $equipment['equipment_type']; ?></td>
									<td><?= $equipment['equipment_company']; ?></td>
									<td><?= $equipment['equipment_serial']; ?></td>
									<td><?= $equipment['equipment_sales_status']; ?></td>
									<td>
										<button type="button" name="update_equipment" class="btn btn-warning btn-block update_equipment" id="update_equipment" data-id=<?= $equipment['equipment_id']; ?>><i class="far fa-edit"></i></button>
									</td>
									<td><button type="button" name="delete_equipment" class="btn btn-danger" id="delete_equipment" data-id=<?= $equipment['equipment_id']; ?>><i class="far fa-trash-alt"></i></button></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div> <!--  row -->
		</div> <!--  cold-12 -->
	</div> <!--  container-fluid -->
<?php
require 'equipment_script.php';
?>