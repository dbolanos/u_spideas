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
                                    <option value="">Aula</option>
                                    <option value="gym">Gimnasio</option>
                                    <option value="library">Biblioteca</option>
                                    <option value="auditory">Auditorio</option>
                                    <option value="auditory">Materiales</option>
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
                                    <option value="event">Charla Scrum</option>
                                    <option value="event_tematic">Fiesta Tematica</option>
                                    <option value="event_meeting">Reuniones</option>
                                    <option value="event_study">Grupos de Estudio</option>
                                    <option value="">Fiesta de egresados</option>
                                </select>

                                @if ($errors->has('event'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('event') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Jornada</label>

                            <div class="col-md-6">
                                <select name="event" id="event">
                                    <option value="">Selecciona Jornada</option>
                                    <option value="morning">Mañana</option>
                                    <option value="afternoon">Tarde</option>
                                    <option value="night">Noche</option>
                                </select>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
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
