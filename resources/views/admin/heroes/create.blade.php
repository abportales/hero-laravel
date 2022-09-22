@extends('layout.app')

@section('content')
    <h1>Crear nuevo héroe</h1>
    <form action="{{ route('heroes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" id="exampleInputEmail1" required name="name"
                placeholder="Ingrese el nombre del héroe">
        </div>
        <div class="form-group">
            <label for="name">HP</label>
            <input type="number" class="form-control" id="exampleInputEmail1" required name="hp"
                placeholder="Ingrese los puntos de vida del héroe">
        </div>
        <div class="form-group">
            <label for="name">Ataque</label>
            <input type="number" class="form-control" id="exampleInputEmail1" required name="atq"
                placeholder="Ingrese los puntos de ataque del héroe">
        </div>
        <div class="form-group">
            <label for="name">Defensa</label>
            <input type="number" class="form-control" id="exampleInputEmail1" required name="def"
                placeholder="Ingrese los puntos de Defensa del héroe">
        </div>
        <div class="form-group">
            <label for="name">Suerte</label>
            <input type="number" class="form-control" id="exampleInputEmail1" required name="luck"
                placeholder="Ingrese los puntos de Suerte del héroe">
        </div>
        <div class="form-group">
            <label for="name">Monedas</label>
            <input type="number" class="form-control" id="exampleInputEmail1" required name="coins"
                placeholder="Ingrese la cantidad de Monedas del héroe">
        </div>
        <button type="submit" class="btn btn-primary my-2">Crear</button>
    </form>
@endsection
