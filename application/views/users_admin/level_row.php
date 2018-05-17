<?php
  $table_row = '';
  foreach ($levels as $level) {
  $table_row .= '<tr id="row-id-'. $level->id . '" class="table-light">
    <th>'. $level->id .'</th>
    <td>' .$level->level_name .'</td>
    <td>
      <a class="btn btn-info" href="'. base_url().'Levels_admin/edit_level/'. $level->id. '"><span class="glyphicon glyphicon-pencil"></span>تعديل </a>
      <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#'. $level->id .' "><span class="glyphicon glyphicon-pencil"></span>حذف </button>
    </td>
    <td><button type="button" id="remove" dataid="'. $level->id .'" class="btn btn-primary" data-toggle="modal" data-target="#s'. $level->id .'" >عرض </button></td>
  </tr>';
  }
  echo $table_row;
 ?>
