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
					<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$product->name}}" required autocomplete="name" placeholder="Nombre" autofocus>

					@error('name')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-heading"></i></span>
					</div>
					<input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{$product->title}}" placeholder="titulo o pequeña descripción del producto" >

					@error('title')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group form-check">
				    <input type="checkbox" name="checkPrice" {{isset($product->price) ? 'checked' : ''}} class="form-check-input" id="price">
				    <label class="form-check-label" >Producto con precio único</label>
				</div>
				<div class="form-group form-check "  style="margin-left: 15px;">
				    <input type="checkbox" name="checkPrices" {{$product->prices()->count() > 0 ? 'checked' : '' }} class="form-check-input" id="prices">
				    <label class="form-check-label">producto con categorías y diferentes precios</label>
				</div>
				<div class="price col-md-12 {{isset($product->price) ? '' : 'none'}}">
					<div class="form-group input-group " >
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-money"></i></span>
						</div>
						<input type="number" name="price" class="form-control" value="{{$product->price}}"  placeholder="Precio único del producto">
					</div>
				</div>
				<div class=" prices col-md-12 {{$product->prices()->count() > 0 ? '' : 'none' }}" >
					@foreach($product_categories as $category)
						<div class="form-group input-group">
							<div class="input-group-prepend">
								<span class="input-group-text"><i class="fas fa-money"> {{$category->name}} </i></span>
							</div>
							<input type="number" name="prices[{{$category->id}}]" class="form-control" value="{{$product->prices()->where('product_id',$product->id)->where('product_category_id',$category->id)->first() !== null ? $product->prices()->where('product_id',$product->id)->where('product_category_id',$category->id)->first()->price : ''}}"  placeholder="Precio en esta categoria del producto">
						</div>
					@endforeach
				</div>
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-text">
							<label class="control-label">Descripción</label>
						</span>
					</div>
					<textarea class=" @error('description') is-invalid @enderror" name="description" required  placeholder="Descripcion del producto" > {{ $product->description }} </textarea>
					@error('description')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="input-group form-group">
					<div class="input-group-prepend">
						<span class="input-group-addon"><img class="img-circle img-responsive img-center image"  src="{{url('/images/small/product_'.$product->id.'.webp')}}" onerror="this.src='{{url("/images/small/perfil.png")}}'"></span>
					</div>
					<input type="file" name="image" class="form-control @error('image') is-invalid @enderror" style="height: 90px">
					@error('image')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>
				<div class="form-group row mb-12">
					<div class="">
						<button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>
							Save
						</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>