
@extends('layout.template')


@section('sadrzaj')

<div class="container">
	@include('components.sidebar')
	<div class="row">
        <h3>Unos grada</h3>
		<form action="{{ asset('/admin/anketa/update/'.$anketa[0]->id_anketa) }}" method="POST">
			{{ csrf_field() }}

			<div class="container">

			    <label for="tbPitanje"><b>Pitanje</b></label>
			    <input type="text" placeholder="Unesite pitanje" name="tbPitanje" value="{{ $anketa[0]->pitanje }}" required/>

			    <label for="ddlAktivna"><b>Aktivna</b></label>
			    <select name="ddlAktivna" required>
				    	<option value="0">Neaktivna</option>
				    	<option value="1">Aktivna</option>
				</select>

			    <button type="submit" name="btnUnesi" class="btn btn-success">Izmena</button>
			    <button type="reset" name="btnPonisti" class="btn btn-danger">Ponisti</button>
			 </div>
		</form>
	</div>
</div>

@endsection