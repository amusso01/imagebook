<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Image Book') }}</title>

       <!-- Styles -->
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    </head>
    <body>

            {{-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif --}}

            {{-- @if(isset(Auth::user()->email))
               <script>window.location="/home"</script>
            @endif --}}

            @include('inc.topBar')
        <div class="container">
            @yield('content')
        </div>
        <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
