<div class="tab-pane container">
	<div class="tile user-settings">
		<h4 class="line-head"></h4>
		<form action="{{$url}}" method="{{$method}}" enctype="multipart/form-data">
			@csrf
			<div class="row mb-4">
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-address-card"></i></span>
					</div>
					<input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $contact->address }}"  placeholder="Direccion de la empresa" >

					@error('address')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-envelope"></i></span>
					</div>
					<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $contact->email }}"   placeholder="Email de la empresa" >

					@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-facebook"></i></span>
					</div>
					<input id="facebook_link" type="text" class="form-control @error('facebook_link') is-invalid @enderror" name="facebook_link" value="{{ $contact->facebook_link }}"  placeholder="Link de facebook" >

					@error('facebook_link')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-instagram"></i></span>
					</div>
					<input id="instagram_link" type="text" class="form-control @error('instagram_link') is-invalid @enderror" name="instagram_link" value="{{ $contact->instagram_link }}"   placeholder="Link de instagram" >

					@error('instagram_link')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fa fa-twitter"></i></span>
					</div>
					<input id="twitter_link" type="text" class="form-control @error('twitter_link') is-invalid @enderror" name="twitter_link" value="{{ $contact->twitter_link }}"   placeholder="Link de twitter" >

					@error('twitter_link')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<label class="control-label">Sobre nosotros</label>
						</span>
					</div>
					<textarea id="textarea" class=" @error('about') is-invalid @enderror" name="about"  placeholder="Sobre nosotros" > {{ $contact->about }} </textarea>
					@error('about')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<label class="control-label">Detalles</label>
						</span>
					</div>
					<textarea id="textarea-details" class=" @error('details') is-invalid @enderror" name="details"  placeholder="Detalles de la empresa" > {{ $contact->details }} </textarea>
					@error('details')
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