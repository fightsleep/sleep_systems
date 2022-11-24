<script type="text/javascript" language="javascript">
	// Open modal CPAP ED
	$(document).ready(function() { //การ Insert update แบบ modal จะ script เยอะหน่อย

				// Open modal Follow up	
		//----------- start เมื่อคลิกปุ่ม Add บน Follow Modal จะแสดงฟอร์มสำหรับกรอกข้อมูล ----------------------------
		$('#add_cpaped_followup').click(function() {
			// window.alert("กรอกข้อมูลกายภาพให้ถูกต้อง");
			$('#followup_form')[0].reset(); //ล้างข้อมูลก่อน
			$('.modal-title').text("Add Follow Up"); //text บน Modal title จะถูกกำหนดเป็น Add User
			$('#action_cpaped_followup').val("Add"); //ให้ข้อความบนปุ่มเป็น Add
			$('#operation_followup').val("Add"); //กำหนดให้ operation เป็น add
			$('#followup_hn').attr('readonly', true).val(<?php echo $row->hn_patient;  ?>);
		});
		// --- END ADD
		//----------- start เมื่อคลิกปุ่ม Submit บน Modal Form  ----------------------------
		$(document).on('submit','#followup_form',function(event) {
			event.preventDefault();
			// window.alert("กรอกข้อมูลกายภาพให้ถูกต้อง");
			var followup_id = $('#followup_id').val();
			var followup_hn = $('#followup_hn').val();
			var followup_date = $('#followup_date').val();
			var followup_detail = $('#followup_detail').val();
			var followup_cpap = $('#followup_cpap').val();
			var followup_setting = $('#followup_setting').val();
			var followup_company = $('#followup_company').val();
			var followup_appointment = $('#followup_appointment').val();
			var followup_staff = $('#followup_staff').val();
			var followup_chanal_next = $('#followup_chanal_next').val();

			$.ajax({
				url: "../../service/patients/cpap_ed_script/followup_script_insert_edit.php",
				method: 'POST',
				data: new FormData(this),
				contentType: false,
				processData: false,
				success: function(data) {
					// var cpap_ed_hn = $('#cpap_ed_hn').val();
					Swal.fire({
						text: 'เพิ่มข้อมูล cpap_ed เรียบร้อย',
						icon: 'success',
						confirmButtonText: 'ตกลงจ้าา',
					})
					$('#followup_form')[0].reset();
					$('#followup_form').modal('hide');
		    	// setTimeout(location.reload.bind(location), 1200); 
				}
			});
		});
		// ---- END Submit Education ----------------------------
		//----- UPDATE !!! ----------------------------
		$(document).on('click','#edit_followup', function() {
			// window.alert("ไว้เช็ค");
			var followup_id = $(this).attr("data-id");
			$.ajax({
				url: "../../service/patients/cpap_ed_script/followup_fetch_update.php",
				method: "POST",
				data: {
					followup_id: followup_id
				},
				dataType: "json",
				success: function(data) {
					$('#followup_id').val(data.followup_id);
					$('#followup_modal').modal('show');
					$('#followup_hn').attr('readonly', true).val(data.followup_hn);
					$('#followup_date').val(data.followup_date);
					$('#followup_detail').val(data.followup_detail);
					$('#followup_cpap').val(data.followup_cpap);
					$('#followup_setting').val(data.followup_setting);
					$('#followup_company').val(data.followup_company);
					$('#followup_appointment').val(data.followup_appointment);
					$('#followup_staff').val(data.followup_staff);
					$('#followup_chanal_next').val(data.followup_chanal_next);
					$('#action_followup').val("Edit");
					$('#operation_followup').val("Edit");
					$('.modal-title').text("แก้ไขข้อมูล Follow up");
				}
			})
		});
		//-----END UPDATE !!! ----------------------------
		//----- Delete !!! ----------------------------
		$(document).on('click', '#delete_followup', function() {
			var followup_id = $(this).attr("data-id");
			Swal.fire({
				text: "คุณแน่ใจหรือไม่...ที่จะลบรายการนี้?",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonText: 'ใช่! ลบเลย',
				cancelButtonText: 'ยกเลิก'
			}).then((result) => {
				if (result.isConfirmed) {
					$.ajax({
						type: "POST",
						url: "../../service/patients/cpap_ed_script/followup_script_delete.php",
						data: {
							followup_id : followup_id
						}
					}).done(function() {
						Swal.fire({
								text: 'รายการของคุณถูกลบเรียบร้อย',
								icon: 'success',
								confirmButtonText: 'ตกลง',
							})
							.then((result) => {
								location.reload()
							})
					})
				}
			})
		})
		//-----END Delete !!! ----------------------------
	});
</script>