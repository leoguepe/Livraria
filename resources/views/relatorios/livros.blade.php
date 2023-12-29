<!DOCTYPE html>
<html>

<head>
    <title>Relatório de Livros</title>
</head>

<body>
    <h1>Relatório de Livros</h1>
    <table>
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
            @foreach ($dadosRelatorio as $livro)
                <tr>
                    <td>{{ $livro->Titulo }}</td>
                    <td>{{ $livro->Editora }}</td>
                    <td>{{ $livro->Edicao }}</td>
                    <td>{{ $livro->AnoPublicacao }}</td>
                    <td>{{ $livro->Valor }}</td>
                    <td>{{ $livro->Autores }}</td>
                    <td>{{ $livro->Assuntos }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
