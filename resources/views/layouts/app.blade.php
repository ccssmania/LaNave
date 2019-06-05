<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    
    @include('partials.head')
    @include('partials.jsfiles')

<body class=" {{get_class(Route::getCurrentRoute()->getController()) == 'App\Http\Controllers\HomeController' ? 'page-top' : 'app sidebar-mini'}} ">
    @if(get_class(Route::getCurrentRoute()->getController()) == 'App\Http\Controllers\HomeController' or get_class(Route::getCurrentRoute()->getController()) == 'App\Http\Controllers\ReserveController')
        @include('partials.headerPublic')
        @if(Session::has('message'))
            <p class="alert alert-dismissible alert-success">{!! Session::get('message') !!}</p>
        @endif

        @if(Session::has('errorMessage'))
            <p class="alert alert-dismissible {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('errorMessage') }}</p>
        @endif
        <main class="" id="app">
            @yield('content')
        </main>
    @else
        <!-- Admin Panel -->
        @include('partials.headerAdmin')
        @include('partials.sidbar')
        @if(Session::has('message'))
            <p class="alert alert-dismissible alert-success" style="margin-top: 50px; margin-left: 230px; text-align: center;">{!! Session::get('message') !!}</p>
        @endif

        @if(Session::has('errorMessage'))
            <p class="alert alert-dismissible {{ Session::get('alert-class', 'alert-danger') }}" style="margin-top: 50px; margin-left: 230px; text-align: center;">{{ Session::get('errorMessage') }}</p>
        @endif
        <main class="app-content bg-@yield('color')" id="app">
            <div class="app-title">
                <div>
                  <h1><i class="fa fa-@yield('font')"></i> @yield('title')</h1>
                  <p>@yield('description')</p>
                </div>
                <ul class="app-breadcrumb breadcrumb">
                  <li class="breadcrumb-item"><i class="fa fa-@yield('font') fa-lg"></i></li>
                  <li class="breadcrumb-item"><a href="#">@yield('title')</a></li>
                </ul>
              </div>
            @yield('content')
        </main>
    @endif
</body>
</html>
