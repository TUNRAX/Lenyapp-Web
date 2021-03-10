@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Mis datos personales</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif
    <form action="{{ route('proveedor.update', $proveedor->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="form-group col-md-6">
                <div>Nombre:</div>
                <input type="text" name="nombre" class="datos form-control" value="{{$proveedor->nombre}}" disabled>
            </div>
            <div class="form-group col-md-6">
                <div>Apellido:</div>
                <input type="text" name="apellido" class="datos form-control" value="{{$proveedor->apellido}}" disabled>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <div>Nombre de empresa:</div>
                <input type="text" name="nombre_empresa" class="datos form-control" value="{{$proveedor->nombre_empresa}}" disabled>
            </div>
            <div class="form-group col-md-6">
                <div>rut:</div>
                <input type="text" name="rut" class="form-control" value="{{$proveedor->rut}}" disabled>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <div>Direccion:</div>
                <input type="text" name="direccion" class="datos form-control" value="{{$proveedor->direccion}}" disabled>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <button type="submit" id="boton1" class="btn btn-success" style="display: none">Guardar</button>
            </div>
            <div class="col-md-3">
                <button type="button" id="boton" onclick="bloquear();" class="btn btn-danger" style="display: none">cancelar</button>
            </div>
        </div>
    </form>
    <br>
    <div class="row">
        <div class='col-md-3'>
            <button type="button" id="editar" onclick="activar();" class="btn btn-primary">Editar datos</button>
        </div>

    </div>
</div>

<script>
    function activar() {
        var inputs = document.getElementsByClassName('datos');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].disabled = false;
        }
        $('#editar').hide();
        $('#boton').show();
        $('#boton1').show();
    }

    function bloquear() {
        var inputs = document.getElementsByClassName('datos');
        for (var i = 0; i < inputs.length; i++) {
            inputs[i].disabled = true;
        }
        $('#editar').show();
        $('#boton').hide();
        $('#boton1').hide();
    }
</script>
@endsection