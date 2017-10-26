<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Numidia jobs</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #b3daff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
                background-color: #80bfff;
                border-radius: 45px;
                color: black;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: black;
                padding: 0 25px;
                font-size: 25px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
                background-color: #4da9ff;
                border-radius: 80px;
            }

            .m-b-md {
                margin-bottom: 30px;
                font-size: 55px;
                font-family: serif;
            }

            .navbar-header {
            background-color: #555;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a class="btn btn-secondary"  style="font-size: 15px;"  href="profile/{{auth()->id()}}">{{ Auth::user()->name }} </a>

                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                  NUMIDIA JOBS
                </div>

                <div class="links">
                    <a class="btn btn-primary" href="/cvs">Cv's</a>
                    @auth
                    <a class="btn btn-secondary" href="/cvs/{{auth()->id()}}/cvs">My cvs</a>
                    <a class="btn btn-secondary" href="/cvs/create">New Cv</a>
                    @endauth
                </div>
            </div>
        </div>
    </body>
</html>
