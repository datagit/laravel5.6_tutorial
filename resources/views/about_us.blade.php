<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">


    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    <form action="/about-us" method="POST">
                        {{ csrf_field() }}

                        <div>
                            Name: <input type="text" name="name">
                        </div>

                        <div>
                            <input type="checkbox" value="yes" name="terms"> Accept Terms
                        </div>

                        <div>
                            <input type="submit" value="Register">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
