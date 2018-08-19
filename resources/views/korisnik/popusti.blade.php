@extends('layout.template')


@section('sadrzaj')

<div id="fh5co-product">
		<div class="container">
			
			{{-- ispis poruka --}}
			@if(session('success'))
	        	<div class="alert alert-success">{{ session('success') }}</div>
	        @endif
	        
			

			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<table class="table table-striped">
					    <thead>
					      <tr>
					        <th>Naslov</th>
					        <th>Tekst</th>
					        <th>Cena</th>
					      </tr>
					    </thead>
					    <tbody>
					    	@foreach($popusti as $p)
					    		<tr>
					    			<td>{{ $p->naslov }}</td>
					    			<td>{{ $p->tekst }}</td>
					    			<td>{{ $p->cena }} &euro;</td>
					    		</tr>
					    	@endforeach
					    </tbody>
					 </table>
				</div>
			</div>
		</div>
	</div>
	@endsection