<script type="text/javascript" language="javascript">
	// Open modal CPAP ED
	$(document).ready(function() { //การ Insert update แบบ modal จะ script เยอะหน่อย
		//----------- start เมื่อคลิกปุ่ม Add บน Modal จะแสดงฟอร์มสำหรับกรอกข้อมูล ----------------------------
		$('#add_borrow').click(function() {
			$('#borrow_form')[0].reset(); //ล้างข้อมูลก่อน
			$('.modal-title').text("เพิ่มข้อมูลยืมอุปกรณ์"); //text บน Modal title จะถูกกำหนดเป็น Add User
			$('#action_borrow').val("Add"); //ให้ข้อความบนปุ่มเป็น Add
			$('#operation_borrow').val("Add"); //กำหนดให้ operation เป็น add
			$('#borrow_hn').attr('readonly', true).val(<?php echo $row->hn_patient;  ?>);
		});
		// --- END ADD
		// --- END ADD
		//----------- start เมื่อคลิกปุ่ม Submit บน Modal Form  ----------------------------
		$(document).on('submit','#cpap_ed_form',function(event) {
			event.preventDefault();
			// window.alert("กรอกข้อมูลกายภาพให้ถูกต้อง");
			var borrow_id = $('#borrow_id').val();
			var borrow_hn = $('#borrow_hn').val();
			var borrow_opd = $('#borrow_opd').val();
			var borrow_contactdate = $('#borrow_contactdate').val();
			var borrow_appointdate = $('#borrow_appointdate').val();
			var borrow_chanel = $('#borrow_chanel').val();
			var borrow_doctor = $('#borrow_doctor').val();
			var borrow_order = $('#borrow_order').val();
			var borrow_note = $('#borrow_note').val();
			var borrow_staff_first = $('#borrow_staff_first').val();
			var borrow_province = $('#borrow_province').val();
			var borrow_expenses = $('#borrow_expenses').val();
			var borrow_purchase_cpap = $('#borrow_purchase_cpap').val();
			var borrow_decision = $('#borrow_decision').val();
			var borrow_purchase_channel = $('#borrow_purchase_channel').val();
			var borrow_caseproject = $('#borrow_caseproject').val();
			var borrow_staff_first = $('#borrow_decision').val();

			$.ajax({
				url: "../../service/patients/cpap_ed_script/borrow_script_insert_edit.php",
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
					$('#borrow_modal').modal('hide');
		    	// setTimeout(location.reload.bind(location), 1200); 
				}
			});
		});
		// ---- END Submit Education ----------------------------
		//----- UPDATE !!! ----------------------------
		$(document).on('click','#edit_borrow', function() {
			// window.alert("ไว้เช็ค");
			var borrow_id = $(this).attr("data-id");
			$.ajax({
				url: "../../service/patients/cpap_ed_script/borrow_fetch_update.php",
				method: "POST",
				data: {
					borrow_id: borrow_id
				},
				dataType: "json",
				success: function(data) {
					$('#borrow_id').val(data.borrow_id);
					$('#borrow_modal').modal('show');
					$('#borrow_hn').attr('readonly', true).val(data.borrow_hn);
					$('#borrow_contactdate').val(data.borrow_contactdate);
					$('#borrow_appointdate').val(data.borrow_appointdate);
					$('#borrow_chanel').val(data.borrow_chanel);
					$('#borrow_opd').val(data.borrow_opd);
					$('#borrow_caseproject').val(data.borrow_caseproject);
					$('#borrow_doctor').val(data.borrow_doctor);
					$('#borrow_order').val(data.borrow_order);
					$('#borrow_note').val(data.borrow_note);
					$('#borrow_province').val(data.borrow_province);
					$('#borrow_expenses').val(data.borrow_expenses);
					$('#borrow_decision').val(data.borrow_decision);
					$('#borrow_purchase_cpap').val(data.borrow_purchase_cpap);
					$('#borrow_staff_first').val(data.borrow_staff_first);
					$('#borrow_purchase_channel').val(data.borrow_purchase_channel);
					$('#action_borrow').val("Edit");
					$('#operation_borrow').val("Edit");
					$('.modal-title').text("แก้ไขข้อมูล CPAP Education");
				}
			})
		});
		//-----END UPDATE !!! ----------------------------

	});
</script>