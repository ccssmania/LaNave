@extends("layouts.app")
@section('title', 'Perfil')
@section('description', 'En esta área se podrá realizar todas las modificaciones al perfil, así como los cambios a la pagina principal')
@section('font','user')
@section("content")
    <div class="row user">
        <div class="col-md-12">
          <div class="profile">
            <div class="info"><img class="user-img" src="{{url('/images/small/user_'.$user->id.'.jpg')}}" onerror="this.src='{{url("/images/perfil.png")}}'">
              <h4> {{$user->name}} </h4>
              <p>{{isset($user->rol) ? $user->rol->name : ''}}</p>
            </div>
            <div class="cover-image"></div>
          </div>
        </div>
        <div class="col-md-2 col-sm-2">
          <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
              <li class="nav-item"><a class="nav-link {{!$flag ? 'active' : ''}} " href="#user-settings" data-toggle="tab">Perfil</a></li>
              <li class="nav-item"><a class="nav-link {{$flag ? 'active' : ''}} " href="#settings" data-toggle="tab">Configuración</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane {{!$flag ? 'active' : 'fade'}}" id="user-settings">
                @include('profile.profile')
            </div>
            <div class="tab-pane {{$flag ? 'active' : 'fade'}} " id="settings">
              @include('settings.index')
            </div>
          </div>
        </div>
      </div>
@endsection