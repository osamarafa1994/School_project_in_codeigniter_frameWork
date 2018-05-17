<?php

class Levels_admin extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('User_admin');
    $this->load->model('Level_admin');
    $this->load->helper('authorization');

    $check_log = $this->session->userdata('logged_in');
    $sub_pages = $this->session->userdata('sub1')->sub;
    check_validty($check_log, $sub_pages);
    /*
    $prefixed_array = implode(',',preg_filter('/^/', 'Levels_admin/', get_class_methods($this)));
    echo $prefixed_array;
    */
  }

  public function get_levels()
  {
    $data['levels'] = $this->User_admin->level_show();

    if(count($data['levels'])>0){
        $this->load->view('users_admin/level_row', $data);
      }
  }

  public function levels_actions()
  {
    $data['subview'] = 'levels_admin/levels_actions';
    $data['levels'] = $this->User_admin->level_show();

    $this->load->view('admin_index', $data);
  }

  public function edit_level($id)
  {
    $data['subview'] = 'levels_admin/edit_level';
    $data['level'] = $this->Level_admin->level_by_id($id);

    $this->load->view('admin_index', $data);
  }

  public function add_level()
  {
    $data['level_name'] = $this->input->post('level_name');
    $this->Level_admin->add_level($data);
  }

  public function update_level($id)
  {
    $this->form_validation->set_rules('level_name', ' Level Name', 'required');

    if($this->form_validation->run() == false){
    $data['subview'] = 'levels_admin/edit_level';
    $this->load->view('admin_index', $data);
      } else {

        $this->Level_admin->update_level($id);

        //set message
        $this->session->set_flashdata('level_updated','تم تحديث البيانات بنجاح');
        redirect('levels_admin/levels_actions');
      }
 }

 public function delete_level()
 {
   $id = $this->input->post('id');
   $h = $this->Level_admin->delete_level($id);
   if($h){
     echo '1';
   }else {
     echo "0";
   }
 }



}


 ?>
