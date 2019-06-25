<div class="tab-pane container">
	<div class="tile user-settings">
		<h4 class="line-head"></h4>
		<form action="{{$url}}" method="{{$method}}" >
			@csrf
			<div class="row mb-4">
                <div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-user"></i></span>
					</div>
					<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $product_category->name }}" required autocomplete="name" placeholder="Nombre" autofocus>

					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<label class="control-label">Descripción</label>
						</span>
					</div>
					<textarea  class="form-control @error('description') is-invalid @enderror" name="description" required  placeholder="Descripcion de la categoría" > {{ $product_category->description }} </textarea>
					@error('description')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group row mb-12">
					<div>
						<button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>
							Save
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>