<a class="btn btn-success" href="<?php echo base_url() ?>"><span class="glyphicon glyphicon-plus"></span>رجوع</a>
<a class="btn btn-success" href="<?php echo base_url() ?>Users_admin/add_transport"><span class="glyphicon glyphicon-plus"></span> اضافه</a>
<hr>
<div class="card bg-light mb-3">
  <div class="card-header">قائمة الاسعار</div>
  <div class="card-body">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">اسم الخط </th>
      <th scope="col">ذهاب فقط </th>
      <th scope="col">عوده فقط</th>
      <th scope="col">ذهاب +عوده</th>
      <th scope="col">تحكم</th>
      <th scope="col">عرض</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($transports as $transport): ?>
    <tr class="table-light">
      <th><?= $transport->name ?></th>
      <td><?= $transport->go.' جنيهات ' ?></td>
      <td><?= $transport->back.' جنيهات ' ?></td>
      <td><?= $transport->full.' جنيها ' ?></td>
      <td>
        <a class="btn btn-info" href="<?php echo base_url(); ?>Users_admin/edit_transport/<?php echo $transport->id; ?>"><span class="glyphicon glyphicon-pencil"></span>تعديل </a>
        <a class="btn btn-danger" href="<?php echo base_url(); ?>Users_admin/delete_transport/<?php echo $transport->id; ?>"><span class="glyphicon glyphicon-remove"></span>حذف</a>
      </td>
      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#<?php echo $transport->id; ?>">عرض </button></td>
    </tr>
    <!-- Modal -->
    <div class="modal fade" id="<?php echo $transport->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel"><?= $transport->name ?></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <ul class="list-group">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                سعر التذكره ذهاب
                <span class="badge badge-primary badge-pill"><?= $transport->go.' جنيهات ' ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                سعر التذكره عوده
                <span class="badge badge-primary badge-pill"><?= $transport->back.' جنيهات ' ?></span>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                سعر التذكره كاملة
                <span class="badge badge-primary badge-pill"><?= $transport->full.' جنيهات ' ?></span>
              </li>
            </ul>

            <br>

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
