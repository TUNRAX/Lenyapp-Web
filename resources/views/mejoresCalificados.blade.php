@extends('layouts.app')

@section('content')

<div class="container">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Nombre empresa</th>
                    <th>Calificacion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($proveedores as $proveedor)
                <tr> 
                    <td>{{$proveedor->nombre}}</td>
                    <td>{{$proveedor->apellido}}</td>
                    <td>{{$proveedor->nombre_empresa}}</td>
                    <td>{{$proveedor->calificacion}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>




@endsection