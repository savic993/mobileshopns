<?php $__env->startSection('sadrzaj'); ?>
	<div class="container">
		<div class="row">

			
			<?php if(session('error')): ?>
	        	<div class="alert alert-danger"><?php echo e(session('error')); ?></div>
	        <?php elseif(session('success')): ?>
	        	<div class="alert alert-success"><?php echo e(session('success')); ?></div>
	        <?php endif; ?>
	        <div class="row">
	        	<div id="greske" class="container"></div>
	    	</div><br/>

			<form action="<?php echo e(route('reg')); ?>" method="POST"  onsubmit="return registracija();">
				<?php echo e(csrf_field()); ?>


				<div class="container">
					<label for="tbImePrezime"><b>Ime i prezime</b></label>
				    <input type="text" placeholder="Unesite ime i prezime" name="tbImePrezime" id="tbImePrezime" required >

				    <label for="tbEmail"><b>Email</b></label>
				    <input type="text" placeholder="Unesite email" name="tbEmail" id="tbEmail" required >

				    <label for="tbkKorisnickoIme"><b>Korisnicko ime</b></label>
				    <input type="text" placeholder="Unesite korisnicko ime" name="tbKorisnickoIme" id="tbKorisnickoIme" required >

				    <label for="tbLozinka"><b>Lozinka</b></label>
				    <input type="password" placeholder="Unesite lozinku" name="tbLozinka" id="tbLozinka" required >

				    <label for="ddlGrad"><b>Grad</b></label>
				    <select name="ddlGrad" required id="ddlGrad">
				    	<option value="0">Izaberi</option>
				    	<?php $__currentLoopData = $gradovi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $grad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				    		<option value="<?php echo e($grad->id_grad); ?>"><?php echo e($grad->ime_grad); ?></option>
				    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				    </select>

				    <label for="tbAdresa"><b>Adresa</b></label>
				    <input type="text" placeholder="Unesite adresu" name="tbAdresa" id="tbAdresa" required >

				    <button type="submit">Registruj se</button>
				 </div>

			</form>

			<div class="row">
				<div class="container">
					<?php if($errors->any()): ?>
			            <div class="alert alert-danger">
			                <ul>
			                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			                        <li><?php echo e($error); ?></li>
			                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			                </ul>
			            </div>
		       		<?php endif; ?>
				</div>
			</div>
			

		</div>
	</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>