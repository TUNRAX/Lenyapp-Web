@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{route('tipo_producto.index')}}" class="btn btn-success">Agregar nuevos tipos de producto</a>
    <br>
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                @foreach($tipos as $tipo)
                <tr> @method('PATCH')
                    @csrf
                    <td>{{$tipo->id}}</td>
                    <td>{{$tipo->nombre}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $tipos->links() }}
</div>




@endsection