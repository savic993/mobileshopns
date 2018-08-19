<?php $__env->startSection('sadrzaj'); ?>

<div id="fh5co-product">
		<div class="container">
			
			
			<?php if(session('success')): ?>
	        	<div class="alert alert-success"><?php echo e(session('success')); ?></div>
	        <?php endif; ?>
	        <?php if($telefon): ?>
	        <div class="row">
				<div class="col-md-10 col-md-offset-1 animate-box">
					<div class="row animate-box">
						<div class="item">
							<div class="active text-center">
								<figure>
									<img src="<?php echo e(asset('/'.$telefon[0]->putanja)); ?>" alt="<?php echo e($telefon[0]->naziv_model); ?>">
								</figure>
							</div>
						</div>
					</div>
					<div class="row animate-box">
						<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
							<h2><?php echo e($telefon[0]->naziv_proizvodjac.' '.$telefon[0]->naziv_model); ?></h2>
							<p>
								<a href="<?php echo e(asset('/naruci/'.$telefon[0]->id_proizvodjac.'/'.$telefon[0]->id_model.'/'.Session::get('korisnik')->id_korisnik)); ?>" class="btn btn-primary btn-outline btn-lg">Add to Cart</a>
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="fh5co-tabs animate-box">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#" data-tab="1"><span class="icon visible-xs"><i class="icon-file"></i></span><span class="hidden-xs">Specifikacija</span></a></li>
						</ul>

						
						
						<div class="fh5co-tab-content-wrap">

							<div class="fh5co-tab-content tab-content active" data-tab-content="1">
								<div class="col-md-10 col-md-offset-1">
									<span class="price"><?php echo e($telefon[0]->cena); ?> &euro;</span>
									<h2><?php echo e($telefon[0]->naziv_proizvodjac.' '.$telefon[0]->naziv_model); ?></h2>
									<?php $__currentLoopData = $telefon[1]; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<label>Kamera:</label><p><?php echo e($t[0]); ?></p>
									<label>Procesor:</label><p><?php echo e($t[1]); ?></p>
									<label>Memorija:</label><p><?php echo e($t[2]); ?></p>
									<label>Wi-fi/ Bluetooth:</label><p><?php echo e($t[3]); ?></p>
									<label>Boja:</label><p><?php echo e($t[4]); ?></p>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>
		</div>
	</div>

	<?php $__env->stopSection(); ?>	

<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>