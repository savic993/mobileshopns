@extends('layout.template')


@section('sadrzaj')

<div class="container">
	@include('components.sidebar')
	<div class="row">
		<form action="{{ asset('admin/telefon/update/'.$telefon[0]->id_model) }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="container">

			    <label for="tbNaziv"><b>Naziv</b></label>
			    <input type="text" placeholder="Unesite naziv modela" name="tbNaziv" required value="{{ $telefon[0]->naziv_model }}">

			    <label for="ddlProizvodjac"><b>Proizvodjac</b></label>
			    <select name="ddlProizvodjac" required>
				    	<option value="0">Izaberi</option>
				    	@foreach($proizvodjaci as $p)
				    		<option value="{{ $p->id_proizvodjac }}">{{ $p->naziv_proizvodjac }}</option>
				    	@endforeach
				</select>

				<label for="tbCena"><b>Cena</b></label>
			    <input type="text" placeholder="Unesite cenu u &euro;" name="tbCena" required value="{{ $telefon[0]->cena  }} ">

			    <label for="tbKolicina"><b>Kolicina</b></label>
			    <input type="text" placeholder="Unesite kolicinu" name="tbKolicina" required value="{{ $telefon[0]->kolicina }}">

				@foreach($telefon[1] as $t)
			    <label for="tbKamera"><b>Kamera</b></label>
			    <input type="text" placeholder="Unesite rezoluciju kamere u MP" name="tbKamera" required value="{{ $t[0] }}">

			    <label for="tbProcesor"><b>Procesor</b></label>
			    <input type="text" placeholder="Unesite karakteristike procesora" name="tbProcesor" required value="{{ $t[1] }}">

			    <label for="tbMemorija"><b>Memorija</b></label>
			    <input type="text" placeholder="Unesite memoriju telefona u GB" name="tbMemorija" required value="{{ $t[2] }}">

			    <label for="tbWifi"><b>Wi/fi - Bluetooth</b></label>
			    <input type="text" placeholder="Unesite karakteristike za wi-fi i bluetooth" name="tbWifi" required value="{{ $t[3] }}">

			    <label for="tbBoja"><b>Boja</b></label>
			    <input type="text" placeholder="Unesite boju" name="tbBoja" required value="{{ $t[4] }}">
			    @endforeach

			    <button type="submit" name="btnUnesi" class="btn btn-success">Unesi</button>
			    <button type="reset" name="btnPonisti" class="btn btn-danger">Ponisti</button>
			 </div>
		</form>
	</div>
</div>

@endsection