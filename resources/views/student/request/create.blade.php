@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="card">
        <div class="card-header">Crear Solicitud</div>
        <div class="card-body">
            <form action="{{route('generate.student.request')}}" method="POST">
                @csrf
            <div class="form-group row">
                    <label for="infra" class="col-md-4 col-form-label text-md-right">Infraestructura <i class="fas fa-building"></i></label>
                    <div class="col-md-8">
                        <select name="infra" id="infra">
                            <option value="">Selecciones Infraestructura</option>
                            @foreach($infrastructures as $infrastructure)
                                <option value="{{$infrastructure->id}}">{{$infrastructure->description}}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('infra'))
                            <span class="alert alert-danger" role="alert">
                            <strong>{{ $errors->first('infra') }}</strong>
                        </span>
                        @endif
                    </div>
            </div>
            <div class="form-group row">
                <label for="event" class="col-md-4 col-form-label text-md-right">Evento <i class="fas fa-calendar-alt"></i> </label>
                <div class="col-md-8">
                    <select name="event" id="event">
                        <option value="">Seleccionar Evento</option>
                        @foreach($events as $event)
                            <option value="{{$event->id}}">{{$event->description}}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('event'))
                        <span class="alert alert-danger" role="alert">
                            <strong>{{ $errors->first('event') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group row">
                <label for="period" class="col-md-4 col-form-label text-md-right">Jornada <i class="fas fa-history"></i> </label>
                <div class="col-md-8">
                    <select name="period" id="period">
                        <option value="">Selecciona Jornada</option>
                        @foreach($periods as $period)
                            <option value="{{$period->id}}">{{$period->description}}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('period'))
                        <span class="alert alert-danger" role="alert">
                            <strong>{{ $errors->first('period') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
                    <button type="submit" class="btn btn-success"> Crear Solicitud <i class="fas fa-arrow-circle-right"></i></button>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection
