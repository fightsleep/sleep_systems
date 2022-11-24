<script type="text/javascript" language="javascript">
    $(document).ready(function() { //การ Insert update แบบ modal จะ script เยอะหน่อย
        //----------- start เมื่อคลิกปุ่ม Add บน Modal จะแสดงฟอร์มสำหรับกรอกข้อมูล ----------------------------
        // --- END ADD

        //----- UPDATE !!! ----------------------------
        $(document).on('click', '#update_order', function() {
            // window.alert("ไว้เช็ค");
            var order_id = $(this).attr("data-id");
            $.ajax({
                url: "../../service/patients/order_script/order_fetch_update.php",
                method: "POST",
                data: {
                    order_id: order_id
                },
                dataType: "json",
                success: function(data) {
                    $('#order_modal').modal('show');
                    $('#order_id').val(data.order_id);
                    $('#order_hn').attr('readonly', true).val(data.order_hn);
                    $('#date_order').val(data.date_order);
                    $('#weight1').val(data.weight1);
                    $('#height').val(data.height);
                    $('#neck').val(data.neck);
                    $('#waist').val(data.waist);
                    $('#hip').val(data.hip);
                    $('#pulse_rate').val(data.pulse_rate);
                    $('#blood_pressure').val(data.blood_pressure);
                    $('#action_order').val("Edit");
                    $('#operation_order').val("Edit");
                    $('.modal-title').text("Edit order");

                }
            })
        });
        //-----END UPDATE !!! ----------------------------
        //----- Delete !!! ----------------------------
        $(document).on('click', '#delete_order', function() {
            var order_id = $(this).attr("data-id");
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
                        url: "../../service/patients/order_script/order_script_delete.php",
                        data: {
                            order_id: order_id
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