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

        <h3>Unos menija</h3>
		<form action="{{ route('unosMeni') }}" method="POST">
			{{ csrf_field() }}

			<div class="container">

			    <label for="tbRuta"><b>Ruta</b></label>
			    <input type="text" placeholder="Unesite naziv rute(npr. /naziv)" name="tbRuta" required>

			    <label for="tbNaziv"><b>Naziv</b></label>
			    <input type="text" placeholder="Unesite naziv menija" name="tbNaziv" required>

			    <label for="tbPozicija"><b>Pozicija</b></label>
			    <input type="text" placeholder="Unesite redni broj pozicije na kojoj zelite da se nalazi link menija" name="tbPozicija" required>

			    <button type="submit" name="btnUnesi" class="btn btn-success">Unesi</button>
			    <button type="reset" name="btnPonisti" class="btn btn-danger">Ponisti</button>
			 </div>
		</form>

		<br/>
		<div class="container">
			<h3>Izmena i brisanje</h3>
				<table class="table table-striped">
				    <thead>
				      <tr>
				        <th>Ruta</th>
				        <th>Naziv</th>
				        <th>Pozicija</th>
				        <th>Datum unosa</th>
				        <th>Datum izmene</th>
				        <th>Izmeni</th>
				        <th>Obrisi</th>
				      </tr>
				    </thead>
				    <tbody>
				      	@foreach($meni as $m)
					      	<tr>
						        <td>{{ $m->link }}</td>
						        <td>{{ $m->naziv_meni }}</td>
						        <td>{{ $m->pozicija }}</td>
						        <td>{{ $m->datumUnosa }}</td>
						        <td>{{ $m->datumIzmene }}</td>
						        <td><a class="btn btn-warning" href="{{ asset('admin/meni/izmena/'.$m->id_meni) }}" >Izmeni</a></td>
						        <td><a class="btn btn-danger" href="{{ asset('admin/meni/brisanje/'.$m->id_meni) }}" >Obrisi</a></td>
						    </tr>
				        @endforeach
				    </tbody>
				</table>
		</div>

	</div>
</div>

@endsection