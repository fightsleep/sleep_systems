<!-- start compliance -->
<div class="tab-pane" id="compliance">
  <form class="form-horizontal">
    <div class="form-group row">
      <label for="name" class="col-sm-2 col-form-label">ชื่อ</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name" placeholder="Name" value="<?php echo $row->firstname; ?>" disabled="true">
      </div>
    </div>
    <div class="form-group row">
      <label for="lastname" class="col-sm-2 col-form-label">นามสกุล</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="Email" value="<?php echo $row->lastname; ?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputName2" placeholder="Name">
      </div>
    </div>
    <div class="form-group row">
      <label for="inputExperience" class="col-sm-2 col-form-label">Experience</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="inputSkills" class="col-sm-2 col-form-label">Skills</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
      </div>
    </div>
    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <div class="checkbox">
          <label>
            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
          </label>
        </div>
      </div>
    </div>
    <div class="form-group row">
    <label for="name3">
  <input type="checkbox" id="name3activaitor" placeholder="other"  onclick="if(this.checked){ document.getElementById('name3').focus();}" />
  Other...
</label>
<input type="text" id="name3" name="name3" />
    </div>
    <div class="form-group">
    <div class="checkbox">
    <label for="propertytype-8">
       <input type="checkbox" name="propertytype" id="propertytype-8" value="others">
       <input id="propertytype_other" name="propertytype_other" type="text" value="" placeholder="other" class="form-control" size="1000%">      
   </label>
</div>
    </div>
    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">
        <button type="submit" class="btn btn-danger">Submit</button>
      </div>
    </div>
  </form>
</div>