<div class="">
	<div class="row">
		<div class="col-md-10 big-margin-bot little-margin-left">
			<div class="panel" >
				<div class="panel-heading text-black" style="background-color: #64b5f6;">Contacto </div>
				<form class="form-horizontal big-margin-top" method="{{$method}}" action="{{$url}}" enctype="multipart/form-data">
					{{ csrf_field() }}
					
					<div class="form-group ">
						<label class="col-md-4 control-label">Email </label>
						<div class="col-md-6">
							<input type="email" name="email"  placeholder="{{$contact->email ? $contact->email : 'Email'}}" class="form-control" {{$contact->email ? '' : 'required'}}>
						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-4 control-label">Este es el campo "sobre nosotros" </label>

						<div class="col-md-6">
							<textarea class="textarea" name="about">{{$contact->about ? $contact->about : ''}} {{old('about') ? old('about') : ''}}</textarea>

						</div>
					</div>
					<div class="form-group">
						<label  class="col-md-4 control-label">Este es el campo de los detalles de la nave, ejemplo compromiso dedicacion, erramientas de trabajo etc. </label>

						<div class="col-md-6">
							<textarea class="textarea" name="details">{{$contact->details ? $contact->details : ''}} {{old('details') ? old('details') : ''}}</textarea>

						</div>
					</div>
					<div class="form-group">
						<label class="col-md-4 control-label">Direccion</label>
						<div class="col-md-6">
							<input class="form-control" type="text"  name="address" placeholder="{{$contact->address ? $contact->address : ''}}" {{$contact->address ? '' : 'required'}}>
						</div>
					</div>
					
					<div class="form-group big-margin-bot">

						<div class="col-md-6 text-right ">
							<input type="submit" value="Enviar" class="btn btn-success">
						</div>
						<div class="col-md-6 ">
							<a href="{{url('/contacts')}}" class="btn btn-info">Atrás</a>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>

