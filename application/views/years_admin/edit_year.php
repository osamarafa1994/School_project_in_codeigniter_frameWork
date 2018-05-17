
  <?php echo form_open('Years_admin/update_year/'.$year->id , 'id="form"'); ?>
        <div class="row">
          <div class="col-md-4 col-md-offset-4" style=" background: #e2e6ea;margin:auto;width:50%;">
          <br><h2 class="alert alert-dismissible alert-info" style="text-align:center;">تعديل بيانات</h2>
          <div class="form-group">
            <select class="form-control" id="school" name="school" required>
              <option value="">اختارالمدرسة</option>
              <?php foreach ($schools as $school): ?>
                  <option value="<?php echo $school->id; ?>"><?php echo $school->school_name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control" id="level" name="level" required>
              <option value="">اختار مرحلتك</option>
              <?php foreach ($levels as $level): ?>
                  <option value="<?php echo $level->id; ?>"><?php echo $level->level_name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input type="number" class="form-control" name="year" placeholder="ادخل رقم السنة الدراسية" value="<?= $year->n_year_level ?>">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="ادخل اسم السنة" value="<?= $year->year_name ?>">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" name="fees" placeholder="ادخل المصروفات لهذة السنة " value="<?= $year->study_fees ?>">
          </div>
          <input type="submit" name="submit" class="btn btn-primary btn-block" value="حفظ"><br>
        </div>
    </div>
  </form>
