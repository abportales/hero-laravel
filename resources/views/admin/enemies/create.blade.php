@extends('layout.app')

@section('content')
    <h1>Crear nuevo enemigo</h1>
    <form action="{{ route('enemy.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.enemies.form')
        <button type="submit" class="btn btn-primary my-2">Crear</button>
    </form>
@endsection
