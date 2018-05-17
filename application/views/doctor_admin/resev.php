<?php
$result = '<option value="">اختار الميعاد</option>';
foreach ($days as $day) {

    $result .=  '<option ';
    $result.= ($day->reseved == false)? "" : "disabled" ;
    $result.= ' value=" '. $day->resev_id .' "> '. $day->time ;
    $result.= ($day->reseved == false)? "" : "تم حجزه" ;
    $result.= '</option>';

}
echo $result;

 ?>
