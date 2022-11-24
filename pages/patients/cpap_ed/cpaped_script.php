<script type="text/javascript" language="javascript">
	// Open modal CPAP ED
	$(document).ready(function() { //การ Insert update แบบ modal จะ script เยอะหน่อย
		//----------- start เมื่อคลิกปุ่ม Add บน Modal จะแสดงฟอร์มสำหรับกรอกข้อมูล ----------------------------
		$('#add_cpaped').click(function() {
			$('#cpap_ed_form')[0].reset(); //ล้างข้อมูลก่อน
			$('.modal-title').text("Add CPAP Education"); //text บน Modal title จะถูกกำหนดเป็น Add User
			$('#action_cpaped').val("Add"); //ให้ข้อความบนปุ่มเป็น Add
			$('#operation_cpaped').val("Add"); //กำหนดให้ operation เป็น add
			$('#cpaped_hn').attr('readonly', true).val(<?php echo $row->hn_patient;  ?>);
		});
		// --- END ADD
		// --- END ADD
		//----------- start เมื่อคลิกปุ่ม Submit บน Modal Form  ----------------------------
		$(document).on('submit','#cpap_ed_form',function(event) {
			event.preventDefault();
			// window.alert("กรอกข้อมูลกายภาพให้ถูกต้อง");
			var cpaped_id = $('#cpaped_id').val();
			var cpaped_hn = $('#cpaped_hn').val();
			var cpaped_opd = $('#cpaped_opd').val();
			var cpaped_contactdate = $('#cpaped_contactdate').val();
			var cpaped_appointdate = $('#cpaped_appointdate').val();
			var cpaped_chanel = $('#cpaped_chanel').val();
			var cpaped_doctor = $('#cpaped_doctor').val();
			var cpaped_order = $('#cpaped_order').val();
			var cpaped_note = $('#cpaped_note').val();
			var cpaped_staff_first = $('#cpaped_staff_first').val();
			var cpaped_province = $('#cpaped_province').val();
			var cpaped_expenses = $('#cpaped_expenses').val();
			var cpaped_purchase_cpap = $('#cpaped_purchase_cpap').val();
			var cpaped_decision = $('#cpaped_decision').val();
			var cpaped_purchase_channel = $('#cpaped_purchase_channel').val();
			var cpaped_caseproject = $('#cpaped_caseproject').val();
			var cpaped_staff_first = $('#cpaped_decision').val();

			$.ajax({
				url: "../../service/patients/cpap_ed_script/cpaped_script_insert_edit.php",
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
					$('#cpap_ed_form')[0].reset();
					$('#cpaped_modal').modal('hide');
		    	// setTimeout(location.reload.bind(location), 1200); 
				}
			});
		});
		// ---- END Submit Education ----------------------------
		//----- UPDATE !!! ----------------------------
		$(document).on('click','#edit_cpaped', function() {
			// window.alert("ไว้เช็ค");
			var cpaped_id = $(this).attr("data-id");
			$.ajax({
				url: "../../service/patients/cpap_ed_script/cpaped_fetch_update.php",
				method: "POST",
				data: {
					cpaped_id: cpaped_id
				},
				dataType: "json",
				success: function(data) {
					$('#cpaped_id').val(data.cpaped_id);
					$('#cpaped_modal').modal('show');
					$('#cpaped_hn').attr('readonly', true).val(data.cpaped_hn);
					$('#cpaped_contactdate').val(data.cpaped_contactdate);
					$('#cpaped_appointdate').val(data.cpaped_appointdate);
					$('#cpaped_chanel').val(data.cpaped_chanel);
					$('#cpaped_opd').val(data.cpaped_opd);
					$('#cpaped_caseproject').val(data.cpaped_caseproject);
					$('#cpaped_doctor').val(data.cpaped_doctor);
					$('#cpaped_order').val(data.cpaped_order);
					$('#cpaped_note').val(data.cpaped_note);
					$('#cpaped_province').val(data.cpaped_province);
					$('#cpaped_expenses').val(data.cpaped_expenses);
					$('#cpaped_decision').val(data.cpaped_decision);
					$('#cpaped_purchase_cpap').val(data.cpaped_purchase_cpap);
					$('#cpaped_staff_first').val(data.cpaped_staff_first);
					$('#cpaped_purchase_channel').val(data.cpaped_purchase_channel);
					$('#action_cpaped').val("Edit");
					$('#operation_cpaped').val("Edit");
					$('.modal-title').text("แก้ไขข้อมูล CPAP Education");
				}
			})
		});
		//-----END UPDATE !!! ----------------------------

	});
</script>