<?php

class Users extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('User_model');
  }


  // Register user
  public function register()
  {
    $data['title'] = 'التسجيل';
    $this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]', array('is_unique' => 'This username already exists choose anther one.'));

    if($this->form_validation->run() == false){

      $data['subview'] = 'users/register';
      $this->load->view('admin_index', $data);

    } else {

      // Encrypt password
    $enc_password = md5($this->input->post('password'));

    $this->User_model->register($enc_password);

    //$this->start_session();

    //set message
    $this->session->set_flashdata('user_registered' ,'تم التسجيل بنجاح ويمكنك الان الدخول ');
    redirect('control');
  }
  }





 // Log in User
  public function login()
  {
    if($this->session->userdata('logged_in')){
      redirect('control');
    }
    $data['title'] = 'تسجيل الدخول';

    $this->form_validation->set_rules('username', 'username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');

    if($this->form_validation->run() === FALSE){
      $data['subview'] = 'users/login';
      $this->load->view('admin_index', $data);
    } else {

        
        // Get username
        $username = $this->input->post('username');
        // Get and encrypt the password
        $password = md5($this->input->post('password'));

        // Login user_registered
        $userdata  = $this->User_model->login($username, $password);

        $user_id = $userdata->user_id;



        if ($user_id) {

          $user_data = array(
            'user_id' => $user_id,
            'rol_id' => $userdata->rol_id,
            'sub' => $userdata->sub,
            'sub1' => $userdata->sub1,
            'pages_id' => $userdata->pages_id,
            'school_id' => $userdata->school_id,
            'user_name'  => $username,
            'logged_in' => true
          );

          $this->session->set_userdata($user_data);
          //set message
          $this->session->set_flashdata('user_loggedin' ,'تم تسجيل الدخول بنجاح');
          redirect('control');

        } else {
        //set message
        $this->session->set_flashdata('login_failed' ,' يوجد خطا في اسم المسخدم او كلمه السر حاول مره اخري');
        redirect('users/login');
      }
    }
  }

  // reset Password

  public function reset_password()
  {
    if(isset($_POST['email']) && !empty($_POST['email'])){
      $this->form_validation->set_rules('email', 'Email Address', 'required');
      if ($this->form_validation->run() == FALSE) {
        $data['error'] =  'Please supply a valid email.';
        $data['subview'] = 'users/login';

        $this->load->view('admin_index' ,$data);
      }else {
        $email = trim($this->input->post('email'));
        $result = $this->User_model->email_exists($email);
        if ($result) {
          # if we found the email , $result is now their first name
          $this->send_reset_password_email($email, $result);
          $data['email'] = $email;
          $data['subview'] = 'users/view_reset_password_sent';

          $this->load->view('admin_index' ,$data);
        }else {
          $data['error'] = 'This email do not have an account.';
          $data['subview'] = 'users/view_reset_password';

          $this->load->view('admin_index' ,$data);
        }
      }
    }else {
      $data['subview'] = 'users/view_reset_password';

      $this->load->view('admin_index', $data);
    }
  }

  public function reset_password_form($email, $email_code)
  {
    if(isset($email, $email_code)){
      $email = trim($email);
      $email_hash = sha1($email, $email_code);
      $verified = $this->User_model->verify_reset_password_code($email, $email_code);

      if ($verified) {
        $data['email_hash'] = $email_hash;
        $data['email_code'] = $email_code;
        $data['email'] = $email;
        $data['subview'] = 'users/view_update_password';

        $this->load->view('admin_index', $data);
      }else {
        $data['error'] = 'There was a problem with your link.';
        $data['email'] = $email;
        $data['subview'] = 'users/view_reset_password';

        $this->load->view('admin_index', $data);
      }
    }
  }

  private function send_reset_password_email($email, $name)
  {
    $email_code = md5($this->config->item('salt') . $name);

    $this->email->set_mailtype('html');
    $this->email->from($this->config->item('bot_email'), 'PHP');
    $this->email->to($email);
    $this->email->subject('Please reset your password at PHP');
    $message = '<!DOCTYPE html><html lang="en" dir="ltr">
                <head><meta charset="utf-8">
                <title></title>
                </head><body>';

  $message .='<p>Dear ' . $name . ',</P>';
  $message .='<p>We want to help you reset your password! Please <strong><a href="' . base_url() . 'users/reset_password_form/' . $email . '/' . $email_code . '">click here</a></strong> to reset your password .</p>';
  $message .='<p>Thank you!</p>';
  $message .='<p>The Team at PHP</p>';
  $message .= ' </body></html>';

  $this->email->message($message);
  $this->email->send();
  }


  public function update_password()
  {
    if (!isset($_POST['email'], $_POST['email_hash']) || $_POST['email_hash'] == sha1($_POST['email'] . $_POST['email_code'])) {
      die('Error Update your password');
    }

    $this->form_validation->set_rules('email_hash', 'Email Hash', 'trim|required');
    $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[50]|matches[password_conf]');
    $this->form_validation->set_rules('password_conf', 'Confirmed Password', 'trim|required|min_length[6]|max_length[50]');

    if($this->form_validation->run() == FALSE){
      $data['subview'] = 'users/view_update_password';

      $this->load->view('admin_index', $data);
    } else {
      $result = $this->User_model->update_password();

      if($result){
        $data['subview'] = 'users/view_update_password_success';

        $this->load->view('admin_index', $data);
      } else {
        $data['error'] = 'Problem updating your password, Please contact ' . $this->config->item('admin_email');
        $data['subview'] = 'users/view_update_password';

        $this->load->view('admin_index', $data);
      }
    }

  }


  // Personal information
  public function profile(){
    // Check logged_in
    if(!$this->session->userdata('logged_in')){
      redirect('users/login');
    }

    $data['title'] = ' Personal Information';
    $data['subview'] = 'users/profile';

    $this->load->view('admin_index', $data);
  }

  // Logout User
  public function logout()
  {
    // Check logged_in
    if(!$this->session->userdata('logged_in')){
      redirect('users/login');
    }
      $user_data = array(
        'user_id' ,
        'rol_id',
        'sub',
        'sub1',
        'school_id',
        'pages_id',
        'user_name',
        'logged_in'
      );
      // unset user data

      $this->session->unset_userdata($user_data);

      //set message
      $this->session->set_flashdata('user_loggedout' ,'تم تسجيل الخروج بنجاح ');
      redirect('users/login');

  }

}

 ?>
