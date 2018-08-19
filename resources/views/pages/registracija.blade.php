@extends('layout.template')


@section('sadrzaj')
	<div class="container">
		<div class="row">

			{{--ispis poruka pri registraciji--}}
			@if(session('error'))
	        	<div class="alert alert-danger">{{ session('error') }}</div>
	        @elseif(session('success'))
	        	<div class="alert alert-success">{{ session('success') }}</div>
	        @endif
	        <div class="row">
	        	<div id="greske" class="container"></div>
	    	</div><br/>

			<form action="{{ route('reg') }}" method="POST"  onsubmit="return registracija();">
				{{ csrf_field() }}

				<div class="container">
					<label for="tbImePrezime"><b>Ime i prezime</b></label>
				    <input type="text" placeholder="Unesite ime i prezime" name="tbImePrezime" id="tbImePrezime" required >

				    <label for="tbEmail"><b>Email</b></label>
				    <input type="text" placeholder="Unesite email" name="tbEmail" id="tbEmail" required >

				    <label for="tbkKorisnickoIme"><b>Korisnicko ime</b></label>
				    <input type="text" placeholder="Unesite korisnicko ime" name="tbKorisnickoIme" id="tbKorisnickoIme" required >

				    <label for="tbLozinka"><b>Lozinka</b></label>
				    <input type="password" placeholder="Unesite lozinku" name="tbLozinka" id="tbLozinka" required >

				    <label for="ddlGrad"><b>Grad</b></label>
				    <select name="ddlGrad" required id="ddlGrad">
				    	<option value="0">Izaberi</option>
				    	@foreach($gradovi as $grad)
				    		<option value="{{ $grad->id_grad }}">{{ $grad->ime_grad }}</option>
				    	@endforeach
				    </select>

				    <label for="tbAdresa"><b>Adresa</b></label>
				    <input type="text" placeholder="Unesite adresu" name="tbAdresa" id="tbAdresa" required >

				    <button type="submit">Registruj se</button>
				 </div>

			</form>

			<div class="row">
				<div class="container">
					@if ($errors->any())
			            <div class="alert alert-danger">
			                <ul>
			                    @foreach ($errors->all() as $error)
			                        <li>{{ $error }}</li>
			                    @endforeach
			                </ul>
			            </div>
		       		@endif
				</div>
			</div>
			

		</div>
	</div>
@endsection