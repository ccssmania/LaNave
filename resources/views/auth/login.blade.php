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
          <div class="login-box">
            <form class="login-form" method="POST" action="{{ route('login') }}">
                @csrf
              <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Ingresar</h3>
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
                <div class="utility">
                  <div class="animated-checkbox">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            {{ __('Remember Me') }}
                        </label>
                  </div>
                  <p class="semibold-text mb-2"><a class="btn btn-link" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a></p>
                </div>
              </div>
              <div class="form-group btn-container row">
                <button class="btn btn-primary btn-block col-md-6" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>INGRESAR</button>
                <a class="btn btn-link btn-block col-md-6" href=" {{url('/register')}} ">REGISTRARSE</a>
              </div>
            </form>
          </div>
        </section>
    </body>
</html>