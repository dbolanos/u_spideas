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
                    <div class="card-header">Infraestructuras</div>
                    <div class="card-body">
                        <div class="form-group row">
                            @if(count($infrastructures) > 0)
                                <table class="table table-condensed">
                                    <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Description</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($infrastructures as $infrastructure)
                                        <tr>
                                            <td>{{$infrastructure->id}}</td>
                                            <td>{{$infrastructure->description}}</td>
                                            <td>
                                              <a href="{{route('edit.infrastructure', ['id' => $infrastructure->id])}}"
                                                class="btn btn-info btn-icon-split btn-user ">
                                                <span class="icon text-white-50">
                                                  <i class="fas fa-edit"></i>
                                                </span>
                                                <span class="text">Editar</span>
                                              </a>
                                              <a href="{{route('delete.infrastructure', ['id' => $infrastructure->id])}}"
                                                class="btn btn-danger btn-icon-split btn-user ">
                                                <span class="icon text-white-50">
                                                  <i class="fas fa-trash-alt"></i>
                                                </span>
                                                <span class="text">Eliminar</span>
                                              </a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        {{$infrastructures->links()}}
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-warning">
                                    No se ha encontrado ninguna infraestructura
                                </div>
                            @endif

                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group row">
                          <a href="{{route('create.infrastructure')}}" class="btn btn-primary btn-icon-split btn-user ">
                            <span class="icon text-white-50">
                              <i class="fas fa-plus-square"></i>
                            </span>
                            <span class="text">Agregar Infraestructura</span>
                          </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
