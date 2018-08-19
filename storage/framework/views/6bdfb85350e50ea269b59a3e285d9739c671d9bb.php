<?php $__env->startSection('sadrzaj'); ?>

<div id="fh5co-product">
		<div class="container">
			
			
			<?php if(session('success')): ?>
	        	<div class="alert alert-success"><?php echo e(session('success')); ?></div>
	        <?php endif; ?>
	        
			<?php $__currentLoopData = $popust; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

			<div class="row">
				<div class="col-md-10 col-md-offset-1 animate-box">
					<div class="row animate-box">
						<div class="item">
							<div class="active text-center">
								<figure>
									<img src="<?php echo e(asset('/'.$p->putanja)); ?>" alt="<?php echo e($p->naslov); ?>">
								</figure>
							</div>
						</div>
					</div>
					<div class="row animate-box">
						<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
							<h2><?php echo e($p->naslov); ?></h2>
							<p>
								<a href="<?php echo e(route('home')); ?>" class="btn btn-primary btn-outline btn-lg">Vrati se na pocetnu</a>
							</p>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="fh5co-tabs animate-box">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#" data-tab="1"><span class="icon visible-xs"><i class="icon-file"></i></span><span class="hidden-xs">Popust</span></a></li>
						</ul>

						<!-- Tabs -->
						
						<div class="fh5co-tab-content-wrap">

							<div class="fh5co-tab-content tab-content active" data-tab-content="1">
								<div class="col-md-10 col-md-offset-1">
									<span class="price"><?php echo e($p->cena); ?> &euro;</span>
									<h2><?php echo e($p->naslov); ?></h2>
									<p><?php echo e($p->tekst); ?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
	<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>