<?php
//echo "<pre>";
//print_r($students);
//echo "</pre>";
$sum = 0;
foreach($students as $class){
$num_student = count($class->students);
echo "<pre>";
print_r($class->class_id);
echo "</pre>";
echo '<tr class="table-danger">
      <td rowspan="'.($num_student).'">'.$class->class_id.'</td></tr>';
      $count = 0;



  foreach($class->students as $student){

$count += count($student->pays);
  if($count){
    echo '<tr class="table-info">
          <td rowspan="'.($count).'">'.$student->id.'</td>
          <td rowspan="'.($count).'">'.$student->name.'</td></tr>';
          foreach ($student->pays as $pay) {
            $sum += $pay->pays;
            echo '<tr  class="table-success" >
                  <td >'.$pay->pays.'</td>
                  <td >'.$pay->date_of_pays.'</td>
                  </tr>
                  ';

          }

  }
}

echo $count;

}
echo '<tr class="table-dark" style="textalign: center;">
        <td colspan ="3">المجموع</td>
        <td colspan ="2"  >'.$sum.'</td>
      </tr>';
?>
