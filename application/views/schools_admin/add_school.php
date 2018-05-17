
  <?php echo form_open('Schools_admin/add_school' , 'class="email"  id="form"'); ?>
        <div class="row">
          <div class="col-md-4 col-md-offset-4" style=" background: #e2e6ea;margin:auto;width:50%;">
          <br><h2 class="alert alert-dismissible alert-info" style="text-align:center;">إضافة مدرسة</h2>
          <div class="form-group">
            <input type="text" class="form-control" id="school_form" value="" name="name" placeholder=" ادخل اسم المدرسة"  maxlength="30" required>
            <div id="shool_error"></div>
          </div>
          <div class="form-group">
            <input type="date" class="form-control" id="date_form" name="date_of_establish" value="" placeholder="ادخل تاريخ انشائها">
            <div class="invalid-feedback" id="date_error"></div>
          </div>      
          <input type="submit" name="submit" class="btn btn-primary btn-block" value="حفظ"><br>
        </div>
    </div>
  </form>
