<div class="tab-pane container">
	<div class="tile user-settings">
		<h4 class="line-head"></h4>
		<form action="{{$url}}" method="{{$method}}" enctype="multipart/form-data">
			@csrf
			<div class="row mb-4">
                <div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-user"></i></span>
					</div>
					<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $employe->name }}" required autocomplete="name" placeholder="Nombre" autofocus>

					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fab fa-facebook-f"></i></span>
					</div>
					<input id="facebook_link" type="text" class="form-control @error('facebook_link') is-invalid @enderror" name="facebook_link" value="{{ $employe->facebook_link }}"  placeholder="Link de facebook" >

					@error('facebook_link')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fab fa-instagram"></i></span>
					</div>
					<input id="instagram_link" type="text" class="form-control @error('instagram_link') is-invalid @enderror" name="instagram_link" value="{{ $employe->instagram_link }}"   placeholder="Link de instagram" >

					@error('instagram_link')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fab fa-twitter"></i></span>
					</div>
					<input id="twitter_link" type="text" class="form-control @error('twitter_link') is-invalid @enderror" name="twitter_link" value="{{ $employe->twitter_link }}"   placeholder="Link de twitter" >

					@error('twitter_link')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-envelope"></i></span>
					</div>
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $employe->email }}" placeholder="Correo" required autocomplete="email">

					@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-phone"></i></span>
					</div>
					<input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ $employe->number }}" placeholder="Numero" required autocomplete="number">

					@error('number')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-addon"><img class="img-circle img-responsive img-center image"  src="{{url('/images/small/employe_'.$employe->id.'.webp')}}" onerror="this.src='{{url("/images/small/perfil.png")}}'"></span>
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
			</div>
		</form>
	</div>
</div>