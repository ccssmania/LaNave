<div class="row">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Trabajadores</h2>
            	@foreach($employees as $employe)
                    <div class="row border">
                        <div class="col-sm-6">
                            <img class="img-circle img-responsive img-center"  src="{{url('/images/employe_'.$employe->id.'.webp')}}" onerror="this.src='{{url("/images/perfil.png")}}'">
                        </div>
                        <div class="col-sm-4">
                            <p class="card-text"> {{$employe->name}} </p>
                            <p class="card-text"> {{$employe->number}} </p>
                            <p class="card-text"> {{$employe->email}} </p>
                        </div>
                        <div class="col-sm-2 text-rigth">
                            <a href="{{url('/profile/employe/edit/'.$employe->id)}}" title="Editar trabajador"><i class="fa fa-edit fa-lg"></i></a>
                            <a id="" href="#" rel="{{url('/profile/employe/delete/'.$employe->id)}}" onclick="Delete($(this));"  title="Eliminar trabajador"><i class="fa fa-trash fa-lg danger"></i></a>
                        </div>
                    </div>
                @endforeach
                <div class="row little-margin-top">
                    <div class="col-md-7">
                        <h5>Agregar nuevo trabajador</h5>
                    </div>
                    <div class="col-md-1 text-left">
                        <a href="{{url('/profile/employe/create')}}" class="btn btn-primary"><i class="material-icons">add</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Banners de la pagina Principal</h2>
                @foreach($banners as $banner)
                    <div class="row border">
                        <div class="col-sm-6">
                            <img class="img-circle img-responsive img-center"  src="{{url('/images/banner_'.$banner->id.'.webp')}}" onerror="this.src='{{url("/images/perfil.png")}}'">
                        </div>
                        <div class="col-sm-4">
                            <p class="card-text"> {!!$banner->description!!} </p>
                            <p class="card-text"> {{$banner->link}} </p>
                        </div>
                        <div class="col-sm-2 text-rigth">
                            <a href="{{url('/profile/banner/edit/'.$banner->id)}}" title="Editar Banner"><i class="fa fa-edit fa-lg"></i></a>
                            <a id="" href="#" rel="{{url('/profile/banner/delete/'.$banner->id)}}" onclick="Delete($(this));"  title="Eliminar este banner"><i class="fa fa-trash fa-lg danger"></i></a>
                        </div>
                    </div>
                @endforeach
                <div class="row little-margin-top">
                    <div class="col-md-7">
                        <h5>Agregar nuevo Banner</h5>
                    </div>
                    <div class="col-md-1 text-left">
                        <a href="{{url('/profile/banner/create')}}" class="btn btn-primary"><i class="material-icons">add</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Datos de contacto</h2>
                @if(isset($contact) and $contact != null)
                    <div class="row">
                        <div class="col-sm-6">Email</div>
                        <div class="col-sm-6"> {{$contact->email}} </div>
                        <div class="col-sm-6">Dirección</div>
                        <div class="col-sm-6">{{$contact->address}}</div>
                        <div class="col-sm-6">Sobre Nosotros</div>
                        <div class="col-sm-6">{!! $contact->about !!}</div>
                        <div class="col-sm-6">Detalles</div>
                        <div class="col-sm-6">{!! $contact->details !!}</div>
                    </div>
                    <div class="row little-margin-top">
                        <div class="col-md-7">
                            <h5>Editar</h5>
                        </div>
                        <div class="col-md-1 text-left">
                            <a href="{{url('/profile/contact/edit/'.$contact->id)}}" class="btn btn-primary"><i class="material-icons">edit</i></a>
                        </div>
                    </div>
                @else
                    <div class="row little-margin-top">
                        <div class="col-md-7">
                            <h5>Agregar datos de contacto</h5>
                        </div>
                        <div class="col-md-1 text-left">
                            <a href="{{url('/profile/contact/create')}}" class="btn btn-primary"><i class="material-icons">add</i></a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title">Imágenes de Antes y Después</h2>
                @foreach($beforeAfters as $beforeAfter)
                    <div class="row border">
                        <div class="col-sm-4">
                            <img class="img-circle img-responsive img-center" style="max-width: 100%;"  src="{{url('/images/small/before_'.$beforeAfter->id.'.webp')}}" onerror="this.src='{{url("/images/perfil.png")}}'">
                        </div>
                        <div class="col-sm-4">
                            <img class="img-circle img-responsive img-center" style="max-width: 100%;"  src="{{url('/images/small/after_'.$beforeAfter->id.'.webp')}}" onerror="this.src='{{url("/images/perfil.png")}}'">
                        </div>
                        <div class="col-sm-2 text-rigth">
                            <a href="{{url('/profile/before_after/edit/'.$beforeAfter->id)}}" title="Editar Antes y Después"><i class="fa fa-edit fa-lg"></i></a>
                            <a id="" href="#" rel="{{url('/profile/before_after/delete/'.$beforeAfter->id)}}" onclick="Delete($(this));"  title="Eliminar este Antes y Después"><i class="fa fa-trash fa-lg danger"></i></a>
                        </div>
                    </div>
                @endforeach
                <div class="row little-margin-top">
                    <div class="col-md-7">
                        <h5>Agregar nuevo Antes y Después</h5>
                    </div>
                    <div class="col-md-1 text-left">
                        <a href="{{url('/profile/before_after/create')}}" class="btn btn-primary"><i class="material-icons">add</i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix visible-sm-block visible-lg-block"></div>
</div>   