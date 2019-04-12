@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @if($message = Session::get('message'))
                    <div class="alert alert-{{$message['type_message']}}" role="alert">
                        {!! $message['msg'] !!}
                        <button type="button" class="close" data-dismiss="alert" areia-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">Solicitudes</div>
                    <div class="card-body">
                        <div class="form-group row">
                            @if(count($requests) > 0)
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Alumno</th>
                                        <th>Infraestructura</th>
                                        <th>Evento</th>
                                        <th>Periodo</th>
                                        <th>Estado</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($requests as $request)
                                        <tr>
                                            <td>{{$request->student->getFullName()}}</td>
                                            <td>{{$request->infrastructure->description}}</td>
                                            <td>{{$request->event->description}}</td>
                                            <td>{{$request->period->description}}</td>
                                            <td>{{$request->requestStatus->description}}</td>
                                            <td>
                                                <a href="{{route('edit.request', ['id' => $request->id])}}" class="btn btn-success" ><i class="fas fa-edit"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        {{$requests->links()}}
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
                          <a href="{{route('create.request')}}" class="btn btn-primary btn-icon-split btn-user ">
                            <span class="icon text-white-50">
                              <i class="fas fa-plus-square"></i>
                            </span>
                            <span class="text">Crear Solicitud</span>
                          </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
