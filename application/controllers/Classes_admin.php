<?php

class Classes_admin extends CI_Controller
{

  function __construct()
  {
      parent::__construct();
      $this->load->model('User_admin');
      $this->load->model('School_admin');
      $this->load->model('Class_admin');
      $this->load->helper('authorization');

      $check_log = $this->session->userdata('logged_in');
      $sub_pages = $this->session->userdata('sub1')->sub;
      check_validty($check_log, $sub_pages);
      /*
      $prefixed_array = implode(',',preg_filter('/^/', 'Classes_admin/', get_class_methods($this)));
      echo $prefixed_array;
      */
  }

  public function add_class()
  {
    $level_id = $this->input->post('id');
    $data['levels'] = $this->User_admin->level_show();
    $data['schools'] = $this->School_admin->select_all_school();

    $this->form_validation->set_rules('username', 'Username', 'is_unique[students.username]', array('is_unique' => 'هذا المستخدم موجود بالفعل'));

    if($this->form_validation->run() == false){
    $data['subview'] = 'classes_admin/add_class';
    $this->load->view('admin_index', $data);
      } else {


      $this->Class_admin->add_class();

      //$this->start_session();

      //set message
      $this->session->set_flashdata('class_added' ,'تم اضافه مستخدم جديد');
      redirect('Classes_admin/classes_actions');
    }
  }


  public function edit_class($id)
  {
    $data['subview'] = 'classes_admin/edit_class';
    $data['class'] = $this->Class_admin->class_by_id($id);
    $data['levels'] = $this->User_admin->level_show();
    $data['schools'] = $this->School_admin->select_all_school();

    $this->load->view('admin_index', $data);
  }

  public function update_class($id)
  {
    $this->form_validation->set_rules('school', 'School', 'required');

    if($this->form_validation->run() == false){
    $data['subview'] = 'classes_admin/edit_class';
    $this->load->view('admin_index', $data);
      } else {


      $this->Class_admin->update_class($id);

      //$this->start_session();

      //set message
      $this->session->set_flashdata('class_updated' ,'تم تحديث البيانات بنجاح');
      redirect('Classes_admin/classes_actions');
  }
}


  public function classes_actions()
  {
    $data['classes'] = $this->Class_admin->select_all_classes();
    $data['subview'] = 'classes_admin/classes_actions';

    $this->load->view('admin_index', $data);
  }

  public function delete_class($id)
  {
    $this->Class_admin->delete_class($id);
    redirect('Classes_admin/classes_actions');
  }
}


 ?>
