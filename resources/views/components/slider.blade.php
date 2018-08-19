<aside id="fh5co-hero" class="js-fullheight">
		<div class="flexslider js-fullheight">
			<ul class="slides">

					@foreach($slajder as $slajd)
					   	<li style="background-image: url({{ asset('/'.$slajd->putanja) }});">
					   		<div class="overlay-gradient"></div>
					   		<div class="container">
					   			<div class="col-md-6 col-md-offset-3 col-md-pull-3 js-fullheight slider-text">
					   				<div class="slider-text-inner">
					   					<div class="desc">
					   						<span class="price">{{ $slajd->cena }}  &euro;</span>
					   						<h2>{{ $slajd->naslov }}</h2>
					   						<p>{{ $slajd->tekst }}</p>
					   						@if(session()->has('korisnik'))
						   						<p><a href="{{ url('/popusti/'.$slajd->id_slajda) }}" class="btn btn-primary btn-outline btn-lg">Saznaj vise</a></p>
						   					@endif
					   					</div>
					   				</div>
					   			</div>
					   		</div>
					   	</li>
			   		@endforeach

		  	</ul>
	  	</div>
	</aside>