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