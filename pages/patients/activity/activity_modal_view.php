<div id="activity_modal_view" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">รายละเอียด activity</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" id="activity_form">
          <div class="form-group">
            <input type="hidden" name="activity_id" id="activity_id2" class="form-control " required />

            <font size="4" id=""> HN : </font>
            <font size="4" id="hn_text"> </font>
            
          </div>
          <div class="row">
            <div class="col-8">
              <div class="form-group">
                <label for="activity_date2">มาติดต่อเมื่อวันที่</label>
                <input type="date" id="activity_date" name="activity_date" class="form-control form-control-border" value="<?php echo date('Y-m-d'); ?>" />
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="">เวลาที่ติดต่อ</label>
                <input type="time" name="activity_time" id="activity_time2" class="form-control form-control-border"  value="<?php echo date("H:i"); ?>" disabled />
              </div>
            </div> 
          </div>

          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="activity_contact">กิจกรรม ที่มาติดต่อ</label>
                <div class="form-group form-control-lg">
                  <select class="form-control form-control-lg form-control-border" id="activity_contact2" name="activity_contact" disabled>
                    <option value="">-เลือก activity -</option>
                    <option value="">-เลือกผู้ให้คำปรึกษา-</option>
                    <option value="ปรีชา">-ปรีชา-</option>
                    <option value="จิราวรรณ">-จิราวรรณ-</option>
                    <option value="เจนจิรา">-เจนจิรา-</option>        
                  </select>
                </div>
              </div>
            </div>
          </div>
      
          <!-- start เลือกแผนก -->
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="select_activity">OPD</label>
                <div class="form-group form-control-lg">
                  <select class="form-control form-control-lg form-control-border" id="activity_opd2" name="activity_opd" disabled>
                    <option value="">-เลือกแผนก-</option>
                    <?php foreach ($result_list_opd as $result_list_opd) { ?> -
                      <option value="<?php echo $result_list_opd["id_list_opd"]; ?>">
                        <?php echo $result_list_opd["list_opd"]; ?>
                      </option>
                    <?php } ?>

                  </select>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="select_activity">ช่องทางการให้บริการ</label>
                <div class="form-group form-control-lg">
                  <select class="form-control form-control-lg form-control-border" id="activity_channel2" name="activity_channel" disabled>
                    <option value="">-เลือกช่องทาง-</option>
                    <option value="Line">-Line-</option>
                    <option value="Tele-walkin">-Tele-walkin-</option>
                    <option value="Telemed">-Tele Med-</option>
                    <option value="Sleeponcloud">-Sleep on Cloud -</option>
                    <option value="Email">-Email-</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <!-- end เลือกแผนก -->
          <div class="form-group">
            <label for="activity_note-text" class="col-form-label">Note :</label>
            <textarea class="form-control form-control-border" id="activity_note2" name="activity_note" disabled></textarea>
          </div>
          <!--  start ผู้ดำเนินการ -->
          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="activity_staff">เลือกผู้ดำเนินการ</label>
                <div class="form-group form-control-lg">
                  <select class="form-control form-control-lg form-control-border" id="activity_staff2" name="activity_staff" disabled>
                  <option value="">-เลือกเจ้าหน้าที่-</option>
                    <?php foreach ($result_list_staff as $list_staff) { ?> -
                      <option value="<?php echo $list_staff["staff_id"]; ?>">
                        <?php echo $list_staff["staff_name"]; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="activity_consultant">เลือกผู้ให้คำปรึกษา</label>
                <div class="form-group form-control-lg">
                  <select class="form-control form-control-lg form-control-border" id="activity_consultant2" name="activity_consultant" disabled>
                  <option value="">-เลือกเจ้าหน้าที่-</option>
                    <?php foreach ($result_list_staff as $list_staff) { ?> -
                      <option value="<?php echo $list_staff["staff_id"]; ?>">
                        <?php echo $list_staff["staff_name"]; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="operation_activity" id="operation_activity2" value="" /> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>