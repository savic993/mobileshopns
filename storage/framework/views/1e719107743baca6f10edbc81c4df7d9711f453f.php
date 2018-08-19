<?php $__env->startSection('sadrzaj'); ?>

<div class="container">
	<?php echo $__env->make('components.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="row">
        <h3>Unos grada</h3>
		<form action="<?php echo e(asset('/admin/anketa/update/'.$anketa[0]->id_anketa)); ?>" method="POST">
			<?php echo e(csrf_field()); ?>


			<div class="container">

			    <label for="tbPitanje"><b>Pitanje</b></label>
			    <input type="text" placeholder="Unesite pitanje" name="tbPitanje" value="<?php echo e($anketa[0]->pitanje); ?>" required/>

			    <label for="ddlAktivna"><b>Aktivna</b></label>
			    <select name="ddlAktivna" required>
				    	<option value="0">Neaktivna</option>
				    	<option value="1">Aktivna</option>
				</select>

			    <button type="submit" name="btnUnesi" class="btn btn-success">Izmena</button>
			    <button type="reset" name="btnPonisti" class="btn btn-danger">Ponisti</button>
			 </div>
		</form>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>