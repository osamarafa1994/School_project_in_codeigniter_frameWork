<?php

class Class_admin extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function level_show()
  {
    $query = $this->db->get('level');
    return $query->result();
  }

  public function add_class()
  {
    $level_id = $this->input->post('level');

    # User data array
    $data = array(
        'level_id' => $level_id,
        'school_id' => $this->input->post('school'),
        'study_year_id' => $this->input->post('year')
        );

        // insert user_registered
        return $this->db->insert('class', $data);
  }


  public function class_by_id($id)
  {
    $this->db->where('class_id', $id);
    $query = $this->db->get('class');
    return $query->row();
  }

   public function select_all_classes(){
       $this->db->select('class.class_id, school.school_name');
       $this->db->join('school', 'class.school_id = school.id');
       $this->db->from('class');
       $query = $this->db->get();
       return $query->result();
    }


  public function student_by_id($id)
  {
    $this->db->where('id',$id);
    $query = $this->db->get('students');
    return $query->row();
  }

  public function update_class($id)
  {
    $level_id = $this->input->post('level');

    $data = array(
        'level_id' => $level_id,
        'school_id' => $this->input->post('school'),
        'study_year_id' => $this->input->post('year')
        );

    $this->db->where('class_id', $id);
    return $this->db->update('class', $data);
  }

  public function delete_class($id)
  {
    $this->db->where('class_id',$id);
    $this->db->delete('class');
    return true;
  }
}

 ?>
