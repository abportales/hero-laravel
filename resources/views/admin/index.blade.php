@extends('layout.app')

@section('content')
    <h1>Administrador</h1>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Entidad</th>
                <th scope="col">Cantidad de elementos</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($report as $item)
                <tr>
                    <th scope="row">{{ $item['name'] }}</th>
                    <td>{{ $item['counter'] }}</td>
                    <td>
                        <a class="btn {{ $item['class'] }}" href="{{ route($item['route']) }}">
                            Ir a {{ $item['name'] }}
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
