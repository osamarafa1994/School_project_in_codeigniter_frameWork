
  <?php echo form_open('Users_admin/add_user', 'class="email"  id="form"'); ?>
        <div class="row">
          <div class="col-md-4 col-md-offset-4" style=" background: #e2e6ea;margin:auto;width:50%;">
          <br><h2 class="alert alert-dismissible alert-info" style="text-align:center;">اضافه مستخدم</h2>
          <div class="form-group">
            <input type="text" class="form-control" id="username_form" name="user_name" placeholder="ادخل اسم المستخدم">
            <div class="invalid-feedback" id="username_error"></div>
          </div>
          <div class="form-group">
            <select class="form-control" id="permission" name="permission" required>
              <option value="">اختار نوع الصلاحية</option>
              <?php foreach ($permissions as $permission): ?>
                  <option value="<?php echo $permission->per_id; ?>"><?php echo $permission->per_name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <select class="form-control" id="school" name="school" required>
              <option value="0">اختار اسم المدرسة</option>
              <?php foreach ($schools as $school): ?>
                  <option value="<?php echo $school->id; ?>"><?php echo $school->school_name; ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="password_form" name="password" placeholder="كلمة السر">
            <div class="invalid-feedback" id="password_error"></div>
          </div>
          <div class="form-group">
            <input type="password" class="form-control" id="conf_password_form" name="password2" placeholder="كرر كلمة السر">
            <div class="invalid-feedback" id="conf_password_error"></div>
          </div>
          <input type="submit" name="submit" class="btn btn-primary btn-block" value="اضافه"><br>
        </div>
    </div>
  </form>
