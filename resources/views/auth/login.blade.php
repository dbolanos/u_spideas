@include('partials.headerGuest')
@include('partials.topbar')
<style>
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 55%;
    }
</style>

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-6 d-none d-lg-block">
                <img src="{{url('/img/deas.png')}}" alt="" style="width:100%; height:100%">
              </div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Iniciar Sesión</h1>
                  </div>
                  <form class="user" id="login" method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                      <input type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} form-control-user "
                      id="email" name="email" aria-describedby="emailHelp" placeholder="Ingrese su email...">

                      @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                      @endif

                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} form-control-user"
                      id="password" name="password" placeholder="Contraseña">

                      @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                      @endif

                    </div>
                    <div class="form-group">
                      <div class="custom-control custom-checkbox small">
                        <input type="checkbox" class="custom-control-input" name="remember"
                        id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="custom-control-label" for="customCheck">Recordarme</label>
                      </div>
                    </div>
                    <a href="#" class="btn btn-primary btn-user btn-block"
                    onclick="document.getElementById('login').submit();">
                      Ingresar
                    </a>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="{{ route('password.request') }}">Olvido su Contraseña?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="{{ route('register') }}">Crear una cuenta</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

@include('partials.footerGuestMain')
