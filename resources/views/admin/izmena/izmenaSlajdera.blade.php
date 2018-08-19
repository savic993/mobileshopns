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
		<form action="{{ asset('/admin/slajder/update/'.$slajd[0]->id_slajda) }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="container">

			    <label for="tbCena"><b>Cena</b></label>
			    <input type="text" placeholder="Unesite cenu proizvoda na popustu" name="tbCena" value="{{ $slajd[0]->cena }}" required>

			    <label for="tbNaslovSlajd"><b>Naslov slajda</b></label>
			    <input type="text" placeholder="Unesite naslov za slajd" name="tbNaslovSlajd" value="{{ $slajd[0]->naslov }}" required>

			    <label for="tbTekst"><b>Tekst</b></label>
			    <input type="text" placeholder="Unesite kratak opis za slajd" name="tbTekst" value="{{ $slajd[0]->tekst }}" required>

			    <button type="submit" name="btnUnesi" class="btn btn-success">Unesi</button>
			    <button type="reset" name="btnPonisti" class="btn btn-danger">Ponisti</button>
			 </div>
		</form>

	</div>
</div>

@endsection