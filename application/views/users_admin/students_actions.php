<a class="btn btn-success" href="<?php echo base_url() ?>"><span class="glyphicon glyphicon-plus"></span>رجوع</a>
<a class="btn btn-success" href="<?php echo base_url() ?>Users_admin/add_student"><span class="glyphicon glyphicon-plus"></span> اضافه</a>
<hr>
<div class="card bg-light mb-3">
  <div class="card-header">قائمة الطلاب</div>
  <div class="card-body">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">الاسم</th>
      <th scope="col">المرحلة </th>
      <th scope="col">تحكم</th>
      <th scope="col">عرض</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($students as $student): ?>
    <tr class="table-light">
      <th><?= $student->name ?></th>
      <td> <?= $student->level_name ?></td>
      <td>
        <a class="btn btn-info" href="<?php echo base_url(); ?>Users_admin/edit_student/<?php echo $student->id; ?>"><span class="glyphicon glyphicon-pencil"></span>تعديل </a>
        <a class="btn btn-danger" href="<?php echo base_url(); ?>Users_admin/delete_student/<?php echo $student->id; ?>"><span class="glyphicon glyphicon-remove"></span>حذف</a>
      </td>
      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $student->id; ?>">عرض </button></td>
    </tr>
    <!-- Modal -->
    <div class="modal fade" id="<?php echo $student->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?= $student->name ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <label>المرحلة الحالية </label><br>
            <?= $student->level_name ?><br>

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
