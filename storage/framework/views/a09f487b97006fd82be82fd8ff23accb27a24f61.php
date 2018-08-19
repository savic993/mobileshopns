<?php $__env->startSection('sadrzaj'); ?>

<div class="container">
	<?php echo $__env->make('components.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="row">
		
		
		<?php if(session('success')): ?>
			<div class="alert alert-success"><?php echo e(session('success')); ?></div>
		<?php elseif(session('error')): ?>
        	<div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>

        <h3>Unos slajdera</h3>
		<form action="<?php echo e(asset('/admin/slajder/update/'.$slajd[0]->id_slajda)); ?>" method="POST" enctype="multipart/form-data">
			<?php echo e(csrf_field()); ?>


			<div class="container">

			    <label for="tbCena"><b>Cena</b></label>
			    <input type="text" placeholder="Unesite cenu proizvoda na popustu" name="tbCena" value="<?php echo e($slajd[0]->cena); ?>" required>

			    <label for="tbNaslovSlajd"><b>Naslov slajda</b></label>
			    <input type="text" placeholder="Unesite naslov za slajd" name="tbNaslovSlajd" value="<?php echo e($slajd[0]->naslov); ?>" required>

			    <label for="tbTekst"><b>Tekst</b></label>
			    <input type="text" placeholder="Unesite kratak opis za slajd" name="tbTekst" value="<?php echo e($slajd[0]->tekst); ?>" required>

			    <button type="submit" name="btnUnesi" class="btn btn-success">Unesi</button>
			    <button type="reset" name="btnPonisti" class="btn btn-danger">Ponisti</button>
			 </div>
		</form>

	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>