@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @if($message = Session::get('message'))
                    <div class="alert alert-{{$message['type_message']}}" role="alert">
                        {!! $message['msg'] !!}
                        <button type="button" class="close" data-dismiss="alert" areia-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Mis Solicitudes</div>
                    <div class="card-body">
                        <div class="form-group row">
                            @if(count($student_requests) > 0)
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <th>Infraestructura</th>
                                            <th>Evento</th>
                                            <th>Periodo</th>
                                            <th>Status</th>
                                            <th>Acciones</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($student_requests as $student_request)
                                        <tr>
                                            <td>{{$student_request->infrastructure->description}}</td>
                                            <td>{{$student_request->event->description}}</td>
                                            <td>{{$student_request->period->description}}</td>
                                            <td>{{$student_request->requestStatus->description}}</td>
                                            <td>
                                                <a href="{{route('edit.student.request', ['id' => $student_request->id])}}" class="btn btn-success"> Editar <i class="fas fa-edit"></i></a>
                                                <a href="{{route('delete.student.request', ['id' => $student_request->id])}}" class="btn btn-danger"> Borrar <i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-md-12 text-center">
                                            {{$student_requests->links()}}
                                        </div>
                                    </div>
                            @else
                                <div class="alert alert-warning">
                                    No se ha encuentrado ninguna solicitud
                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group row">
                            <a href="{{route('create.student.request')}}" class="btn btn-primary pull-right"> Crear Solicitud <i class="fas fa-plus-square"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
