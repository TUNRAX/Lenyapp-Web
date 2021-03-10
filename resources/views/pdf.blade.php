<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-color: white;
            font-family: Arial;
        }

        #main-container {
            margin: 150px auto;
            width: 600px;
        }

        table {
            background-color: white;
            text-align: left;
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            padding: 20px;
        }

        thead {
            background-color: white;
            border-bottom: solid 5px #0F362D;
            color: black;
        }

        tr:nth-child(even) {
            background-color: #ddd;
        }

        tr:hover td {
            background-color: #369681;
            color: white;
        }
    </style>
</head>

<body>
    <h1>Reporte de ganancias</h1>
    <br>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Fecha envio</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Medida</th>
                    <th>Cantidad</th>
                    <th>Cliente</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>

                @foreach($entregas as $entrega)

                <tr> @method('PATCH')
                    @csrf
                    <td>{{$entrega->fecha_envio}}</td>

                    @foreach($tipos->where('id', $entrega->tipo_producto_id) as $tipo)
                    <td>{{$tipo->nombre}}</td>
                    @endforeach

                    <td>{{$entrega->precio_unitario}}</td>
                    <td>{{$entrega->medida}}</td>
                    <td>{{$entrega->cantidad}}</td>

                    @foreach($clientes->where('id', $entrega->id_cliente) as $cliente)
                    <td>{{$cliente->nombre}}</td>

                    @endforeach
                    <td>{{$entrega->precio_unitario * $entrega->cantidad}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h2>Ganancias totales: ${{$total}}</h2>
    </div>
</body>

</html>