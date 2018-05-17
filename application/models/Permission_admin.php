<?php

class Permission_admin extends CI_Model
{

  function __construct()
  {
    parent::__construct();
  }

  public function select_all_permissions()
  {
  $query =  $this->db->get('permission');
  return $query->result();
  }

  public function select_all_pages()
  {
  $query =  $this->db->get('pages');
  return $query->result();
  }

  public function permission_by_id($id)
  {
    $this->db->where('per_id',$id);
    $query = $this->db->get('permission');
    return $query->row();
  }

  public function add_permission()
  {
      $allPages = implode(',' ,$_POST['pages']);
      $data = array(
        'per_name' => $this->input->post('per_name'),
        'pages_id' => $allPages
      );

      return $this->db->insert('permission', $data);
  }

  public function update_permission($id)
  {
    $allPages = implode(',' ,$_POST['pages']);
    $data = array(
        'per_name' => $this->input->post('per_name'),
        'pages_id' => $allPages
      );

      $this->db->where('per_id', $id);
      return $this->db->update('permission', $data);
  }

  public function delete_permission($id)
  {
    $this->db->where('per_id',$id);
    $this->db->delete('permission');
    return true;
  }
}

 ?>
