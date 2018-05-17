
  <?php echo form_open('Permissions_admin/update_permission/'.$permission->per_id , 'class="email"  id="form"'); ?>
        <div class="row">
          <div class="col-md-4 col-md-offset-4" style=" background: #e2e6ea;margin:auto;width:50%;">
          <br><h2 class="alert alert-dismissible alert-info" style="text-align:center;">تعديل بيانات</h2>
          <div class="form-group">
            <input type="text" class="form-control" id="per_form" name="per_name" placeholder=" ادخل اسم الصلاحية"  maxlength="30"  required value="<?= $permission->per_name ?>">
            <div id="per_error"></div>
          </div>
          <?php foreach ($pages as $page): ?>
            <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <input type="checkbox"  name="pages[]" value="<?= $page->page_id ?>"><?= $page->page_name ?>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
          <input type="submit" name="submit" class="btn btn-primary btn-block" value="حفظ"><br>
        </div>
    </div>
  </form>
