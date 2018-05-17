<a class="btn btn-success" href="<?php echo base_url() ?>"><img src="<?php echo base_url();?>assets/svg/arrow-left.svg"></a>
<a class="btn btn-success" href="<?php echo base_url() ?>Users_admin/add_user"><img src="<?php echo base_url();?>assets/svg/user-plus.svg"></a>
<hr>
<div class="card bg-light mb-3">
  <div class="card-header">قائمة المستخدمين </div>
  <div class="card-body">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">الاسم</th>
      <th scope="col">نوع الصلاحية </th>
      <th scope="col">تحكم</th>
      <th scope="col">عرض</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($users as $user): ?>
    <tr class="table-light">
      <th><?= $user->user_name ?></th>
      <td> <?= $user->per_name ?></td>
      <td>
        <a class="btn btn-info" href="<?php echo base_url(); ?>Users_admin/edit_user/<?php echo $user->user_id; ?>"><img src="<?php echo base_url();?>assets/svg/edit.svg">تعديل </a>
        <a class="btn btn-danger" href="<?php echo base_url(); ?>Users_admin/delete_user/<?php echo $user->user_id; ?>"><img src="<?php echo base_url();?>assets/svg/delete.svg">حذف</a>
      </td>
      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $user->user_id; ?>">عرض </button></td>
    </tr>
    <!-- Modal -->
    <div class="modal fade" id="<?php echo $user->user_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?= $user->user_name ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="alert alert-dismissible alert-info">
            <label>الصلاحيه لهذا المستخدم هي  </label><br>
            <?= $user->per_name ?><br>
          </div>
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
