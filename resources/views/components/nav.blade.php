<nav class="fh5co-nav" role="navigation">
		<div class="container">
			<div class="row">
				<div class="col-md-3 col-xs-2">
					<div id="fh5co-logo"><a href="{{ route('home') }}">Moblie Shop.</a></div>
				</div>
				<div class="col-md-6 col-xs-6 text-center menu-1">
					<ul>
						@if(!session()->has('korisnik'))
							<li><a href="{{ route('pocetna') }}">Prijavi se</a></li>
							<li><a href="{{ route('registracija') }}">Registracija</a></li>
						@else
						    @if(session()->get('korisnik')->uloga == 'Korisnik')
						    	@foreach($meni as $m)						    		
						    		<li><a href="{{ url($m->link) }}">{{ $m->naziv_meni }}</a></li>						    	
						    	@endforeach
						    @else
						    	<div class="col-md-3 col-xs-3 text-center menu-1">
									<!-- Use any element to open the sidenav -->
									<span onclick="openNav()">Admin meni</span>
								</div>
						    @endif
							<li><a href="{{ route('odjava') }}">Logout</a></li>
						@endif
					</ul>
				</div>
				@if(session()->has('korisnik'))
					@if(session()->get('korisnik')->uloga == 'Korisnik')
						<div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
							<ul>
								<li class="search">
									<div class="input-group">
								      <input type="text" placeholder="Search.." name="tbSearch">
								      <span class="input-group-btn">
								        <button class="btn btn-primary" type="button"><i class="icon-search"></i></button>
								      </span>
								    </div>
								</li>
								<li class="shopping-cart"><a href="{{ asset('/korpa/'.Session::get('korisnik')->id_korisnik) }}" class="cart"><span><small class="broj">0</small><i class="icon-shopping-cart"></i></span></a></li>
							</ul>
						</div>
					@endif
				@endif
			</div>
			
		</div>
	</nav>