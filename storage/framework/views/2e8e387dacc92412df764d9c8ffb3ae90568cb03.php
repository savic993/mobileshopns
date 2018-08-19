<aside id="fh5co-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">

					<?php $__currentLoopData = $slajder; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slajd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					   	<li style="background-image: url(<?php echo e(asset('/'.$slajd->putanja)); ?>);">
					   		<div class="overlay-gradient"></div>
					   		<div class="container">
					   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
					   				<div class="slider-text-inner">
					   					<div class="desc">
					   						<span class="price"><?php echo e($slajd->cena); ?>  &euro;</span>
					   						<h2><?php echo e($slajd->naslov); ?></h2>
					   						<p><?php echo e($slajd->tekst); ?></p>
					   						<?php if(session()->has('korisnik')): ?>
						   						<p><a href="<?php echo e(url('/popusti/'.$slajd->id_slajda)); ?>" class="btn btn-primary btn-outline btn-lg">Saznaj vise</a></p>
						   					<?php endif; ?>
					   					</div>
					   				</div>
					   			</div>
					   		</div>
					   	</li>
			   		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

		  	</ul>
	  	</div>
	</aside>