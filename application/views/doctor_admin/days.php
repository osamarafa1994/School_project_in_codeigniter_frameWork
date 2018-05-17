<?php
$result = '<option value="">اختار اليوم</option>';
foreach ($days as $day) {
    $result .=  '<option value="'.$day->day.'"> '.$day->day.'</option>';

}
echo $result;

 ?>
