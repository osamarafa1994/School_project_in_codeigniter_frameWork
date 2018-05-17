<?php echo form_open('Levels_admin/update_level/'. $level->id , 'class="email"  id="form"'); ?>
      <div class="row">
        <div class="col-md-4 col-md-offset-4" style=" background: #e2e6ea;margin:auto;width:50%;">
        <br><h2 class="alert alert-dismissible alert-info" style="text-align:center;">تحديث بيانات</h2>
        <div class="form-group">
          <input type="text" class="form-control" id="school_form" value="<?= $level->level_name ?>" name="level_name" placeholder=" ادخل اسم المرحلة"  maxlength="30" required>
          <div id="shool_error"></div>
        </div>
        <input type="submit" name="submit" class="btn btn-primary btn-block" value="اضافة"><br>
      </div>
  </div>
</form>
