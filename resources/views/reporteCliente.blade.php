@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card text-left">
        <form action="{{route('guardarReporteCliente')}}" method="POST">
            @csrf
            <div class="card-body">
                <h3 class="card-title">Generar reporte</h3>
                <div class="form-group">
                    <label for="titulo">Titulo:</label>
                    <input type="text" class="form-control" id="titulo" name="titulo">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripcion:</label>
                    <textarea class="form-control" rows="5" id="descripcion" name="descripcion"></textarea>
                </div>
                <input type="submit" class="btn btn-success float-left" value="Guardar">
            </div>
        </form>
    </div>
</div>


@endsection