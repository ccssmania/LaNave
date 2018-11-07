@extends('layouts.main')
@section('title', 'Agenda')
@section('content')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />

<div id="calendar"></div>


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
					
					<div class="form-group ">
						<label class="col-md-4 control-label">Titulo </label>
						<div class="col-md-6">
							<input required type="text" name="title"  placeholder="Titulo" class="form-control" >
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-4 control-label">Description </label>

						<div class="col-md-6">
							<textarea required class="form-control" name="description"></textarea>

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