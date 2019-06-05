@extends('layouts.app')
@section('title','Categorías')
@section('description','Listado de Categorías')
@section('font','list')
@section('content')
<div class="container">
	<div class="card">
		<div class="card-body table-responsive">
			<table class="table table-hover table-bordered dataTable no-footer" id="table">
				<thead class="elegant-color" style="background-color: #32383e; color: white;">
					<tr>
						<th>Nombre</th>
						<th>Descripción</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($product_categories as $product_category)
						<tr>
							<td> {{$product_category->name}} </td>
							<td> {!!$product_category->description!!} </td>
							<td width="180">
								<a href=" {{url('/product_category/edit/'.$product_category->id)}} " class="btn btn-outline-primary " title="Editar Categoria">Editar <i class="fa fa-edit"></i></a>
								<a href="#" rel="{{url('/product_category/delete/'.$product_category->id)}}" class="btn btn-outline-danger " onclick="Delete($(this));">Eliminar<i class="fa fa-trash"></i></a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
<div class="floating">
	<a href="{{url('/product_category/create')}}" class="btn btn-primary btn-fab" title="Agregar una categoría nueva">
		<i class="material-icons">add</i>
	</a>
</div>
@endsection