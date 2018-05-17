<?php

class level_admin extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function level_by_id($id)
  {
    $this->db->where('id',$id);
    $query = $this->db->get('level');
    return $query->row();
  }

  public function add_level($data)
  {
      return $this->db->insert('level', $data);
  }

  public function update_level($id)
  {
    $data = array(
      'level_name' => $this->input->post('level_name')
    );

      $this->db->where('id', $id);
      return $this->db->update('level', $data);
  }

  public function delete_level($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('level');
    return true;
  }

}

 ?>
