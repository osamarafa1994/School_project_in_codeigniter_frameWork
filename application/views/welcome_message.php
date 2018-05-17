<?php
defined('BASEPATH') OR exit('No direct script access allowed');


public function loadview($viewdata)
{
	$this->load->view('templates/header');
	$this->load->view($viewdata);
	$this->load->view('templates/footer');
}


?>
