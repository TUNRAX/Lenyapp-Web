@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ route('reporteProveedor') }}" class="btn btn-primary">Generar reporte</a>
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
                    <th>Cliente</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>

                @foreach($entregas as $entrega)
                @foreach($clientes->where('id', $entrega->id_cliente) as $cliente)
                @endforeach
                @foreach($productos->where('id', $entrega->id_detalle_producto) as $producto)
                @endforeach

                <tr> @method('PATCH')
                    @csrf
                    <td>{{$entrega->fecha}}</td>

                    @foreach($tipos->where('id', $producto->tipo_producto_id) as $tipo)
                    <td>{{$tipo->nombre}}</td>
                    @endforeach

                    <td>{{$producto->precio_unitario}}</td>
                    <td>{{$producto->medida}}</td>
                    <td>{{$entrega->cantidad}}</td>
                    <td>{{$cliente->nombre}}</td>
                    <td>
                        @if($entrega->estado == 3)
                        En espera
                        @endif
                        @if($entrega->estado == 2)
                        Cancelado
                        @endif
                        @if($entrega->estado == 1)
                        Confirmado
                        @endif
                    </td>


                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{ $entregas->links() }}

</div>

@endsection