@extends('layouts.app')

@section('content')
    <h1>Editar Livro</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('livros.update', $livro->Codl) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" id="titulo" name="Titulo" value="{{ $livro->Titulo }}" required>
        </div>

        <div class="form-group">
            <label for="editora">Editora:</label>
            <input type="text" class="form-control" id="editora" name="Editora" value="{{ $livro->Editora }}" required>
        </div>

        <div class="form-group">
            <label for="edicao">Edição:</label>
            <input type="number" class="form-control" id="edicao" name="Edicao" value="{{ $livro->Edicao }}" required>
        </div>

        <div class="form-group">
            <label for="anoPublicacao">Ano de Publicação:</label>
            <select class="form-control" id="anoPublicacao" name="AnoPublicacao">
                @php
                    $anoAtual = date('Y');
                @endphp
                @for ($ano = $anoAtual; $ano >= 1900; $ano--)
                    <option value="{{ $ano }}" {{ $ano == $livro->AnoPublicacao ? 'selected' : '' }}>
                        {{ $ano }}
                    </option>
                @endfor
            </select>
        </div>

        <div class="form-group">
            <label for="valor">Valor (R$):</label>
            <input type="text" class="form-control" id="Valor" name="Valor" value="{{ $livro->Valor }}" required>
        </div>

        <div class="form-group">
            <label>Autores:</label>
            <div class="scrollable-checkbox-list">
                @foreach ($autores as $autor)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="autores[]" value="{{ $autor->CodAu }}"
                            id="autor{{ $autor->CodAu }}" {{ $livro->autores->contains($autor->CodAu) ? 'checked' : '' }}>
                        <label class="form-check-label" for="autor{{ $autor->CodAu }}">
                            {{ $autor->Nome }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="form-group">
            <label>Assuntos:</label>
            <div class="scrollable-checkbox-list">
                @foreach ($assuntos as $assunto)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="assuntos[]" value="{{ $assunto->CodAs }}"
                            id="assunto{{ $assunto->CodAs }}"
                            {{ $livro->assuntos->contains($assunto->CodAs) ? 'checked' : '' }}>
                        <label class="form-check-label" for="assunto{{ $assunto->CodAs }}">
                            {{ $assunto->Descricao }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('livros.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
@endsection
