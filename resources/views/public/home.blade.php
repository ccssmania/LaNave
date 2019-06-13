@extends('layouts.app')

@section('content')
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
  	@foreach($banners as $banner)
	    <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="{{ $loop->first ? 'active' : '' }}"></li>
    @endforeach
  </ol>
  <div class="carousel-inner">
    @foreach($banners as $banner)
      <div class="carousel-item  {{ $loop->first ? 'active' : '' }}">
        <header class="masthead" style="background-image: url({{url('/images/banner_'.$banner->id.'.jpg')}}) ">
  	    <div class="container">
  	      <div class="intro-text text-info">
  	        <div class="intro-lead-in">{{$banner->name}}</div>
  	        <div class="intro-heading text-light">{!! $banner->description!!}</div>
  	        <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="{{isset($banner->link) ? '$banner->link' : '#services'}}">{{isset($banner->link) ? 'Ver' : 'Servicios'}} </a>
  	      </div>
  	    </div>
  	  </header>
      </div>
    @endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- Services -->
  <section class="page-section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Servicios en linea</h2>
          <h3 class="section-subheading text-muted">Disfrute de nuestros servicios en linea</h3>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4 mx-auto">
          <span class="fa-stack fa-6x">
            <a  data-toggle="modal" href="#reserve">
              <i class="fas fa-circle fa-stack-2x text-primary"></i>
              <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i>
            </a>
          </span>
          <h4 class="service-heading">Reserve su cita en linea</h4>
          <p class="text-muted">Reserve su cita en linea, fácil y sin filas.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Grid -->
  <section class="bg-light page-section" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Portafolio</h2>
          <h3 class="section-subheading text-muted">Te invitamos a conocer nuestros productos</h3>
        </div>
      </div>
      <div class="row">
        @foreach($products as $product)
          <div class="col-md-4 col-sm-6 mx-auto portfolio-item">
            <a class="portfolio-link" data-toggle="modal" href="#portfolioModal_{{$product->id}}">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i class="fas fa-plus fa-3x"></i>
                </div>
              </div>
              <img class="img-fluid custom-img-fluid" src="{{url('/images/product_'.$product->id.'.jpg')}}" onerror="this.src='{{url("/images/product.jpg")}}'" alt="">
            </a>
            <div class="portfolio-caption">
              <h4>{{$product->name}}</h4>
              <p class="text-muted">{{$product->title}}</p>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <!-- Before After -->
  <section class="page-section" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Antes y Después</h2>
          <h3 class="section-subheading text-muted">Fotos de nuestro trabajo del antes y después.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="timeline">
           @foreach($before_after as $bf)

              <li class=" ">
                <div class="timeline-image">
                  <a href="{{url('/images/before_'.$bf->id.'.jpg')}}" target="_blank">
                    <img class="rounded-circle img-fluid custom-img-fluid"  src="{{url('/images/before_'.$bf->id.'.jpg')}}" alt="">
                  </a>
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>Antes</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted"></p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <a href="{{url('/images/after_'.$bf->id.'.jpg')}}" target="_blank">
                    <img class="rounded-circle img-fluid custom-img-fluid"  src="{{url('/images/after_'.$bf->id.'.jpg')}}" alt="">
                  </a>
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>Después</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted"></p>
                  </div>
                </div>
              </li>
            @endforeach
            <li class="timeline-inverted">
              <div class="timeline-image">
                <h4>Se parte
                  <br>De esta
                  <br>Historia!</h4>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Team -->
  <section class="bg-light page-section" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Nuestro equipo de trabajo</h2>
          <h3 class="section-subheading text-muted">Siempre listos a prestar la mejor atención.</h3>
        </div>
      </div>
      <div class="row">
        @foreach($employees as $employe)
          <div class="col-sm-4 mx-auto">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="{{url('/images/employe_'.$employe->id.'.jpg')}}" alt="">
              <h4>{{$employe->name}}</h4>
              <p class="text-muted"></p>
              <ul class="list-inline social-buttons">
                <li class="list-inline-item">
                  <a href="{{isset($employe->twitter_link) ? $employe->twitter_link : '#'}}">
                    <i class="fab fa-twitter"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="{{isset($employe->facebook_link) ? $employe->facebook_link : '#'}}">
                    <i class="fab fa-facebook-f"></i>
                  </a>
                </li>
                <li class="list-inline-item">
                  <a href="{{isset($employe->instagram_link) ? $employe->instagram_link : '#'}}">
                    <i class="fab fa-instagram"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        @endforeach
      </div>
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <p class="large text-muted"></p>
        </div>
      </div>
    </div>
  </section>

  <!-- ABOUT -->
  <section class="py-5">
    <div class="container">
      <h2 class="text-center text-uppercase">Sobre Nosotros</h2>
      <hr class="star-dark mb-5">
      <div class="row">
        <div class="col-md-4 ml-auto">
          <p class="lead">{!! isset($contact) ?  $contact->about : '' !!}</p>
        </div>
        <div class="col-md-4 mr-auto">
          <p class="lead">{!! isset($contact) ? $contact->details : '' !!}</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Contactanos</h2>
          <h3 class="section-subheading text-muted">Envíanos un mensaje, responderemos lo mas pronto posible.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form id="contactForm" name="sentMessage" novalidate="novalidate">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" id="name" name="name" type="text" placeholder="Nombre *" required="required" data-validation-required-message="Porfavor ingresa tu nombre.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="email" type="email" name="email" placeholder="Correo *" required="required" data-validation-required-message="Porfavor ingresa tu correo.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="phone" type="tel" name="number" placeholder="Numero de telefono *" required="required" data-validation-required-message="Porfavor ingresa tu numero de telefono.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" id="message" placeholder="Mensaje *" name="message" required="required" data-validation-required-message="Porfavor ingresa el mensaje."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-6 text-center">
                <div id="success"></div>
                <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Enviar</button>
              </div>
              <div class="col-lg-6 text-center">
                <a href="#address" data-toggle="modal" class="btn btn-primary btn-xl">Como Llegar</a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <span class="copyright">Copyright &copy; Your Website 2019</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="{{ isset($contact) ? $contact->twitter_link : ''}}">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="{{ isset($contact) ? $contact->facebook_link : ''}}">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="{{ isset($contact) ? $contact->instagram_link : ''}}">
                <i class="fab fa-instagram"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="list-inline quicklinks">
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Portfolio Modals -->

  <!-- Modals -->
  @foreach($products as $product)
    <div class="portfolio-modal modal fade" id="portfolioModal_{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">{{$product->name}}</h2>
                  <p class="item-intro text-muted">{{$product->title}}</p>
                  <img class="img-fluid d-block mx-auto" src="{{url('/images/product_'.$product->id.'.jpg')}}" alt="">
                  <p>{!!$product->description!!}</p>
                  <ul class="list-inline">
                  @if(isset($product->price))
                    <li>Precio : {{$product->price}} € </li>
                  @else
                    @foreach($product->categories as $category)
                      <li>{{$category->name}} : {{$product->prices()->where('product_category_id', $category->id)->first()->price}} € </li>
                    @endforeach
                  @endif
                  </ul>
                  <div class="col-md-12 little-margin-bot">
                    <a class="btn btn-primary btn-xl text-uppercase productReserve" href="#" rel="{{$product->id}}" id="productReserve_{{$product->id}}"> Reservar </a>
                  </div>
                  <button class="btn btn-primary" data-dismiss="modal" type="button">
                    <i class="fas fa-times"></i>
                    Cerrar</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  @endforeach

  <div class="portfolio-modal modal fade" id="reserve" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="tab-pane container">
          <div class="tile user-settings">
            <h2 class="line-head text-uppercase">Reservar</h2>
            <form action="{{url('/order')}}" method="GET" id="reserveForm">
              @csrf
              <div class="row mb-4">
                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-shower"></i></span>
                  </div>
                  <select class="form-control product" name="product_id" id="product_id"  required>
                    <option value="">Seleccionar tipo de lavado</option>
                    @foreach($products as $product)
                      <option value="{{$product->id}}" title=" {{$product->description}} "> {{$product->name}} </option>
                    @endforeach
                  </select>
                </div>
                <div class="input-group form-group category" style="display: none;">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-car"></i></span>
                  </div>
                  <select class="form-control product_category" name="product_category_id" id="product_category_id" >
                    <option value="">Seleccionar el tipo de coche</option>
                    @foreach($product_categories as $product_category)
                      <option value="{{$product_category->id}}" title=" {{$product_category->description}} "> {{$product_category->name}} </option>
                    @endforeach
                  </select>
                </div>
                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-car"></i></span>
                  </div>
                    <input id="car_model" placeholder="Ingresar las especificaciones del coche" type="text" class="form-control @error('car_model') is-invalid @enderror" name="car_model" value="{{ old('car_model') }}" required>

                    @error('car_model')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @endif
                </div>
                <div class="input-group form-group price" style="display: none;">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-money"></i></span>
                  </div>
                  <label class="price_value"></label>
                </div>

                <div class="input-group form-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                  </div>
                  <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" placeholder="Nombre" autofocus>

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
                  <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email"  required  placeholder="Correo Electronico" autofocus>

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
                  <input id="number" type="number" class="form-control @error('number') is-invalid @enderror" name="number"  required  placeholder="Número de teléfono" autofocus>

                  @error('number')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <div class="col-md-12 mx-auto little-margin-bot">
                  <button type="submit" class="btn btn-primary btn-xl text-uppercase"><i class="fa fa-fw fa-lg fa-check-circle"></i>
                    Reservar
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="portfolio-modal modal fade" id="address" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="tab-pane container">
          <div class="tile user-settings">
            <h2 class="line-head text-uppercase">Como Llegar</h2>
            <iframe width="100%" height="400px" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;ie=UTF8&amp;q={{isset($contact->address) ? $contact->address : 'Torrijos'}}&amp;t=m&amp;z=13&amp;output=embed"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection