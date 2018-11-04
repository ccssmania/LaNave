@extends("layouts.main")
@section("content")
	<div class="big-padding text-center blue-grey shite-text">
		<h1>Notificaciones</h1>
	</div>
	<div class="container">
		<table class="table table-bordered">
			<thead class="bg-dark">
				<tr>
					<td>Titulo</td>
					<td>Descripcion</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach ($notifications as $n)
				<tr class="{{isset($n->read_at) ?  'bg-success' : 'bg-danger' }}">
					<td>{{ $n->data['name'] }}</td>
					<td>{!! $n->data['type'] == 'order_request' ? 
						$n->data['in_order']['name'] . ' quiere un '. \App\Product::find($n->data['in_order']['product_id'])->name . 
						'<br>' . 'email : ' . $n->data['in_order']['email'] . '<br>' .'número : '. $n->data['in_order']['number']
						 : 
						'Nombre: '.$n->data['data']['name']. '<br>'. 'email : '. $n->data['data']['email']. '<br>'. 'Numero: ' .
						 $n->data['data']['number']
						  !!}</td>
					<td >
						<a href="{{$n->data['type'] == 'order_request' ? url("/n/$n->id") : ''}}">Ver</a>
						@if(!isset($n->read_at))
						<br>
						<a href="{{url('/notifications/'.$n->id.'/mark')}}" onclick="{{$n->markAsRead()}}">Marcar como leido</a>
						@endif
					</td>
					@endforeach
				</tr>
			</tbody>
		</table>
	</div>
	
@endsection

