  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top " id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">{{env('APP_NAME')}} </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{(get_class(Route::getCurrentRoute()->getController()) == 'App\Http\Controllers\ReserveController') ?  url('/#services') : '#services'}}">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{(get_class(Route::getCurrentRoute()->getController()) == 'App\Http\Controllers\ReserveController') ?  url('/#portfolio') : '#portfolio'}}">Portafolio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{(get_class(Route::getCurrentRoute()->getController()) == 'App\Http\Controllers\ReserveController') ?  url('/#about') : '#about'}}">Sobre Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{(get_class(Route::getCurrentRoute()->getController()) == 'App\Http\Controllers\ReserveController') ?  url('/#team') : '#team'}}">Equipo</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="{{(get_class(Route::getCurrentRoute()->getController()) == 'App\Http\Controllers\ReserveController') ?  url('/#contact') : '#contact'}}">Contactanos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>  