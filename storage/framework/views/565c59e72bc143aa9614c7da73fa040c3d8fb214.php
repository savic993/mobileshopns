<div class="container">
  <ul class="pagination">
    <?php for($i = 0; $i < $broj/3; $i++): ?>
    <li><a class="page-link" href="#" data-id="<?php echo e($i*3); ?>"><?php echo e($i); ?></a></li>
    <?php endfor; ?>
  </ul>
</div>


