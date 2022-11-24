<script type="text/javascript" language="javascript">
$(document).ready(function() { //การ Insert update แบบ modal จะ script เยอะหน่อย
    //----------- start เมื่อคลิกปุ่ม Add บน Modal จะแสดงฟอร์มสำหรับกรอกข้อมูล ----------------------------
    $('#add_equipment').click(function() {
        $('#equipment_form')[0].reset(); //ล้างข้อมูลก่อน
        // window.alert("กรอกข้อมูลกายภาพให้ถูกต้อง");
        $('.modal-title').text("เพิ่มข้อมูลอุปกรณ์ใหม่"); //text บน Modal title จะถูกกำหนดเป็น Add User
        $('#action_equipment').val("Add"); //ให้ข้อความบนปุ่มเป็น Add
        $('#operation_equipment').val("Add"); //กำหนดให้ operation เป็น add
        // $('#equipment_uploaded_image').html('');

    });
    // --- END ADD
    $(document).ready(function() {
        $('#equipment_data').DataTable({
            "autoWidth": false, //ปิด auto width คอลัมน์
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

    //----------- start เมื่อคลิกปุ่ม Submit บน Modal Form  ----------------------------
    $(document).on('submit', '#equipment_form', function(event) {
        event.preventDefault();
        var equipment_code = $('#equipment_code').val();
        var equipment_company = $('#equipment_company').val();
        var equipment_model = $('#equipment_model').val();
        var equipment_type = $('#equipment_type').val();
        var equipment_type_pap = $('#equipment_type_pap').val();
        var equipment_serial = $('#equipment_serial').val();
        var equipment_detail = $('#equipment_detail').val();
        var equipment_status = $('#equipment_status').val();
        var equipment_update_date = $('#equipment_update_date').val();
        var equipment_note = $('#equipment_note').val();
        var equipment_store = $('#equipment_store').val();
        var extension = $('#equipment_image').val().split('.').pop().toLowerCase();

        if (extension != '') {
            if (jQuery.inArray(extension, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                alert("Invalid Image File");
                $('#equipment_image').val('');
                return false;
            }
        }

        $.ajax({
            url: "../../service/sub_admin/equipment_list_script/equipment_list_script_insert_edit.php",
            // url: "../../service/patients/physical_script/physical_script_insert_edit.php",
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(data) {
                Swal.fire({
                    text: 'เพิ่มข้อมูลอุปกรณ์เรียบร้อย',
                    icon: 'success',
                    confirmButtonText: 'ตกลงจ้าา',
                })
                $('#equipment_form')[0].reset();
                $('#equipment_modal').modal('hide');
                // location.reload();
                //	setTimeout(location.reload.bind(location), 1200); // refresh หน้า
            }
        });
    });
    // ---- END Submit ----------------------------
    //----- UPDATE !!! ----------------------------
    $(document).on('click', '#update_equipment', function() {
        // window.alert("ไว้เช็ค");
        var equipment_id = $(this).attr("data-id");
        $.ajax({
            url: "../../service/sub_admin/equipment_list_script/equipment_list_fetch_update.php",
            method: "POST",
            data: {
                equipment_id: equipment_id
            },
            dataType: "json",
            success: function(data) {
                $('#equipment_modal').modal('show');
                $('#equipment_id').val(data.equipment_id);
                $('#equipment_code').val(data.equipment_code);
                $('#equipment_company').val(data.equipment_company);
                $('#equipment_model').val(data.equipment_model);
                $('#equipment_type').val(data.equipment_type);
                $('#equipment_type_pap').val(data.equipment_type_pap);
                $('#equipment_serial').val(data.equipment_serial);
                $('#equipment_detail').val(data.equipment_detail);
                $('#equipment_status').val(data.equipment_status);
                $('#equipment_update_date').val(data.equipment_update_date);
                $('#equipment_note').val(data.equipment_note);
                $('#equipment_store').val(data.equipment_store);
                $('#equipment_uploaded_image').html(data.equipment_image);
                $('#action_equipment').val("Edit");
                $('#operation_equipment').val("Edit");
                $('.modal-title').text("Edit equipment");

            }
        })
    });
    //-----END UPDATE !!! ----------------------------
    //----- Delete !!! ----------------------------
    $(document).on('click', '#delete_equipment', function() {
        var equipment_id = $(this).attr("data-id");
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
                    url: "../../service/sub_admin/equipment_list_script/equipment_list_script_delete.php",
                    data: {
                        equipment_id: equipment_id
                    }
                }).done(function() {
                    Swal.fire({
                            text: 'รายการของคุณถูกลบเรียบร้อย',
                            icon: 'success',
                            confirmButtonText: 'ตกลง',
                        })
                        .then((result) => {
                            location.reload();
                        })
                })
            }
        })
    })
    //-----END Delete !!! ----------------------------
});
</script>