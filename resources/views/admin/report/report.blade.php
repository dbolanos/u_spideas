@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Reporte</div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="descrip_event" class="col-md-4 col-form-label text-md-right">Cantidad de Estudiantes <i class="fas fa-user-graduate"></i> </label>
                            <div class="col-md-8">
                                <h3># <span class="badge badge-success">{{$result['count_students']}}</span></h3>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="descrip_event" class="col-md-4 col-form-label text-md-right">Cantidad Solicitudes <i class="fas fa-boxes"></i> </label>
                            <div class="col-md-8">
                                <h3># <span class="badge badge-primary">{{$result['count_request']}}</span></h3>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="descrip_event" class="col-md-4 col-form-label text-md-right">Solicitudes en estado Pendientes <i class="far fa-pause-circle"></i> </label>
                                <h3># <span class="badge badge-secondary">{{$result['count_request_pending']}}</span></h3>
                            <label for="descrip_event" class="col-md-4 col-form-label text-md-right">Solicitudes en estado Aprobado <i class="fas fa-thumbs-up"></i> </label>
                                <h3># <span class="badge badge-secondary">{{$result['count_request_approved']}}</span></h3>
                            <label for="descrip_event" class="col-md-4 col-form-label text-md-right">Solicitudes en estado Terminado <i class="fas fa-check-double"></i> </label>
                                <h3># <span class="badge badge-secondary">{{$result['count_request_finish']}}</span></h3>
                            <label for="descrip_event" class="col-md-4 col-form-label text-md-right">Solicitudes en estado Bloqueado <i class="fas fa-stop-circle"></i> </label>
                                <h3># <span class="badge badge-secondary">{{$result['count_request_block']}}</span></h3>
                        </div>

                        <hr>

                        <h4>Eventos: <span class="badge badge-secondary">{{count($result['events'])}}</span></h4>
                        <div class="col-md-8">

                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($result['events'] as $event)
                                    <tr>
                                        <td>{{$event->id}}</td>
                                        <td>{{$event->description}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <hr>

                        <h4>Infraestructura: <span class="badge badge-secondary">{{count($result['infrastructure'])}}</span></h4> </label>
                        <div class="col-md-8">
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Description</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($result['infrastructure'] as $infrastructure)
                                    <tr>
                                        <td>{{$infrastructure->id}}</td>
                                        <td>{{$infrastructure->description}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
