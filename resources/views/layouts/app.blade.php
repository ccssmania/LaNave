<!DOCTYPE html>
<html lang="en">

<head>

	@include('partials.head_home')

</head>

<body>

	<!-- Navigation -->
	<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark fixed-top">
		<div class="container">
			<a class="navbar-brand" href="{{url('/')}}">{{ config('app.name', 'Laravel') }}</a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-link" href="{{url('/about')}}">Sobre Nosotros</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{url('/services')}}">Servicios</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="{{url('/contact')}}">Contacto</a>
					</li>
						<!--<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Portfolio
							</a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
								<a class="dropdown-item" href="portfolio-1-col.html">1 Column Portfolio</a>
								<a class="dropdown-item" href="portfolio-2-col.html">2 Column Portfolio</a>
								<a class="dropdown-item" href="portfolio-3-col.html">3 Column Portfolio</a>
								<a class="dropdown-item" href="portfolio-4-col.html">4 Column Portfolio</a>
								<a class="dropdown-item" href="portfolio-item.html">Single Portfolio Item</a>
							</div>
						</li>-->
					<li class="nav-item">
						@if (Auth::guest())
						<li><a class="nav-link" href="{{ route('login') }}">Ingresar</a></li>
						@endif
					</li>
				</ul>
			</div>
		</div>
	</nav>
	@if(Session::has('message'))
	<p class="alert alert-success">{!! Session::get('message') !!}</p>
	@endif

	@if(Session::has('errorMessage'))
	<p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('errorMessage') }}</p>
	@endif
	@yield('content')
	<footer  class="main-footer py-5 bg-dark ">
		<div class="container">
			<p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
		</div>
			<!-- /.container -->
	</footer>
	@include('partials.jsfiles_home')
</body>

</html>