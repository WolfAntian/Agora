<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Agora</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
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
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/u/' . $user->id) }}">
                            {{Auth::user()->name}}
                        </a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Agora
                </div>

                <table>
                    <tr>
                        <td><div class="links"><a href="/b/a">Anime</a></div></td>
                        <td><div class="links"><a href="/b/a">Video Games</a></div></td>
                        <td><div class="links"><a href="/b/a">TTRPG</a></div></td>
                        <td><div class="links"><a href="/b/a">Music</a></div></td>
                        <td><div class="links"><a href="/b/a">Kpop</a></div></td>
                    </tr>
                    <tr>
                        <td><div class="links"><a href="/b/a">Random</a></div></td>
                        <td><div class="links"><a href="/b/a">Cute</a></div></td>
                        <td><div class="links"><a href="/b/a">Politics</a></div></td>
                        <td><div class="links"><a href="/b/a">Meta</a></div></td>
                        <td><div class="links"><a href="/b/a">GitHub</a></div></td>
                    </tr>
                </table>
            </div>
        </div>
    </body>
</html>
