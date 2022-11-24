<div id="followup_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มข้อมูล Follow Up </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
      <form method="post" id="followup_form">
          <div class="form-group">
            <label for="">HN</label>
            <input type="hidden" name="followup_id" id="followup_id" class="form-control" value="" />
            <input type="text" name="followup_hn" id="followup_hn" class="form-control" />
          </div>
          <div class="row">
            <div class="col-3">
              <div class="form-group">
                <label for="">วันที่ติดตาม</label>
                <input type="date" id="followup_date" name="followup_date" class="form-control " value="<?php echo date('Y-m-d'); ?>" />
              </div>
            </div>
        
          </div>
     <!-- note follow up -->
     <div class="row">
          <div class="col-12">
          <div class="form-group">
            <label for="followup_detail" class="col-form-label">บันทึกผลการติดตาม :</label>
            <textarea class="form-control " id="followup_detail" name="followup_detail"></textarea>
          </div>
          </div>
            </div>
          <!-- Start Note -->
          <div class="row">
          <div class="col-4">
              <div class="form-group">
                <label for="followup_cpap">อุปกรณ์ที่ใช้ :</label>
                <input type="text" id="followup_cpap" name="followup_cpap" class="form-control " />
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="followup_setting">ค่าแรงดันที่ใช้ :</label>
                <input type="text" id="followup_setting" name="followup_setting" class="form-control " />
              </div>
            </div>
          <div class="col-4">
              <div class="form-group">
                <label for="followup_company">บริษัท :</label>
                  <select class="form-control" id="followup_company" name="followup_company">
                    <option value="">-เลือกบริษัท-</option>
                    <?php foreach ($result_cpap_company as $list_company_ed) { ?> -
                      <option value="<?php echo $list_company_ed["cpap_company_list"]; ?>">
                        <?php echo $list_company_ed["cpap_company_list"]; ?>
                      </option>
                    <?php } ?>
                  </select>
              </div>
            </div>
          </div>

          <div class="row">


            <div class="col-4">
              <div class="form-group">
                <label for="followup_staff">เจ้าหน้าติดตาม</label>
                  <select class="form-control" id="followup_staff" name="followup_staff">
                    <option value="">-เลือกเจ้าหน้าที่-</option>
                    <?php foreach ($result_list_staff as $list_staff) { ?> -
                      <option value="<?php echo $list_staff["staff_name"]; ?>">
                        <?php echo $list_staff["staff_name"]; ?>
                      </option>
                    <?php } ?>
                  </select>
              </div>
            </div>

            <div class="col-4">
              <div class="form-group">
                <label for="followup_chanal_next">ช่องทางติดตามนัดครั้งถัดไป</label>
                  <select name="followup_chanal_next" id="followup_chanal_next" class="form-control">
                    <option value="">เลือกช่องทาง</option>
                    <option value="zoom">- Zoom -</option>
                    <option value="line">- Line -</option>
                    <option value="telephone">- Telephone -</option>
                    <option value="อื่นๆ">- อื่นๆ -</option>
                  </select>
              </div>
            </div>

            <div class="col-4">
              <div class="form-group">
                <label for="followup_appointment">นัดติดตามครั้งต่อไป</label>
                <input type="date" id="followup_appointment" name="followup_appointment" class="form-control " value="<?php echo date('Y-m-d'); ?>" />
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="operation_followup" id="operation_followup" value="" />
            <input type="submit" name="action_followup" id="action_followup" class="btn btn-success" value="Add" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>