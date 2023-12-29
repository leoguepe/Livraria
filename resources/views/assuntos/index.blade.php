@extends('layouts.app')

@section('content')
    <h1>Lista de Assuntos</h1><br>
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

    <a href="{{ route('assuntos.create') }}" class="btn btn-primary mb-3">Cadastrar Novo Assunto</a>

    <form action="{{ route('assuntos.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" class="form-control" name="search" placeholder="Pesquisar por assunto"
                value="{{ request('search') }}" autocomplete="off">
            <button type="submit" class="btn btn-primary">Pesquisar</button>
        </div>
    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Código do Assunto</th>
                <th>Descrição</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($assuntos as $assunto)
                <tr>
                    <td class="align-middle">{{ $assunto->CodAs }}</td>
                    <td class="align-middle">{{ $assunto->Descricao }}</td>
                    <td class="text-center align-middle">
                        <a href="{{ route('assuntos.edit', $assunto->CodAs) }}" class="btn btn-primary">
                            Editar
                        </a>
                    </td>
                    <td class="text-center align-middle">
                        <form action="{{ route('assuntos.destroy', $assunto->CodAs) }}" method="POST"
                            onsubmit="return confirm('Tem certeza que deseja excluir este assunto?');">
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
