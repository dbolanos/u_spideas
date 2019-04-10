@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Infraestructura</div>
                    <div class="card-body">
                        <form action="{{route('update.infrastructure')}}" method="POST">
                            @csrf
                            <input type="hidden" name="infrastructure_id" value="{{$infrastructure->id}}">
                            <div class="form-group row">
                                <label for="descrip_infra" class="col-md-4 col-form-label text-md-right">Descripcion Infraestructura <i class="fas fa-building"></i> </label>
                                <div class="col-md-8">
                                    <input name="descrip_infra" type="text" id="descrip_infra" value="{{$infrastructure->description}}">

                                    @if ($errors->has('descrip_infra'))
                                        <span class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('descrip_infra') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success"> Editar Infraestructura <i class="fas fa-undo"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
