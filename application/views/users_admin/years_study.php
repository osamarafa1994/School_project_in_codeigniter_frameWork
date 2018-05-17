<?php
  $years_study = '';
  $years_study .= '<option value="">اختار الصف </option>';

  foreach($years as $year){
    $years_study .= '<option value="'. $year->id . '">'. $year->year_name . '</option>';
  }
  echo $years_study;

 ?>
