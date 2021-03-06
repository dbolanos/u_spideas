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
                    <div class="card-header">Eventos</div>
                    <div class="card-body">
                        <div class="form-group row">
                            @if(count($events) > 0)
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Description</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($events as $event)
                                        <tr>
                                            <td>{{$event->id}}</td>
                                            <td>{{$event->description}}</td>
                                            <td>
                                                <a href="{{route('edit.event', ['id' => $event->id])}}" class="btn btn-success"> Editar <i class="fas fa-edit"></i></a>
                                                <a href="{{route('delete.event', ['id' => $event->id])}}" class="btn btn-danger"> Borrar <i class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        {{$events->links()}}
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-warning">
                                    No se ha encontrado ningún evento
                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group row">
                            <a href="{{route('create.event')}}" class="btn btn-primary pull-right"> Crear Evento <i class="fas fa-plus-square"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
