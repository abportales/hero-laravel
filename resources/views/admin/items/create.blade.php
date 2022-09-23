@extends('layout.app')

@section('content')
    <h1>Crear un item</h1>
    <form action="{{ route('item.store') }}" method="POST">
        @include('admin.items.form')
        <button type="submit" class="btn btn-primary my-2">Crear</button>
    </form>
@endsection
