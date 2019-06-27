@extends('layouts.app')
@section('title','Notificaciones')
@section('description','Listado de Notificaciones')
@section('font','bell')
@section('content')
	<div class="big-padding text-center blue-grey shite-text">
		<h1>Notificaciones</h1>
	</div>
	<div class="container">
		<table class="table table-bordered" id="table">
			<thead  style="background-color: #32383e; color: white;">
				<tr>
					<th>Titulo</th>
					<th>Fecha</th>
					<th>Descripcion</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($notifications as $n)
				<tr class="{{isset($n->read_at) ?  'table-success' : 'table-danger' }}">
					<td>{{ $n->data['name'] }}</td>
					<td> {{$n->created_at->diffForHumans()}} </td>
					<td>
						@foreach($n->data['data'] as $key => $value)
							<strong> @lang($key) </strong> : {{$value}} <br>
						@endforeach
					</td>
					<td >
						@if($n->data['type'] == 'order_request')
							<a href="{{url("/notifications/$n->id/order")}}">Agendar</a>
						@elseif($n->data['type'] == 'contactus')
							<a href="{{url("/notifications/$n->id/contactus")}}">Responder</a>
						@endif
						@if(!isset($n->read_at))
						<br>
						<a href="{{url('/notifications/'.$n->id.'/mark')}}" >Marcar como leido</a>
						@endif
						<br>
						<a href=" {{url('/notifications/'.$n->id)}} " >Ver</a>
						<br>
						<a href="#" rel="{{url('/notifications/delete/'.$n->id)}}"  title="Eliminar notificación" onclick="Delete($(this));" style="color: red;">Eliminar <i class="fa fa-trash"></i></a></td>
					</td>
					@endforeach
				</tr>
			</tbody>
		</table>
	</div>
	
@endsection

