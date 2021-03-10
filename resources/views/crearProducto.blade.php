@extends('layouts.app')

@section('content')
<div class="container">
    <h1>para crear los productos</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('producto.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    Tipo de leña:
                    <select class="form-control" name="tipo_producto">
                        <option disabled selected>Selecciona un tipo de leña</option>
                        @foreach($tipos as $tipo)
                        <option value="{{$tipo->id}}">{{$tipo->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    Medida:
                    <select class="form-control" name="medida">
                        <option disabled selected>Selecciona una medida</option>
                        <option>Metro</option>
                        <option>1/2 Metro</option>
                        <option>1/4 Metro</option>
                        <option>Saco</option>
                        <option>Astilla</option>
                    </select>
                </div>
                <div class="form-group">
                    Precio unitario:
                    <input type="number" class="form-control" name="precio_unitario">
                </div>
                <div class="form-group">
                    Venta minima:
                    <input type="number" class="form-control" name="venta_minima">
                </div>

                <div class="form-group">Fotos:</div>
                <input type="file" name="imagenes[]" multiple id="imagen" class="btn btn-default">
<br>
                <input type="submit" class="btn btn-success" value="Guardar">
            </div>
    </form>
</div>

@endsection