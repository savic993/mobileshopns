<?php $__env->startSection('sadrzaj'); ?>

<div class="container">
	<?php echo $__env->make('components.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="row">

		
		<?php if(session('success')): ?>
			<div class="alert alert-success"><?php echo e(session('success')); ?></div>
		<?php elseif(session('error')): ?>
        	<div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>

        <h3>Unos grada</h3>
		<form action="<?php echo e(route('unosGrad')); ?>" method="POST">
			<?php echo e(csrf_field()); ?>


			<div class="container">

			    <label for="tbGrad"><b>Grad</b></label>
			    <input type="text" placeholder="Unesite naziv grada" name="tbGrad" required>

			    <label for="tbPosBr"><b>Postanski broj</b></label>
			    <input type="text" placeholder="Unesite postanski broj" name="tbPosBr" required>

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
				        <th>Grad</th>
				        <th>Postanski broj</th>
				        <th>Datum unosa</th>
				        <th>Datum izmene</th>
				        <th>Izmeni</th>
				        <th>Obrisi</th>
				      </tr>
				    </thead>
				    <tbody>
				      	<?php $__currentLoopData = $gradovi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $g): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					      	<tr>
						        <td><?php echo e($g->ime_grad); ?></td>
						        <td><?php echo e($g->pos_br); ?></td>
						        <td><?php echo e($g->datumUnosa); ?></td>
						        <td><?php echo e($g->datumIzmene); ?></td>
						        <td><a class="btn btn-warning" href="<?php echo e(asset('admin/grad/izmena/'.$g->id_grad)); ?>" >Izmeni</a></td>
						        <td><a class="btn btn-danger" href="<?php echo e(asset('admin/grad/brisanje/'.$g->id_grad)); ?>" >Obrisi</a></td>
						    </tr>
				        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    </tbody>
				</table>
		</div>

	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>