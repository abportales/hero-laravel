@extends('layout.app')

@section('content')
    <h1>Editar héroe</h1>
    <form action="{{ route('heroes.update', ['id' => $hero->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" required name="name" value="{{ $hero->name }}"
                placeholder="Ingrese el nombre del héroe">
        </div>
        <div class="form-group">
            <label for="name">HP</label>
            <input type="number" class="form-control" required name="hp" value="{{ $hero->hp }}"
                placeholder="Ingrese los puntos de vida del héroe">
        </div>
        <div class="form-group">
            <label for="name">Ataque</label>
            <input type="number" class="form-control" required name="atq" value="{{ $hero->atq }}"
                placeholder="Ingrese los puntos de ataque del héroe">
        </div>
        <div class="form-group">
            <label for="name">Defensa</label>
            <input type="number" class="form-control" required name="def" value="{{ $hero->def }}"
                placeholder="Ingrese los puntos de Defensa del héroe">
        </div>
        <div class="form-group">
            <label for="name">Suerte</label>
            <input type="number" class="form-control" required name="luck" value="{{ $hero->luck }}"
                placeholder="Ingrese los puntos de Suerte del héroe">
        </div>
        <div class="form-group">
            <label for="name">Monedas</label>
            <input type="number" class="form-control" required name="coins" value="{{ $hero->coins }}"
                placeholder="Ingrese la cantidad de Monedas del héroe">
        </div>
        <button type="submit" class="btn btn-warning my-2">Editar</button>
    </form>
@endsection
