<div class="col-md-4 col-md-offset-4">
<h2>Reset Password</h2>
<div class="form-group" id="reset_password_form">
  <form class="" action="<?php echo base_url() ?>users/reset_password" method="post">
    <div class="form-group">
      <label for="email">Email</label>
      <input class="form-control"type="email" placeholder="Enter your Email" value="<?php echo set_value('email'); ?>" name="email" />
    </div>
    <div class="form-group">
      <input class="btn btn-primary btn-block"  type="submit" name="submit" value="Reset my Password">
    </div>
  </form>
  <?php
    echo validation_errors('<p class="error">');
    if(isset($error)){
      echo '<p class="card text-white bg-danger mb-3">' . $error . '</p>';
    }
  ?>
</div>
</div>
