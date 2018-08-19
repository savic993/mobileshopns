<?php $__env->startSection('sadrzaj'); ?>

<div class="container">
	<?php echo $__env->make('components.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="row">
		
		<?php if(session('success')): ?>
			<div class="alert alert-success"><?php echo e(session('success')); ?></div>
		<?php elseif(session('error')): ?>
        	<div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>

        <h3>Izmena uloge i brisanje korisnika</h3>

		<div class="container">
				<table class="table table-striped">
				    <thead>
				      <tr>
				        <th>Ime i prezime</th>
				        <th>Username</th>
				        <th>Email</th>
				        <th>Adresa</th>
				        <th>Uloga</th>
				        <th>Datum unosa</th>
				        <th>Datum izmene</th>
				        <th>Izmeni</th>
				        <th>Obrisi</th>
				      </tr>
				    </thead>
				    <tbody>
				      	<?php $__currentLoopData = $korisnici; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					      	<tr>
						        <td><?php echo e($k->ime_prezime); ?></td>
						        <td><?php echo e($k->username); ?></td>
						        <td><?php echo e($k->email); ?></td>
						        <td><?php echo e($k->adresa); ?></td>
						        <td><?php echo e($k->datumUnosa); ?></td>
						        <td><?php echo e($k->datumIzmene); ?></td>
						        <?php if($k->id_uloga == 1): ?>
						        	<th><?php echo e("Administrator"); ?></th>
						        <?php else: ?>
						        	<th><?php echo e("Korisnik"); ?></th>
						       	<?php endif; ?>
						        <td><a class="btn btn-warning" href="<?php echo e(asset('admin/korisnik/izmena/'.$k->id_korisnik)); ?>" >Izmeni</a></td>
						        <td><a class="btn btn-danger" href="<?php echo e(asset('admin/korisnik/brisanje/'.$k->id_korisnik)); ?>" >Obrisi</a></td>
						    </tr>
				        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    </tbody>
				</table>
		</div>

	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>