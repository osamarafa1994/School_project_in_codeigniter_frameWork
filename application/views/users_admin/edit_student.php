
  <?php echo form_open('Users_admin/update_student/'.$student->id , 'class="email"  id="form"'); ?>
        <div class="row">
          <div class="col-md-4 col-md-offset-4" style=" background: #e2e6ea;margin:auto;width:50%;">
          <br><h2 class="alert alert-dismissible alert-info" style="text-align:center;">تعديل بيانات</h2>
          <div class="form-group">
            <input type="text" class="form-control" id="name_form" name="name" value="<?= $student->name ?>" placeholder="ادخل اسمك">
            <div class="invalid-feedback" id="name_error"></div>
          </div>
          <div class="form-group">
            <select class="form-control" id="school" name="school" required>
              <option value="">اختار اسم المدرسة</option>
              <?php foreach ($schools as $school): ?>
                  <option value="<?php echo $school->id; ?>"><?php echo $school->school_name; ?></option>
              <?php endforeach; ?>
            </select>
            <div class="invalid-feedback" id="school_error"></div>
          </div>
          <div class="form-group">
            <select class="form-control" id="level" name="level" required>
              <option value="">اختار مرحلتك</option>
              <?php foreach ($levels as $level): ?>
                  <option value="<?php echo $level->id; ?>"><?php echo $level->level_name; ?></option>
              <?php endforeach; ?>
            </select>
            <div class="invalid-feedback" id="level_error"></div>
          </div>
          <div class="form-group">
            <select class="form-control" id="years_study" name="year" required>
                <option value="">اختار الصف </option>
            </select>
          </div>
            <div class="form-group">
              <select class="form-control" id="class" name="class" required>
                  <option value="">اختار رقم الفصل</option>
              </select>
            </div>
            <div class="form-group" id="fee">
            </div>
            <div class="form-group">
              <select class="form-control" id="transport" name="transport">
                <option value="">اختار اسم الخط</option>
                <?php foreach ($transports as $transport): ?>
                    <option value="<?php echo $transport->id; ?>"><?= $transport->name ?></option>
                <?php endforeach; ?>
              </select>
            </div>
            <div class="form-group" id="pricee">

            </div>
            <div class="form-group">
              <select class="form-control" id="tax_type" name="tax_type" required>
                  <option value="">اختار نوع الضريبة</option>
                  <option value="1">قيمه</option>
                  <option value="2">نسبه</option>
              </select>
            </div>
            <input type="text" class="form-control" id="tax1" name="tax1" value="" disabled="">
            <input type="text" class="form-control" id="tax2" name="tax2" value="" disabled="">

            <div class="form-group">
              <input type="number" id="total" name="total" placeholder=" الاجمالي " readonly>
            </div>
          <div class="form-group">
            <input type="text" class="form-control" id="username_form" value="<?= $student->username ?>" name="username" placeholder="ادخل اسم مستخدم مناسب"  maxlength="30">
            <div id="username_error"></div>
            <div class="text-danger"><?php echo form_error('username'); ?></div>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="password_form" name="password" placeholder="كلمة السر">
            <div class="invalid-feedback" id="password_error"></div>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="conf_password_form" name="password2" placeholder="كرر كلمة السر">
            <div class="invalid-feedback" id="conf_password_error"></div>
          </div>
          <input type="submit" name="submit" class="btn btn-primary btn-block" value="حفظ"><br>
        </div>
    </div>
  </form>
