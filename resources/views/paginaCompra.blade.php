@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6" style="margin-bottom: -10%;">
            @if($imagenes)
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    @foreach( $imagenes as $img )
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <img class="d-block img-fluid" src="{{URL::asset('img/'.$img->nombre.'.jpg')}}" alt="">
                    </div>
                    @endforeach
                </div>

            </div>
            @else
            @endif

        </div>
        <div class="col-md-6">
            <form action="{{route('comprar')}}" method="POST">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h3>Detalles del producto</h3>
                        <br>
                        <div class="row">
                            <div class="col-md-4">Tipo de leña:</div>
                            @foreach($tipos->where('id', $producto->tipo_producto_id) as $tipo)
                            <h5 class="card-title">{{$tipo->nombre}}</h5>
                            @endforeach

                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">Precio:</div>
                            <div class="col-md-4">{{$producto->precio_unitario}} por {{$producto->medida}}</div>
                            <input type="hidden" value="{{$producto->precio_unitario}}" id="precio">
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-4">Venta minima:</div>
                            <div class="col-md-4">A partir de {{$producto->venta_minima}}  </div>
                            <input type="hidden" value="{{$producto->venta_minima}}" id="venta_minima">
                            
                        </div>
                        <br>
                        <div class="row form-group">
                            <div class="col-md-4">Cantidad:</div>
                            <div class="col-md-4">
                                <input class="form-control" type="number" name="cantidad" id="cantidad">
                            </div>
                            
                            <input type="hidden" value="{{$producto->id}}" name="id">
                        </div>
                        <br>
                        <div class="row form-group">
                            <div class="col-md-4">Total:</div>
                            <div class="col-md-4">
                                <input class="form-control" type="text" id="total" disabled>
                            </div>
                        </div>
                        <br>
                        <input type="submit" class="btn btn-success float-right" id="comprar" value="Comprar" disabled>
                        <a href="{{ URL::previous() }}" class="btn btn-danger float-left">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
    .carousel,
    .carousel-inner>.item>img {
        height: 100px;
    }
</style>

@endsection