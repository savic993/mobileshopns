<?php $__env->startSection('sadrzaj'); ?>

<div class="container">
	<div class="row">

		
		<?php if(session('error')): ?>
        	<div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>

		<form action="<?php echo e(route('login')); ?>" method="POST">
			<?php echo e(csrf_field()); ?>


			<div class="container">
			    <label for="tbUsername"><b>Korisnicko ime</b></label>
			    <input type="text" placeholder="Unesite korisnicko ime" name="tbUsername" required>

			    <label for="tbLozinka"><b>Lozinka</b></label>
			    <input type="password" placeholder="Unesite lozinku" name="tbLozinka" required>

			    <button type="submit" name="btnPrijava">Prijavi se</button>
			 </div>
		</form>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>