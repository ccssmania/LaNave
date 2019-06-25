<div class="tab-pane container">
	<div class="tile user-settings">
		<h4 class="line-head"></h4>
		<form action=" {{$url}} " method="{{$method}}" enctype="multipart/form-data">
			@csrf
			<div class="row mb-4">
                <div class="input-group form-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-user"></i></span>
				</div>
				<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" placeholder="Nombre" autofocus>

				@error('name')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>

			<div class="input-group form-group">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="fas fa-envelope"></i></span>
				</div>
				<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" placeholder="Correo" required autocomplete="email">

				@error('email')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			<div class="input-group form-group">
				<div class="input-group-prepend">
					<span class="input-group-addon"><img class="img-circle img-responsive img-center image"  src="{{url('/images/small/user_'.$user->id.'.webp')}}" onerror="this.src='{{url("/images/small/perfil.png")}}'"></span>
				</div>
				<input type="file" name="image" class="form-control @error('image') is-invalid @enderror" style="height: 90px">
				@error('image')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
			</div>
			<div class="form-group row mb-12">
				<div class="col-md-12">
					<button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>
						Save
					</button>
				</div>
			</div>
		</form>
	</div>
</div>