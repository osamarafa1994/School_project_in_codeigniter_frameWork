<a class="btn btn-success" href="<?php echo base_url() ?>"><span class="glyphicon glyphicon-plus"></span>رجوع</a>
<a class="btn btn-success" href="<?php echo base_url() ?>Years_admin/add_year"><span class="glyphicon glyphicon-plus"></span> اضافه+</a>
<hr>
<div class="card bg-light mb-3">
  <div class="card-header">قائمة الصفوف </div>
  <div class="card-body">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">السنه الدرسية</th>
      <th scope="col"> المصروفات</th>
      <th scope="col">تحكم</th>
      <th scope="col">عرض</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($years as $year): ?>
    <tr class="table-light">
      <th><?= $year->n_year_level ?></th>
      <td> <?= $year->study_fees ?></td>
      <td>
        <a class="btn btn-info" href="<?php echo base_url(); ?>Years_admin/edit_year/<?php echo $year->id; ?>"><span class="glyphicon glyphicon-pencil"></span>تعديل </a>
        <a class="btn btn-danger" href="<?php echo base_url(); ?>Years_admin/delete_year/<?php echo $year->id; ?>"><span class="glyphicon glyphicon-remove"></span>حذف</a>
      </td>
      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $year->id; ?>">عرض </button></td>
    </tr>
    <!-- Modal -->
    <div class="modal fade" id="<?php echo $year->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?= $year->id ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <label>المصروفات </label><br>
            <?= $year->study_fees ?><br>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
  </tbody>
</table>
  </div>
</div>
