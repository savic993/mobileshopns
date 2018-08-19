<?php $__env->startSection('sadrzaj'); ?>

<div class="container">
	<?php echo $__env->make('components.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="row">
		
		<?php if(session('success')): ?>
			<div class="alert alert-success"><?php echo e(session('success')); ?></div>
		<?php elseif(session('error')): ?>
        	<div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>
        
        <h3>Prikaz i brisanje narucbina</h3>

		<div class="container">
				<table class="table table-striped">
				    <thead>
				      <tr>
				        <th>Proizvodjac</th>
				        <th>Model</th>
				        <th>Kupac</th>
				        <th>Adresa</th>
				        <th>Datum unosa</th>
				        <th>Obrisi</th>
				      </tr>
				    </thead>
				    <tbody>
				      	<?php $__currentLoopData = $narucbine; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					      	<tr>
						        <td><?php echo e($n->naziv_proizvodjac); ?></td>
						        <td><?php echo e($n->naziv_model); ?></td>
						        <td><?php echo e($n->ime_prezime); ?></td>
						        <td><?php echo e($n->adresa. ' ' .$n->ime_grad); ?></td>
						        <td><?php echo e($n->datumUnosa); ?></td>
						        <td><a class="btn btn-danger" href="<?php echo e(asset('admin/narucbine/brisanje/'.$n->idKorpa)); ?>" >Obrisi</a></td>
						    </tr>
				        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    </tbody>
				</table>
		</div>

	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>