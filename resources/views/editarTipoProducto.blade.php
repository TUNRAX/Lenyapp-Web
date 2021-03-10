@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Editar tipo producto</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif

    <form action="{{ route('tipo_producto.update', $tipoProducto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    Nombre:
                    <input type="number" class="form-control" value="{{$tipoProducto->nombre}}" name="nombre">
                </div>
                <input type="submit" class="btn btn-success">
            </div>
        </div>

    </form>
</div>

@endsection