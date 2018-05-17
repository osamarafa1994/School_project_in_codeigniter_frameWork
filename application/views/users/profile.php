<h1 class="text-center"><?php echo $title; ?></h1>

 <div class="jumbotron">
  <p class="display-3">Hello,<?php echo   $this->session->userdata('name'); ?> !</p>
  <h3 class="lead">Your E_mail :  <?php echo $this->session->userdata('email'); ?></h3>
  <h3 class="lead">Your zipcode : <?php echo $this->session->userdata('zipcode'); ?></h3>
  <h3 class="lead">Username : <?php echo $this->session->userdata('username'); ?></h3>

  <hr class="my-4">
  <p></p>
  <p class="lead">
    Thank you for joining to your BLOG !
  </p>
</div>
