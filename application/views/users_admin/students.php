<?php
  $student_n = '';
  $student_n .= '<option value="">اختار الاسم</option>';


  foreach($students as $student){
    $student_n .= '<option value="'. $student->id . '">'. $student->name . '</option>';
  }
  echo $student_n;

 ?>
