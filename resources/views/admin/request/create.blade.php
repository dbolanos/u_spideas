@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Solicitud</div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="infra" class="col-md-4 col-form-label text-md-right">Infraestructura</label>

                            <div class="col-md-6">
                                <select name="infra" id="infra">
                                    <option value="">Selecciones Infraestructura</option>
                                    @foreach($infraestructures as $infraestructure)
                                        <option value="{{$infraestructure->id}}">{{$infraestructure->description}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('infra'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('infra') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="event" class="col-md-4 col-form-label text-md-right">Evento</label>

                            <div class="col-md-6">
                                <select name="event" id="event">
                                    <option value="">Seleccionar Evento</option>
                                    @foreach($events as $event)
                                        <option value="{{$event->id}}">{{$event->description}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('event'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('event') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="period" class="col-md-4 col-form-label text-md-right">Jornada</label>

                            <div class="col-md-6">
                                <select name="period" id="period">
                                    <option value="">Selecciona Jornada</option>
                                    @foreach($periods as $period)
                                        <option value="{{$period->id}}">{{$period->description}}</option>
                                    @endforeach
                                </select>

                                @if ($errors->has('period'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('period') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
