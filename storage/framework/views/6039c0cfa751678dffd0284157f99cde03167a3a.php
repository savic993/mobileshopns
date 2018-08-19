<?php $__env->startSection('sadrzaj'); ?>

<div class="container">
	<?php echo $__env->make('components.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="row">
		
		
		<?php if(session('success')): ?>
			<div class="alert alert-success"><?php echo e(session('success')); ?></div>
		<?php elseif(session('error')): ?>
        	<div class="alert alert-danger"><?php echo e(session('error')); ?></div>
        <?php endif; ?>

        <h3>Unos menija</h3>
		<form action="<?php echo e(route('unosMeni')); ?>" method="POST">
			<?php echo e(csrf_field()); ?>


			<div class="container">

			    <label for="tbRuta"><b>Ruta</b></label>
			    <input type="text" placeholder="Unesite naziv rute(npr. /naziv)" name="tbRuta" required>

			    <label for="tbNaziv"><b>Naziv</b></label>
			    <input type="text" placeholder="Unesite naziv menija" name="tbNaziv" required>

			    <label for="tbPozicija"><b>Pozicija</b></label>
			    <input type="text" placeholder="Unesite redni broj pozicije na kojoj zelite da se nalazi link menija" name="tbPozicija" required>

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
				        <th>Ruta</th>
				        <th>Naziv</th>
				        <th>Pozicija</th>
				        <th>Datum unosa</th>
				        <th>Datum izmene</th>
				        <th>Izmeni</th>
				        <th>Obrisi</th>
				      </tr>
				    </thead>
				    <tbody>
				      	<?php $__currentLoopData = $meni; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					      	<tr>
						        <td><?php echo e($m->link); ?></td>
						        <td><?php echo e($m->naziv_meni); ?></td>
						        <td><?php echo e($m->pozicija); ?></td>
						        <td><?php echo e($m->datumUnosa); ?></td>
						        <td><?php echo e($m->datumIzmene); ?></td>
						        <td><a class="btn btn-warning" href="<?php echo e(asset('admin/meni/izmena/'.$m->id_meni)); ?>" >Izmeni</a></td>
						        <td><a class="btn btn-danger" href="<?php echo e(asset('admin/meni/brisanje/'.$m->id_meni)); ?>" >Obrisi</a></td>
						    </tr>
				        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    </tbody>
				</table>
		</div>

	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>