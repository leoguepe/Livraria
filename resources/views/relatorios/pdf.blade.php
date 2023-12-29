<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Relatório de Livros</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
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
</body>

</html>
