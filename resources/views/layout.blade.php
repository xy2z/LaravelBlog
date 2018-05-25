<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
        @yield('css')
        <title>@yield('title') | xy2z Blog</title>

        <link href="https://fonts.googleapis.com/css?family=Montserrat:500" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/layout.css">
        <link rel="stylesheet" type="text/css" href="/css/footer.css">
        <link rel="stylesheet" type="text/css" href="/css/errors.css">
    </head>

    <body>
        <header>
            <a href="/">xy2z Laravel 5.6 Blog</a>
        </header>

        <nav>
            <a href="/">Home</a>
            <a target="_blank" href="/feed">Feed</a>
            @if (Auth::check())
                <a href="/news/create">Create Post</a>
                <a href="/logout">Logout ({{ Auth::user()->name }})</a>
            @endif
        </nav>

        @if ($flash = session('message'))
            <div class="alert">
                {{ $flash }}
            </div>
        @endif

        <div class="container">
            @yield('content')
        </div>

        <footer>
            Footer goes here.
        </footer>

        @yield('scripts')
    </body>

</html>
