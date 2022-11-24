<div class="tab-pane" id="borrow">
	<?php
	require 'borrow_select.php';
	require 'borrow_modal_add.php';
	?>
	<div class="container-fluid">
		<div class="row">
			<h4>
				<i class="fas fa-user"></i>
				รายการยืมอุปกรณ์ของศูนย์โรคการนอนหลับ
			</h4>
			<div class="col-12 mb-4 d-flex justify-content-end">
				<a href="borrow/borrow_create.php?borrow_hn=<?php echo $row->hn_patient; ?>" class="btn btn-success ">
					<i class="fas fa-plus"></i>
					ยืมอุปกรณ์ (เครื่องบริษัท)
				</a>
				<a href="" class="btn btn-warning">
					<i class="fas fa-plus"></i>
					ยืมอุปกรณ์ (เครื่องศูนย์)
				</a>
			</div> <!--  col-12 -->
		</div> <!--  row -->
		<div class="row">
			<div class="col-md-12">
				<div class="table-responsive">
					<table id="borrow_data" class="table table-bborrowed table-striped table-hover" width="100%">
						<thead class="table-warning">
							<tr>
								<th width="5%">ลำดับ</th>
								<th width="10%">วันที่ยืม</th>
								<th width="10%">กำหนดคืน</th>
								<th width="10%">วันที่คืน</th>
								<th width="10%">สถานะการยืม</th>
								<th width="30%">ชื่ออุปกรณ์</th>
								<th width="10%">ประเภท</th>
								<th width="5%">View</th>
								<th width="5%">Print</th>
								<th width="5%">Edit</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$i = 0;
							foreach ($result_borrow as $borrow) {
								$i++;
							?>
								<tr>
									<td><?= $i; ?></td>
									<td><?= DateThai($borrow['borrow_date_receive']); ?></td>
									<td><?= DateThai($borrow['borrow_date_return']); ?></td>
									<td><?= DateThai($borrow['borrow_date_give_back']); ?></td>
									<td><?= $borrow['borrow_status']; ?></td>
									<td><?= $borrow['borrow_machine']; ?></td>
									<td><?= $borrow['borrow_machine_type']; ?></td>
									<td>
										<button type="button" name="view_borrow" class="btn btn-info btn-block view_borrow" id="view_borrow" data-id=<?= $borrow['borrow_id']; ?>><i class="fa fa-eye" aria-hidden="true"></i></button>
									</td>
									<td>
										<?php if ($borrow['borrow_machine_type'] == 'Cpap') {
											echo "<a href='borrow/print_borrow_cpap.php?borrow_id=" . $borrow["borrow_id"] . " ' class='btn btn-primary'>
		<i class='fa fa-print' aria-hidden='true'></i>  </a>";
										} else {
											echo "<a href='borrow/print_borrow_ambu.php?borrow_id=" . $borrow["borrow_id"] . " ' class='btn btn-primary'>
		<i class='fa fa-print' aria-hidden='true'></i>  </a>";
										};
										?>
									</td>
									<td>
										<button type="button" name="update_borrow" class="btn btn-warning btn-block update_borrow" id="update_borrow" data-id=<?= $borrow['borrow_id']; ?>><i class="far fa-edit"></i></button>
									</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div> <!--  row -->
		</div> <!--  cold-12 -->
	</div> <!--  container-fluid -->
</div> <!--  tab -->
<?php
require 'borrow_script.php';
?>