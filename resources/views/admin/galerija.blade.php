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

        <h3>Unos slika</h3>
		<form action="{{ route('unosSlike') }}" method="POST" enctype="multipart/form-data">
			{{ csrf_field() }}

			<div class="container">

			    <label for="fSlika"><b>Slika</b></label>
			    <input type="file" name="fSlika" />

			    <label for="tbOpis"><b>Opis</b></label>
			    <input type="text" placeholder="Unesite opis" name="tbOpis" required>

			    <label for="ddlModel"><b>Model</b></label>
			    <select name="ddlModel" required>
				    <option value="0">Izaberi</option>
				    @foreach($telefoni as $t)
				    	<option value="{{ $t->id_model }}">{{ $t->naziv_model }}</option>
				    @endforeach
				</select>

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
				        <th>Alt</th>
				        <th>Model</th>
				        <th>Datum unosa</th>
				        <th>Obrisi</th>
				      </tr>
				    </thead>
				    <tbody>
				      	@foreach($galerije as $g)
					      	<tr>
						        <td>{{ $g->alt }}</td>
						        <td>{{ $g->naziv_model }}</td>
						        <td>{{ $g->datumUnosa }}</td>
						        <td><a class="btn btn-danger" href="{{ asset('admin/galerija/brisanje/'.$g->id_slika) }}" >Obrisi</a></td>
						    </tr>
				        @endforeach
				    </tbody>
				</table>
		</div>

	</div>
</div>

@endsection