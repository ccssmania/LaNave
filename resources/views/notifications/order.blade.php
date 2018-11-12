@extends('layouts.main')
@section('title','Crear o  rechazar orden')
@section('content')
<div class="content">
	<h2> Especificaciones de la orden</h2>
	<div class="row big-margin-top">
		
		<div class="col-md-4 offset-md-3 text-rigth">
			<label class="control-label col-md-4">Nombre : </label>
			<div class="col-md-6 text-left">
				<p><strong>{{$in_order->name}}</strong></p>
			</div>
			<label class="control-label col-md-4">Número : </label>
			<div class="col-md-6 text-left">
				<p><strong>{{$in_order->number}}</strong></p>
			</div>

			<label class="control-label col-md-4">Correo : </label>
			<div class="col-md-6 text-left">
				<p><strong>{{$in_order->email}}</strong></p>
			</div>
		</div>

		<div class="col-md-4 offset-md-3 text-left">
			<label class="control-label col-md-4">Coche : </label>
			<div class="col-md-6">
				<p><strong>{{$in_order->car_model}}</strong></p>
			</div>
			<label class="control-label col-md-4">Producto : </label>
			<div class="col-md-6">
				<p><strong>{{$product->name}}</strong></p>
			</div>
			<button data-toggle="modal" id="button" type="button" data-target="#myModal" class="btn btn-info" >Agendar</button>
			<a href="{{url('/order/'.$notification->id.'/delete')}}" class="btn btn-default">Rechazar</a>
		</div>
	</div>
</div>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Calendar</h4>
			</div>
			<div id="calendar_order" class="modal-body">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Agregar</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form class="form-horizontal big-margin-top" method="POST" action="{{url('/order')}}">
					{{ csrf_field() }}
					
					<div class="form-group ">
						<label class="col-md-4 control-label">Titulo </label>
						<div class="col-md-6">
							<input required type="text" name="title"  placeholder="Titulo" value="{{$product->name}}" class="form-control" >
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-4 control-label">Description </label>

						<div class="col-md-6">
							<textarea required class="form-control" name="description">Nombre: {{$in_order->name}} &#13;&#10;Número : {{$in_order->number}} &#13;&#10;Correo : {{$in_order->email}} &#13;&#10;Coche : {{$in_order->car_model}}</textarea>

						</div>
					</div>
					<div class="form-group" style="display: none;">
						<div class="col-md-6">
							<input id="date" class="form-control"  type="text" name="date">
						</div>
					</div>
					<div class="form-group" style="display: none;">
						<div class="col-md-6">
							<input  id="end" class="form-control " type="text" name="end">
						</div>
					</div>
					<div class="form-group" style="display: none;">
						<div class="col-md-6">
							<input  id="in_order" class="form-control " value="{{$in_order->id}}" type="text" name="in_order_id">
						</div>
					</div>
					<div class="form-group" style="display: none;">
						<div class="col-md-6">
							<input  id="in_order" class="form-control " value="{{$notification->id}}" type="text" name="notification_id">
						</div>
					</div>
					<div class="form-group big-margin-bot">

						<div class="col-md-6 text-right ">
							<input type="submit" value="Enviar" class="btn btn-info">
						</div>
						<div class="col-md-6 ">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				
			</div>
		</div>
	</div>
</div>
@endsection