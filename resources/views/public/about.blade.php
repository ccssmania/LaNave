@extends('layouts.main')
@section('content')
<div class="container" >

	<!-- Page Heading/Breadcrumbs -->
	<h1 class="mt-4 mb-3">Sobre Nosotros
	</h1>

	<ol class="breadcrumb">
		<li class="breadcrumb-item">
			<a href="{{url('/')}}">Home</a>
		</li>
		<li class="breadcrumb-item active">Sobre Nosotros</li>
	</ol>

	<!-- Intro Content -->
	<div class="row">
		<div class="col-lg-6">
			<img class="img-fluid rounded mb-4" src="{{url('/images/h_.jpg')}}" alt="">
		</div>
		<div class="col-lg-6">
			<h2>Sobre Nosotros</h2>
			<p>{!!$contact->about!!}.</p>
		</div>
	</div>
	<!-- /.row -->

	<!-- Team Members -->
	<h2>Nuestro Equipo</h2>

	<div class="row">
		@foreach($employees as $emp)
		<div class="col-lg-4 mb-4">
			<div class="card h-100 text-center">
				<img class="card-img-top" src="{{url('/images/e_'.$emp->id.'.webp')}}" alt="">
				<div class="card-body">
					<h4 class="card-title">{{$emp->name}}</h4>
					<h6 class="card-subtitle mb-2 text-muted">{{$emp->position}}</h6>
					<p class="card-text">{{$emp->address}}</p>
				</div>
				<div class="card-footer">
					<a href="#">{{$emp->email}}</a>
				</div>
			</div>
		</div>
		@endforeach
		
	</div>
	<!-- /.row -->

</div>
@endsection