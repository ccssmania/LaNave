@extends('layouts.app')
@section('title','Productos')
@section('description','Listado de Productos')
@section('font','list')
@section('content')
<div class="container">
	<div class="card">
		<div class="card-body table-responsive">
			<table class="table table-hover table-bordered dataTable no-footer" id="table">
				<thead class="elegant-color" style="background-color: #32383e; color: white;">
					<tr>
						<th>Imagen</th>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($products as $product)
						<tr>
							<td width="100"><img src="{{url('/images/small/product_'.$product->id.'.jpg')}}" onerror="this.src='{{url("/images/small/product.jpg")}}'"></td>
							<td> {{$product->name}} </td>
							<td> {!!$product->description!!} </td>
							<td width="180">
								<a href=" {{url('/product/edit/'.$product->id)}} " class="btn btn-outline-primary " title="Editar Producto">Editar <i class="fa fa-edit"></i></a>
								<a href="#" rel="{{url('/product/delete/'.$product->id)}}" class="btn btn-outline-danger " onclick="Delete($(this));">Eliminar<i class="fa fa-trash"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="floating">
	<a href="{{url('/products/create')}}" class="btn btn-primary btn-fab" title="Agregar un producto nuevo">
		<i class="material-icons">add</i>
	</a>
</div>
@endsection