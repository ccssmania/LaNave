@extends("layouts.main")
@section("content")
<div class=" row little-margin-top">
	<div class="col-md-5 col-ms-5">
		<h1>Perfil</h1>
        <table class="table">
            <tr>
                <th height="200" width="200">
                    <img class="img-circle img-responsive img-center"  src="{{url('/images/u_'.$user->id.'.jpg')}}" onerror="this.src='{{url("/images/perfil.png")}}'">
                </th>
                <th>
                	<div class="col-md-6">	
	                    <p><em>{{$user->name}}</em></p>
	                    <p>{{$user->email}}</p>
	                    
                	</div>
                	<div class="col-md-6 text-left">
                		<a href="{{url('/perfil/edit/'.$user->id)}}"><i class="fa fa-edit"></i></a>
                	</div>
                </th>
        </table>
        <h1>Trabajadores</h1>
        <table class="table">
        @foreach($employees as $emp)
            <tr>
                <th height="200" width="200">
                    <img class="img-circle img-responsive img-center"  src="{{url('/images/e_'.$emp->id.'.jpg')}}" onerror="this.src='{{url("/images/perfil.png")}}'">
                </th>
                <th>
                	<div class="col-md-6">	
	                    <p><em>{{$emp->name}}</em></p>
	                    <p>{{$emp->email}}</p>
	                    <p>{{$emp->number}}</p>
	                    <p>{{$emp->position}}</p>
                	</div>
                	<div class="col-md-6 text-left">
                		<a href="{{url('/perfil/employe/edit/'.$emp->id)}}"><i class="fa fa-edit"></i></a>
                		<a href="#" class="deleteE" name="{{$emp->id}}"><i class="fa fa-trash"></i></a>
                	</div>
                </th>
            </tr>
        @endforeach
        	<tr>
        		<th>
        			<div class="col-md-7">
        				<h5>Agregar nuevo trabajador</h3>
        			</div>
        			<div class="col-md-1 text-left">
        				<a href="{{url('/perfil/employe/create')}}" class="btn btn-primary"><i class="material-icons">add</i></a>
        			</div>
        		</th>
        	</tr>
        </table>
        <h1>Datos de contacto</h1>
        <table class="table">
            <tr>
                <th>
                	<div class="col-md-6">	
	                    <p><strong>Dirección:</strong> {{$contact->address }}</p>
	                    <p><strong>Email:</strong>  {{$contact->email}}</p>
	                    <p><strong>Teléfono:</strong>  {{$contact->number}}</p>
	                    <br>
	                    <p><strong>Sobre nosotros : </strong> {!!$contact->about!!} </p>
	                    
                	</div>
                	<div class="col-md-6 text-left">
                		<a href="{{url('/perfil/contact/edit/'.$contact->id)}}"><i class="fa fa-edit"></i></a>
                	</div>
                </th>
        </table>
	</div>
	<div class="col-md-7 col-ms-7 bordered-left">
		<h1>Imágenes</h1>
        <table class="table">
            <tr>
                <th height="200" width="200">
                    <img class="img-circle img-responsive img-center"  src="{{url('/images/banner_1.jpg')}}" onerror="this.src='{{url("/images/perfil.png")}}'">
                </th>
                <th>
                	<div class="col-md-6">	
	                    <p><em>Cambiar/poner imagen</em></p>
	                    <p> Esta imagen hace parte de los banners de la página principal #1</p>
	                    <br>
	                    <p class="text-danger">NOTA: Estas imágenes deben ser de muy alta calidad, al menos 1900x1080</p>
                	</div>
                	<div class="col-md-6 text-left">
                		<form action="{{url('/perfil/images')}}" method="POST" enctype="multipart/form-data">
                			<input type="file" name="banner_1" class="form-control" required>
                			@if ($errors->has('banner_1'))
							<span class="help-block">
								<strong>{{ $errors->first('banner_1') }}</strong>
							</span>
							@endif
                			<button type="submit" class="btn btn-primary">Cambiar</button>
                		</form>
                	</div>
                </th>
            </tr>
            <tr>
                <th height="200" width="200">
                    <img class="img-circle img-responsive img-center"  src="{{url('/images/banner_2.jpg')}}" onerror="this.src='{{url("/images/perfil.png")}}'">
                </th>
                <th>
                	<div class="col-md-6">	
	                    <p><em>Cambiar/poner imagen</em></p>
	                    <p> Esta imagen hace parte de los banners de la página principal #2</p>
	                    <br>
	                    <p class="text-danger">NOTA: Estas imágenes deben ser de muy alta calidad, al menos 1900x1080</p>
                	</div>
                	<div class="col-md-6 text-left">
                		<form action="{{url('/perfil/images')}}" method="POST" enctype="multipart/form-data">
                			<input type="file" name="banner_2" class="form-control" required>
                			@if ($errors->has('banner_2'))
							<span class="help-block">
								<strong>{{ $errors->first('banner_2') }}</strong>
							</span>
							@endif
                			<button type="submit" class="btn btn-primary">Cambiar</button>
                		</form>
                	</div>
                </th>
            </tr>
            <tr>
                <th height="200" width="200">
                    <img class="img-circle img-responsive img-center"  src="{{url('/images/banner_3.jpg')}}" onerror="this.src='{{url("/images/perfil.png")}}'">
                </th>
                <th>
                	<div class="col-md-6">	
	                    <p><em>Cambiar/poner imagen</em></p>
	                    <p> Esta imagen hace parte de los banners de la página principal #3</p>
	                    <br>
	                    <p class="text-danger">NOTA: Estas imágenes deben ser de muy alta calidad, al menos 1900x1080</p>
                	</div>
                	<div class="col-md-6 text-left">
                		<form action="{{url('/perfil/images')}}" method="POST" enctype="multipart/form-data">
                			<input type="file" name="banner_3" class="form-control" required>
                			@if ($errors->has('banner_3'))
							<span class="help-block">
								<strong>{{ $errors->first('banner_3') }}</strong>
							</span>
							@endif
                			<button type="submit" class="btn btn-primary">Cambiar</button>
                		</form>
                	</div>
                </th>
            </tr>
            <tr>
                <th height="200" width="200">
                    <img class="img-circle img-responsive img-center"  src="{{url('/images/h_.jpg')}}" onerror="this.src='{{url("/images/perfil.png")}}'">
                </th>
                <th>
                	<div class="col-md-6">	
	                    <p><em>Cambiar/poner imagen</em></p>
	                    <p> Esta imagen esta en la página principal al final, podria ser una imagen de la nave</p>
	                    <br>
	                    <p class="text-danger">NOTA: Estas imágenes deben ser de una calidad de al menos 700x450</p>
                	</div>
                	<div class="col-md-6 text-left">
                		<form action="{{url('/perfil/images')}}" method="POST" enctype="multipart/form-data">
                			<input type="file" name="home_" class="form-control" required>
                			@if ($errors->has('home_'))
							<span class="help-block">
								<strong>{{ $errors->first('home_') }}</strong>
							</span>
							@endif
                			<button type="submit" class="btn btn-primary">Cambiar</button>
                		</form>
                	</div>
                </th>
            </tr>
       
        </table>
	</div>

</div>
@endsection