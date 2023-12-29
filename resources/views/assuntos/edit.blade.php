@extends('layouts.app')

@section('content')
    <h1>Editar Assunto</h1>

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('assuntos.update', $assunto->CodAs) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="descricao" name="Descricao" value="{{ $assunto->Descricao }}"
                required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('assuntos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
