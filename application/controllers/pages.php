<?php
class Pages extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
  }

  public function view($page = 'control')
  {
    if(!file_exists(APPPATH .'views/pages/'.$page.'.php')){
      show_404();
    }
    $data['title'] = ucfirst($page);

    $data['subview'] = 'pages/'.$page;
    $this->load->view('admin_index',$data);


  }
}

 ?>
