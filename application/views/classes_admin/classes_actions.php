<a class="btn btn-success" href="<?php echo base_url() ?>"><span class="glyphicon glyphicon-plus"></span>رجوع</a>
<a class="btn btn-success" href="<?php base_url() ?>add_class"><span class="glyphicon glyphicon-plus"></span> اضافه</a>
<hr>
<div class="card bg-light mb-3">
  <div class="card-header">قائمة الفصول </div>
  <div class="card-body">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">الفصل </th>
      <th scope="col">اسم المدرسة التابع لها</th>
      <th scope="col">تحكم</th>
      <th scope="col">عرض</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($classes as $class): ?>
    <tr class="table-light">
      <th><?php echo $class->class_id; ?></th>
      <td><?php echo $class->school_name ?></td>
      <td>
        <a class="btn btn-info" href="<?php echo base_url(); ?>Classes_admin/edit_class/<?php echo $class->class_id; ?>"><span class="glyphicon glyphicon-pencil"></span>تعديل </a>
        <a class="btn btn-danger" href="<?php echo base_url(); ?>Classes_admin/delete_class/<?php echo $class->class_id; ?>"><span class="glyphicon glyphicon-remove"></span>حذف</a>
      </td>
      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $class->class_id; ?>">عرض </button></td>
    </tr>
    <!-- Modal -->
    <div class="modal fade" id="<?php echo $class->class_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?= $class->class_id ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="btn btn-warning disabled">اسم المدرسة</span>
                <span class="btn btn-danger disabled">رقم الفصل فيها</span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="btn btn-info disabled"><?= $class->school_name ?></span>
                <span class="badge badge-primary badge-pill"><?= $class->class_id ?></span>
              </li>
            </ul>
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
