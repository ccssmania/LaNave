<div class="">
	<div class="row">
		<div class="col-md-10 big-margin-bot little-margin-left">
			<div class="panel" >
				<div class="panel-heading text-black" style="background-color: #64b5f6;">Usuario </div>
				<form class="form-horizontal big-margin-top" method="{{$method}}" action="{{$url}}" enctype="multipart/form-data">
					{{ csrf_field() }}
					
					<div class="form-group ">
						<label class="col-md-4 control-label">Nombre </label>
						<div class="col-md-6">
							<input type="text" name="name"  placeholder="{{$user->name ? $user->name : 'Nombre'}}" class="form-control" {{$user->name ? '' : 'required'}}>
						</div>
					</div>
					<div class="form-group ">
						<label class="col-md-4 control-label">Email </label>
						<div class="col-md-6">
							<input type="text" name="email"  placeholder="{{$user->email ? $user->email : 'Nombre'}}" class="form-control" {{$user->email ? '' : 'required'}}>
						</div>
					</div>
					
					<div class="form-group{{ $errors->has('file') ? ' has-error' : '' }}">
						<label class="col-md-4 control-label">Imagen/Foto</label>
						<div class="col-md-6">
							<table class="table">
								<tr>
									<th height="70" width="200">
										<img class="img-circle img-responsive img-center"  src="{{url('/images/medium/u_'.$user->id.'.jpg')}}" onerror="this.src='{{url("/images/medium/perfil.png")}}'">
									</th>
									<th>
										<h3>cambiar</h3>
										<input type="file" class="form-control" name="file">
										@if ($errors->has('file'))
										<span class="help-block">
											<strong>{{ $errors->first('file') }}</strong>
										</span>
										@endif
									</th>
								</tr>

							</table>
						</div>
					</div>
					<div class="form-group big-margin-bot">

						<div class="col-md-6 text-right ">
							<input type="submit" value="Enviar" class="btn btn-success">
						</div>
						<div class="col-md-6 ">
							<a href="{{url('/perfil')}}" class="btn btn-info">Atrás</a>
						</div>
					</div>
					
				</form>
			</div>
		</div>
	</div>
</div>

