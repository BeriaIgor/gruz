<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }}</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,500&amp;subset=cyrillic" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
</head>
<body>
<div id="app">
    @section('navbar')
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <div class="logo"></div>
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav" id="main-menu">
                        <li class="nav-item">
                            <a class="nav-link" href="/">
                                Поиск
                                <span></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('get.logs') }}">
                                Логи
                                <span></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    @show

    @yield('content')
</div>

<script src="js/app.js"></script>

</body>
</html>
