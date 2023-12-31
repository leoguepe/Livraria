{{-- resources/views/livros/index.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>Lista de Livros</h1><br>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 3000);
        </script>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>

        <script>
            setTimeout(function() {
                $('.alert-danger').fadeOut('slow');
            }, 3000);
        </script>
    @endif

    <a href="{{ route('livros.create') }}" class="btn btn-primary mb-3">Cadastrar Novo Livro</a>

    <form action="{{ route('livros.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Pesquisar por título do livro"
                value="{{ request('search') }}" autocomplete="off">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
    </form>

    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Autores</th>
                <th>Assuntos</th>
                <th>Editora</th>
                <th>Edição</th>
                <th>Ano de Publicação</th>
                <th>Valor</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($livros as $livro)
                <tr>
                    <td class="align-middle">{{ $livro->Titulo }}</td>
                    <td class="align-middle">{{ $livro->autores->pluck('Nome')->join(', ') }}</td>
                    <td class="align-middle">{{ $livro->assuntos->pluck('Descricao')->join(', ') }}</td>
                    <td class="align-middle">{{ $livro->Editora }}</td>
                    <td class="align-middle">{{ $livro->Edicao }}</td>
                    <td class="align-middle">{{ $livro->AnoPublicacao }}</td>
                    <td class="align-middle">R${{ $livro->Valor }}</td>

                    <td class="text-center align-middle">
                        <a href="{{ route('livros.edit', $livro->Codl) }}" class="btn btn-primary">
                            Editar
                        </a>
                    </td>
                    <td class="text-center align-middle">
                        <form action="{{ route('livros.destroy', $livro->Codl) }}" method="POST"
                            onsubmit="return confirm('Tem certeza que deseja excluir este livro?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
