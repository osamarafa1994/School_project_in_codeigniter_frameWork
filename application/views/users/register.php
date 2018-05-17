
  <?php echo form_open('users/register', 'class="email"  id="form"'); ?>
        <div class="row">
          <div class="col-md-4 col-md-offset-4" style=" background: #e2e6ea;margin:auto;width:50%;">
          <br><h2 class="alert alert-dismissible alert-info" style="text-align:center;"><?= $title ?></h2>
          <div class="form-group">
            <input type="text" class="form-control" id="name_form" name="name" placeholder="ادخل اسمك">
            <div class="invalid-feedback" id="name_error"></div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="zip_form" name="zipcode" placeholder="  ادخل مرحلتك">
            <div class="invalid-feedback" id="zip_error"></div>
          </div>
          <div class="form-group">
            <input type="text" class="form-control" id="username_form" name="username" placeholder="ادخل اسم مستخدم مناسب"  maxlength="30">
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
          <input type="submit" name="submit" class="btn btn-primary btn-block" value="تسجيل"><br>
        </div>
    </div>
  </form>
