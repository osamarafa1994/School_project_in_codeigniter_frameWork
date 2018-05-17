<?php

class Permissions_admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Permission_admin');
    $this->load->helper('authorization');

    $check_log = $this->session->userdata('logged_in');
    $sub_pages = $this->session->userdata('sub1')->sub;
    check_validty($check_log, $sub_pages);
    /*
    $prefixed_array = implode(',',preg_filter('/^/', 'Permissions_admin/', get_class_methods($this)));
    echo $prefixed_array;
    */
  }

  public function permissions_actions()
  {
    $data['subview'] = 'permissions_admin/permissions_actions';
    $data['permissions'] = $this->Permission_admin->select_all_permissions();

    $this->load->view('admin_index', $data);
  }

  public function edit_permission($id)
  {
    $data['subview'] = 'permissions_admin/edit_permission';
    $data['permission'] = $this->Permission_admin->permission_by_id($id);
    $data['pages'] = $this->Permission_admin->select_all_pages();
    $this->load->view('admin_index', $data);
  }

  public function add_permission()
{

    $this->form_validation->set_rules('per_name', 'Name', 'is_unique[students.username]', array('is_unique' => 'هذا الاسم موجود من قبل'));

    if($this->form_validation->run() == false){
    $data['pages'] = $this->Permission_admin->select_all_pages();
    $data['subview'] = 'permissions_admin/add_permission';
    $this->load->view('admin_index', $data);
      } else {

        $this->Permission_admin->add_permission();

        //set message
        $this->session->set_flashdata('Permission_added','تم اضافة مدرسة جديده');
        redirect('Permissions_admin/permissions_actions');
      }
  }

  public function update_permission($id)
  {
    $this->form_validation->set_rules('name', 'Name', 'is_unique[students.username]', array('is_unique' => 'هذا الاسم موجود من قبل'));

    if($this->form_validation->run() == false){
    $data['subview'] = 'permissions_admin/add_permission';
    $this->load->view('admin_index', $data);
      } else {

        $this->Permission_admin->update_permission($id);

        //set message
        $this->session->set_flashdata('Permission_updated','تم تحديث البيانات بنجاح');
        redirect('Permissions_admin/permissions_actions');
      }
 }

 public function delete_permission($id)
 {
   $this->Permission_admin->delete_permission($id);
   redirect('Permissions_admin/permissions_actions');
 }



}


 ?>
