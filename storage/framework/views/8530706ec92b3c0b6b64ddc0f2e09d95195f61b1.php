<?php $__env->startSection('sadrzaj'); ?>

<div class="container">
	<?php echo $__env->make('components.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="row">
		
		
		<?php if(session('success')): ?>
			<div class="alert alert-success"><?php echo e(session('success')); ?></div>
		<?php elseif(session('error')): ?>
        	<div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>

        <h3>Unos ankete</h3>
		<form action="<?php echo e(route('unosAnketa')); ?>" method="POST">
			<?php echo e(csrf_field()); ?>


			<div class="container">

			    <label for="tbPitanje"><b>Pitanje</b></label>
			    <input type="text" placeholder="Unesite pitanje za anketu" name="tbPitanje" required>

			    <label for="tbBroj"><b>Broj odgovora</b></label>
			    <input type="text" placeholder="Unesite broj ponudjenih odgovora za anketu" name="tbBroj" required id="tbBroj" onkeyup="anketa();">

			    <label for="tbOdgovori"><b>Odgovori</b></label>
			    <div id="odgovori">
			    </div>

			    <button type="submit" name="btnUnesi" class="btn btn-success">Unesi</button>
			    <button type="reset" name="btnPonisti" class="btn btn-danger">Ponisti</button>
			 </div>
		</form>

		<div class="container">
				<?php echo e(csrf_field()); ?>

				<table class="table table-striped">
				    <thead>
				      <tr>
				        <th>Pitanje</th>
				        <th>Aktivna</th>
				        <th>Izmeni</th>
				        <th>Obrisi</th>
				      </tr>
				    </thead>
				    <tbody>
				      	<?php $__currentLoopData = $ankete; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					      	<tr>
						        <td><?php echo e($a->pitanje); ?></td>
						        <?php if(($a->aktivna) == 1): ?>
						        	<td><?php echo e("Aktivna"); ?></td>
						        <?php else: ?>
						        	<td><?php echo e("Neaktivna"); ?></td>
						        <?php endif; ?>
						        <td><a class="btn btn-warning" href="<?php echo e(asset('admin/anketa/izmena/'.$a->id_anketa)); ?>" >Izmeni</a></td>
						        <td><a class="btn btn-danger" href="<?php echo e(asset('admin/anketa/brisanje/'.$a->id_anketa)); ?>" >Obrisi</a></td>
						    </tr>
				        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    </tbody>
				</table>
		</div>

	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>