<?php
  $class_n = '';
  $class_n .= '<option value="">اختار الفصل</option>';


  foreach($classes as $class){
    $class_n .= '<option value="'. $class->class_id . '">'. $class->class_id . '</option>';
  }
  echo $class_n;

 ?>
