<?php

class School_admin extends CI_Model
{

  function __construct()
  {
    parent::__construct();

  }

  public function select_all_school()
  {
  $query =  $this->db->get('school');
  return $query->result();
  }

  public function school_by_id($id)
  {
    $this->db->where('id',$id);
    $query = $this->db->get('school');
    return $query->row();
  }

  public function add_school()
  {
      $data = array(
        'school_name' => $this->input->post('name'),
        'date_of_establish' => $this->input->post('date_of_establish')
      );

      return $this->db->insert('school', $data);
  }

  public function update_school($id)
  {
    $data = array(
        'school_name' => $this->input->post('name'),
        'date_of_establish' => $this->input->post('date_of_establish')
      );

      $this->db->where('id', $id);
      return $this->db->update('school', $data);
  }

  public function delete_school($id)
  {
    $this->db->where('id',$id);
    return $this->db->delete('school');
  }
}

 ?>
