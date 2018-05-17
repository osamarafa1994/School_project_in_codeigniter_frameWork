<?php

class Schools_admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('School_admin');
    $this->load->helper('authorization');

    $check_log = $this->session->userdata('logged_in');
    $sub_pages = $this->session->userdata('sub1')->sub;
    check_validty($check_log, $sub_pages);
    /*
    $prefixed_array = implode(',',preg_filter('/^/', 'Schools_admin/', get_class_methods($this)));
    echo $prefixed_array;
    */
  }

  public function schools_actions()
  {
    $data['subview'] = 'schools_admin/schools_actions';
    $data['schools'] = $this->School_admin->select_all_school();
    $this->load->view('admin_index', $data);
  }

  public function edit_school($id)
  {
    $data['subview'] = 'schools_admin/edit_school';
    $data['school'] = $this->School_admin->school_by_id($id);

    $this->load->view('admin_index', $data);
  }

  public function add_school()
{
    $this->form_validation->set_rules('name', 'Name', 'is_unique[students.username]', array('is_unique' => 'هذا الاسم موجود من قبل'));

    if($this->form_validation->run() == false){
    $data['subview'] = 'schools_admin/add_school';
    $this->load->view('admin_index', $data);
      } else {

        $this->School_admin->add_school();

        //set message
        $this->session->set_flashdata('school_added','تم اضافة مدرسة جديده');
        redirect('Schools_admin/schools_actions');
      }
  }

  public function update_school($id)
  {
    $this->form_validation->set_rules('name', 'Name', 'is_unique[students.username]', array('is_unique' => 'هذا الاسم موجود من قبل'));

    if($this->form_validation->run() == false){
    $data['subview'] = 'schools_admin/add_school';
    $this->load->view('admin_index', $data);
      } else {

        $this->School_admin->update_school($id);

        //set message
        $this->session->set_flashdata('school_updated','تم تحديث البيانات بنجاح');
        redirect('Schools_admin/schools_actions');
      }
 }

 public function delete_school($id)
 {
   $this->School_admin->delete_school($id);
   redirect('Schools_admin/schools_actions');
 }



}


 ?>
