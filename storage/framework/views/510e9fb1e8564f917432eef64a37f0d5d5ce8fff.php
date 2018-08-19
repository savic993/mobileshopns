	
<div class="container">
			<?php $__currentLoopData = $telefoni; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

				<div class="col-md-4 text-center">
					<div class="product">
						<div class="product-grid" style="background-image:url( <?php echo e(asset('/'.$t->putanja)); ?> );">
							<?php if($t->kolicina == 0): ?>
								<span class="sale">Sale</span>
							<?php endif; ?>
							<div class="inner">
								<p>
									<a href="<?php echo e(asset('/naruci/'.$t->id_proizvodjac.'/'.$t->id_model.'/'.Session::get('korisnik')->id_korisnik)); ?>" class="icon"><i class="icon-shopping-cart"></i></a>
									<a href="<?php echo e(asset('/telefoni/'.$t->id_model)); ?>" class="icon"><i class="icon-eye"></i></a>
								</p>
							</div>
						</div>
						<div class="desc">
							<h3><a href=" route('Telefon') "><?php echo e($t->naziv_proizvodjac.' '.$t->naziv_model); ?></a></h3>
							<span class="price"><?php echo e($t->cena); ?> &euro;</span>
						</div>
					</div>
				</div>
			
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
