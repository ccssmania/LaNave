<div class="">
	<div class="row">
		<div class="col-md-10 mx-auto">
			<div class="panel" >
				@if(isset($task->title))
				@include('tasks.delete')
				@endif
				<form class="form-horizontal big-margin-top" method="{{$method}}" action="{{$url}}">
					{{ csrf_field() }}
					
					<div class="form-group row">
						<label class="col-md-2 control-label">Titulo </label>
						<div class="col-md-6">
							<input type="text" name="title"  placeholder="{{$task->title ? $task->title : 'Titulo'}}" class="form-control" {{$task->title ? '' : 'required'}}>
						</div>
					</div>
					<div class="form-group row">
						<label  class="col-md-2 control-label">Descripción </label>

						<div class="col-md-6">
							<textarea class="form-control" placeholder="Descripcion de la tarea"  name="description">{{$task->description ? $task->description : ''}} {{old('description') ? old('description') : ''}}</textarea>

						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 control-label">Producto (Opcional)</label>
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
						<label class="col-md-2 control-label">Categoría</label>
						<div class="col-md-6">
							<select class="form-control" id="task_category" name="product_category_id">
								<option value="">Seleccionar una opción</option>
								@foreach($categories as $category)
									<option value="{{$category->id}}" title="{{$category->description}}">{{$category->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 control-label">Fecha Inicio</label>
						<div class="col-md-6">
							<input class="form-control dateStart" id="date" type="text" name="date" placeholder="{{$task->date ? $task->date : 'Fecha de inicio'}}" value="{{$task->date ? $task->date : ''}}" {{$task->date ? '' : 'required'}}>
						</div>
					</div>
					<div class="form-group row">
						<label class="col-md-2 control-label">Fecha finalización</label>
						<div class="col-md-6">
							<input disabled class="form-control dateEnd" id="date1" type="text" name="end" placeholder="{{$task->end ? $task->end : ''}}" value="{{$task->end ? $task->end : ''}}" {{$task->end ? '' : 'required'}}>
						</div>
					</div>

					<div class="form-group row ">

						<div class="col-md-6  ">
							<button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>
								Save
							</button>
						</div>
						<div class="col-md-6">
							<a href="{{url('/tasks')}}" class="btn btn-info">Atrás</a>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>

