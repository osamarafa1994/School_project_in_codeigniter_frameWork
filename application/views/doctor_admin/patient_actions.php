<script type="text/javascript">
$(document).ready(function() {
  $("#doctor_id").on('change', function(){
    var docId = $(this).val();
    if(docId != ''){
      var  postData ='id='+docId;
      $.ajax({
        type: "POST",
        url:"<?= base_url() ?>Doctors/day_by_id",
        data: postData,
        success: function(html){
          $("#day").html(html);
        },
        error: function () {
          alert(postData);
        }
      });
    }
  });



  $("#day").on('change', function(){
    var day = 'day='+$(this).val();
    var docId = $('#doctor_id').val();
    var Id ='&id='+docId;
    if(day != ''){
      var  postData =day+Id;
      $.ajax({
        type: "POST",
        url:"<?= base_url() ?>Doctors/resev_day",
        data: postData,
        success: function(html){
          $("#dates").html(html);
        },
        error: function () {
          alert(postData);
        }
      });
    }
  });
});
</script>



<?php $days = array(
  '1'=>'السبت ',
  '2'=>'الاحد',
  '3'=>'الاثنين',
  '4'=>'الثلاثاء',
  '5'=>'الاربعاء',
  '6'=>'الخميس ',
  '7'=>'الجمعه '
); ?>
  <?php echo form_open('Doctors/patients_actions' , 'class="email"  id="form"'); ?>
        <div class="row">
          <div class="col-md-4 col-md-offset-4" style=" background: #e2e6ea;margin:auto;width:50%;">
          <br><h2 class="alert alert-dismissible alert-info" style="text-align:center;">إضافة ميعاد</h2>

          <div class="form-group">
            <select class="form-control" id="pat_id" name="pat_id" required>
              <option value="">اختار المريض </option>

              <?php foreach ($patients as $patient): ?>
                  <option value="<?= $patient->id ?>"><?= $patient->name ?></option>
              <?php endforeach; ?>
            </select>
          </div>
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

            </select>
          </div>
          <div class="form-group">
            <select class="form-control" id="dates" name="dates" required>
              <option value="">اختار الميعادالمناسب </option>
            </select>
          </div>
          <input type="submit" name="submit" class="btn btn-primary btn-block" value="حفظ"><br>
        </div>
    </div>
  </form>
