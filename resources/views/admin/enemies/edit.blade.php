@extends('layout.app')

@section('content')
    <h1>Editar Enemigo: {{$enemy->name}}</h1>
    <form action="{{ route('enemy.update', $enemy->id) }}" method="POST">
        @method('PUT')
        @include('admin.enemies.form')
        <button type="submit" class="btn btn-warning my-2">Editar</button>
    </form>
@endsection
