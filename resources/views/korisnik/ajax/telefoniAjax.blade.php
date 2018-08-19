	
<div class="container">
			@foreach($telefoni as $t)

				<div class="col-md-4 text-center">
					<div class="product">
						<div class="product-grid" style="background-image:url( {{ asset('/'.$t->putanja) }} );">
							@if($t->kolicina == 0)
								<span class="sale">Sale</span>
							@endif
							<div class="inner">
								<p>
									<a href="{{ asset('/naruci/'.$t->id_proizvodjac.'/'.$t->id_model.'/'.Session::get('korisnik')->id_korisnik) }}" class="icon"><i class="icon-shopping-cart"></i></a>
									<a href="{{ asset('/telefoni/'.$t->id_model) }}" class="icon"><i class="icon-eye"></i></a>
								</p>
							</div>
						</div>
						<div class="desc">
							<h3><a href=" route('Telefon') ">{{ $t->naziv_proizvodjac.' '.$t->naziv_model }}</a></h3>
							<span class="price">{{ $t->cena }} &euro;</span>
						</div>
					</div>
				</div>
			
			@endforeach
</div>
