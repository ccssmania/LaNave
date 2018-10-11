<div class="big-margin-top">
    <div class="row">
        <div class="col-md-10 big-margin-bot little-margin-left">
            <div class="panel panel-primary big-margin-bot">
                <div class="panel-heading">Product </div>
				<form class="form-horizontal big-margin-top" method="{{$method}}" action="{{$url}}" enctype="multipart/form-data">
					{{ csrf_field() }}
					
						<div class="form-group ">
							<label class="col-md-4 control-label">Nombre </label>
							<div class="col-md-6">
								<input type="text" name="name"  placeholder="{{$product->name ? $product->name : 'Nombre'}}" class="form-control" {{$product->title ? '' : 'required'}}>
							</div>
						</div>
						<div class="form-group">
				            <label  class="col-md-4 control-label">Description </label>

				            <div class="col-md-6">
				                <textarea class="textarea" name="description">{{$product->description ? $product->description : ''}} {{old('description') ? old('description') : ''}}</textarea>

				            </div>
				        </div>
						<div class="form-group">
							<label class="col-md-4 control-label">Precio</label>
							<div class="col-md-6">
								<input type="number" step="0.5" name="price">
							</div>
						</div>
						<div class="form-group">
							
							<div class="col-md-6 col-md-offset-4 text-right big-margin-bot">
								<input type="submit" value="Enviar" class="btn btn-success">
							</div>
						</div>
						
					
				</form>
            </div>
        </div>
    </div>
</div>

