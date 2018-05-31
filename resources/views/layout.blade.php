<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
        @yield('css')
        <title>@yield('title') | {{ env('APP_NAME') }}</title>

        <link href="https://fonts.googleapis.com/css?family=Montserrat:500" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="/css/layout.css">
        <link rel="stylesheet" type="text/css" href="/css/footer.css">
        <link rel="stylesheet" type="text/css" href="/css/errors.css">
        <link rel="alternate" type="application/rss+xml" href="{{ URL::route('feed') }}" />
    </head>

    <body>
        <header>
            <a href="/">{{ env('APP_NAME') }}</a>
            <nav>
                <a href="/">Home</a>
                <a target="_blank" href="/feed">Feed</a>
                @if (Auth::check())
                    <a href="/news/create">Create Post</a>
                    <a href="/news/unpublished">Unpublished</a>
                    <a href="/logout">Logout ({{ Auth::user()->name }})</a>
                @endif
            </nav>
        </header>

        @if ($flash = session('message'))
            <div class="flash">
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
