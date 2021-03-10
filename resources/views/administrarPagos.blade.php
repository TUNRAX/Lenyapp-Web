@extends('layouts.app')

@section('content')

<div class="container">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pagos as $pago)
                <tr> @method('PATCH')
                    @csrf
                    <td>{{$pago->id}}</td>
                    <td>{{$pago->nombre}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $pagos->links() }}
</div>

@endsection