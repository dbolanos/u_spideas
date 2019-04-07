@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Evento</div>
                    <div class="card-body">
                        <form action="{{route('update.event')}}" method="POST">
                            @csrf
                            <input type="hidden" name="event_id" value="{{$event->id}}">
                            <div class="form-group row">
                                <label for="descrip_event" class="col-md-4 col-form-label text-md-right">Descripcion Evento <i class="fas fa-calendar-alt"></i> </label>
                                <div class="col-md-8">
                                    <input name="descrip_event" type="text" id="descrip_event" value="{{$event->description}}">

                                    @if ($errors->has('descrip_event'))
                                        <span class="alert alert-danger" role="alert">
                                        <strong>{{ $errors->first('descrip_event') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success"> Editar Evento <i class="fas fa-undo"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
