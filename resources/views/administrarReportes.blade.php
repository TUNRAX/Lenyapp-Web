@extends('layouts.app')

@section('content')

<div class="container">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reportes as $reporte)
                <tr> @method('PATCH')
                    @csrf
                    <td>{{$reporte->id}}</td>
                    <td>{{$reporte->titulo}}</td>
                    <td>
                        <a href="{{ route('reportess.show', $reporte->id) }}" class="btn btn-primary">ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{ $reportes->links() }}
</div>




@endsection