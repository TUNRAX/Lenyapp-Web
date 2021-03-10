@extends('layouts.app')

@section('content')
<div class="container">
    <a href="{{ route('reporteCliente') }}" class="btn btn-primary">Generar reporte</a>
    <br>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Fecha</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Medida</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>

                @foreach($compras as $compra)
                @foreach($productos->where('id', $compra->id_detalle_producto) as $producto)
                @endforeach

                <tr> @method('PATCH')
                    @csrf
                    <td>{{$compra->fecha}}</td>
                    @foreach($tipos->where('id', $compra->tipo_producto_id) as $tipo)
                    <td>{{$tipo->nombre}}</td>
                    @endforeach


                    <td>{{$producto->precio_unitario}}</td>
                    <td>{{$producto->medida}}</td>
                    <td>{{$compra->cantidad}}</td>

                    <td>{{$producto->precio_unitario * $compra->cantidad}}</td>


                    <td>
                        @if($compra->estado == 3)
                        En espera
                        @endif
                        @if($compra->estado == 2)
                        Cancelado
                        @endif
                        @if($compra->estado == 1)
                        Confirmado
                        @endif
                    </td>
                    <td>
                        @if($compra->estado==3)
                        <a href="{{ route('cambiarEstadoCompra', $compra->he_id) }}" class="btn btn-danger">Cancelar</a>
                        @endif
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $compras->links() }}

</div>


@endsection