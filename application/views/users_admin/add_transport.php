
  <?php echo form_open('Users_admin/add_transport', 'id="form"'); ?>
        <div class="row">
          <div class="col-md-4 col-md-offset-4" style=" background: #e2e6ea;margin:auto;width:50%;">
          <br><h2 class="alert alert-dismissible alert-info" style="text-align:center;">اضافه خط جديد</h2>
          <div class="form-group">
            <input type="text" class="form-control" id="name_form" name="name" placeholder="ادخل اسم الخط">
            <div class="invalid-feedback" id="name_error"></div>
          </div>
          <div class="form-group">
            <input type="number" class="form-control" id="go_form" name="go" placeholder="ادخل سعر الذهاب فقط">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" id="back_form" name="back" placeholder="ادخل سعر العوده فقط">
          </div>
          <div class="form-group">
            <input type="number" class="form-control" id="all_form" name="full" placeholder="ادخل  سعر رحله كاملة">
          </div>
          <input type="submit" name="submit" class="btn btn-primary btn-block" value="اضافه"><br>
        </div>
    </div>
  </form>
