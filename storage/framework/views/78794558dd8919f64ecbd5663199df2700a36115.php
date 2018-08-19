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
		<form action="<?php echo e(route('unosSlajdera')); ?>" method="POST" enctype="multipart/form-data">
			<?php echo e(csrf_field()); ?>


			<div class="container">

			    <label for="tbNaslov"><b>Naslov slike</b></label>
			    <input type="text" placeholder="Unesite naslov slike" name="tbNaslov" required>

			    <label for="tbCena"><b>Cena</b></label>
			    <input type="text" placeholder="Unesite cenu proizvoda na popustu" name="tbCena" required>

			    <label for="tbNaslovSlajd"><b>Naslov slajda</b></label>
			    <input type="text" placeholder="Unesite naslov za slajd" name="tbNaslovSlajd" required>

			    <label for="tbTekst"><b>Tekst</b></label>
			    <input type="text" placeholder="Unesite kratak opis za slajd" name="tbTekst" required>

			    <label for="fSlika"><b>Slika</b></label>
			    <input type="file" name="fSlika" />

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
				        <th>Putanja</th>
				        <th>Cena</th>
				        <th>Tekst</th>
				        <th>Datum unosa</th>
				        <th>Datum izmene</th>
				        <th>Izmeni</th>
				        <th>Obrisi</th>
				      </tr>
				    </thead>
				    <tbody>
				      	<?php $__currentLoopData = $slajderi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					      	<tr>
						        <td><?php echo e($s->putanja); ?></td>
						        <td><?php echo e($s->cena); ?></td>
						        <td><?php echo e($s->naslov); ?></td>
						        <td><?php echo e($s->tekst); ?></td>
						        <td><?php echo e($s->datumUnosa); ?></td>
						        <td><?php echo e($s->datumIzmene); ?></td>
						        <td><a class="btn btn-warning" href="<?php echo e(asset('admin/slajder/izmena/'.$s->id_slajda)); ?>" >Izmeni</a></td>
						        <td><a class="btn btn-danger" href="<?php echo e(asset('admin/slajder/brisanje/'.$s->id_slajda)); ?>" >Obrisi</a></td>
						    </tr>
				        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    </tbody>
				</table>
		</div>

	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>