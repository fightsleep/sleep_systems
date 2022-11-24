<div id="borrow_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มข้อมูลการยืมอุปกรณ์</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" id="borrow_form">
          <div class="form-group">
            <label for="">HN</label>
            <input type="hidden" name="borrow_id" id="borrow_id" class="form-control" value="" />
            <input type="text" name="borrow_hn" id="borrow_hn" class="form-control" />
          </div>
          <div class="row">
            <div class="col-3">
              <div class="form-group">
                <label for="">วันที่ติดต่อยืม</label>
                <input type="date" id="borrow_contactdate" name="borrow_contactdate" class="form-control " value="<?php echo date('Y-m-d'); ?>" />
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="">วันที่รับอุปกรณ์</label>
                <input type="date" id="borrow_appointdate" name="borrow_appointdate" class="form-control " value="" />
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="borrow_chanel">ช่องทาง Education :</label>
                  <select class="form-control" id="borrow_chanel" name="borrow_chanel" >
                    <option value="">เลือกช่องทาง</option>
                    <option value="zoom">- Zoom -</option>
                    <option value="line">- Line -</option>
                    <option value="telephone">- Telephone -</option>
                    <option value="อื่นๆ">- อื่นๆ -</option>
                  </select>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="borrow_opd">OPD</label>
                  <select class="form-control" id="borrow_opd" name="borrow_opd">
                    <option value="">-เลือกแผนก-</option>
                    <?php foreach ($result_list_opd as $result_list_opd) { ?> -
                      <option value="<?php echo $result_list_opd["list_opd"]; ?>">
                        <?php echo $result_list_opd["list_opd"]; ?>
                      </option>
                    <?php } ?>
                  </select>  
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-3">
              <div class="form-group">
                <label for="borrow_caseproject">project :</label>
                  <select class="form-control" id="borrow_caseproject" name="borrow_caseproject" >
                    <option value="">เลือก</option>
                    <option value="เคสวิจัย">- เคสวิจัย -</option>
                    <option value="service">- service -</option>
                    <option value="TeleTitration">- Tele Titration -</option>
                    <option value="อื่นๆ">- อื่นๆ -</option>
                  </select>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="">แพทย์ Education</label>
                <input type="text" id="borrow_doctor" name="borrow_doctor" class="form-control " />
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Order จากแพทย์</label>
                <input type="text" id="borrow_order" name="borrow_order" class="form-control " />
              </div>
            </div>

          </div>

          <!-- Start Note -->
          <div class="row">
          <div class="col-12">
          <div class="form-group">
            <label for="borrow_note" class="col-form-label">หมายเหตุ :</label>
            <textarea class="form-control " id="borrow_note" name="borrow_note"></textarea>
          </div>
          </div>
            </div>
          <!--  start ผู้ดำเนินการ -->
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label for="borrow_province">จังหวัด</label>
                  <select class="form-control" id="borrow_province" name="borrow_province">
                    <option value="">-เลือกจังหวัด-</option>
                    <?php foreach ($result_list_province as $list_province) { ?> -
                      <option value="<?php echo $list_province["province"]; ?>">
                        <?php echo $list_province["province"]; ?>
                      </option>
                    <?php } ?>
                  </select>
              </div>
            </div>

            <div class="col-4">
              <div class="form-group">
                <label for="borrow_expenses">ค่าใช้จ่าย</label>
                  <select name="borrow_expenses" id="borrow_expenses" class="form-control">
                    <option value="">เลือกค่าใช้จ่าย</option>
                    <option value="100">- 100 -</option>
                    <option value="500">- 500 -</option>
                    <option value="1000">- 1000 -</option>
                    <option value="อื่นๆ">- อื่นๆ -</option>
                  </select>
              </div>
            </div>

            <div class="col-4">
              <div class="form-group">
                <label for="borrow_staff">เจ้าหน้าที่รับเรื่อง</label>
                  <select class="form-control" id="borrow_staff_first" name="borrow_staff_first">
                    <option value="">-เลือกเจ้าหน้าที่-</option>
                    <?php foreach ($result_list_staff as $list_staff) { ?> -
                      <option value="<?php echo $list_staff["staff_name"]; ?>">
                        <?php echo $list_staff["staff_name"]; ?>
                      </option>
                    <?php } ?>
                  </select>
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-4">
              <div class="form-group">
                <label for="borrow_decision">การตัดสินใจ :</label>
                  <select class="form-control" id="borrow_decision" name="borrow_decision" >
                    <option value="">การตัดสินใจ</option>
                    <option value="ระบบปกติ">- ระบบปกติ -</option>
                    <option value="ระบบทางไกล">- ระบบทางไกล -</option>
                    <option value="บริษัทตัวแทนจำหน่าย">- บริษัทตัวแทนจำหน่าย -</option>
                    <option value="ต่างประเทศ">- ต่างประเทศ -</option>
                    <option value="ของญาติ">- ของญาติ -</option>
                    <option value="ขอปรึกษาแพทย์">- ขอปรึกษาแพทย์ -</option>
                    <option value="ลองเครื่องต่อด้วยตนเอง">- ลองเครื่องต่อด้วยตนเอง -</option>
                  </select>
              </div>
            </div>
          <div class="col-4">
              <div class="form-group">
                <label for="borrow_purchase_cpap">ตัดสินใจซื้อเครื่อง</label>
                  <select class="form-control" id="borrow_purchase_cpap" name="borrow_purchase_cpap">
                    <option value="">-เลือกยี่ห้อที่ผู้ป่วยตัดสินใจซื้อ-</option>
                    <?php foreach ($result_cpap_company as $list_company_ed) { ?> -
                      <option value="<?php echo $list_company_ed["cpap_company_list"]; ?>">
                        <?php echo $list_company_ed["cpap_company_list"]; ?>
                      </option>
                    <?php } ?>
                  </select>
              </div>
            </div>

            <div class="col-4">
              <div class="form-group">
                <label for="borrow_purchase_channel">ช่องทางที่สั่งซื้อ :</label>
                  <select class="form-control" id="borrow_purchase_channel" name="borrow_purchase_channel" >
                    <option value="">ช่องทางที่สั่งซื้อ</option>
                    <option value="ของญาติ">- ของญาติ -</option>
                    <option value="ต่างประเทศ">- ต่างประเทศ -</option>
                    <option value="บริษัทตัวแทนจำหน่าย">- บริษัทตัวแทนจำหน่าย -</option>
                    <option value="ต่างประเทศ">- ระบบทางไกล -</option>
                    <option value="ของญาติ">- ระบบปกติ -</option>
                  </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="operation_borrow" id="operation_borrow" value="" />
            <input type="submit" name="action_borrow" id="action_borrow" class="btn btn-success" value="Add" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>