@extends("layouts.main")
@section("content")
		<div class="col-md-9 offset-md-3">
			<div class="panel" >
				<div class="panel-heading " style="background-color: #32383e; color: white;">Filtro </div>
				<form class="form-horizontal big-margin-top" method="GET" action="{{url('/orders')}}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-9 big-margin-bot">
							<label class="col-md-4">Tipo de orden</label>
							<div class="col-md-8">
								<select class="form-control" name="status">
									<option value="{{env('ORDER_STATUS_CREATED')}}" {{$request->status == env('ORDER_STATUS_CREATED') ? 'selected' : ''}} >Ordenes En Estado Normal</option>
									<option value="{{env('ORDER_STATUS_CANCELED_FROM_USER')}}" {{$request->status == env('ORDER_STATUS_CANCELED_FROM_USER') ? 'selected' : ''}}>Ordenes canceladas por nosotros</option>
									<option value="{{env('ORDER_STATUS_CANCELED_FROM_CLIENT')}}" {{$request->status == env('ORDER_STATUS_CANCELED_FROM_CLIENT') ? 'selected' : ''}}>Ordenes canceladas por el cliente</option>
									<option value="{{env('ORDER_STATUS_PASSED')}}" {{$request->status == env('ORDER_STATUS_PASSED') ? 'selected' : ''}}>Ordenes que ya psaron las fechas</option>
								</select>
							</div>
						</div>
						<div class="col-md-9 big-margin-bot">
							<label class="col-md-4">Fechas</label>
							<div class="col-md-3">
								<input type="text" class="dateFilter form-control" name="start" placeholder="{{$request->start ? $request->start : 'inicio'}}" >
							</div>
							<div class="col-md-3">
								<input type="text" class="dateEnd form-control" name="end" placeholder="{{$request->end ? $request->end : 'final'}}">
							</div>
							<div class="col-md-2">
								<input type="submit" name="" class="btn btn-info" value="Filtrar">
							</div>
						</div>
					</div>
				</form>
			
			</div>
		</div>
	<div class="big-padding text-center blue-grey shite-text col-md-12">
		<h1>Ordenes</h1>
	</div>
	<div class="container">
		<table class="table table-bordered">
			<thead class="elegant-color" style="background-color: #32383e; color: white;">
				<tr>
					<td>ID</td>
					<td>Fecha</td>
					<td>Product</td>
					<td>Descripcion</td>
					<td>Acciones</td>
				</tr>
			</thead>
			<tbody>
				@foreach ($orders as $order)
				<tr>
					<td>{{ $order->id }}</td>
					<td> Inicio :{{ $order->task ? $order->task->date : '' }} <br> Fin: {{ $order->task? $order->task->end : ''}} </td>
					<td>{{ $order->in_order->product->name }}</td>
					<td>Nombre : {{ $order->in_order->name }} <br> Correo: {{$order->in_order->email}} <br> Número: {{$order->in_order->number}} <br> Coche: {{$order->in_order->car_model}} </td>
					<td >
						<a href="{{url("/order/$order->id")}}">Ver</a>
						 <a href="{{url('/order/'. $order->id .'/edit')}}">Editar</a>
					</td>
					@endforeach
				</tr>
			</tbody>
		</table>
	</div>
	<div class="text-center">
		{{$orders->links()}}
	</div>
	
@endsection