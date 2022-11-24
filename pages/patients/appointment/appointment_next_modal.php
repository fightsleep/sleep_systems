<div id="appointment_next_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มข้อมูลการเลื่อนนัด</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" id="appointment_next_form">
          <div class="form-group">
            <input type="text" name="appointment_id_fornext" id="appointment_id_fornext" class="form-control" value="" />
          </div>
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="">วันที่ติดต่อเลื่อน</label>
                <input type="date" id="nextappoint_datecontact" name="nextappoint_datecontact" class="form-control " value="<?php echo date('Y-m-d'); ?>" /> 
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">เลื่อนเป็นวันที่</label>
                <input type="date" id="nextappoint_date" name="nextappoint_date" class="form-control " value="<?php echo date('Y-m-d'); ?>" /> 
              </div>
            </div>
            
          </div>

          <!-- start เลือกแผนก -->
          <div class="row">
        
            <div class="col-6">
              <div class="form-group">
                <label for="nextappoint_count_postpone">เลื่อนครั้งที่</label>
                <div class="form-group form-control-lg">
                  <select class="form-control" id="nextappoint_count_postpone" name="nextappoint_count_postpone">
                    <option value="">-เลือกการเลื่อนนัด-</option>
                      <option value="เลื่อนครั้งที่ 1">เลื่อนครั้งที่ 1</option>
                      <option value="เลื่อนครั้งที่ 2">เลื่อนครั้งที่ 2</option>
                      <option value="เลื่อนครั้งที่ 3">เลื่อนครั้งที่ 3</option>
                      <option value="เลื่อนครั้งที่ 4">เลื่อนครั้งที่ 4</option>
                   

                  </select>
                </div>
              </div>
            </div>
            <div class="col-6">
            <div class="form-group">
            <label for="nextappoint_note-text" class="col-form-label">Note เลื่อน :</label>
            <textarea class="form-control " id="nextappoint_note" name="nextappoint_note"></textarea>
            </div>
          </div>
          </div>
          <!--  start ผู้ดำเนินการ -->
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="nextappoint_staff">เลือกผู้ดำเนินการ</label>
                <div class="form-group">
                  <select class="form-control" id="nextappoint_staff" name="nextappoint_staff">
                    <option value="">-เลือกผู้ดำเนินการ-</option>
                    <option value="ปรีชา">-ปรีชา-</option>
                    <option value="จิราวรรณ">-จิราวรรณ-</option>
                    <option value="เจนจิรา">-เจนจิรา-</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="operation_appointment_next" id="operation_appointment_next" value="" />
            <input type="submit" name="action_appointment_next" id="action_appointment_next" class="btn btn-success" value="Add" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>