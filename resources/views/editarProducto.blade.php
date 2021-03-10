@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Editar producto</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
    @endif

    <form action="{{ route('producto.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    Tipo de leña:
                    <select class="form-control" name="tipo">
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
                    <input type="number" class="form-control" value="{{$producto->precio_unitario}}" name="precio_unitario">
                </div>
                <div class="form-group">
                    Venta minima:
                    <input type="number" class="form-control" value="{{$producto->venta_minima}}" name="venta_minima">
                </div>

                <div class="form-group">Fotos:</div>
                <div class="row">
                    @foreach($imagenes as $img)
                    <div class="col-md-3">
                        <a href="{{route('borrarImagen',$img->id)}}"><i class="fas fa-times"></i>Eliminar</a>
                        <img src="{{URL::asset('img/'.$img->nombre.'.jpg')}}" alt="">

                    </div>
                    @endforeach
                </div>
<br>
                <input type="file" name="imagenes[]" multiple id="imagen" class="btn btn-default">
                <!--falta setear las fotos -->
                <br>
                <input type="submit" class="btn btn-success" value="Guardar">
            </div>
        </div>

    </form>
</div>

@endsection