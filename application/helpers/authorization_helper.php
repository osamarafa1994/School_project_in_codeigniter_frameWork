<?php
function check_validty($check_log, $sub_pages)
{
  if (!$check_log) {
    redirect('users/login');
  }

  $path = str_replace("/School_N/", "", $_SERVER['REQUEST_URI']);

  $check_yes = array();
  foreach ($sub_pages as $page_path) {
    foreach (explode(',',$page_path->sub_pages) as $sub) {
      if(substr($path, 0 , strlen($sub)) === $sub){
        $check_yes[] = 'yes';
      }
    }
  }
  if(empty($check_yes)){
    redirect('error');
  }
}

 ?>
