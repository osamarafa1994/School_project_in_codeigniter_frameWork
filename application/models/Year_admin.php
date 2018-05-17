<?php

class Year_admin extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }


  public function add_year()
  {
    $level_id = $this->input->post('level');

    # User data array
    $data = array(
        'level_id' => $level_id,
        'year_name' =>$this->input->post('name'),
        'school_id' => $this->input->post('school'),
        'n_year_level' => $this->input->post('year'),
        'study_fees' => $this->input->post('fees')
        );

        // insert user_registered
        return $this->db->insert('study_year', $data);
  }


  public function year_by_id($id)
  {
    $this->db->where('id', $id);
    $query = $this->db->get('study_year');
    return $query->row();
  }

   public function select_all_years(){
        $query = $this->db->get('study_year');
        return $query->result();
    }

  public function update_year($id)
  {
    $level_id = $this->input->post('level');

    $data = array(
        'level_id' => $level_id,
        'year_name' =>$this->input->post('name'),
        'school_id' => $this->input->post('school'),
        'n_year_level' => $this->input->post('year'),
        'study_fees' => $this->input->post('fees')
        );

    $this->db->where('id', $id);
    return $this->db->update('study_year', $data);
  }

  public function delete_year($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('study_year');
    return true;
  }
}

 ?>
