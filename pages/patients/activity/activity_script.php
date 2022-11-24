<script type="text/javascript" language="javascript">
	$(document).ready(function() { //การ Insert update แบบ modal จะ script เยอะหน่อย
		//----------- start เมื่อคลิกปุ่ม Add บน Modal จะแสดงฟอร์มสำหรับกรอกข้อมูล ----------------------------
		$('#add_activity').click(function() {
			$('#activity_form')[0].reset(); //ล้างข้อมูลก่อน
			$('.modal-title').text("Add activity"); //text บน Modal title จะถูกกำหนดเป็น Add User
			$('#action_activity').val("Add"); //ให้ข้อความบนปุ่มเป็น Add
			$('#operation_activity').val("Add"); //กำหนดให้ operation เป็น add
			$('#activity_hn').attr('readonly', true).val(<?php echo $row->hn_patient;  ?>);
		});

		// --- END ADD
		$(document).ready(function() {
			$('#activity_data').DataTable({
                "autoWidth": false,   //ปิด auto width คอลัมน์
				"aaSorting": [
					[0, 'desc']
				],
				"oLanguage": {
					"sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",
					"sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",
					"sInfo": "แสดง _START_ ถึง _END_ ของจำนวน _TOTAL_ รายการ",
					"sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",
					"sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",
					"sSearch": "ค้นหา :",
					"aaSorting": [
						[0, 'desc']
					],
					"oPaginate": {
						"sFirst": "หน้าแรก",
						"sPrevious": "ก่อนหน้า",
						"sNext": "ถัดไป",
						"sLast": "หน้าสุดท้าย"
					},
				},
			});
		});

		   //start view_data
		   $(document).on('click','#view_activity', function() {
      var activity_id=$(this).attr("data-id");   //รับ id ผ่านปุ่ม
          $.ajax({
			url: "../../service/patients/activity_script/activity_fetch_update.php",
				method: "POST",
				data: {
					activity_id: activity_id
				},
				dataType: "json",
				success: function(data) {
					$('#activity_hn').attr('readonly', true).val(data.activity_hn); 
					$('#activity_modal_view').modal('show');
					// $('#activity_id2').val(data.activity_id);
					document.getElementById("hn_text").innerHTML = (data.activity_hn) ;
					$('#activity_hn2').attr('readonly', true).val(data.activity_hn);
					$('#activity_date2').val(data.activity_date);
					$('#activity_time2').val(data.activity_time);
					$('#activity_contact2').val(data.activity_contact);
					$('#activity_opd2').val(data.activity_opd);
					$('#activity_channel2').val(data.activity_channel);
					$('#activity_note2').val(data.activity_note);
					$('#activity_staff2').val(data.activity_staff);
					$('#activity_consultant2').val(data.activity_consultant);
					$('#action_activity2').hide();
					$('#operation_activity2').hide();
					$('.modal-title').text("รายละเอียด activity");
            }
          });
		  
    });
    //end view data
		//----------- start เมื่อคลิกปุ่ม Submit บน Modal Form  ----------------------------
		$(document).on('submit', '#activity_form', function(event) {
			event.preventDefault();
			// window.alert("กรอกข้อมูลกายภาพให้ถูกต้อง");
			var activity_hn = $('#activity_hn').val();
			var activity_date = $('#activity_date').val();
			var activity_time = $('#activity_time').val();
			var activity_contact = $('#activity_contact').val();
			var activity_opd = $('#activity_opd').val();
			var activity_channel = $('#activity_channel').val();
			var activity_note = $('#activity_note').val();
			var activity_staff = $('#activity_staff').val();
			var activity_consultant = $('#activity_consultant').val();

			$.ajax({
				url: "../../service/patients/activity_script/activity_script_insert_edit.php",
				method: 'POST',
				data: new FormData(this),
				contentType: false,
				processData: false,
				success: function(data) {
					Swal.fire({
						text: 'เพิ่มข้อมูล activity เรียบร้อย',
						icon: 'success',
						confirmButtonText: 'ตกลง',
					})
					$('#activity_form')[0].reset();
					$('#activity_modal').modal('hide');
					setTimeout(location.reload.bind(location), 1200); // refresh หน้า
				}
			});
		});
		// ---- END Submit ----------------------------
		//----- UPDATE !!! ----------------------------
		$(document).on('click', '#upactivity_date', function() {
			// window.alert("ไว้เช็ค");
			var activity_id = $(this).attr("data-id");
			$.ajax({
				url: "../../service/patients/activity_script/activity_fetch_update.php",
				method: "POST",
				data: {
					activity_id: activity_id
				},
				dataType: "json",
				success: function(data) {
					$('#activity_modal').modal('show');
					$('#activity_id').val(data.activity_id);
					$('#activity_hn').attr('readonly', true).val(data.activity_hn); 
					$('#activity_date').val(data.activity_date);
					$('#activity_time').val(data.activity_time);
					$('#activity_contact').val(data.activity_contact);
					$('#activity_opd').val(data.activity_opd);
					$('#activity_channel').val(data.activity_channel);
					$('#activity_note').val(data.activity_note);
					$('#activity_staff').val(data.activity_staff);
					$('#activity_consultant').val(data.activity_consultant);
					$('#action_activity').val("Edit");
					$('#operation_activity').val("Edit");
					$('.modal-title').text("Edit activity");
				}
			})	
			// document.getElementById("font_test").innerHTML = data.activity_date ;
		});
		//-----END UPDATE !!! ----------------------------
		//----- Delete !!! ----------------------------
		$(document).on('click', '#delete_activity', function() {
			var activity_id = $(this).attr("data-id");
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
						url: "../../service/patients/activity_script/activity_script_delete.php",
						data: {
							activity_id : activity_id
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