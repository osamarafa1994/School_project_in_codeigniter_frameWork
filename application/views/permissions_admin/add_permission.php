
  <?php echo form_open('Permissions_admin/add_permission' , 'class="email"  id="form"'); ?>
        <div class="row">
          <div class="col-md-4 col-md-offset-4" style=" background: #e2e6ea;margin:auto;width:50%;">
          <br><h2 class="alert alert-dismissible alert-info" style="text-align:center;">إضافة صلاحية</h2>
          <div class="form-group">
            <input type="text" class="form-control" id="per_form" value="" name="per_name" placeholder=" ادخل اسم الصلاحية"  maxlength="30" required>
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
