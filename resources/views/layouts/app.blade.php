<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livraria - Spassu</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="navbar">
        <div class="nav-logo">
            <img src="{{ asset('images/spassu.png') }}" alt="Logo">
        </div>
        <div class="nav-text">
            Livraria - Spassu
        </div>
    </div>

    <div class="sidebar">
        <ul>
            <li><a href="/autores">Autores</a></li>
            <li><a href="/assuntos">Assuntos</a></li>
            <li><a href="/livros">Livros</a></li>
            <li><a href="/relatorios">Relatórios</a></li>
        </ul>
    </div>

    <div class="content">
        @yield('content')
    </div>
</body>

</html>
