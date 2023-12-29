@extends('layouts.app')

@section('content')
    <h1>Cadastrar Livro</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('livros.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" id="titulo" name="Titulo" required>
        </div>

        <div class="form-group">
            <label for="editora">Editora:</label>
            <input type="text" class="form-control" id="editora" name="Editora" required>
        </div>

        <div class="form-group">
            <label for="edicao">Edição:</label>
            <input type="number" class="form-control" id="edicao" name="Edicao" required>
        </div>

        <div class="form-group">
            <label for="anoPublicacao">Ano de Publicação:</label>
            <input type="text" class="form-control" id="anoPublicacao" name="AnoPublicacao" required>
        </div>


        <div class="form-group">
            <label for="valor">Valor (R$):</label>
            <input type="text" class="form-control" id="valor" name="Valor" required>
        </div>

        <div class="form-group">
            <label>Autores:</label>
            <div class="scrollable-checkbox-list">
                @foreach ($autores as $autor)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="autores[]" value="{{ $autor->CodAu }}"
                            id="autor{{ $autor->CodAu }}">
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
                            id="assunto{{ $assunto->CodAs }}">
                        <label class="form-check-label" for="assunto{{ $assunto->CodAs }}">
                            {{ $assunto->Descricao }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
@endsection

<script>
    document.getElementById('anoPublicacao').addEventListener('change', function(e) {
        var year = e.target.value.split('-')[0];
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var valorInput = document.getElementById('valor');
        if (valorInput) {
            valorInput.addEventListener('input', function(e) {
                var value = e.target.value;
                e.target.value = value;
            });
        }
    });
</script>
