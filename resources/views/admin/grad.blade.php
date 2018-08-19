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

        <h3>Unos grada</h3>
		<form action="{{ route('unosGrad') }}" method="POST">
			{{ csrf_field() }}

			<div class="container">

			    <label for="tbGrad"><b>Grad</b></label>
			    <input type="text" placeholder="Unesite naziv grada" name="tbGrad" required>

			    <label for="tbPosBr"><b>Postanski broj</b></label>
			    <input type="text" placeholder="Unesite postanski broj" name="tbPosBr" required>

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
				        <th>Grad</th>
				        <th>Postanski broj</th>
				        <th>Datum unosa</th>
				        <th>Datum izmene</th>
				        <th>Izmeni</th>
				        <th>Obrisi</th>
				      </tr>
				    </thead>
				    <tbody>
				      	@foreach($gradovi as $g)
					      	<tr>
						        <td>{{ $g->ime_grad }}</td>
						        <td>{{ $g->pos_br }}</td>
						        <td>{{ $g->datumUnosa }}</td>
						        <td>{{ $g->datumIzmene }}</td>
						        <td><a class="btn btn-warning" href="{{ asset('admin/grad/izmena/'.$g->id_grad) }}" >Izmeni</a></td>
						        <td><a class="btn btn-danger" href="{{ asset('admin/grad/brisanje/'.$g->id_grad) }}" >Obrisi</a></td>
						    </tr>
				        @endforeach
				    </tbody>
				</table>
		</div>

	</div>
</div>

@endsection