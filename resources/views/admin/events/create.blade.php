@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Evento</div>
                    <div class="card-body">
                        <form action="{{route('generate.event')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="descrip_event" class="col-md-4 col-form-label text-md-right">Descripcion Evento <i class="fas fa-calendar-alt"></i> </label>
                                <div class="col-md-8">
                                    <input name="descrip_event" type="text" id="descrip_event">

                                    @if ($errors->has('descrip_event'))
                                        <span class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('descrip_event') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success"> Crear Evento <i class="fas fa-arrow-circle-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
