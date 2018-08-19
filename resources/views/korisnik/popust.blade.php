@extends('layout.template')


@section('sadrzaj')

<div id="fh5co-product">
		<div class="container">
			
			{{-- ispis poruka --}}
			@if(session('success'))
	        	<div class="alert alert-success">{{ session('success') }}</div>
	        @endif
	        
			@foreach($popust as $p)

			<div class="row">
				<div class="col-md-10 col-md-offset-1 animate-box">
					<div class="row animate-box">
						<div class="item">
							<div class="active text-center">
								<figure>
									<img src="{{ asset('/'.$p->putanja) }}" alt="{{ $p->naslov }}">
								</figure>
							</div>
						</div>
					</div>
					<div class="row animate-box">
						<div class="col-md-8 col-md-offset-2 text-center fh5co-heading">
							<h2>{{ $p->naslov }}</h2>
							<p>
								<a href="{{ route('home') }}" class="btn btn-primary btn-outline btn-lg">Vrati se na pocetnu</a>
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
									<span class="price">{{ $p->cena }} &euro;</span>
									<h2>{{ $p->naslov }}</h2>
									<p>{{ $p->tekst }}</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
			@endforeach
		</div>
	</div>
	@endsection