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
					<td>Titulo</td>
					<td>Descripcion</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach ($notifications as $n)
				<tr class="{{isset($n->read_at) ?  'table-success' : 'table-danger' }}">
					<td>{{ $n->data['name'] }}</td>
					<td>
						@foreach($n->data['data'] as $key => $value)
							<strong> @lang($key) </strong> : {{$value}} <br>
						@endforeach
					</td>
					<td >
						<a href="{{$n->data['type'] == 'order_request' ? url("/notifications/$n->id/order") : url("/notifications/$n->id/contactus")}}">{{$n->data['type'] == 'order_request' ? 'Agendar' : 'Responder'}}</a>
						@if(!isset($n->read_at))
						<br>
						<a href="{{url('/notifications/'.$n->id.'/mark')}}" >Marcar como leido</a>
						@endif
						<br>
						<a href=" {{url('/notifications/'.$n->id)}} ">Ver</a>
					</td>
					@endforeach
				</tr>
			</tbody>
		</table>
	</div>
	
@endsection

