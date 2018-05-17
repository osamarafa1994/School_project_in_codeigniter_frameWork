<?php echo form_open('users/login'); ?>
    <div class="row" style="height:500px">
      <div class="col-md-4 col-lg-5" style=" background: #e2e6ea;margin:auto;width:50%;">
        <br>  <h3 class="alert alert-dismissible alert-info" style="text-align:center;"><?php echo $title; ?><?php echo $this->session->userdata('school_id') ?></h3>
          <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="ادخل اسم المستخدم" required autofocus>
          </div>
          <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="ادخل كلمه السر" required autofocus>
          </div>
          <button type="submit" class="btn btn-primary btn-block">دخول</button>
          اذا لم تكون تمتلك حساب يجب عليك التسجيل اولا <a  href="<?= base_url() ?>users/register">من هنا!</a>
          <div><a href="<?php echo base_url(); ?>users/reset_password">هل نسيت الحساب؟ </a></div>
      </div>
    </div>
</form>
