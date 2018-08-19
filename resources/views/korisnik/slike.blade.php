@extends('layout.template')

@section('sadrzaj')

<div class="container">
   <div class="row">

   		@foreach($galerija as $gal)
	   	<div class="col-md-4">
		    <div class="thumbnail">
		        <a data-fancybox="gallery" href="{{ asset('/'.$gal->putanjaV) }}">
		        <img src="{{ asset('/'.$gal->putanjaV) }}" alt="{{ $gal->alt }}" style="width:100%">
		        <div class="caption">
		            <p>{{ $gal->naziv_model }}</p>
		        </div>
		        </a>
		    </div>
		</div>
		@endforeach
	</div>
</div>
@endsection