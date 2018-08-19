<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Moblie Shop</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by gettemplates.co" />
	<meta name="keywords" content="free website templates, free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="gettemplates.co" />

	<!-- 
	//////////////////////////////////////////////////////

	FREE HTML5 TEMPLATE 
	DESIGNED & DEVELOPED by FreeHTML5.co
		
	Website: 		http://freehtml5.co/
	Email: 			info@freehtml5.co
	Twitter: 		http://twitter.com/fh5co
	Facebook: 		https://www.facebook.com/fh5co

	//////////////////////////////////////////////////////
	 -->

  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet"> -->
	<!-- <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i" rel="stylesheet"> -->
	@section('css')
	<!-- Animate.css -->
	<link rel="stylesheet" href="{{ asset('/css/animate.css') }}">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="{{ asset('/css/icomoon.css') }}">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="{{ asset('/css/bootstrap.css') }}">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="{{ asset('/css/flexslider.css') }}">

	<!-- Owl Carousel  -->
	<link rel="stylesheet" href="{{ asset('/css/owl.carousel.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/owl.theme.default.min.css') }}">
	<link rel="stylesheet" href="{{ asset('/css/login.css') }}">

	<!-- Theme style  -->
	<link rel="stylesheet" href="{{ asset('/css/style.css') }}">

	<!-- Autor style -->
	<link rel="stylesheet" href="{{ asset('/css/autor.css') }}">

	<!-- Sidebar style -->
	<link rel="stylesheet" href="{{ asset('/css/sidebar.css') }}">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.1/jquery.fancybox.min.css" />

	@show
	

	@section('js')
	<!-- Modernizr JS -->
	<script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	<script src="//code.jquery.com/jquery-3.3.1.min.js"></script>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.1/jquery.fancybox.min.js"></script>

	<!-- jQuery -->
	<script src="{{ asset('/js/jquery.min.js') }}"></script>
	<!-- jQuery Easing -->
	<script src="{{ asset('/js/jquery.easing.1.3.js') }}"></script>
	<!-- Bootstrap -->
	<script src="{{ asset('/js/bootstrap.min.js') }}"></script>
	<!-- Waypoints -->
	<script src="{{ asset('/js/jquery.waypoints.min.js') }}"></script>
	<!-- Carousel -->
	<script src="{{ asset('/js/owl.carousel.min.js') }}"></script>
	<!-- countTo -->
	<script src="{{ asset('/js/jquery.countTo.js') }}"></script>
	<!-- Flexslider -->
	<script src="{{ asset('/js/jquery.flexslider-min.js') }}"></script>
	<!-- Main -->
	<script src="{{ asset('/js/main.js') }}"></script>

	<!--Sidebar -->
	<script src="{{ asset('/js/sidebar.js') }}"></script>

	<!-- js fajl -->
	<script type="text/javascript" src="{{ asset('/js/script.js') }}"></script>

	<script type="text/javascript">
		const rootSajta = '{{ route("pocetna") }}';
		const token = '{{ csrf_token() }}'; 
	</script>

	<!-- AJAX -->
	<script src="{{ asset('/js/ajax.js') }}"></script>

	@show
</head>
<body>

<div id="page">
	
	@include('components.nav')
	
	@if((!session()->has('korisnik')) || (session()->get('korisnik')->uloga == 'Korisnik'))
		@include('components.slider')
	@endif
	
	@yield('sadrzaj')

	@include('components.footer')
</div>
<div class="gototop js-top">
	<a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>

</body>
</html>