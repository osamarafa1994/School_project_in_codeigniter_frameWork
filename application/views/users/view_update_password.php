<div class="col-md-4 col-md-offset-4">
<h4 class="alert alert-dismissible alert-light">Update your Password</h4>
<div class="" id="update_password_form">
  <form class="" action="<?php echo base_url() ?>users/update_password" method="post">
      <div class="form-group">
        <label for="email">Email: </label>
        <?php if (isset($email_hash, $email_code)) : ?>
          <input type="hidden" name="email_hash" value="<?= $email_hash ?>">
          <input type="hidden" name="email_code" value="<?= $email_code ?>">
        <?php endif; ?>
        <input type="email" class="form-control" name="email" placeholder="Enter Your Email"value="<?php echo (isset($email)) ? $email : ""; ?>">
      </div>
      <div class="form-group">
        <label for="password">New Password:</label>
        <input type="password" class="form-control" placeholder="Enter Your Password" name="password" value="">
      </div>
      <div class="form-group">
        <label for="password_conf">New Password again:</label>
        <input type="password" class="form-control" placeholder="Confirm Password" name="password_conf" value="">
      </div>
      <div class="form-group">
        <input type="submit" class="btn btn-primary btn-block" name="submit" value="Update Password">
      </div>
 </form>
     <div class="card border-danger mb-3" >
     <?php
        echo validation_errors();
      ?>
     </div>
</div>
</div>
