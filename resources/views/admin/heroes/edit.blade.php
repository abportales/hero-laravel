@extends('layout.app')

@section('content')
    <h1>Editar héroe: {{$hero->name}}</h1>
    <form action="{{ route('heroes.update', $hero->id) }}" method="POST">
        @method('PUT')
        {{-- forma de incluir vistas dentro de vistas --}}
        @include('admin.heroes.form') 

        <button type="submit" class="btn btn-warning my-2">Editar</button>
    </form>
@endsection
