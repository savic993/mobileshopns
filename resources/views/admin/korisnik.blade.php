@extends('layout.template')


@section('sadrzaj')

<div class="container">
	@include('components.sidebar')
	<div class="row">
		{{--ispis poruka pri unosu--}}
		@if(session('success'))
			<div class="alert alert-success">{{ session('success') }}</div>
		@elseif(session('error'))
        	<div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <h3>Izmena uloge i brisanje korisnika</h3>

		<div class="container">
				<table class="table table-striped">
				    <thead>
				      <tr>
				        <th>Ime i prezime</th>
				        <th>Username</th>
				        <th>Email</th>
				        <th>Adresa</th>
				        <th>Uloga</th>
				        <th>Datum unosa</th>
				        <th>Datum izmene</th>
				        <th>Izmeni</th>
				        <th>Obrisi</th>
				      </tr>
				    </thead>
				    <tbody>
				      	@foreach($korisnici as $k)
					      	<tr>
						        <td>{{ $k->ime_prezime }}</td>
						        <td>{{ $k->username }}</td>
						        <td>{{ $k->email }}</td>
						        <td>{{ $k->adresa }}</td>
						        <td>{{ $k->datumUnosa }}</td>
						        <td>{{ $k->datumIzmene }}</td>
						        @if($k->id_uloga == 1)
						        	<th>{{ "Administrator" }}</th>
						        @else
						        	<th>{{ "Korisnik" }}</th>
						       	@endif
						        <td><a class="btn btn-warning" href="{{ asset('admin/korisnik/izmena/'.$k->id_korisnik) }}" >Izmeni</a></td>
						        <td><a class="btn btn-danger" href="{{ asset('admin/korisnik/brisanje/'.$k->id_korisnik) }}" >Obrisi</a></td>
						    </tr>
				        @endforeach
				    </tbody>
				</table>
		</div>

	</div>
</div>

@endsection