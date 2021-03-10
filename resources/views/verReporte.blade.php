@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card text-left">
        @csrf
        <div class="card-body">
            <h3 class="card-title">Reporte N°: {{$reporte->id}}</h3>
            <div class="form-group">
                <label for="titulo">Titulo:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="{{$reporte->titulo}}" disabled>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <textarea class="form-control" rows="5" id="descripcion" name="descripcion"  disabled>{{$reporte->descripcion}}</textarea>
            </div>
            <a class="btn btn-primary float-left" href="{{ URL::previous() }}">Volver</a>
        </div>
    </div>
</div>


@endsection