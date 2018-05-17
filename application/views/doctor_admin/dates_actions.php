<a class="btn btn-success" href="<?php echo base_url() ?>"><span class="glyphicon glyphicon-plus"></span>رجوع</a>
<a class="btn btn-success" href="<?php echo base_url() ?>Doctors/add_date"><span class="glyphicon glyphicon-plus"></span> اضافه</a>
<hr>
<div class="card bg-light mb-3">
  <div class="card-header">المواعيد </div>
  <div class="card-body">
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">اليوم </th>
      <th scope="col">اسم الدكتور</th>
      <th scope="col">الميعاد</th>
      <th scope="col">تحكم</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($doctors as $doctor): ?>
    <tr class="table-light">
      <th><?= $doctor->day ?></th>
      <td><?= $doctor->doctor->doc_name ?></td>
      <td><?= $doctor->time_from ?> - <?= $doctor->time_to ?></td>
      <td>
        <a class="btn btn-info" href="<?php echo base_url(); ?>Doctors/edit_date/<?php echo $doctor->date_id; ?>"><span class="glyphicon glyphicon-pencil"></span>تعديل </a>
        <a class="btn btn-danger" href="<?php echo base_url(); ?>Doctors/delete_date/<?php echo $doctor->date_id; ?>"><span class="glyphicon glyphicon-remove"></span>حذف</a>
      </td>
    </tr>

  <?php endforeach; ?>
  </tbody>
</table>
  </div>
</div>
