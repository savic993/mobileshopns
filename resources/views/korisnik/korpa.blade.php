@extends('layout.template')


@section('sadrzaj')

<div class="container">
	<div class="row">

        <h3>Naruceni proizvodi</h3>
        {{--ispis poruka --}}
		@if(session('success'))
			<div class="alert alert-success">{{ session('success') }}</div>
		@elseif(session('error'))
        	<div class="alert alert-danger">{{ session('error') }}</div>
        @endif
		<div class="container">
				<table class="table table-striped">
				    <thead>
				      <tr>
				        <th>Ime i prezime</th>
				        <th>Username</th>
				        <th>Email</th>
				        <th>Adresa</th>
				        <th>Proizvodjac</th>
				        <th>Model</th>
				        <th>Obrisi</th>
				      </tr>
				    </thead>
				    <tbody>
				      	@foreach($naruceno as $n)
					      	<tr>
						        <td>{{ $n->ime_prezime }}</td>
						        <td>{{ $n->username }}</td>
						        <td>{{ $n->email }}</td>
						        <td>{{ $n->adresa }}</td>
						        <td>{{ $n->naziv_proizvodjac }}</td>
						        <td>{{ $n->naziv_model }}</td>
						        <td><a class="btn btn-danger" href="{{ asset('/korpa/brisanje/'.$n->idKorpa) }}" >Obrisi</a></td>
						    </tr>
				        @endforeach
				    </tbody>
				</table>
		</div>

	</div>
</div>

@endsection