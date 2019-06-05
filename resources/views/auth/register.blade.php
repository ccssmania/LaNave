<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    @include('partials.head')
    @include('partials.jsfiles')
    <body>
        <section class="material-half-bg">
          <div class="cover"></div>
        </section>
        <section class="login-content">
          <div class="logo">
            <h1>{{env('APP_NAME')}}</h1>
          </div>
          <div class="register-box">
            <form class="login-form" method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">
                @csrf
              <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Registrarse</h3>
              <div class="form-group">
                <label class="control-label">NOMBRE</label>
                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

              </div>
              <div class="form-group">
                <label class="control-label">E-Mail</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

              </div>
              <div class="form-group">
                <label class="control-label">CONTRASEÑA</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group">
                <label class="control-label">CONFIRMAR CONTRASEÑA</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
              
              <div class="form-group btn-container">
                <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>REGISTRARSE</button>
              </div>
            </form>
          </div>
        </section>
    </body>
</html>