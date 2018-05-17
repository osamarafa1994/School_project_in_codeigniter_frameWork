<div class="card bg-light mb-3">
  <div class="card-header">الرسوم الدراسية للطالب </div>
  <div class="card-body">
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
              <option value="<?php echo $school->id; ?>"><?php echo $school->school_name; ?></option>
        </select>
      </div>
        <?php endif; ?>
        <div class="form-group">
          <select class="form-control" id="class" name="class" required>
              <option value="">اختار رقم الفصل</option>
          </select>
        </div>
        <div class="form-group">
          <select class="form-control" id="class_student" name="student_name" required>
              <option value="">اختار الاسم</option>
          </select>
        </div>
        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">المطلوب </th>
              <th scope="col">المدفوع </th>
              <th scope="col">المتبقي </th>
              <th scope="col">هل تريد دفع مبلغ</th>
            </tr>
          </thead>
          <tbody id="fees_table">
          </tbody>
        </table>
        <?php str_replace("/School_N/", "", $_SERVER['REQUEST_URI']); ?>

  </div>
</div>
