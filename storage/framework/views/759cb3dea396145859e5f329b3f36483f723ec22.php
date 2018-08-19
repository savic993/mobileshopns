<?php $__env->startSection('sadrzaj'); ?>

<div class="container">
	<?php echo $__env->make('components.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="row">
		<form action="<?php echo e(asset('/admin/korisnik/update/'.$korisnik[0]->id_korisnik)); ?>" method="POST">
			<?php echo e(csrf_field()); ?>


			<div class="container">

				<label><b>Korisnicko ime</b></label><br/>
			    <label><i><b><?php echo e($korisnik[0]->username); ?></b></i></label><br/>

			    <label for="ddlUloga"><b>Uloga</b></label>
			    <select name="ddlUloga">
			    	<option value="0">Izaberi</option>
					<?php $__currentLoopData = $uloge; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				    	<option value="<?php echo e($u->id_uloga); ?>"><?php echo e($u->naziv_uloga); ?></option>
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			    </select>

			    <button type="submit" name="btnUnesi" class="btn btn-success">Unesi</button>
			    <button type="reset" name="btnPonisti" class="btn btn-danger">Ponisti</button>
			 </div>
		</form>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>