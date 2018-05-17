<?php

class Users_admin extends CI_Controller
{

  function __construct()
  {
      parent::__construct();
      $this->load->model('User_admin');
      $this->load->model('School_admin');
      $this->load->model('Permission_admin');
      $this->load->helper('file');
      $this->load->helper('authorization');

      $check_log = $this->session->userdata('logged_in');
      $sub_pages = $this->session->userdata('sub1')->sub;
      check_validty($check_log, $sub_pages);

      /*
      $prefixed_array = implode(',',preg_filter('/^/', 'Users_admin/', get_class_methods($this)));
      echo $prefixed_array;
      */
  }


  public function get_valid_username()
  {
    $username = $this->input->post('username');
    $userName = $this->User_admin->valid_username($username);
    $count = count($userName);
    echo $count;
  }


  public function add_student()
  {

    $level_id = $this->input->post('id');
    $data['schools'] = $this->School_admin->select_all_school();
    $data['levels'] = $this->User_admin->level_show();
    $data['transports'] = $this->User_admin->all_transports();

    $this->form_validation->set_rules('username', 'Username', 'is_unique[students.username]', array('is_unique' => 'هذا المستخدم موجود بالفعل'));

    if($this->form_validation->run() == false){
    $data['subview'] = 'users_admin/add_student';
    $this->load->view('admin_index', $data);
      } else {
      $this->load->library('upload');
      $dataInfo = array();
      $files = $_FILES;
      $cpt = count($_FILES['userfile']['name']);
      for($i=0; $i<$cpt; $i++)
      {
          $_FILES['userfile']['name']= $files['userfile']['name'][$i];
          $_FILES['userfile']['type']= $files['userfile']['type'][$i];
          $_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
          $_FILES['userfile']['error']= $files['userfile']['error'][$i];
          $_FILES['userfile']['size']= $files['userfile']['size'][$i];

          $this->upload->initialize($this->set_upload_options());
          $this->upload->do_upload();
          $dataInfo[] = $this->upload->data();
      }

      $data = array(
          'img_name1' => $dataInfo[0]['file_name'],
          'img_name2' => $dataInfo[1]['file_name']
       );

        // Encrypt password
      $enc_password = md5($this->input->post('password'));

      $this->User_admin->add_student($enc_password);
      $this->User_admin->add_img($data);

      //$this->start_session();

      //set message
      $this->session->set_flashdata('user_added' ,'تم اضافه مستخدم جديد');
      redirect('Users_admin/students_actions');
    }
  }

  private function set_upload_options()
{
    //upload an image options
    $config = array();
    $config['upload_path'] = './assets/images/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']      = '3000';

    return $config;
}

  public function years_study()
  {
    $level_id = $this->input->post('id');
    $data['years'] = $this->User_admin->get_years($level_id);

    $this->load->view('users_admin/years_study', $data);
  }

  public function year_study()
  {
    $year_id = $this->input->post('n_year_study');
    $data['classes'] = $this->User_admin->get_classes_by_id($year_id);

    $this->load->view('users_admin/year_study', $data);
  }

  public function select_fees()
  {
    $year_id = $this->input->post('n_year_study');
    $data['fees'] = $this->User_admin->select_fees($year_id);

    $this->load->view('users_admin/fees', $data);
  }

  public function edit_student($id)
  {
    $data['subview'] = 'users_admin/edit_student';
    $data['transports'] = $this->User_admin->all_transports();
    $data['schools'] = $this->School_admin->select_all_school();
    $data['student'] = $this->User_admin->student_by_id($id);
    $data['levels'] = $this->User_admin->level_show();

    $this->load->view('admin_index', $data);
  }

  public function update_student($id)
  {
    $this->form_validation->set_rules('username', 'Username', 'required');

    if($this->form_validation->run() == false){
    $data['subview'] = 'users_admin/edit_student';
    $this->load->view('admin_index', $data);
      } else {

        // Encrypt password
      $enc_password = md5($this->input->post('password'));

      $this->User_admin->update_student($enc_password, $id);

      //$this->start_session();

      //set message
      $this->session->set_flashdata('user_updated' ,'تم تحديث البيانات بنجاح');
      redirect('Users_admin/students_actions');
  }
}


  public function students_actions()
  {
    $data['students'] = $this->User_admin->select_all_students();
    $data['subview'] = 'users_admin/students_actions';

    $this->load->view('admin_index', $data);
  }

  public function delete_student($id)
  {
    $this->User_admin->delete_student($id);
    redirect('Users_admin/students_actions');
  }
//---------------------- Users --------------------------------
  public function users_actions()
  {
    $data['users'] = $this->User_admin->select_all_users();
    $data['subview'] = 'users_admin/users_actions';

    $this->load->view('admin_index', $data);

  }


  public function add_user()
  {
    $data['schools'] = $this->School_admin->select_all_school();
    $data['permissions'] = $this->Permission_admin->select_all_permissions();

    $this->form_validation->set_rules('username', 'Username', 'is_unique[users.username]', array('is_unique' => 'هذا المستخدم موجود بالفعل'));

    if($this->form_validation->run() == false){
    $data['subview'] = 'users_admin/add_user';
    $this->load->view('admin_index', $data);
      } else {

        // Encrypt password
      $enc_password = md5($this->input->post('password'));

      $this->User_admin->add_user($enc_password);

      //$this->start_session();

      //set message
      $this->session->set_flashdata('user_added' ,'تم اضافه مستخدم جديد');
      redirect('Users_admin/users_actions');
    }
  }

  public function edit_user($id)
  {
    $data['user'] = $this->User_admin->select_user_by_id($id);
    $data['schools'] = $this->School_admin->select_all_school();
    $data['permissions'] = $this->Permission_admin->select_all_permissions();
    $data['subview'] = 'users_admin/edit_user';

    $this->load->view('admin_index', $data);
  }

  public function update_user($id)
  {
    $this->form_validation->set_rules('user_name', 'Username', 'required');

    if($this->form_validation->run() == false){
    $data['subview'] = 'users_admin/edit_user';
    $this->load->view('admin_index', $data);
      } else {

        // Encrypt password
      $enc_password = md5($this->input->post('password'));

      $this->User_admin->update_user($enc_password, $id);

      //$this->start_session();

      //set message
      $this->session->set_flashdata('user_updated' ,'تم تحديث البيانات بنجاح');
      redirect('Users_admin/users_actions');
  }
}
public function delete_user($id)
{
  $this->User_admin->delete_user($id);
  redirect('Users_admin/users_actions');
}

//---------------------- Fees --------------------------------
public function fees_actions()
{
  $data['schools'] = $this->School_admin->select_all_school();
  $data['school'] = $this->School_admin->school_by_id($this->session->userdata('school_id'));
  $data['subview'] = 'users_admin/fees_actions';

  $this->load->view('admin_index', $data);

}

public function class_school_id()
{
  $school_id = $this->input->post('school_id');
  $data['classes'] = $this->User_admin->class_school_id($school_id);

  $this->load->view('users_admin/year_study', $data);
}


public function student_byClass_id()
{
  $id = $this->input->post('class_id');
  $data['students'] = $this->User_admin->student_byClass_id($id);

  $this->load->view('users_admin/students', $data);
}

public function calculate_fees()
{
  $student_id = $this->input->post('student_id');
  $data['student'] = $this->User_admin->calculate_fees($student_id);

  $this->load->view('users_admin/student_fees', $data);
}

public function addTofees()
{
  $student_id = $this->input->post('student_id');
  $poid_fees = $this->input->post('sum');
  $reman_fees = $this->input->post('reman_p');
  $sch_id = $this->input->post('sch_id');
  $fees_pays = $this->input->post('fees_pays');
  $c_id = $this->input->post('class_id');


  $this->User_admin->addTofees($student_id,$fees_pays,$sch_id,$c_id);
  $this->User_admin->update_feess($student_id,$poid_fees,$reman_fees);
}

//---------------------- Transports --------------------------------
  public function transports_actions()
  {
    $data['transports'] = $this->User_admin->all_transports();
    $data['subview'] = 'users_admin/transports_actions';

    $this->load->view('admin_index', $data);
  }


    public function price_transport()
    {
      $id = $this->input->post('id');
      $data['transport'] = $this->User_admin->get_transport_by_id($id);

      $this->load->view('users_admin/price', $data);
    }

  public function add_transport()
  {
    $this->form_validation->set_rules('name', 'name', 'required');

    if($this->form_validation->run() == false){
    $data['subview'] = 'users_admin/add_transport';
    $this->load->view('admin_index', $data);
   } else {
     $this->User_admin->add_transport();

     //set message
     $this->session->set_flashdata('transport_added' ,'تم اضافه خد جديد');
     redirect('Users_admin/transports_actions');
   }
  }

  public function edit_transport($id)
  {
    $data['subview'] = 'users_admin/edit_transport';
    $data['transport'] = $this->User_admin->get_transport_by_id($id);

    $this->load->view('admin_index', $data);
  }

  public function update_transport($id)
  {
    $this->form_validation->set_rules('name', 'name', 'required');

    if($this->form_validation->run() == false){
    $data['subview'] = 'users_admin/edit_transport';
    $this->load->view('admin_index', $data);
   } else {
     $this->User_admin->update_transport($id);

     //set message
     $this->session->set_flashdata('transport_updated' ,'تم تحديث البيانات');
     redirect('Users_admin/transports_actions');
   }
  }

  public function delete_transport($id)
  {
    $this->User_admin->delete_transport($id);
    redirect('Users_admin/transports_actions');
  }

  //----------------- Reports ------------------------------

  public function reports_actions()
  {
    $data['schools'] = $this->School_admin->select_all_school();
    $data['school'] = $this->School_admin->school_by_id($this->session->userdata('school_id'));
    $data['subview'] = 'users_admin/reports_actions';

    $this->load->view('admin_index', $data);
  }


  public function report_by_date()
  {

    $sid = $this->input->post('school');
    $d_from = $this->input->post('date_from');
    $d_to = $this->input->post('date_to');


    $data_p['students'] = $this->User_admin->report_by_date_query($sid, $d_from, $d_to);


    $this->load->view('users_admin/report_by_date',$data_p);
  }



}





 ?>
