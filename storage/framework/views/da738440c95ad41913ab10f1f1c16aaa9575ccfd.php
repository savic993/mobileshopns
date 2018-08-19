<?php $__env->startSection('sadrzaj'); ?>


<div class="container">
   <div class="row">

    <?php $__currentLoopData = $galerije; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-md-4">
      <div class="thumbnail">
        <a  href="<?php echo e(asset('/galerija/'.$g->id_proizvodjac)); ?>">
          <img src="<?php echo e($g->putanja); ?>" alt="<?php echo e($g->naziv_proizvodjac); ?>" style="width:100%">
          <div class="caption">
            <p><?php echo e($g->naziv_proizvodjac); ?></p>
          </div>
        </a>
      </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
    
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>