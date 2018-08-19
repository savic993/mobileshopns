<?php $__env->startSection('sadrzaj'); ?>

<div class="container">
	<?php echo $__env->make('components.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="row">
		<form action="<?php echo e(asset('admin/telefon/update/'.$telefon[0]->id_model)); ?>" method="POST" enctype="multipart/form-data">
			<?php echo e(csrf_field()); ?>


			<div class="container">

			    <label for="tbNaziv"><b>Naziv</b></label>
			    <input type="text" placeholder="Unesite naziv modela" name="tbNaziv" required value="<?php echo e($telefon[0]->naziv_model); ?>">

			    <label for="ddlProizvodjac"><b>Proizvodjac</b></label>
			    <select name="ddlProizvodjac" required>
				    	<option value="0">Izaberi</option>
				    	<?php $__currentLoopData = $proizvodjaci; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				    		<option value="<?php echo e($p->id_proizvodjac); ?>"><?php echo e($p->naziv_proizvodjac); ?></option>
				    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>

				<label for="tbCena"><b>Cena</b></label>
			    <input type="text" placeholder="Unesite cenu u &euro;" name="tbCena" required value="<?php echo e($telefon[0]->cena); ?> &euro;">

			    <label for="tbKolicina"><b>Kolicina</b></label>
			    <input type="text" placeholder="Unesite kolicinu" name="tbKolicina" required value="<?php echo e($telefon[0]->kolicina); ?>">

				<?php $__currentLoopData = $telefon[1]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			    <label for="tbKamera"><b>Kamera</b></label>
			    <input type="text" placeholder="Unesite rezoluciju kamere u MP" name="tbKamera" required value="<?php echo e($t[0]); ?>">

			    <label for="tbProcesor"><b>Procesor</b></label>
			    <input type="text" placeholder="Unesite karakteristike procesora" name="tbProcesor" required value="<?php echo e($t[1]); ?>">

			    <label for="tbMemorija"><b>Memorija</b></label>
			    <input type="text" placeholder="Unesite memoriju telefona u GB" name="tbMemorija" required value="<?php echo e($t[2]); ?>">

			    <label for="tbWifi"><b>Wi/fi - Bluetooth</b></label>
			    <input type="text" placeholder="Unesite karakteristike za wi-fi i bluetooth" name="tbWifi" required value="<?php echo e($t[3]); ?>">

			    <label for="tbBoja"><b>Boja</b></label>
			    <input type="text" placeholder="Unesite boju" name="tbBoja" required value="<?php echo e($t[4]); ?>">
			    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

			    <button type="submit" name="btnUnesi" class="btn btn-success">Unesi</button>
			    <button type="reset" name="btnPonisti" class="btn btn-danger">Ponisti</button>
			 </div>
		</form>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>