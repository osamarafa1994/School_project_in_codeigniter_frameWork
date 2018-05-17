<a class="btn btn-success" href="<?php echo base_url() ?>"><span class="glyphicon glyphicon-plus"></span>رجوع</a>
<a class="btn btn-success" href="<?php echo base_url() ?>Permissions_admin/add_permission"><span class="glyphicon glyphicon-plus"></span> اضافه</a>
<hr>
<div class="card bg-light mb-3">
  <div class="card-header">قائمة المدارس</div>
  <div class="card-body">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">الاسم </th>
      <th scope="col">تحكم</th>
      <th scope="col">عرض</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($permissions as $permission): ?>
    <tr class="table-light">
      <th><?= $permission->per_id ?></th>
      <td><?= $permission->per_name ?></td>
      <td>
        <a class="btn btn-info" href="<?php echo base_url(); ?>Permissions_admin/edit_permission/<?php echo $permission->per_id; ?>"><span class="glyphicon glyphicon-pencil"></span>تعديل </a>
        <a class="btn btn-danger" href="<?php echo base_url(); ?>Permissions_admin/delete_permission/<?php echo $permission->per_id; ?>"><span class="glyphicon glyphicon-remove"></span>حذف</a>
      </td>
      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $permission->per_id; ?>">عرض </button></td>
    </tr>
    <!-- Modal -->
    <div class="modal fade" id="<?php echo $permission->per_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?= $permission->per_name ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="btn btn-warning disabled">اسم الصلاحية</span>
                <span class="btn btn-danger disabled">ترتيبها </span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="btn btn-info disabled"><?= $permission->per_name ?></span>
                <span class="badge badge-primary badge-pill"><?= $permission->per_id ?></span>
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
