@extends('layout.app')

@section('content')
    <h1>Lista de Enemigos</h1>

    <a class="btn btn-primary my-2" href="{{ route('enemy.create') }}">
        Crear
    </a>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">HP</th>
                <th scope="col">Ataque</th>
                <th scope="col">Defensa</th>
                <th scope="col">Monedas</th>
                <th scope="col">Experiencia</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enemies as $enemy)
                <tr>
                    <th scope="row">{{ $enemy->id }}</th>
                    <td>{{ $enemy->name }}</td>
                    <td>{{ $enemy->hp }}</td>
                    <td>{{ $enemy->atq }}</td>
                    <td>{{ $enemy->def }}</td>
                    <td>{{ $enemy->coins }}</td>
                    <td>{{ $enemy->xp }}</td>
                    <td>
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('enemy.edit', $enemy->id) }}" class="btn btn-warning">
                                    Modificar
                                </a>
                            </div>
                            <div class="col">
                                <form action="{{ route('enemy.destroy', $enemy->id ) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
