<?php $__env->startSection('sadrzaj'); ?>

<div class="container">
	<div class="row">

        <h3>Naruceni proizvodi</h3>
        
		<?php if(session('success')): ?>
			<div class="alert alert-success"><?php echo e(session('success')); ?></div>
		<?php elseif(session('error')): ?>
        	<div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>
		<div class="container">
				<table class="table table-striped">
				    <thead>
				      <tr>
				        <th>Ime i prezime</th>
				        <th>Username</th>
				        <th>Email</th>
				        <th>Adresa</th>
				        <th>Proizvodjac</th>
				        <th>Model</th>
				        <th>Obrisi</th>
				      </tr>
				    </thead>
				    <tbody>
				      	<?php $__currentLoopData = $naruceno; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $n): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					      	<tr>
						        <td><?php echo e($n->ime_prezime); ?></td>
						        <td><?php echo e($n->username); ?></td>
						        <td><?php echo e($n->email); ?></td>
						        <td><?php echo e($n->adresa); ?></td>
						        <td><?php echo e($n->naziv_proizvodjac); ?></td>
						        <td><?php echo e($n->naziv_model); ?></td>
						        <td><a class="btn btn-danger" href="<?php echo e(asset('/korpa/brisanje/'.$n->idKorpa)); ?>" >Obrisi</a></td>
						    </tr>
				        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    </tbody>
				</table>
		</div>

	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>