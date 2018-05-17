<?php

class Years_admin extends CI_Controller
{

  function __construct()
  {
      parent::__construct();
      $this->load->model('User_admin');
      $this->load->model('School_admin');
      $this->load->model('Year_admin');
      $this->load->helper('authorization');

      $check_log = $this->session->userdata('logged_in');
      $sub_pages = $this->session->userdata('sub1')->sub;
      check_validty($check_log, $sub_pages);
      
      /*
      $prefixed_array = implode(',',preg_filter('/^/', 'Years_admin/', get_class_methods($this)));
      echo $prefixed_array;
      */
  }

  public function add_year()
  {
    $level_id = $this->input->post('id');
    $data['levels'] = $this->User_admin->level_show();
    $data['schools'] = $this->School_admin->select_all_school();

    $this->form_validation->set_rules('school', 'Username', 'required');

    if($this->form_validation->run() == false){
    $data['subview'] = 'years_admin/add_year';
    $this->load->view('admin_index', $data);
      } else {


      $this->Year_admin->add_year();

      //$this->start_session();

      //set message
      $this->session->set_flashdata('year_added' ,'تم اضافه سنه دراسية جديده');
      redirect('Years_admin/years_actions');
    }
  }


  public function edit_year($id)
  {
    $data['subview'] = 'years_admin/edit_year';
    $data['year'] = $this->Year_admin->year_by_id($id);
    $data['levels'] = $this->User_admin->level_show();
    $data['schools'] = $this->School_admin->select_all_school();

    $this->load->view('admin_index', $data);
  }

  public function update_year($id)
  {
    $this->form_validation->set_rules('school', 'School', 'required');

    if($this->form_validation->run() == false){
    $data['subview'] = 'years_admin/edit_year';
    $this->load->view('admin_index', $data);
      } else {


      $this->Year_admin->update_year($id);

      //$this->start_session();

      //set message
      $this->session->set_flashdata('year_updated' ,'تم تحديث البيانات بنجاح');
      redirect('Years_admin/years_actions');
  }
}


  public function years_actions()
  {
    $data['years'] = $this->Year_admin->select_all_years();
    $data['subview'] = 'years_admin/years_actions';

    $this->load->view('admin_index', $data);
  }

  public function delete_year($id)
  {
    $this->Year_admin->delete_year($id);
    redirect('Years_admin/years_actions');
  }
}


 ?>
