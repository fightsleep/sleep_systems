<div id="equipment_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">เพิ่มข้อมูลอุปกรณ์สำหรับให้ยืม</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <form method="post" id="equipment_form">
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label for="equipment_code">Code equipment</label>
                <!-- <input type="hidden" name="equipmented_id" id="equipmented_id" class="form-control" value=""/> -->
                <input type="hidden" name="equipment_id" id="equipment_id" class="form-control " required />
                <input type="text" name="equipment_code" id="equipment_code" class="form-control" placeholder="equipment code" required />
                <small class="form-text text-muted">code ที่ศูนย์กำหนดขึ้นเอง*</small>
              </div>
            </div>
            <!-- ------- -->
            <div class="col-4">
              <div class="form-group">
                <label for="equipment_store">สถานที่เก็บ</label>
                <input type="text" name="equipment_store" id="equipment_store" class="form-control" placeholder="ที่เก็บ" required />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label for="equipment_company">อุปกรณ์ของบริษัท</label>
                <div class="form-group">
                  <select class="form-control" id="equipment_company" name="equipment_company">
                    <option value="">-เลือกบริษัท-</option>
                    <?php foreach ($result_equipment_company as $equipment_company) { ?> -
                      <option value="<?php echo $equipment_company["cpap_company_list"]; ?>">
                        <?php echo $equipment_company["cpap_company_list"]; ?>
                      </option>
                    <?php } ?>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-8">
              <div class="form-group">
                <label for="">ชื่อรุ่น</label>
                <input type="text" id="equipment_model" name="equipment_model" class="form-control " value="" placeholder="กรอกชื่อรุ่น" />
              </div>
            </div>
          </div>
          <!-- End row  ชื่อ equipment-->
          <div class="row">
            <div class="col-4">
              <div class="form-group">
                <label for="equipment_type">ประเภทอุปกรณ์</label>
                <div class="form-group">
                  <select class="form-control" id="equipment_type" name="equipment_type">
                  <option value="">-เลือกประเภทอุปกรณ์-</option>
                    <option value="cpapครบชุด">CPAP ครบชุด</option>
                    <option value="cpapเฉพาะเครื่องและสาย">CPAP เฉพาะเครื่องและสาย</option>
                    <option value="หน้ากาก">หน้ากาก</option>
                    <option value="สายรัดหน้ากาก">สายรัดหน้ากาก</option>
                    <option value="สายรัดคาง">สายรัดคาง</option>
                    <option value="ท่อลม">ท่อลม</option>
                    <option value="Humid">Humid</option>
                    <option value="Filter">Filter</option>
                    <option value="Battery">Battery</option>
                    <option value="CPAP">CPAP</option>
                    <option value="AutoPAP">AutoPAP</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="equipment_type_pap">CPAP/AutoPAP</label>
                <select class="form-control" id="equipment_type_pap" name="equipment_type_pap">
                  <option value="">-CPAP/AutoPAP-</option>
                    <option value="cpap">CPAP</option>
                    <option value="autopap">AUTOPAP</option>
                  </select>
              </div>
            </div>

            <div class="col-4">
              <div class="form-group">
                <label for="">Serial อุปกรณ์</label>
                <input type="text" id="equipment_serial" name="equipment_serial" class="form-control " value="" placeholder="ระบุ Serial" />
              </div>
            </div>

          </div>
          <!-- End row -->
          <div class="row">
            <div class="col-12">
              <div class="form-group">
                <label for="equipment_detail">รายละเอียด</label>
                <textarea class="form-control" id="equipment_detail" name="equipment_detail" placeholder="รายละเอียด"></textarea>
              </div>
            </div>
          </div>
          <!-- End row  -->
        
          <div class="row">
            <div class="col-3">
              <div class="form-group">
                <label for="equipment_sales_status">สถานะการให้บริการ</label>
                <div class="form-group">
                  <select class="form-control" id="equipment_sales_status" name="equipment_sales_status">
                    <option value="พร้อมจำหน่าย">พร้อมให้บริการ</option>a
                    <option value="เลิกจำหน่าย">ไม่พร้อมให้บริการ</option>
                    <option value="ราคาเก่า">จำหน่ายออก</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="equipment_update_date">วันที่อัพเดท</label>
                <input type="date" id="equipment_update_date" name="equipment_update_date" class="form-control " value="" placeholder="วันที่อัพเดท" />
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="equipment_note">หมายเหตุ</label>
                <input type="text" id="equipment_note" name="equipment_note" class="form-control" value="" placeholder="หมายเหตุ" />
              </div>
            </div>
            <div class="container">
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="equipment_image">อัพรูปอุปกรณ์</label>
                    <input type="file" id="equipment_image" name="equipment_image">
                    <span id="equipment_uploaded_image"></span>
                  </div>
                </div>
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <input type="hidden" name="operation_equipment" id="operation_equipment" value="" />
            <input type="submit" name="action_equipment" id="action_equipment" class="btn btn-success" value="ADD" />
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>