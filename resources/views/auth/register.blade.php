@include('partials.headerGuest')
<style>
    .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 55%;
    }
</style>
{{--@section('content')--}}
<br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-dark bg-light mb-3">
                <div class="card-header">Registro</div>

                <div class="card-body">
                    <img src="{{url('/img/logo_1.png')}}" alt="" class="img-responsive center" >
                    <br>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombre</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control {{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" autofocus>

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Primer Apellido</label>

                            <div class="col-md-6">
                                <input id="first_surname" type="text" class="form-control {{ $errors->has('first_surname') ? ' is-invalid' : '' }}" name="first_surname" value="{{ old('first_surname') }}">

                                @if ($errors->has('first_surname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Segundo Apellido</label>

                            <div class="col-md-6">
                                <input id="second_surname" type="text" class="form-control {{ $errors->has('second_surname') ? ' is-invalid' : '' }}" name="second_surname" value="{{ old('second_surname') }}">

                                @if ($errors->has('second_surname'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('second_surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Cédula:</label>

                            <div class="col-md-6">
                                <input id="identification_card" type="text" class="form-control {{ $errors->has('identification_card') ? ' is-invalid' : '' }}" name="identification_card" value="{{ old('identification_card') }}">

                                @if ($errors->has('identification_card'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('identification_card') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Correo Electronico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirmar Contraseña</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    Registrarse!
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br><br>
{{--@endsection--}}
@include('partials.footerGuestMain')
