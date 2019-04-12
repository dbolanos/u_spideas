@include('partials.headerGuest')
@include('partials.topbar')

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block">
            <img src="{{url('/img/deas.png')}}" alt="" style="width:100%; height:100%">
          </div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Crear una cuenta</h1>
              </div>
              <form class="user" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }} form-control-user"
                    id="first_name" name="first_name" placeholder="Nombre" value="{{ old('first_name') }}" required>

                    @if ($errors->has('first_name'))
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('first_name') }}</strong>
                      </span>
                    @endif
                  </div>

                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user {{ $errors->has('identification_card') ? ' is-invalid' : '' }}"
                    id="identification_card" name="identification_card" placeholder="Cédula" value="{{ old('identification_card') }}" required>

                    @if ($errors->has('identification_card'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('identification_card') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" class="form-control form-control-user {{ $errors->has('first_surname') ? ' is-invalid' : '' }}"
                    id="first_surname" name="first_surname" placeholder="Primer Apellido" value="{{ old('first_surname') }}" required>

                    @if ($errors->has('first_surname'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('first_surname') }}</strong>
                      </span>
                    @endif
                  </div>

                  <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user {{ $errors->has('second_surname') ? ' is-invalid' : '' }}"
                    id="second_surname" name="second_surname" placeholder="Segundo Apellido" value="{{ old('second_surname') }}" required>

                    @if ($errors->has('second_surname'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('second_surname') }}</strong>
                      </span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <input type="email" class="form-control form-control-user {{ $errors->has('email') ? ' is-invalid' : '' }}"
                  id="email" name="email" placeholder="Email" value="{{ old('email') }}" required>

                  @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                    id="password" name="password" placeholder="Contraseña" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                  <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user" id="password-confirmation"
                    name="password-confirmation" placeholder="Confirmar Contraseña" required>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                  Registrarse
                </button>
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="{{ route('login') }}">Ya posee una cuenta?</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

</div>





{{--@endsection--}}
@include('partials.footerGuestMain')
