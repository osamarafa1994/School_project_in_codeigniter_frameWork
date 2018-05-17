<a class="btn btn-success" href="<?php echo base_url() ?>"><span class="glyphicon glyphicon-plus"></span>رجوع</a>
<hr>
<div class="card bg-light mb-3">
  <div class="card-header">قائمة المدارس</div>
  <div class="card-body">
    <table class="table table-hover" onload="getAllLevels()">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">اسم المرحلة</th>
      <th scope="col">تحكم</th>
      <th scope="col">عرض</th>
    </tr>
  </thead>
  <?php foreach ($levels as $level): ?>

    <div class="modal fade" id="<?= $level->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">حذف مرحلة</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            هل تريد حذف هذة المرحلة حقا؟
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary"  id="btn-remove-<?= $level->id ?>" dataid="<?= $level->id ?>" onclick="deleteLevel(level = <?= $level->id ?>)">تاكيد</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
          </div>
        </div>
      </div>
    </div>



  <!-- Modal -->
  <div class="modal fade" id="s<?= $level->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?= $level->level_name ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span class="btn btn-warning disabled">المرحلة</span>
              <span class="btn btn-danger disabled">رقم المرحلة</span>
            </li>
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <span class="btn btn-info disabled"><?= $level->level_name ?></span>
              <span class="badge badge-primary badge-pill"><?= $level->id ?></span>
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
<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#add"><span class="glyphicon glyphicon-plus"></span>اضافة</button>
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">اضافه مدرسة جديدة</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form class="form-horizontal" id="createLevel">
    <div class="form-group">
      <label class="control-label" for="cate_name">اسم المرحلة </label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="level_name" name="level_name" placeholder="ادخل اسم المرحلة">
      </div>
    </div>
  </form>
    </div>
    <div class="modal-footer">
      <button type="button" class="btn btn-success" onclick="createFunction()">انشاء</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">لاارغب</button>
    </div>
  </div>
</div>
</div>
  <tbody id="body_rows">

  </tbody>
</table>
  </div>
</div>
