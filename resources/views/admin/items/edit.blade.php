@extends('layout.app')

@section('content')
    <h1>Editar item: {{ $item->name }}</h1>
    <form action="{{ route('item.update', $item->id) }}" method="POST">
        @method('PUT')
        @include('admin.items.form')
        <button type="submit" class="btn btn-warning my-2">Editar</button>
    </form>
@endsection
