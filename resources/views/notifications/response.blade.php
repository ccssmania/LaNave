@extends('layouts.main')
@section('title','Crear o  rechazar orden')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
@section('content')
<div class="content">
	<h2> Especificaciones de contacto</h2>
	<div class="row big-margin-top">
		
		<div class="col-md-4 offset-md-3 text-rigth">
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

		<div class="col-md-4 offset-md-3 text-left">
			<label class="control-label col-md-4">Mensaje : </label>
			<div class="col-md-6">
				<p><strong>{{$data->message}}</strong></p>
			</div>
		</div>
	</div>

	<div class="content">
		<form class="form-horizontal big-margin-top" method="POST" action="{{url('/notifications/response/'.$notification->id)}}">
			{{ csrf_field() }}
			<div style="display: none;"><input type="text" name="name" value="{{$data->name}}"> </div>
			<div style="display: none;"><input type="text" name="email" value="{{$data->email}}"> </div>
			<div class="panel" >
				<div class="panel-heading text-black" style="background-color: #64b5f6;">Responder con un mensaje</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<label class="control-label col-md-3">Asunto</label>
							<div class="col-md-9">
								<input type="text" class="form-control" name="subject" required>
							</div>
						</div>
					</div>
					<div class="row border-top big-margin-top">
						<label class="control-label col-md-3">Mensaje</label>
						<div class="form-group col-md-9">
							
							<textarea rows="100" name="message" class="textarea little-margin-top"></textarea>
						</div>
					</div>
					<div class="form-group big-margin-bot">

						<div class="col-md-4 text-right ">
							<input type="submit" value="Enviar" class="btn btn-success">
						</div>
						<div class="col-md-4 ">
							<a href="{{url('/notifications')}}" class="btn btn-info">Atrás</a>
						</div>
						<div class="col-md-4 ">
							<a href="{{url('/notifications/delete/'.$notification->id)}}" class="btn btn-danger">Eliminar</a>
						</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>


@endsection