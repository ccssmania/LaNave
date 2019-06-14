@extends('layouts.app')
@section('title','Enviar Correo')
@section('description','Acá puedes responder al mensaje de contacto')
@section('font','envelope')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
@section('content')
<div class="content">
	<h2> Especificaciones de contacto</h2>
	<div class="row big-margin-top">
		
		<div class="col-md-4 offset-md-3 text-rigth row">
			<label class="control-label col-md-4">Nombre : </label>
			<div class="col-md-6 text-left">
				<p><strong>{{$data->name}}</strong></p>
			</div>
			<label class="control-label col-md-4">Número : </label>
			<div class="col-md-6 text-left">
				<p><strong>{{$data->number}}</strong></p>
			</div>

			<label class="control-label col-md-4">Correo : </label>
			<div class="col-md-6 text-left">
				<p><strong>{{$data->email}}</strong></p>
			</div>
		</div>

		<div class="col-md-4 offset-md-3 text-left row">
			<label class="control-label col-md-4">Mensaje : </label>
			<div class="col-md-6">
				<p><strong>{{$data->message}}</strong></p>
			</div>
		</div>
	</div>

	<div class="content" style="height: 500px !important;">
		<form class="form-horizontal big-margin-top" method="POST" action="{{url('/notifications/response/'.$notification->id)}}">
			{{ csrf_field() }}
			<div style="display: none;"><input type="text" name="name" value="{{$data->name}}"> </div>
			<div style="display: none;"><input type="text" name="email" value="{{$data->email}}"> </div>
			<div class="card text-center" >
				<div class="card-header text-black bg-primary" ><h3>Responder con un mensaje</h3></div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							<div class="row">
								<label class="control-label col-md-1">Asunto</label>
								<div class="col-md-9">
									<input type="text" class="form-control" name="subject" required>
								</div>
							</div>
						</div>
					</div>
					<div class="row little-margin-top">
						<label class="control-label col-md-1">Mensaje</label>
						<div class="form-group col-md-9">
							
							<textarea rows="100" name="message" class="textarea little-margin-top"></textarea>
						</div>
					</div>
					<div class="form-group row">

						<div class="col-md-2 text-right ">
							<input type="submit" value="Enviar" class="btn btn-success">
						</div>
						<div class="col-md-2 ">
							<a href="{{url('/notifications')}}" class="btn btn-info">Atrás</a>
						</div>
						<div class="col-md-2 text-left">
							<a href="{{url('/notifications/delete/'.$notification->id)}}" class="btn btn-danger">Eliminar</a>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>


@endsection