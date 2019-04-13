@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Crear Solicitud</div>
                    <div class="card-body">

                        <p>
                            Buscar Estudiantes:
                        </p>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <h3>Buscador</h3>
                                        <meta name="csrf-token" content="{{ csrf_token() }}">
                                        <div class="row">
                                            <div class="col-12 col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label for="id_customer">Id del Estudiante</label>
                                                    <input type="text" class="form-control " id="student_id" value="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label for="identification_card">Cédula o pasaporte</label>
                                                    <input type="text" class="form-control " id="identification_card" value="">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-4 col-md-4">
                                                <div class="form-group">
                                                    <label for="email">Primer Apellido</label>
                                                    <input type="text" class="form-control " id="first_surname" value="">
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-group col-12">
                                        <button type="button" class="btn btn-primary" id="search_student">
                                            Buscar
                                        </button>
                                    </div>

                                    <div>
                                        <table class="table table-striped table-responsive pre-table" id="student_table"
                                               style="width:100%; display: none">
                                            <thead>
                                            <tr>
                                                <th scope="col">#Id</th>
                                                <th scope="col">Nombre</th>
                                                <th scope="col">Primer Apellido</th>
                                                <th scope="col">Segundo Apellido</th>
                                                <th scope="col">Cédula o Pasaporte</th>
                                                <th scope="col">Acción</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                        <div id="message_error" style="display: none">
                                            <div class="alert alert-danger alert-dismissible fade show"
                                                 role="alert">
                                                <strong>Error!</strong>
                                                <p id="message"></p>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <form action="{{route('update.request')}}" method="POST">
                        @csrf
                        <input type="hidden" name="request_id" value="{{$student_request->id}}">
                        <div class="form-group row">
                            <label for="full_name_student" class="col-md-4 col-form-label text-md-right">Nombre Estudiante</label>
                            <div class="col-md-6">
                                <input type="text"
                                       class="form-control {{ $errors->has('student_id_request') ? ' is-invalid' : '' }}"
                                       id="full_name_student" name="full_name_student" value="{{$student_request->student->getFullName()}}"
                                       disabled>
                                @if ($errors->has('student_id_request'))
                                    <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('student_id_request') }}</strong>
                                                        </span>
                                @endif
                                <input type="hidden" name="student_id_request"
                                       id="student_id_request" value="{{$student_request->student->id}}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="infra" class="col-md-4 col-form-label text-md-right">Infraestructura <i class="fas fa-building"></i></label>
                            <div class="col-md-8">
                                <select name="infra" id="infra">
                                    <option value="">Selecciones Infraestructura</option>
                                    @foreach($infrastructures as $infrastructure)
                                        @if($student_request->infrastructure->id == $infrastructure->id)
                                            <option value="{{$infrastructure->id}}" selected>{{$infrastructure->description}}</option>
                                        @else
                                            <option value="{{$infrastructure->id}}">{{$infrastructure->description}}</option>
                                        @endif
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
                                        @if($student_request->event->id == $event->id)
                                            <option value="{{$event->id}}" selected>{{$event->description}}</option>
                                        @else
                                            <option value="{{$event->id}}">{{$event->description}}</option>
                                        @endif
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
                                        @if($student_request->period->id == $period->id)
                                            <option value="{{$period->id}}" selected>{{$period->description}}</option>
                                        @else
                                            <option value="{{$period->id}}">{{$period->description}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @if ($errors->has('period'))
                                    <span class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('period') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="request_status_id" class="col-md-4 col-form-label text-md-right">Estado <i class="far fa-compass"></i> </label>
                            <div class="col-md-8">
                                <select name="request_status_id" id="request_status_id">
                                    @foreach($request_statuses as $request_status)
                                        @if($student_request->requestStatus->id == $request_status->id)
                                            <option value="{{$request_status->id}}" selected>{{$request_status->description}}</option>
                                        @else
                                            <option value="{{$request_status->id}}">{{$request_status->description}}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @if ($errors->has('request_status_id'))
                                    <span class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('request_status_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success"> Editar Solicitud <i class="fas fa-arrow-circle-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script
        src="https://code.jquery.com/jquery-3.4.0.min.js"
        integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
        crossorigin="anonymous"></script>
    <script src="{{ asset('/js/searchStudent.js') }}"></script>
@endsection
