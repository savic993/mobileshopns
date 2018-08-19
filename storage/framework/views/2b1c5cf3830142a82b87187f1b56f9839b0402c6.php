<?php $__env->startSection('sadrzaj'); ?>

<div class="container">
	<?php echo $__env->make('components.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<div class="row">
        <h3>Unos grada</h3>
		<form action="<?php echo e(asset('/admin/meni/update/'.$meni[0]->id_meni)); ?>" method="POST">
			<?php echo e(csrf_field()); ?>


			<div class="container">

			    <label for="tbRuta"><b>Ruta</b></label>
			    <input type="text" placeholder="Unesite naziv rute(npr. /naziv)" name="tbRuta" value="<?php echo e($meni[0]->link); ?>" required>

			    <label for="tbNaziv"><b>Naziv</b></label>
			    <input type="text" placeholder="Unesite naziv menija" name="tbNaziv" value="<?php echo e($meni[0]->naziv_meni); ?>" required>

			    <label for="tbPozicija"><b>Pozicija</b></label>
			    <input type="text" placeholder="Unesite redni broj pozicije na kojoj zelite da se nalazi link menija" name="tbPozicija" value="<?php echo e($meni[0]->pozicija); ?>" required>

			    <button type="submit" name="btnUnesi" class="btn btn-success">Unesi</button>
			    <button type="reset" name="btnPonisti" class="btn btn-danger">Ponisti</button>
			 </div>
		</form>
	</div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>