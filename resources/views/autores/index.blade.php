{{-- resources/views/autores/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Autores</h1>
    @foreach ($autores as $autor)
        <div>
            <p>{{ $autor->nome }}</p>
            {{-- Outros detalhes do autor --}}
        </div>
    @endforeach

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection
