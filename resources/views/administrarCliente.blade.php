@extends('layouts.app')

@section('content')

<div class="container">

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Direccion</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach($usuarios as $usuario)
                @foreach($clientes->where('id_usuario', $usuario->id) as $cliente)
                

                <tr> @method('PATCH')
                    @csrf
                    <td>{{$cliente->nombre}}</td>
                    <td>{{$cliente->apellido}}</td>
                    <td>{{$cliente->direccion}}</td>

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
    {{ $clientes->links() }}

</div>



@endsection