<?php

class User_admin extends CI_Model
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

  public function level_name($level_id)
  {
    $this->db->where('id', $level_id);
    $query = $this->db->get('level');
    return $query->row();
  }

  public function valid_username($username)
  {

    $query = $query = $this->db->select('*')->from('students')->where('username',$username)->get();
    return $query->row();
  }

  public function add_student($enc_password)
  {
    $level_id = $this->input->post('level');

    # User data array
    $data = array(
        'name' => $this->input->post('name'),
        'school_id' => $this->input->post('school'),
        'level_id' => $level_id,
        'class_id' => $this->input->post('class'),
        'study_fees' => $this->input->post('fees'),
        'username' => $this->input->post('username'),
        'total_fees' => $this->input->post('total'),
        'transport_id' => $this->input->post('transport'),
        'password' => $enc_password
        );

        // insert user_registered
        return $this->db->insert('students', $data);
  }

  public function add_img($data)
  {
      return $this->db->insert('images', $data);
  }

  public function get_years($level_id)
  {
    $this->db->where('level_id', $level_id);
    $this->db->order_by('n_year_level', 'ASC');
    $query = $this->db->get('study_year');
    return $query->result();
  }

  public function get_classes_by_id($year_id)
  {
    $this->db->where('study_year_id', $year_id);
    $query = $this->db->get('class');
    return $query->result();
  }



  public function class_school_id($school_id)
  {
    $this->db->where('school_id', $school_id);
    $query = $this->db->get('class');
    return $query->result();
  }

  public function select_fees($year_id)
  {
    $this->db->where('id', $year_id);
    $query = $this->db->get('study_year');
    return $query->row();
  }

   public function select_all_students(){
        $this->db->select(' students.id , students.name ,level.level_name');
		    $this->db->join('level', 'level.id = students.level_id');
        $this->db->from('students');
        $query = $this->db->get();
        return $query->result();
    }

  public function student_by_id($id)
  {
    $this->db->where('id',$id);
    $query = $this->db->get('students');
    return $query->row();
  }

  public function update_student($enc_password, $id)
  {
    $level_id = $this->input->post('level');

    $data = array(
        'name' => $this->input->post('name'),
        'school_id' => $this->input->post('school'),
        'level_id' => $level_id,
        'class_id' => $this->input->post('class'),
        'study_fees' => $this->input->post('fees'),
        'total_fees' => $this->input->post('total'),
        'transport_id' => $this->input->post('transport'),
        'username' => $this->input->post('username'),
        'password' => $enc_password
        );

    $this->db->where('id', $id);
    return $this->db->update('students', $data);
  }

  public function delete_student($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('students');
    return true;
  }
  //---------------------- Users --------------------------------

  public function select_all_users()
  {
    $this->db->select('users.user_id , users.user_name ,permission.per_name');
    $this->db->join('permission', 'users.rol_id = permission.per_id','left');
    $this->db->from('users');
    $query = $this->db->get();
    return $query->result();
  }

  public function add_user($enc_password)
  {
    # User data array
    $data = array(
        'user_name' => $this->input->post('user_name'),
        'school_id' => $this->input->post('school'),
        'rol_id' => $this->input->post('permission'),
        'user_pass' => $enc_password
        );

        // insert user_registered
        return $this->db->insert('users', $data);
  }

  public function select_user_by_id($id)
  {
    $this->db->where('user_id', $id);
    $query = $this->db->get('users');
    return $query->row();
  }


  public function student_byClass_id($id)
  {
    $this->db->where('class_id',$id);
    $query = $this->db->get('students');
    return $query->result();
  }

  public function calculate_fees($student_id)
  {
    $this->db->where('id', $student_id);
    $query = $this->db->get('students');
    if ($query->num_rows() > 0) {
    $data= $query->row();
        $data->pays = $this->get_pays($student_id);
      return $data;
    }
  }

  public function get_pays($student_id)
  {
    $this->db->select('sum(pays)');
    $this->db->where('student_id',$student_id);
    $query = $this->db->get('fees');
    return $query->result();
  }

  public function addTofees($student_id,$fees_pays,$sch_id,$c_id)
  {
    $data = array(
      'student_id' => $student_id,
      'pays' => $fees_pays,
      'school_id' => $sch_id,
      'class_id' => $c_id,
      'date_of_pays' => date('Y-m-d')
    );
    return $this->db->insert('fees', $data);
  }

  public function update_feess($student_id,$poid_fees,$reman_fees)
  {
    $data = array(
      'poid_fees' => $poid_fees,
      'reman_fees' => $reman_fees
    );

    $this->db->where('id',$student_id);
    return $this->db->update('students', $data);
  }

  public function update_user($enc_password, $id)
  {
    # User data array
    $data = array(
        'user_name' => $this->input->post('user_name'),
        'school_id' => $this->input->post('school'),
        'rol_id' => $this->input->post('permission'),
        'user_pass' => $enc_password
        );

        // insert user_registered
        $this->db->where('user_id', $id);
        return $this->db->update('users', $data);
  }

  public function delete_user($id)
  {
    $this->db->where('user_id',$id);
    $this->db->delete('users');
    return true;
  }
  //---------------------- Transports --------------------------------

  public function all_transports()
  {
    $query = $this->db->get('transports');
    return $query->result();
  }

  public function add_transport()
  {
    $data = array(
        'name' => $this->input->post('name'),
        'go' => $this->input->post('go'),
        'back' => $this->input->post('back'),
        'full' => $this->input->post('full'),
      );

    return $this->db->insert('transports', $data);
  }

  public function get_transport_by_id($id)
  {
    $this->db->where('id', $id);
    $query = $this->db->get('transports');
    return $query->row();
  }

 public function update_transport($id)
 {
   $data = array(
       'name' => $this->input->post('name'),
       'go' => $this->input->post('go'),
       'back' => $this->input->post('back'),
       'full' => $this->input->post('full'),
     );

     $this->db->where('id', $id);
     return $this->db->update('transports', $data);
 }


  public function delete_transport($id)
  {
    $this->db->where('id',$id);
    $this->db->delete('transports');
    return true;
  }

  public function report_by_date_query($sid, $d_from, $d_to)
  {

    $query = $this->db->query("SELECT (students.class_id) FROM students join fees
                            on ((students.school_id) = ?)
                            and ((fees.date_of_pays) between ? and ?)
                            group by (students.class_id)", array($sid,$d_from,$d_to));
    $i = 0;$data_r = $query->result();
    foreach( $query->result() as $row){
      $data_r[$i]->students = $this->report_by_class_id($row->class_id,$sid, $d_from, $d_to);
      $i++;
    }
      return $data_r;
    }


    public function report_by_class_id($id_class,$sid, $d_from, $d_to)
    {

      $query = $this->db->query("SELECT (students.id) ,(students.name),(students.class_id) FROM students join fees
                              on ((students.class_id) = ?)
                              and ((students.school_id) = ?)
                              and ((fees.date_of_pays) between ? and ?)
                              group by id", array($id_class,$sid,$d_from,$d_to));
      $i = 0;$data_r = $query->result();
      foreach( $query->result() as $row){
        $data_r[$i]->pays = $this->get_pays_by_date_($d_from, $d_to, $sid, $row->id);
        $i++;
      }
        return $data_r;
      }


  public function get_pays_by_date_($d_from, $d_to, $sid, $id)
  {
    $query = $this->db->query("SELECT *FROM fees
                            where (date_of_pays between ? and ?)
                            and (school_id = ?)
                            and student_id = ?", array($d_from, $d_to, $sid, $id));
    return $query->result();
  }

  public function get_pays_xsaby_date()
  {

    $query = $this->db->query("SELECT pays, date_of_pays
                                FROM fees
                                 where 'date_of_pays' = ".date('Y-m-d')
                                 ."");

    return $query->result();
  }


}




 ?>
