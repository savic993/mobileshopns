<?php $__env->startSection('sadrzaj'); ?>

<div class="container">
	<?php echo $__env->make('components.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="row">
        <h3>Unos grada</h3>
		<form action="<?php echo e(asset('/admin/grad/update/'.$grad[0]->id_grad)); ?>" method="POST">
			<?php echo e(csrf_field()); ?>


			<div class="container">

			    <label for="tbGrad"><b>Grad</b></label>
			    <input type="text" placeholder="Unesite naziv grada" name="tbGrad" value="<?php echo e($grad[0]->ime_grad); ?>" required/>

			    <label for="tbPosBr"><b>Postanski broj</b></label>
			    <input type="text" placeholder="Unesite postanski broj" name="tbPosBr" value="<?php echo e($grad[0]->pos_br); ?>" required>

			    <button type="submit" name="btnUnesi" class="btn btn-success">Izmena</button>
			    <button type="reset" name="btnPonisti" class="btn btn-danger">Ponisti</button>
			 </div>
		</form>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>