<?php
$sql_cpap = ("SELECT * FROM list_cpap as cpap ; ");
$stmt_cpap = $connection->prepare($sql_cpap);
$stmt_cpap->execute(array());
$result_cpap = $stmt_cpap->fetchAll(PDO::FETCH_ASSOC);

$sql_cpap_company = ("SELECT * FROM list_cpap_company as cpap_company ; ");
$stmt_cpap_company = $connection->prepare($sql_cpap_company);
$stmt_cpap_company->execute(array());
$result_cpap_company = $stmt_cpap_company->fetchAll();

    require 'cpap_modal.php'; 
  ?>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12 mb-4 ">
				<h4 align="center">
					<i class="fas fa-user"></i>
					รายการ CPAP และอุปกรณ์เสริม
				</h4>
				<div align="right">
					<button name="add" id="add_cpap" data-toggle="modal" data-target="#cpap_modal" class="mb-2 btn btn-info add_data"><i class="fas fa-plus"></i> เพิ่มอุปกรณ์ใหม่</button>
				</div>
			</div> <!--  col-12 -->
		</div> <!--  row -->
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table id="cpap_data" class="table table-bordered table-striped table-hover" width="100%">
						<thead class="table-warning">
							<tr>
								<th width="2%">ลำดับ</th>
								<th width="2%">Code</th>
								<th width="15%">pic</th>
								<th width="5%">ชื่อ</th>
								<th width="20%">Model</th>
								<th width="5%">ประเภท</th>
								<th width="10%">บริษัท</th>
								<th width="5%">ราคา</th>
								<th width="5%">สถานะ</th>
								<th width="5%">แก้ไข</th>
								<th width="5%">ลบ</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							foreach ($result_cpap as $cpap) {
								$i++;
							?>
								<tr>
								<!-- `<img src="cpap_image/${item.cpap_image}" class="img-fluid" width="150px">`, -->
								<!-- $image = '<img src="upload/'.$row["image"].'" class="img-thumbnail" width="50" height="35" />'; -->
									<td><?= $i; ?></td>
									<td><?= $cpap['cpap_code']; ?></td>
									<td><?= '<img src="../../service/sub_admin/cpap_list_script/cpap_image/'.$cpap["cpap_image"].'" class="img-fluid" width="300px" />'; ?></td>
									<td><?= $cpap['cpap_name']; ?></td>
									<td><?= $cpap['cpap_model']; ?></td>
									<td><?= $cpap['cpap_type']; ?></td>
									<td><?= $cpap['cpap_company']; ?></td>
									<td><?= $cpap['cpap_selling_price']; ?></td>
									<td><?= $cpap['cpap_sales_status']; ?></td>
									<td>
										<button type="button" name="update_cpap" class="btn btn-warning btn-block update_cpap" id="update_cpap" data-id=<?= $cpap['cpap_id']; ?>><i class="far fa-edit"></i></button>
									</td>
									<td><button type="button" name="delete_cpap" class="btn btn-danger" id="delete_cpap" data-id=<?= $cpap['cpap_id']; ?>><i class="far fa-trash-alt"></i></button></td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div> <!--  row -->
		</div> <!--  cold-12 -->
	</div> <!--  container-fluid -->
<?php
require 'cpap_script.php';
?>