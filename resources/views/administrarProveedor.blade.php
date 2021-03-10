@extends('layouts.app')

@section('content')

<div class="container">

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Nombre de empresa</th>
                    <th>RUT</th>
                    <th>Direccion</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach($usuarios as $usuario)
                @foreach($proveedores->where('id_usuario', $usuario->id) as $proveedor)
                

                <tr> @method('PATCH')
                    @csrf
                    <td>{{$proveedor->nombre}}</td>
                    <td>{{$proveedor->apellido}}</td>
                    <td>{{$proveedor->nombre_empresa}}</td>
                    <td>{{$proveedor->rut}}</td>
                    <td>{{$proveedor->direccion}}</td>

                    <td>@if($usuario->activo == 0 || $usuario->activo == null)
                        Inactivo
                        @endif
                        @if($usuario->activo == 1)
                        Activo
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('cambiarEstado', $usuario->id) }}" class="btn btn-primary">Cambiar estado</a>
                    </td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
<br>
    {{ $proveedores->links() }}



</div>



@endsection