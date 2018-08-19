@extends('layout.template')

@section('sadrzaj')

<div class="container">
	<div class="row">

		<form>
			{{ csrf_field() }}

			<div class="container">
				@foreach($anketa as $a)
			    <label><b>{{ $a->pitanje }}</b></label>
			    <input type="hidden" name="idAnketa" value="{{ $a->id_anketa }}" />
			    @endforeach

			    @foreach($odgovori as $odgovor)
			    	<div class="radio">
				      <label><input type="radio" name="rbOdgovor" value="{{ $odgovor->id_odgovor }}">{{ $odgovor->odgovor }}</label>
				    </div>
			    @endforeach

			    <button type="button" class="btn btn-success glasaj">Glasaj</button>
			 </div>
		</form>
		
	</div>

	<div class="row rezultati">
	</div>
</div>

@endsection