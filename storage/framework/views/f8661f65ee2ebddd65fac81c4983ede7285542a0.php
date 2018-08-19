<?php $__env->startSection('sadrzaj'); ?>

<div class="container">
	<div class="row">

		<form>
			<?php echo e(csrf_field()); ?>


			<div class="container">
				<?php $__currentLoopData = $anketa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    <label><b><?php echo e($a->pitanje); ?></b></label>
			    <input type="hidden" name="idAnketa" value="<?php echo e($a->id_anketa); ?>" />
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			    <?php $__currentLoopData = $odgovori; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $odgovor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    	<div class="radio">
				      <label><input type="radio" name="rbOdgovor" value="<?php echo e($odgovor->id_odgovor); ?>"><?php echo e($odgovor->odgovor); ?></label>
				    </div>
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			    <button type="button" class="btn btn-success glasaj">Glasaj</button>
			 </div>
		</form>
		
	</div>

	<div class="row rezultati">
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>