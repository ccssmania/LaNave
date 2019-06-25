<div class="container little-margin-top">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card big-margin-bot" >
				<div class="card-header" style="background-color: #32383e; color: white;">{{$product->name}}</div>

				<div class="card-body">
					<div class="row">

						<div class="col-md-6">
							<img class="card-img-top " src="{{url('/images/large/p_'.$product->id.'.webp')}}" onerror="this.src='{{url("products/images/carwash.png")}}'" alt="Card image cap">
						</div>

						<div  class="col-md-6 ">
							
							<div class="">
								<h3 class="break-word"><strong>Description</strong></h3>
								<p class="break-word">{!!$product->description!!}</p>
								
							</div>

						</div>
						
						<form class="form-horizontal little-margin-top" action="{{url('/order/'.$product->id)}}" method="GET">
							@csrf
							<h2>Pedir Cita</h2>
							<div class="form-group row">
								<label for="name" class="col-md-6 col-form-label text-md-right">Nombre</label>

								<div class="col-md-6">
									<input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

									@if ($errors->has('name'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('name') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="number" class="col-md-6 col-form-label text-md-right">Número</label>

								<div class="col-md-6">
									<input id="number" type="text" class="form-control{{ $errors->has('number') ? ' is-invalid' : '' }}" name="number" value="{{ old('number') }}" required autofocus>

									@if ($errors->has('number'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('number') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="email" class="col-md-6 col-form-label text-md-right">Correo Electrónico</label>

								<div class="col-md-6">
									<input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

									@if ($errors->has('email'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('email') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="form-group row">
								<label for="car_model" class="col-md-6 col-form-label text-md-right">Especificaciones del coche</label>

								<div class="col-md-6">
									<input id="car_model" type="car_model" class="form-control{{ $errors->has('car_model') ? ' is-invalid' : '' }}" name="car_model" value="{{ old('car_model') }}" required>

									@if ($errors->has('car_model'))
									<span class="invalid-feedback" role="alert">
										<strong>{{ $errors->first('car_model') }}</strong>
									</span>
									@endif
								</div>
							</div>
							<div class="form-group row mb-0">
								<div class="col-md-6 offset-md-4">
									<button type="submit" class="btn btn-primary">
										Enviar
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>