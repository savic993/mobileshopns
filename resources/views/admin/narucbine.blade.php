@extends('layout.template')


@section('sadrzaj')

<div class="container">
	@include('components.sidebar')
	<div class="row">
		{{--ispis poruka --}}
		@if(session('success'))
			<div class="alert alert-success">{{ session('success') }}</div>
		@elseif(session('error'))
        	<div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        
        <h3>Prikaz i brisanje narucbina</h3>

		<div class="container">
				<table class="table table-striped">
				    <thead>
				      <tr>
				        <th>Proizvodjac</th>
				        <th>Model</th>
				        <th>Kupac</th>
				        <th>Adresa</th>
				        <th>Datum unosa</th>
				        <th>Obrisi</th>
				      </tr>
				    </thead>
				    <tbody>
				      	@foreach($narucbine as $n)
					      	<tr>
						        <td>{{ $n->naziv_proizvodjac }}</td>
						        <td>{{ $n->naziv_model }}</td>
						        <td>{{ $n->ime_prezime }}</td>
						        <td>{{ $n->adresa. ' ' .$n->ime_grad }}</td>
						        <td>{{ $n->datumUnosa }}</td>
						        <td><a class="btn btn-danger" href="{{ asset('admin/narucbine/brisanje/'.$n->idKorpa) }}" >Obrisi</a></td>
						    </tr>
				        @endforeach
				    </tbody>
				</table>
		</div>

	</div>
</div>

@endsection