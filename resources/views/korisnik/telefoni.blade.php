@extends('layout.template')


@section('sadrzaj')

<div id="fh5co-product">
		<div class="container">

			{{-- ispis poruka --}}
			@if(session('success'))
	        	<div class="alert alert-success">{{ session('success') }}</div>
	        @endif

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
						{{ csrf_field() }}
						<div class="container">
					    <label for="ddlProizvodjac"><b>Proizvodjaci</b></label>
					    <select id="ddlProizvodjac">
					    	<option value="0">Izaberi</option>
					    	@foreach($proizvodjaci as $p)
				    			<option value="{{ $p->id_proizvodjac }}">{{ $p->naziv_proizvodjac }}</option>
				    		@endforeach
					    </select>

					    <label for="ddlModeli"><b>Modeli</b></label>
					    <select id="ddlModeli">
					    	<option value="0">Izaberi</option>
					    	@foreach($telefoni as $t)
				    			<option value="{{ $t->id_model }}">{{ $t->naziv_model }}</option>
				    		@endforeach
					    </select>

					    <button type="button" class="btnFilter">Filter</button>
					 </div>
					</form>
				</div>
			</div>

			<div class="row" id="telefoni">
				@foreach($telefoni as $telefon)
					<div class="col-md-4 text-center animate-box">
					<div class="product">
						<div class="product-grid" style="background-image:url({{ asset('/'.$telefon->putanja) }});">
							@if($telefon->kolicina == 0)
								<span class="sale">Sale</span>
							@endif
							<div class="inner">
								<p>
									<a href="{{ asset('/naruci/'.$telefon->id_proizvodjac.'/'.$telefon->id_model.'/'.Session::get('korisnik')->id_korisnik) }}" class="icon"><i class="icon-shopping-cart"></i></a>
									<a href="{{ asset('/telefoni/'.$telefon->id_model) }}" class="icon"><i class="icon-eye"></i></a>
								</p>
							</div>
						</div>
						<div class="desc">
							<h3><a href=" route('Telefon') ">{{ $telefon->naziv_proizvodjac.' '.$telefon->naziv_model }}</a></h3>
							<span class="price">{{ $telefon->cena }} &euro;</span>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="row" id="paginacija">
					
			</div>
			@include('components.pagination')
			<div class="row" id="filter">
				
			</div>
		</div>
	</div>

@endsection

