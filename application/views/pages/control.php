<?php if (!$this->session->userdata('logged_in')) {
  redirect('users/login');
} ?>
<h2>صفحة الادارة </h2><hr>
<div class="alert alert-dismissible alert-warning">
<?php foreach($this->session->userdata('sub1')->sub as $page): ?>

<!-- Control panel -->

<a class="btn btn-secondary" href="<?= base_url().$page->page_link ?>" style="padding:20px;margin:20px;"> <?= $page->page_name ?></a>
<?php endforeach; ?>
</div>
<hr>


<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#Modal">عرض المحتوي</button>
<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">لوحة التحكم </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        تحتوي ايكونات للتحكم في الموقع
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
      </div>
    </div>
  </div>
</div>
