<?php

$sum_pays = $student->pays[0]->{'sum(pays)'};
if($sum_pays == NULL){
  $sum_pays = 0;
}
$rest = $student->total_fees - $sum_pays;

echo '<tr class="table-info" id="i">
      <td id="total">'.$student->total_fees.'</td>
      <td>'.$sum_pays .'</td>
      <td>'.$rest.'</td>';
      if($rest > 0){
    echo'  <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#add"><span class="glyphicon glyphicon-plus"></span>دفع قسط</button>';
  }else{
    echo'  <td><button type="button" class="btn btn-success" disabled data-toggle="modal" data-target="#add"><span class="glyphicon glyphicon-plus"></span>دفع قسط</button>';
  }
      echo '<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">دفع قسط </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" id="addFees">
          <div class="form-group">
            <label class="control-label" for="fees_pays">المبلغ </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="fees_pays" name="fees_pays" placeholder="ادخل المبلغ المراد دفعه بحد اقصي '.$rest.'">
            </div>
          </div>
        </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" onclick="addTofees(studentId='. $student->id.',restFees='.$rest.',sumPays='.$sum_pays.',total='.$student->total_fees.')">دفع</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">تراجع</button>
          </div>
        </div>
      </div>
      </div>
      </td>
    </tr>
    ';

 ?>
