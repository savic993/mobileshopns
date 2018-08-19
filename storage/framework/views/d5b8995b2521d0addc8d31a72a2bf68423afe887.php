<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-xs-2">
					<div id="fh5co-logo"><a href="<?php echo e(route('home')); ?>">Moblie Shop.</a></div>
				</div>
				<div class="col-md-6 col-xs-6 text-center menu-1">
					<ul>
						<?php if(!session()->has('korisnik')): ?>
							<li><a href="<?php echo e(route('pocetna')); ?>">Prijavi se</a></li>
							<li><a href="<?php echo e(route('registracija')); ?>">Registracija</a></li>
						<?php else: ?>
						    <?php if(session()->get('korisnik')->uloga == 'Korisnik'): ?>
						    	<?php $__currentLoopData = $meni; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $m): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>						    		
						    		<li><a href="<?php echo e(url($m->link)); ?>"><?php echo e($m->naziv_meni); ?></a></li>						    	
						    	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						    <?php else: ?>
						    	<div class="col-md-3 col-xs-3 text-center menu-1">
									<!-- Use any element to open the sidenav -->
									<span onclick="openNav()">Admin meni</span>
								</div>
						    <?php endif; ?>
							<li><a href="<?php echo e(route('odjava')); ?>">Logout</a></li>
						<?php endif; ?>
					</ul>
				</div>
				<?php if(session()->has('korisnik')): ?>
					<?php if(session()->get('korisnik')->uloga == 'Korisnik'): ?>
						<div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
							<ul>
								<li class="search">
									<div class="input-group">
								      <input type="text" placeholder="Search.." name="tbSearch">
								      <span class="input-group-btn">
								        <button class="btn btn-primary" type="button"><i class="icon-search"></i></button>
								      </span>
								    </div>
								</li>
								<li class="shopping-cart"><a href="<?php echo e(asset('/korpa/'.Session::get('korisnik')->id_korisnik)); ?>" class="cart"><span><small class="broj">0</small><i class="icon-shopping-cart"></i></span></a></li>
							</ul>
						</div>
					<?php endif; ?>
				<?php endif; ?>
			</div>
			
		</div>
	</nav>