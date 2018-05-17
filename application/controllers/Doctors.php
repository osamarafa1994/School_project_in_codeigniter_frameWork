<?php

class Doctors extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->load->model('Doctor');
  }

  public function doctors_actions()
  {
    $data['doctors'] = $this->Doctor->get_doctors_dates();
    $data['subview'] = 'doctor_admin/dates_actions';

    $this->load->view('admin_index', $data);
  }

  public function add_date()
  {
    $this->form_validation->set_rules('time', 'Time', 'is_unique[students.username]', array('is_unique' => 'هذا الاسم موجود من قبل'));

    if($this->form_validation->run() == false){
    $data['doctors'] = $this->Doctor->get_doctors();
    $data['subview'] = 'doctor_admin/add_date';
    $this->load->view('admin_index', $data);
    } else {
        $d_id = $this->Doctor->add_date();
        $this->Doctor->add_dates($d_id);

        //set message
        $this->session->set_flashdata('date_added','تم اضافة ميعاد');
        redirect('Doctors/doctors_actions');
      }
  }


  public function patients_actions()
  {

    if(!isset($_POST['submit'])){
      $data['doctors'] = $this->Doctor->get_doctors();
      $data['patients'] = $this->Doctor->get_students();
      $data['subview'] = 'doctor_admin/patient_actions';

      $this->load->view('admin_index', $data);
    } else {
        $this->Doctor->add_booking();


        //set message
        $this->session->set_flashdata('booking_added','تم اضافة ميعاد');
        redirect('Doctors/patients_actions');
      }


  }


  public function day_by_id()
  {
    $doc_id = $this->input->post('id');
    $data['days'] = $this->Doctor->get_doctors_days($doc_id);
    $this->load->view('doctor_admin/days', $data);
  }

  public function resev_day()
  {
    $day = $this->input->post('day');
    $doc_id = $this->input->post('id');
    $data['days'] = $this->Doctor->get_doctors_times($day, $doc_id);
    $this->load->view('doctor_admin/resev', $data);
  }


  public function add_booking()
  {

    if(!isset($_POST['submit'])){
    $data['doctors'] = $this->Doctor->get_doctors();
    $data['subview'] = 'doctor_admin/add_date';
    $this->load->view('admin_index', $data);
    } else {
        $d_id = $this->Doctor->add_date();
        $this->Doctor->add_dates($d_id);

        //set message
        $this->session->set_flashdata('date_added','تم اضافة ميعاد');
        redirect('Doctors/doctors_actions');
      }
  }

  public function edit_date($id)
  {
    $data['subview'] = 'doctor_admin/add_date';
    $data['doctors'] = $this->Doctor->get_doctors();
    $data['id'] = $id;

    $this->load->view('admin_index', $data);
  }

  public function update_date($id)
  {
    $this->form_validation->set_rules('time', 'Time', 'is_unique[students.username]', array('is_unique' => 'هذا الاسم موجود من قبل'));

    if($this->form_validation->run() == false){
    $data['doctors'] = $this->Doctor->get_doctors();
    $data['subview'] = 'doctor_admin/add_date';
    $data['id'] = $id;
    $this->load->view('admin_index', $data);
    } else {
        $d_id = $this->Doctor->update_date($id);
        $this->Doctor->delete_times($d_id);
        $this->Doctor->add_dates($d_id);

        //set message
        $this->session->set_flashdata('date_added','تم اضافة ميعاد');
        redirect('Doctors/doctors_actions');
      }
  }


  public function delete_date($id)
  {
    $this->Doctor->delete_date($id);
    redirect('Doctors/doctors_actions');
  }
}


 ?>
