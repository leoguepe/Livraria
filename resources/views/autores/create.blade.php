@extends('layouts.app')

@section('content')
    <h1>Cadastro de Autor</h1>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('autores.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Autor</label>
            <input type="text" class="form-control" id="nome" name="Nome" required>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        <a href="{{ route('autores.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
