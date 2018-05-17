<?php

class Doctor extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }


  public function get_doctors_dates()
  {
    $query = $this->db->get('doctor_dates');
    if ($query->num_rows() > 0) {
    $i=0;$data= $query->result();
      foreach ($query->result() as $row) {
        $data[$i]->doctor = $this->get_select_doctor_by_id($row->doctor_id);
        $i++;
      }
    }
        return $data;
  }


  public function get_doctors()
  {
    $query = $this->db->get('doctors');
    return $query->result();
  }

  public function get_students()
  {
    $query = $this->db->get('students');
    return $query->result();
  }

  public function get_select_doctor_by_id($id)
  {
    $this->db->where('doctor_id', $id);
    $query =  $this->db->get('doctors');
    return $query->row();
  }

  public function add_date()
  {
    $data = array(
      'doctor_id' => $this->input->post('doctor_id'),
      'time_from' => $this->input->post('time_from'),
      'time_to' => $this->input->post('time_to'),
      'day' => $this->input->post('day')
    );

    $this->db->insert('doctor_dates',$data);
    $insert_id = $this->db->insert_id();
    return ($insert_id)? $insert_id : false;
  }

  public function update_date($id)
  {
    $data = array(
      'doctor_id' => $this->input->post('doctor_id'),
      'time_from' => $this->input->post('time_from'),
      'time_to' => $this->input->post('time_to'),
      'day' => $this->input->post('day')
    );

    $this->db->where('date_id', $id);
    $this->db->update('doctor_dates',$data);
    $status = $this->db->affected_rows();
    return ($status)? $id : false;
  }


  public function add_dates($d_id)
  {
    $id =$this->input->post('doctor_id');
    $base_time = strtotime($this->input->post('time_from'));
    $p_time = array();
    for ($i=0; $i < 6; $i++) {
      $p_time[$i] =array(
        'time' => date('H:i:s', ($base_time +(20*60*$i))),
        'doctor_id' => $id,
        'date_id' => $d_id,
        'day' => $this->input->post('day')
      );
    }
    return $this->db->insert_batch('patient',$p_time);
  }



  public function delete_times($id)
  {
    $this->db->where('date_id', $id);
    return $this->db->delete('patient');
  }


  public function get_doctors_days($doc_id)
  {
    $this->db->select('count(day) , day');
    $this->db->where('doctor_id', $doc_id);
    $this->db->group_by('day');
    $query =  $this->db->get('patient');
    return $query->result();
  }

  public function get_doctors_times($day, $doc_id)
  {
    $query = $this->db->select('time,resev_id')->from('patient')
              ->group_start()
                      ->where('doctor_id', $doc_id)
                      ->where('day', $day)
              ->group_end()
              ->get();

    if ($query->num_rows() > 0) {
    $i=0;$data= $query->result();
      foreach ($query->result() as $row) {
        $data[$i]->reseved = $this->get_reseved($row->resev_id);
        $i++;
      }
    }
        return $data;
  }


  public function add_booking()
  {
    $data = array(
      'doctor_id' => $this->input->post('doctor_id'),
      'patient_id' => $this->input->post('pat_id'),
      'resev_id' => $this->input->post('dates'),
      'day' => $this->input->post('day')
    );

    return $this->db->insert('reseved', $data);
  }

  public function get_reseved($id)
  {
    $this->db->where('resev_id', $id);
    $query = $this->db->get('reseved');
    return ($query->num_rows() > 0) ? 'reseved' : false;
  }

  public function delete_date($id)
  {
    $this->db->where('date_id', $id);
    return $this->db->delete('doctor_dates');
  }

  public function delete_patient_dates()
  {
    $this->db->where('date_id', $id);
    return $this->db->delete('patient');
  }
}

 ?>
