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

        <h3>Unos proizvodjaca</h3>
		<form action="{{ route('unosProizvodjaca') }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="container">

			    <label for="tbProizvodjac"><b>Naziv</b></label>
			    <input type="text" placeholder="Unesite naziv proizvodjaca" name="tbProizvodjac" required>

			    <label for="fSlika"><b>Slika</b></label>
			    <input type="file" name="fSlika" />

			    <button type="submit" name="btnUnesi" class="btn btn-success">Unesi</button>
			    <button type="reset" name="btnPonisti" class="btn btn-danger">Ponisti</button>
			 </div>
		</form>

		<br/>

		{{--ispis poruka pri unosu--}}

		<h3>Unos modela</h3>
		<form action="{{ route('unosModela') }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="container">

			    <label for="tbNaziv"><b>Naziv</b></label>
			    <input type="text" placeholder="Unesite naziv modela" name="tbNaziv" required>

			    <label for="ddlProizvodjac"><b>Proizvodjac</b></label>
			    <select name="ddlProizvodjac" required>
				    	<option value="0">Izaberi</option>
				    	@foreach($proizvodjaci as $p)
				    		<option value="{{ $p->id_proizvodjac }}">{{ $p->naziv_proizvodjac }}</option>
				    	@endforeach
				    </select>

			    <label for="tbKamera"><b>Kamera</b></label>
			    <input type="text" placeholder="Unesite rezoluciju kamere u MP" name="tbKamera" required>

			    <label for="tbProcesor"><b>Procesor</b></label>
			    <input type="text" placeholder="Unesite karakteristike procesora" name="tbProcesor" required>

			    <label for="tbMemorija"><b>Memorija</b></label>
			    <input type="text" placeholder="Unesite memoriju telefona u GB" name="tbMemorija" required>

			    <label for="tbWifi"><b>Wi/fi - Bluetooth</b></label>
			    <input type="text" placeholder="Unesite karakteristike za wi-fi i bluetooth" name="tbWifi" required >

			    <label for="tbBoja"><b>Boja</b></label>
			    <input type="text" placeholder="Unesite boju" name="tbBoja" required >

			    <label for="tbKolicina"><b>Kolicina</b></label>
			    <input type="text" placeholder="Unesite kolicinu" name="tbKolicina" required>
			    
			    <label for="tbCena"><b>Cena</b></label>
			    <input type="text" placeholder="Unesite cenu u &euro;" name="tbCena" required>

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
				        <th>Model</th>
				        <th>Proizvodjac</th>
				        <th>Opis</th>
				        <th>Cena</th>
				        <th>Kolicina</th>
				        <th>Datum unosa</th>
				        <th>Datum izmene</th>
				        <th>Izmeni</th>
				        <th>Obrisi</th>
				      </tr>
				    </thead>
				    <tbody>
				    	@foreach($telefoni as $t )
					      	<tr>
						        <td>{{ $t->naziv_model }}</td>
						        <td>{{ $t->naziv_proizvodjac }}</td>
						        <td>{{ $t->opis }}</td>
						        <td>{{ $t->cena }}</td>
						        <td>{{ $t->kolicina }}</td>
						        <td>{{ $t->datumUnosa }}</td>
						        <td>{{ $t->datumIzmene }}</td>
						        <td><a class="btn btn-warning" href="{{ asset('admin/telefon/izmena/'.$t->id_model) }}" >Izmeni</a></td>
						        <td><a class="btn btn-danger" href="{{ asset('admin/telefon/brisanje/'.$t->id_model) }}" >Obrisi</a></td>
						    </tr>
				        @endforeach
				    </tbody>
				</table>
		</div>

	</div>
</div>

@endsection