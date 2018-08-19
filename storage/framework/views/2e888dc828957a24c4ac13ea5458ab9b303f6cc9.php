<?php $__env->startSection('sadrzaj'); ?>

<div class="container">
   <div class="row">

   		<?php $__currentLoopData = $galerija; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	   	<div class="col-md-4">
		    <div class="thumbnail">
		        <a href="<?php echo e(url($gal->putanjaV)); ?>">
		        <img src="<?php echo e($gal->putanjaM); ?>" alt="<?php echo e($gal->alt); ?>" style="width:100%">
		        <div class="caption">
		            <p><?php echo e($gal->naziv_model); ?></p>
		        </div>
		        </a>
		    </div>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>