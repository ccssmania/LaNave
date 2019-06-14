@extends('layouts.app')
@section('title','Notificaciones')
@section('description','Visualizar una notificación')
@section('font', 'bell')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-9 mx-auto">
			<div class="card">
				<div class="card-body">
					<h1 class="card-title"> {{$notification->data['name']}} </h1>
					<div class="row">
						<div class="col-md-6">
							<div class="card">
								<div class="card-body">
									<h3 class="card-title"> {{isset($notification->data['description']) ? 'Descripción' : ''}} </h3>
									<p class="card-text"> {{isset($notification->data['description']) ? $notification->data['description'] : ''}} </p>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card">
								<div class="card-body">
									<h3 class="card-title">Datos</h3>
									<p class="card-text">
										@foreach($notification->data['data'] as $key => $value)
											<strong> @lang($key) </strong> : {{$value}} <br>
										@endforeach
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection