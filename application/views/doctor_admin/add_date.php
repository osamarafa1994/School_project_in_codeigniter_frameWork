<?php $days = array(
  '1'=>'السبت',
  '2'=>'الاحد',
  '3'=>'الاثنين',
  '4'=>'الثلاثاء',
  '5'=>'الاربعاء',
  '6'=>'الخميس',
  '7'=>'الجمعه'
); ?>


  <form class="" action='<?php echo base_url(); ?><?= (isset($id))? "Doctors/update_date/$id" : "Doctors/add_date" ?>' method="post">
        <div class="row">
          <div class="col-md-4 col-md-offset-4" style=" background: #e2e6ea;margin:auto;width:50%;">
          <br><h2 class="alert alert-dismissible alert-info" style="text-align:center;"><?= (isset($id))? 'تعديل ميعاد': 'إضافة ميعاد'?></h2>

          <div class="form-group">
            <select class="form-control" id="doctor_id" name="doctor_id" required>
              <option value="">اختار الدكتور</option>

              <?php foreach ($doctors as $doctor): ?>
                  <option value="<?= $doctor->doctor_id ?>"><?= $doctor->doc_name ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control" id="day" name="day" required>
              <option value="">اختار اليوم</option>
              <?php foreach ($days as $id=>$day): ?>
                  <option value="<?php echo $day; ?>"><?php echo $day; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input type="time" class="form-control" id="time_from" value="" name="time_from" required>
          </div>
          <div class="form-group">
            <input type="time" class="form-control" id="time_to" value="" name="time_to" required>
          </div>
          <input type="submit" name="submit" class="btn btn-primary btn-block" value="حفظ"><br>
        </div>
    </div>
  </form>
