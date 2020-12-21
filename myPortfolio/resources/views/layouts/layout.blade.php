<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title')</title>
        
        <script src="{{ asset('js/app.js') }}" defer></script>        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    </head>
    <body>
        <div id="app">
            <nav class="navbar bg-secondary">
                <div class="container">
                @if(Auth::check())
                    <a class="text-white">ようこそ {{ Auth::user()->name }}さん</a>
                    |
                    <a class="text-white" href="{{ url('/todo') }}">タスク一覧</a>
                    |
                    <a class="text-white" href={{ route('logout') }} onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">ログアウト</a>
                    <form id="logout-form" action={{ route('logout') }} method="POST" style="display: none;">
                    @csrf
                    </form>
                    |
                @else
                    <a class="text-white" href="{{ route('login') }}">ログイン</a>
                    |
                    <a class="text-white" href="{{ route('register') }}">会員登録</a>
                @endif
                    
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                        </ul>
                    </div>
                </div>
            </nav>

            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </body>
</html>