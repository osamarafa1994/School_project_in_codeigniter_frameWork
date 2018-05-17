<?php
echo '<select class="form-control" name="price" id="price">
      <option value="0">بدون  </option>
      <option value="'. $transport->go .'">ذهاب('. $transport->go .')جنيها </option>
      <option value="'. $transport->back .'">عوده('. $transport->back .')جنيها </option>
      <option value="'. $transport->full .'">رحله كاملة('. $transport->full .')جنيها </option>
      </select>';
 ?>
