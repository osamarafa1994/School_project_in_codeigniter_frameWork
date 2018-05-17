 <?php

class User_model extends CI_Model
{
  function __construct()
  {
    parent::__construct();

  }

  public function valid_username($username)
  {

    $query = $query = $this->db->select('*')->from('users')->where('username',$username)->get();
    return $query->row();
  }

  public function register($enc_password)
  {
    # User data array
    $data = array(
        'name' => $this->input->post('name'),
        'zipcode' => $this->input->post('zipcode'),
        'email' => $this->input->post('email'),
        'username' => $this->input->post('username'),
        'password' => $enc_password
        );

        // insert user_registered
        return $this->db->insert('', $data);
  }
      // Login User
  public function login($username, $password)
  {
    // Validate
    $this->db->where('user_name', $username);
    $this->db->where('user_pass', $password);

    $result = $this->db->get('users');

    if ($result->num_rows() == 1) {
      $data_user = $result->row();
      $rol_id = $data_user->rol_id;
      $data_user->sub1 = $this->select_pages_rol($rol_id);
      return $data_user;
    } else {
      return false;
    }
  }

  public function select_pages_rol($rol_id)
  {
    $this->db->select("users.user_id,permission.pages_id");
    $this->db->join('permission', "permission.per_id = $rol_id",'left');
    $this->db->from('users');
    $query = $this->db->get();
    if ($query->num_rows() > 0) {
    $data= $query->row();
        $page_id =   explode(',', $data->pages_id );
        $data->sub = $this->get_select_all_pages_by_id($page_id);

      return $data;
        }
  }

  public function get_select_all_pages_by_id($page_id){
       $this->db->select('page_name,page_link,sub_pages');
       $this->db->from('pages');
       $this->db->where_in("page_id",$page_id);
       $query = $this->db->get();
       if ($query->num_rows() > 0) {
           return $query->result() ;
       }
   }


  public function email_exists($email)
  {
    $sql = "select name, email from users where  email = '{$email}' limit 1";
    $result = $this->db->query($sql);
    $row = $result->row();
    return ($result->num_rows() === 1 && $row->email) ? $row->name : false;
  }

  public function verify_reset_password_code($email ,$code)
  {
    $sql = "select name, email from users where  email = '{$email}' limit 1";
    $result = $this->db->query($sql);
    $row = $result->row();

    if($result->num_rows() === 1){
      return ($code == md5($this->config->item('salt') . $row->name)) ? true : false;
    }else {
      return false;
    }
  }

  public function update_password()
  {
    $email = $this->input->post('email');
    $password  = sha1($this->config->item('salt') . $this->input->post('password'));

    $sql = "update users set password = '{$password}' where email = '{$email}' limit 1";
    $this->db->query($sql);

    if($this->db->affected_rows() === 1){
      return true;
    }else {
      return false;
    }
  }

}

 ?>
