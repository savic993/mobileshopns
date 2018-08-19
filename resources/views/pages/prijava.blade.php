@extends('layout.template')

@section('sadrzaj')

<div class="container">
	<div class="row">

		{{--ispis gresaka pri logovanju--}}
		@if(session('error'))
        	<div class="alert alert-danger">{{ session('error') }}</div>
        @endif

		<form action="{{ route('login') }}" method="POST">
			{{ csrf_field() }}

			<div class="container">
			    <label for="tbUsername"><b>Korisnicko ime</b></label>
			    <input type="text" placeholder="Unesite korisnicko ime" name="tbUsername" required>

			    <label for="tbLozinka"><b>Lozinka</b></label>
			    <input type="password" placeholder="Unesite lozinku" name="tbLozinka" required>

			    <button type="submit" name="btnPrijava">Prijavi se</button>
			 </div>
		</form>
	</div>
</div>

@endsection