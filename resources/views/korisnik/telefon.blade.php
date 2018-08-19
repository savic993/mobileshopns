@extends('layout.template')


@section('sadrzaj')

<div id="fh5co-product">
		<div class="container">
			
			{{-- ispis poruka --}}
			@if(session('success'))
	        	<div class="alert alert-success">{{ session('success') }}</div>
	        @endif
	        @if($telefon)
	        <div class="row">
				<div class="col-md-10 col-md-offset-1 animate-box">
					<div class="row animate-box">
						<div class="item">
							<div class="active text-center">
								<figure>
									<img src="{{ asset('/'.$telefon[0]->putanja) }}" alt="{{ $telefon[0]->naziv_model }}">
								</figure>
							</div>
						</div>
					</div>
					<div class="row animate-box">
						<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
							<h2>{{ $telefon[0]->naziv_proizvodjac.' '.$telefon[0]->naziv_model }}</h2>
							<p>
								<a href="{{ asset('/naruci/'.$telefon[0]->id_proizvodjac.'/'.$telefon[0]->id_model.'/'.Session::get('korisnik')->id_korisnik) }}" class="btn btn-primary btn-outline btn-lg">Add to Cart</a>
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
									<span class="price">{{ $telefon[0]->cena }} &euro;</span>
									<h2>{{ $telefon[0]->naziv_proizvodjac.' '.$telefon[0]->naziv_model }}</h2>
									@foreach($telefon[1] as $t)
									<label>Kamera:</label><p>{{ $t[0] }}</p>
									<label>Procesor:</label><p>{{ $t[1] }}</p>
									<label>Memorija:</label><p>{{ $t[2] }}</p>
									<label>Wi-fi/ Bluetooth:</label><p>{{ $t[3] }}</p>
									<label>Boja:</label><p>{{ $t[4] }}</p>
									@endforeach
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			@endif
		</div>
	</div>

	@endsection	
