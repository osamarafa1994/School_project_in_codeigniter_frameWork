 <div class="card bg-light mb-3">
  <div class="card-header">التقارير </div>
  <div class="card-body">
    <?php var_dump(date('Y-m-d')); ?>
    <?php  if($this->session->userdata('school_id') == 0): ?>
      <div class="form-group">
        <select class="form-control" id="school_name" name="school" required>
          <option value="">اختار اسم المدرسة</option>
          <?php foreach ($schools as $school): ?>
              <option value="<?php echo $school->id; ?>"><?php echo $school->school_name; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    <?php elseif ($this->session->userdata('school_id') != 0): ?>
      <div class="form-group">
        <select class="form-control" id="school_name" name="school" required>
              <option value="">اختار اسم المدرسة</option>
              <option value="<?= $school->id ?>"><?php echo $school->school_name; ?></option>
        </select>
      </div>
        <?php endif; ?>
        <div class="form-group">
          <label for="date_from">من</label>
          <input type="date" class="form-control" id="date_from" name="date1" value="<?= date('Y-m-d') ?>">
        </div>
        <div class="form-group">
          <label for="date_to">الي </label>
          <input type="date" class="form-control" id="date_to" name="date2" value="<?= date('Y-m-d') ?>" >
        </div>
        <table class="table table-hover">
          <button class="btn btn-info" type="search" name="button" onclick="report(Id=<?= $school->id ?>)">بحث</button>
          <thead>
            <tr>
              <th scope="col">الفصل </th>
              <th scope="col">vrl hg'hgf </th>
              <th scope="col">اسم الطالب  </th>
              <th scope="col">قيمة المدفوع </th>
              <th scope="col">تاريخ الدفع  </th>
            </tr>
          </thead>
          <tbody id="report_by_date">
          </tbody>
        </table>
  </div>
</div>
