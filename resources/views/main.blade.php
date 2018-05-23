<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
        @yield('css')
        <title>@yield('title') | xy2z Blog</title>

        <style>
            body, html {
                margin: 0;
                padding: 0;
                font-size: 15px;
            }

            body {
                font-family: Tahoma;
            }

            * {
                box-sizing: border-box;
            }

            header {
                background: #444;
                /*color: #eee;*/
                text-align: center;
                font-size: 32px;
                padding: 1em 0;
            }

            header a {
                color: #eee;
            }

            nav {
                display: flex;
                justify-content: center;
                background: #eee;
            }

            nav a {
                display: block;
                padding: 10px 20px;
            }

            .container {
                padding: 20px;
                width: 700px;
                margin: 0 auto;
            }

            a {
                color: #07f;
                text-decoration: none;
            }

            a:hover {
                text-decoration: underline;
            }

            hr {
                width: 100%;
                border: 0;
                height: 1px;
                background: #ccc;
            }

            input {
                width: 100%;
            }

            textarea {
                width: 100%;
                height: 400px;
            }

            .date {
                font-size: 0.8em;
                color: #999;
            }

            .admin_bar {
                background: #ffc;
                padding: 8px;
                font-size: 0.9em;
                opacity: 0.6;
            }

            .admin_bar:hover {
                opacity: 1;
            }

            @media only all and (max-width: 700px) {
                .container {
                    width: 100%;
                }
            }
        </style>
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

        @yield('scripts')
    </body>

</html>
