{{-- resources/views/autores/index.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Livros</h1>
    @foreach ($livros as $livro)
        <div>
            <p>{{ $livros->titulo }}</p>
            {{-- Outros detalhes do autor --}}
        </div>
    @endforeach
@endsection
