@extends("layouts.app")
@section('title', 'Agenda')
@section('description', 'Agenda Calendario')
@section('font','calendar')
@section('color','white')
@section("content")

<div id="calendar"></div>
<div class="floating">
	<a href="{{url('/tasks/create')}}" class="btn btn-primary btn-fab" title="Agregar una tarea">
		<i class="material-icons">add</i>
	</a>
</div>

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
				<form class="form-horizontal big-margin-top" method="POST" action="{{url('/tasks')}}">
					{{ csrf_field() }}
					
					<div class="form-group row">
						<label class="col-md-4 control-label">Titulo </label>
						<div class="col-md-6">
							<input required type="text" name="title"  placeholder="Titulo" class="form-control" >
						</div>
					</div>
					<div class="form-group row">
						<label  class="col-md-4 control-label">Description </label>

						<div class="col-md-6">
							<textarea required class="form-control" name="description"></textarea>

						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-4 control-label">Producto (Opcional)</label>
						<div class="col-md-6">
							<select class="form-control" id="task_product" name="product_id">
								<option value="">Ninguno</option>
								@foreach($products as $product)
									<option value="{{$product->id}}" title="{{$product->description}}">{{$product->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row category" style="display: none;">
						<label class="col-md-4 control-label">Categoría</label>
						<div class="col-md-6">
							<select class="form-control" id="task_category" name="product_category_id">
								<option value="">Seleccionar una opción</option>
								@foreach($categories as $category)
									<option value="{{$category->id}}" title="{{$category->description}}">{{$category->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row" style="display: none;">
						<div class="col-md-6">
							<input id="date" class="form-control"  type="text" name="date">
						</div>
					</div>
					<div class="form-group row" style="display: none;">
						<div class="col-md-6">
							<input  id="end" class="form-control " type="text" name="end">
						</div>
					</div>
					<div class="form-group row">

						<div class="col-sm-6 ">
							<input type="submit" value="Enviar" class="btn btn-info">
						</div>
						<div class="col-sm-6 ">
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