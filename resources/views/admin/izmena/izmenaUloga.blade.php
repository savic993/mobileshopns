@extends('layout.template')


@section('sadrzaj')

<div class="container">
	@include('components.sidebar')
	<div class="row">
		<form action="{{ asset('/admin/korisnik/update/'.$korisnik[0]->id_korisnik) }}" method="POST">
			{{ csrf_field() }}

			<div class="container">

				<label><b>Korisnicko ime</b></label><br/>
			    <label><i><b>{{ $korisnik[0]->username }}</b></i></label><br/>

			    <label for="ddlUloga"><b>Uloga</b></label>
			    <select name="ddlUloga">
			    	<option value="0">Izaberi</option>
					@foreach($uloge as $u)
				    	<option value="{{ $u->id_uloga }}">{{ $u->naziv_uloga }}</option>
				    @endforeach
			    </select>

			    <button type="submit" name="btnUnesi" class="btn btn-success">Unesi</button>
			    <button type="reset" name="btnPonisti" class="btn btn-danger">Ponisti</button>
			 </div>
		</form>
	</div>
</div>

@endsection