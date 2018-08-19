@extends('layout.template')


@section('sadrzaj')

<div class="container">
	@include('components.sidebar')
	<div class="row">
        <h3>Unos grada</h3>
		<form action="{{ asset('/admin/grad/update/'.$grad[0]->id_grad) }}" method="POST">
			{{ csrf_field() }}

			<div class="container">

			    <label for="tbGrad"><b>Grad</b></label>
			    <input type="text" placeholder="Unesite naziv grada" name="tbGrad" value="{{ $grad[0]->ime_grad }}" required/>

			    <label for="tbPosBr"><b>Postanski broj</b></label>
			    <input type="text" placeholder="Unesite postanski broj" name="tbPosBr" value="{{ $grad[0]->pos_br }}" required>

			    <button type="submit" name="btnUnesi" class="btn btn-success">Izmena</button>
			    <button type="reset" name="btnPonisti" class="btn btn-danger">Ponisti</button>
			 </div>
		</form>
	</div>
</div>

@endsection