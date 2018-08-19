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

        <h3>Unos slajdera</h3>
		<form action="{{ route('unosSlajdera') }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="container">

			    <label for="tbNaslov"><b>Naslov slike</b></label>
			    <input type="text" placeholder="Unesite naslov slike" name="tbNaslov" required>

			    <label for="tbCena"><b>Cena</b></label>
			    <input type="text" placeholder="Unesite cenu proizvoda na popustu" name="tbCena" required>

			    <label for="tbNaslovSlajd"><b>Naslov slajda</b></label>
			    <input type="text" placeholder="Unesite naslov za slajd" name="tbNaslovSlajd" required>

			    <label for="tbTekst"><b>Tekst</b></label>
			    <input type="text" placeholder="Unesite kratak opis za slajd" name="tbTekst" required>

			    <label for="fSlika"><b>Slika</b></label>
			    <input type="file" name="fSlika" />

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
				        <th>Putanja</th>
				        <th>Cena</th>
				        <th>Tekst</th>
				        <th>Datum unosa</th>
				        <th>Datum izmene</th>
				        <th>Izmeni</th>
				        <th>Obrisi</th>
				      </tr>
				    </thead>
				    <tbody>
				      	@foreach($slajderi as $s)
					      	<tr>
						        <td>{{ $s->putanja }}</td>
						        <td>{{ $s->cena }}</td>
						        <td>{{ $s->naslov }}</td>
						        <td>{{ $s->tekst }}</td>
						        <td>{{ $s->datumUnosa }}</td>
						        <td>{{ $s->datumIzmene }}</td>
						        <td><a class="btn btn-warning" href="{{ asset('admin/slajder/izmena/'.$s->id_slajda) }}" >Izmeni</a></td>
						        <td><a class="btn btn-danger" href="{{ asset('admin/slajder/brisanje/'.$s->id_slajda) }}" >Obrisi</a></td>
						    </tr>
				        @endforeach
				    </tbody>
				</table>
		</div>

	</div>
</div>

@endsection