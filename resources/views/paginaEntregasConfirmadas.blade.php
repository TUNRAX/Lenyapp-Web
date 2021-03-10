@extends('layouts.app')

@section('content')

<div class="container">
    <h1>Buscar ventas entre fechas</h1>
    <br>
    <form action="{{route('entregaFechas')}}" method="POST">
        @csrf
        <div class="row">
            buscar desde:
            <div class="col-md-3">
                <input class="date form-control" value="{{ old('fecha1', date('d-m-Y')) }}" type="date" name="fecha1" required>
            </div>
            hasta
            <div class="col-md-3">
                <input class="date form-control" value="{{ old('fecha2', date('d-m-Y')) }}" type="date" name="fecha2" required>
            </div>
            <input type="submit" class="btn btn-success" value="Buscar">
        </div>
    </form>
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
                    <th>Hora</th>
                    <th>Cliente</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>

                @foreach($entregas as $entrega)

                <tr> @method('PATCH')
                    @csrf
                    <td>{{$entrega->fecha}}</td>

                    @foreach($tipos->where('id', $entrega->tipo_producto_id) as $tipo)
                    <td>{{$tipo->nombre}}</td>
                    @endforeach

                    <td>{{$entrega->precio_unitario }}</td>
                    <td>{{$entrega->medida}}</td>
                    <td>{{$entrega->cantidad}}</td>

                    <td>{{$entrega->hora}}</td>
                    @foreach($clientes->where('id', $entrega->id_cliente) as $cliente)
                    <td>{{$cliente->nombre}}</td>
                    <td>{{$entrega->precio_unitario * $entrega->cantidad}}</td>
                    @endforeach

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <form action="{{route('imprimir')}}" method="POST">
        @csrf
        <input type="hidden" value="{{ $fecha1 ?? 'default' }}" name="fecha1">
        <input type="hidden" value="{{ $fecha2 ?? 'default' }}" name="fecha2">
        <input type="submit" class="btn btn-success" value="Exportar a PDF">
    </form>

</div>


@endsection