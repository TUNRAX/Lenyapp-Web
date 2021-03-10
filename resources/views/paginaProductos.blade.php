@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Productos </h1>
    <a href="{{route('producto.index')}}" class="btn btn-success">Agregar nuevos productos</a>
    <div class="row">
    @foreach($productos as $producto)
        @foreach($imagenes->where('id_detalle_producto', $producto->id)->take(1) as $img)
        <form action="{{route('producto.destroy', $producto->id)}}" method="POST">
            @method('DELETE')
            @csrf
            <div class="col-md-3 mr-2 my-2">
                <div class="card" style="width: 30rem;">
                    <img class="card-img-top img-responsive img-fluid" src="img/{{$img->nombre.'.jpg'}}" alt="Card image cap">
                    <div class="card-body">
                    @foreach($tipos->where('id', $producto->tipo_producto_id) as $tipo)
                        <h5 class="card-title">{{$tipo->nombre}}</h5>
                        @endforeach
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Precio: ${{$producto->precio_unitario}} por {{$producto->medida}}</li>
                            <li class="list-group-item">Reparto a partir de: {{$producto->venta_minima}} metros</li>
                        </ul>
                        <br>
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('producto.edit', $producto->id) }}" class="btn btn-primary float-left">Editar</a>
                                <button class="btn btn-danger float-right" type="submit">Eliminar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </form>

        @endforeach
        @endforeach
    </div>
</div>

<style>
    .card-img-top {
        width: 100%;
        height: 40vh;
        object-fit: cover;
    }
</style>



@endsection