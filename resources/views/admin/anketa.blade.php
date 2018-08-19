
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

        <h3>Unos ankete</h3>
		<form action="{{ route('unosAnketa') }}" method="POST">
			{{ csrf_field() }}

			<div class="container">

			    <label for="tbPitanje"><b>Pitanje</b></label>
			    <input type="text" placeholder="Unesite pitanje za anketu" name="tbPitanje" required>

			    <label for="tbBroj"><b>Broj odgovora</b></label>
			    <input type="text" placeholder="Unesite broj ponudjenih odgovora za anketu" name="tbBroj" required id="tbBroj" onkeyup="anketa();">

			    <label for="tbOdgovori"><b>Odgovori</b></label>
			    <div id="odgovori">
			    </div>

			    <button type="submit" name="btnUnesi" class="btn btn-success">Unesi</button>
			    <button type="reset" name="btnPonisti" class="btn btn-danger">Ponisti</button>
			 </div>
		</form>

		<div class="container">
				{{ csrf_field() }}
				<table class="table table-striped">
				    <thead>
				      <tr>
				        <th>Pitanje</th>
				        <th>Aktivna</th>
				        <th>Izmeni</th>
				        <th>Obrisi</th>
				      </tr>
				    </thead>
				    <tbody>
				      	@foreach($ankete as $a)
					      	<tr>
						        <td>{{ $a->pitanje }}</td>
						        @if(($a->aktivna) == 1)
						        	<td>{{ "Aktivna" }}</td>
						        @else
						        	<td>{{ "Neaktivna" }}</td>
						        @endif
						        <td><a class="btn btn-warning" href="{{ asset('admin/anketa/izmena/'.$a->id_anketa) }}" >Izmeni</a></td>
						        <td><a class="btn btn-danger" href="{{ asset('admin/anketa/brisanje/'.$a->id_anketa) }}" >Obrisi</a></td>
						    </tr>
				        @endforeach
				    </tbody>
				</table>
		</div>

	</div>
</div>

@endsection