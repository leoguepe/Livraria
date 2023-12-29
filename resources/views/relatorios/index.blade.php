@extends('layouts.app')

@section('content')
    <h1>Relatórios de Livros</h1>

    <form action="{{ route('relatorios.index') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-3">
                <label for="titulo">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Pesquisar por título"
                    value="{{ request('titulo') }}">
            </div>
            <div class="col-md-3">
                <label for="editora">Editora:</label>
                <select class="form-control" name="editora" id="editora">
                    <option value="">Selecionar Editora</option>
                    @foreach ($editorasList as $editora)
                        <option value="{{ $editora }}" {{ request('editora') == $editora ? 'selected' : '' }}>
                            {{ $editora }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="autores">Autores:</label>
                <select class="form-control" name="autores" id="autores">
                    <option value="">Selecionar Autor</option>
                    @foreach ($autoresList as $autorId => $autorNome)
                        <option value="{{ $autorNome }}" {{ request('autores') == $autorNome ? 'selected' : '' }}>
                            {{ $autorNome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <label for="assuntos">Assuntos:</label>
                <select class="form-control" name="assuntos" id="assuntos">
                    <option value="">Selecionar Assunto</option>
                    @foreach ($assuntosList as $assuntoId => $assuntoDesc)
                        <option value="{{ $assuntoDesc }}" {{ request('assuntos') == $assuntoDesc ? 'selected' : '' }}>
                            {{ $assuntoDesc }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Filtrar</button>

        @if (
            $filtrosAplicados['titulo'] ||
                $filtrosAplicados['editora'] ||
                $filtrosAplicados['autores'] ||
                $filtrosAplicados['assuntos']
        )
            <a href="{{ route('relatorios.download') }}" class="btn btn-secondary mt-3">Download PDF</a>
        @endif
    </form>

    @if (count($relatorios) > 0)
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Editora</th>
                    <th>Edição</th>
                    <th>Ano de Publicação</th>
                    <th>Valor</th>
                    <th>Autores</th>
                    <th>Assuntos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($relatorios as $relatorio)
                    <tr>
                        <td>{{ $relatorio->Titulo }}</td>
                        <td>{{ $relatorio->Editora }}</td>
                        <td>{{ $relatorio->Edicao }}</td>
                        <td>{{ $relatorio->AnoPublicacao }}</td>
                        <td>{{ number_format($relatorio->Valor, 2, ',', '.') }}</td>
                        <td>{{ $relatorio->Autores }}</td>
                        <td>{{ $relatorio->Assuntos }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Nenhum registro encontrado.</p>
    @endif
@endsection
