<?php $__env->startSection('sadrzaj'); ?>

<div class="container">
	<?php echo $__env->make('components.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="row">
		
		
		<?php if(session('success')): ?>
			<div class="alert alert-success"><?php echo e(session('success')); ?></div>
		<?php elseif(session('error')): ?>
			<div class="alert alert-danger"><?php echo e(session('error')); ?></div>
		<?php endif; ?>

        <h3>Unos proizvodjaca</h3>
		<form action="<?php echo e(route('unosProizvodjaca')); ?>" method="POST" enctype="multipart/form-data">
			<?php echo e(csrf_field()); ?>


			<div class="container">

			    <label for="tbProizvodjac"><b>Naziv</b></label>
			    <input type="text" placeholder="Unesite naziv proizvodjaca" name="tbProizvodjac" required>

			    <label for="fSlika"><b>Slika</b></label>
			    <input type="file" name="fSlika" />

			    <button type="submit" name="btnUnesi" class="btn btn-success">Unesi</button>
			    <button type="reset" name="btnPonisti" class="btn btn-danger">Ponisti</button>
			 </div>
		</form>

		<br/>

		

		<h3>Unos modela</h3>
		<form action="<?php echo e(route('unosModela')); ?>" method="POST" enctype="multipart/form-data">
			<?php echo e(csrf_field()); ?>


			<div class="container">

			    <label for="tbNaziv"><b>Naziv</b></label>
			    <input type="text" placeholder="Unesite naziv modela" name="tbNaziv" required>

			    <label for="ddlProizvodjac"><b>Proizvodjac</b></label>
			    <select name="ddlProizvodjac" required>
				    	<option value="0">Izaberi</option>
				    	<?php $__currentLoopData = $proizvodjaci; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				    		<option value="<?php echo e($p->id_proizvodjac); ?>"><?php echo e($p->naziv_proizvodjac); ?></option>
				    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    </select>

			    <label for="tbKamera"><b>Kamera</b></label>
			    <input type="text" placeholder="Unesite rezoluciju kamere u MP" name="tbKamera" required>

			    <label for="tbProcesor"><b>Procesor</b></label>
			    <input type="text" placeholder="Unesite karakteristike procesora" name="tbProcesor" required>

			    <label for="tbMemorija"><b>Memorija</b></label>
			    <input type="text" placeholder="Unesite memoriju telefona u GB" name="tbMemorija" required>

			    <label for="tbWifi"><b>Wi/fi - Bluetooth</b></label>
			    <input type="text" placeholder="Unesite karakteristike za wi-fi i bluetooth" name="tbWifi" required >

			    <label for="tbBoja"><b>Boja</b></label>
			    <input type="text" placeholder="Unesite boju" name="tbBoja" required >

			    <label for="tbKolicina"><b>Kolicina</b></label>
			    <input type="text" placeholder="Unesite kolicinu" name="tbKolicina" required>
			    
			    <label for="tbCena"><b>Cena</b></label>
			    <input type="text" placeholder="Unesite cenu u &euro;" name="tbCena" required>

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
				        <th>Model</th>
				        <th>Proizvodjac</th>
				        <th>Opis</th>
				        <th>Cena</th>
				        <th>Kolicina</th>
				        <th>Datum unosa</th>
				        <th>Datum izmene</th>
				        <th>Izmeni</th>
				        <th>Obrisi</th>
				      </tr>
				    </thead>
				    <tbody>
				    	<?php $__currentLoopData = $telefoni; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					      	<tr>
						        <td><?php echo e($t->naziv_model); ?></td>
						        <td><?php echo e($t->naziv_proizvodjac); ?></td>
						        <td><?php echo e($t->opis); ?></td>
						        <td><?php echo e($t->cena); ?></td>
						        <td><?php echo e($t->kolicina); ?></td>
						        <td><?php echo e($t->datumUnosa); ?></td>
						        <td><?php echo e($t->datumIzmene); ?></td>
						        <td><a class="btn btn-warning" href="<?php echo e(asset('admin/telefon/izmena/'.$t->id_model)); ?>" >Izmeni</a></td>
						        <td><a class="btn btn-danger" href="<?php echo e(asset('admin/telefon/brisanje/'.$t->id_model)); ?>" >Obrisi</a></td>
						    </tr>
				        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    </tbody>
				</table>
		</div>

	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>