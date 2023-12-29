@extends('layouts.app')

@section('content')
    <h1>Lista de Autores</h1><br>
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

    <a href="{{ route('autores.create') }}" class="btn btn-success mb-3">Cadastrar Novo Autor</a>

    <form action="{{ route('autores.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Pesquisar por nome do autor"
                value="{{ request('search') }}" autocomplete="off">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Código do Autor</th>
                <th>Nome</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($autores as $autor)
                <tr>
                    <td class="align-middle">{{ $autor->CodAu }}</td>
                    <td class="align-middle">{{ $autor->Nome }}</td>
                    <td class="text-center align-middle">
                        <a href="{{ route('autores.edit', $autor->CodAu) }}" class="btn btn-primary">
                            Editar
                        </a>
                    </td>
                    <td class="text-center align-middle">
                        <form action="{{ route('autores.destroy', $autor->CodAu) }}" method="POST"
                            onsubmit="return confirm('Tem certeza que deseja excluir este autor?');">
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
