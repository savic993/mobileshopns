<?php $__env->startSection('sadrzaj'); ?>

<div id="fh5co-product">
		<div class="container">

			
			<?php if(session('success')): ?>
	        	<div class="alert alert-success"><?php echo e(session('success')); ?></div>
	        <?php endif; ?>

			<div class="row animate-box">
				<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
					<span>Ponuda</span>
					<h2>Telefoni</h2>
					<p>Ovde mozetete pogledati ponudu nasih telefona.</p>
				</div>
			</div>

			<div class="row">
				<div id="blokPretraga">
					<h3>Filter</h3>
					<form>
						<?php echo e(csrf_field()); ?>

						<div class="container">
					    <label for="ddlProizvodjac"><b>Proizvodjaci</b></label>
					    <select id="ddlProizvodjac">
					    	<option value="0">Izaberi</option>
					    	<?php $__currentLoopData = $proizvodjaci; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				    			<option value="<?php echo e($p->id_proizvodjac); ?>"><?php echo e($p->naziv_proizvodjac); ?></option>
				    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					    </select>

					    <label for="ddlModeli"><b>Modeli</b></label>
					    <select id="ddlModeli">
					    	<option value="0">Izaberi</option>
					    	<?php $__currentLoopData = $telefoni; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				    			<option value="<?php echo e($t->id_model); ?>"><?php echo e($t->naziv_model); ?></option>
				    		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					    </select>

					    <button type="button" class="btnFilter">Filter</button>
					 </div>
					</form>
				</div>
			</div>

			<div class="row" id="telefoni">
				<?php $__currentLoopData = $telefoni; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $telefon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-md-4 text-center animate-box">
					<div class="product">
						<div class="product-grid" style="background-image:url(<?php echo e(asset('/'.$telefon->putanja)); ?>);">
							<?php if($telefon->kolicina == 0): ?>
								<span class="sale">Sale</span>
							<?php endif; ?>
							<div class="inner">
								<p>
									<a href="<?php echo e(asset('/naruci/'.$telefon->id_proizvodjac.'/'.$telefon->id_model.'/'.Session::get('korisnik')->id_korisnik)); ?>" class="icon"><i class="icon-shopping-cart"></i></a>
									<a href="<?php echo e(asset('/telefoni/'.$telefon->id_model)); ?>" class="icon"><i class="icon-eye"></i></a>
								</p>
							</div>
						</div>
						<div class="desc">
							<h3><a href=" route('Telefon') "><?php echo e($telefon->naziv_proizvodjac.' '.$telefon->naziv_model); ?></a></h3>
							<span class="price"><?php echo e($telefon->cena); ?> &euro;</span>
						</div>
					</div>
				</div>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</div>
			<div class="row" id="paginacija">
					
			</div>
			<?php echo $__env->make('components.pagination', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
			<div class="row" id="filter">
				
			</div>
		</div>
	</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.template', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>