<?php $__env->startSection('sadrzaj'); ?>

<div class="container">
	<?php echo $__env->make('components.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="row">

		
		<?php if(session('success')): ?>
			<div class="alert alert-success"><?php echo e(session('success')); ?></div>
		<?php elseif(session('error')): ?>
			<div class="alert alert-danger"><?php echo e(session('error')); ?></div>
		<?php endif; ?>

        <h3>Unos slika</h3>
		<form action="<?php echo e(route('unosSlike')); ?>" method="POST" enctype="multipart/form-data">
			<?php echo e(csrf_field()); ?>


			<div class="container">

			    <label for="fSlika"><b>Slika</b></label>
			    <input type="file" name="fSlika" />

			    <label for="tbOpis"><b>Opis</b></label>
			    <input type="text" placeholder="Unesite opis" name="tbOpis" required>

			    <label for="ddlModel"><b>Model</b></label>
			    <select name="ddlModel" required>
				    <option value="0">Izaberi</option>
				    <?php $__currentLoopData = $telefoni; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				    	<option value="<?php echo e($t->id_model); ?>"><?php echo e($t->naziv_model); ?></option>
				    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>

			    <button type="submit" name="btnUnesi" class="btn btn-success">Unesi</button>
			    <button type="reset" name="btnPonisti" class="btn btn-danger">Ponisti</button>
			 </div>
		</form>

		<br/>
		<div class="container">
				<h3>Izmena i brisanje</h3>
				<table class="table table-striped">
				    <thead>
				      <tr>
				        <th>Alt</th>
				        <th>Model</th>
				        <th>Datum unosa</th>
				        <th>Obrisi</th>
				      </tr>
				    </thead>
				    <tbody>
				      	<?php $__currentLoopData = $galerije; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					      	<tr>
						        <td><?php echo e($g->alt); ?></td>
						        <td><?php echo e($g->naziv_model); ?></td>
						        <td><?php echo e($g->datumUnosa); ?></td>
						        <td><a class="btn btn-danger" href="<?php echo e(asset('admin/galerija/brisanje/'.$g->id_slika)); ?>" >Obrisi</a></td>
						    </tr>
				        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    </tbody>
				</table>
		</div>

	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>