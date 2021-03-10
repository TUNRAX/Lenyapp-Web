@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear nuevo tipo de producto</h1>
    <br>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="{{route('tipo_producto.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-5">
                <div class="form-group">
                    Nombre tipo de producto:
                    <input type="text" class="form-control" name="nombre">
                </div>
                <br>
                <input type="submit" class="btn btn-success">
            </div>
    </form>
</div>

@endsection