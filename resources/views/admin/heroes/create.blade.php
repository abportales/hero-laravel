@extends('layout.app')

@section('content')
    <h1>Crear nuevo héroe</h1>
    <form action="{{ route('heroes.store') }}" method="POST" enctype="multipart/form-data">
        @include('admin.heroes.form')
        <button type="submit" class="btn btn-primary my-2">Crear</button>
    </form>
@endsection
