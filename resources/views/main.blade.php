<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link rel="stylesheet" type="text/css" href="css/style.css"> -->
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
                padding-top: 20px;
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
                border: 0;
                height: 1px;
                background: #ccc;
            }

            .date {
                font-size: 0.8em;
                color: #999;
            }
        </style>
    </head>

    <body>
        <header>
            <a href="/">xy2z Laravel 5.6 Blog</a>
        </header>

        <nav>
            <a href="/">Home</a>
            <a href="/news/create">Create Post</a>
        </nav>

        <div class="container">
            @yield('content')

            <script>
                window.onload = function() {
                }
            </script>
        </div>
    </body>

</html>
