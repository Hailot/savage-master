<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Master Tome">
    <meta name="author" content="Hailot">
    <title>Savage Masters Tome</title>


    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <meta name="theme-color" content="#563d7c">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/cover.css') }}" rel="stylesheet">
</head>
    <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">Savage Masters</h3>
                <nav class="nav nav-masthead justify-content-center">
                    @if (Route::has('login'))

                        @auth
                            <a class="nav-link" href="{{ url('/home') }}">Home</a>
                        @else
                            <a class="nav-link" href="{{ route('login') }}">Login</a>

                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth

                    @endif
                </nav>

            </div>
        </header>

        <main role="main" class="inner cover">
            <h1 class="cover-heading">The Library of Savage Masters</h1>
{{--            <p class="lead">Cover is a one-page template for building simple and beautiful home pages. Download, edit the text, and add your own fullscreen background photo to make it your own.</p>--}}
            <p class="lead">
                <img class="img-fluid" src="/img/tomeLogo_512x512.png">
{{--                <a href="#" class="btn btn-lg btn-secondary">Learn more</a>--}}
            </p>
        </main>
        @include('cookieConsent::index')

        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p>The best savagery in the world</p>
            </div>
        </footer>
    </div>
    </body>

</html>
