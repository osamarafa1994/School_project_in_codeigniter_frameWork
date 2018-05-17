<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Schools</title>
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/css/bootstrap-rtl.css">



    <script src="http://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
      <?php if ($this->session->userdata('logged_in')): ?>
        <a class="navbar-brand" href="<?php echo base_url(); ?>control">نظام ادارة مدارس</a>
      <?php endif; ?>
         <div class="collapse navbar-collapse" id="navbarColor02">
          <ul class="nav navbar-nav mr-auto">
            <?php if (!$this->session->userdata('logged_in')): ?>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>users/login">دخول</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>users/register">تسجيل</a>
              </li>
              <?php endif; ?>
              <?php if ($this->session->userdata('logged_in')): ?>
            <li class="nav-item">
              <a class="nav-link" href="<?= base_url() ?>control">الرئيسية </a>
            </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url() ?>users/logout">خروج </a>
              </li>
            <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

</div>
<div class="container" style="padding:20px;">

      <!-- Flash messages -->
  <?php if($this->session->flashdata('user_registered')) : ?>
    <?php echo '<p class ="alert alert-dismissible alert-success">' . $this->session->flashdata('user_registered') . '</p>' ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('school_added')) : ?>
    <?php echo '<p class ="alert alert-dismissible alert-success">' . $this->session->flashdata('school_added') . '</p>' ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('school_updated')) : ?>
    <?php echo '<p class ="alert alert-dismissible alert-success">' . $this->session->flashdata('school_updated') . '</p>' ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('category_created')) : ?>
    <?php echo '<p class ="alert alert-dismissible alert-success">' . $this->session->flashdata('user_registered') . '</p>' ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('post_deleted')) : ?>
    <?php echo '<p class ="alert alert-dismissible alert-success">' . $this->session->flashdata('post_deleted') . '</p>' ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('login_failed')) : ?>
    <?php echo '<p class ="alert alert-dismissible alert-danger">' . $this->session->flashdata('login_failed') . '</p>' ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('user_loggedin')) : ?>
    <?php echo '<p class ="alert alert-success">' . $this->session->flashdata('user_loggedin') . '</p>' ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('user_loggedout')) : ?>
    <?php echo '<p class ="alert alert-success">' . $this->session->flashdata('user_loggedout') . '</p>' ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('category_deleted')) : ?>
    <?php echo '<p class ="alert alert-dismissible alert-success">' . $this->session->flashdata('category_deleted') . '</p>' ?>
  <?php endif; ?>
