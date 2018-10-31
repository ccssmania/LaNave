<div class="">
	<div class="row">
		<div class="col-md-10 big-margin-bot little-margin-left">
			<div class="panel" >
				<div class="panel-heading text-black" style="background-color: #64b5f6;">Tarea</div>
				<form class="form-horizontal big-margin-top" method="{{$method}}" action="{{$url}}" enctype="multipart/form-data">
					{{ csrf_field() }}
					
					<div class="form-group ">
						<label class="col-md-4 control-label">Titulo </label>
						<div class="col-md-6">
							<input type="text" name="title"  placeholder="{{$task->title ? $task->title : 'Titulo'}}" class="form-control" {{$task->title ? '' : 'required'}}>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-4 control-label">Description </label>

						<div class="col-md-6">
							<textarea class="textarea" name="description">{{$task->description ? $task->description : ''}} {{old('description') ? old('description') : ''}}</textarea>

						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Fecha Inicio</label>
						<div class="col-md-6">
							<input class="form-control dateStart" id="date" type="text" name="date" placeholder="{{$task->date ? $task->date : ''}}" {{$task->date ? '' : 'required'}}>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Fecha finalización</label>
						<div class="col-md-6">
							<input disabled class="form-control dateEnd" id="date1" type="text" name="end" placeholder="{{$task->end ? $task->end : ''}}" {{$task->end ? '' : 'required'}}>
						</div>
					</div>
					<div class="form-group big-margin-bot">

						<div class="col-md-6 text-right ">
							<input type="submit" value="Enviar" class="btn btn-success">
						</div>
						<div class="col-md-6 ">
							<a href="{{url('/tasks')}}" class="btn btn-info">Atrás</a>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>

