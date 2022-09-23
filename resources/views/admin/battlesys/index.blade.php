@extends('layout.app')

@section('content')
    <h1>Sistema de batalla</h1>

    <div class="row text-center text-white mt-2">
        <div class="col bg-primary">
            <h2>{{ $hero }}</h2>
            <img src="{{ asset('images/heroes/' . $heroAvatar)  }}" alt="" height="150">
        </div>
        <div class="col-1 bg-warning">
            <h2>Vs.</h2>
        </div>
        <div class="col bg-danger">
            <h2>{{ $enemy }}</h2>
            <img src="{{ asset('images/enemies/' . $enemyAvatar)  }}" alt="" height="150">
        </div>
    </div>

    <div class="row text-center text-white my-2">
        <div class="col bg-info">
            <h2>Eventos de batalla</h2>
        </div>
    </div>

    @foreach ($events as $ev)
        <div role="alert"
            class="alert 
            @if ($ev['winner'] == 'hero') alert-success
                @else
                    alert-danger @endif">
            {{ $ev['text'] }}
        </div>
    @endforeach
@endsection
