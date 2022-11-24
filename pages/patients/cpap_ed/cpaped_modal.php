<div id="cpaped_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มข้อมูล CPAP EDUCATION</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" id="cpap_ed_form">
          <div class="form-group">
            <label for="">HN</label>
            <input type="hidden" name="cpaped_id" id="cpaped_id" class="form-control" value="" />
            <input type="text" name="cpaped_hn" id="cpaped_hn" class="form-control" />
          </div>
          <div class="row">
            <div class="col-3">
              <div class="form-group">
                <label for="">วันที่ติดต่อ</label>
                <input type="date" id="cpaped_contactdate" name="cpaped_contactdate" class="form-control " value="<?php echo date('Y-m-d'); ?>" />
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="">วันที่ได้คิวเข้า class</label>
                <input type="date" id="cpaped_appointdate" name="cpaped_appointdate" class="form-control " value="" />
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="cpaped_chanel">ช่องทาง Education :</label>
                  <select class="form-control" id="cpaped_chanel" name="cpaped_chanel" >
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
                <label for="cpaped_opd">OPD</label>
                  <select class="form-control" id="cpaped_opd" name="cpaped_opd">
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
                <label for="cpaped_caseproject">project :</label>
                  <select class="form-control" id="cpaped_caseproject" name="cpaped_caseproject" >
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
                <input type="text" id="cpaped_doctor" name="cpaped_doctor" class="form-control " />
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="">Order จากแพทย์</label>
                <input type="text" id="cpaped_order" name="cpaped_order" class="form-control " />
              </div>
            </div>

          </div>

          <!-- Start Note -->
          <div class="row">
          <div class="col-12">
          <div class="form-group">
            <label for="cpaped_note" class="col-form-label">หมายเหตุ :</label>
            <textarea class="form-control " id="cpaped_note" name="cpaped_note"></textarea>
          </div>
          </div>
            </div>
          <!--  start ผู้ดำเนินการ -->
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label for="cpaped_province">จังหวัด</label>
                  <select class="form-control" id="cpaped_province" name="cpaped_province">
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
                <label for="cpaped_expenses">ค่าใช้จ่าย</label>
                  <select name="cpaped_expenses" id="cpaped_expenses" class="form-control">
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
                <label for="cpaped_staff">เจ้าหน้าที่รับเรื่อง</label>
                  <select class="form-control" id="cpaped_staff_first" name="cpaped_staff_first">
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
                <label for="cpaped_decision">การตัดสินใจ :</label>
                  <select class="form-control" id="cpaped_decision" name="cpaped_decision" >
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
                <label for="cpaped_purchase_cpap">ตัดสินใจซื้อเครื่อง</label>
                  <select class="form-control" id="cpaped_purchase_cpap" name="cpaped_purchase_cpap">
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
                <label for="cpaped_purchase_channel">ช่องทางที่สั่งซื้อ :</label>
                  <select class="form-control" id="cpaped_purchase_channel" name="cpaped_purchase_channel" >
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
            <input type="hidden" name="operation_cpaped" id="operation_cpaped" value="" />
            <input type="submit" name="action_cpaped" id="action_cpaped" class="btn btn-success" value="Add" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>