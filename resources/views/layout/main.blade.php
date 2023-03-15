<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    @yield('title')
</head>
<body>
    <header class="container">
        <span class="logo">Blog Spot</span>

                <a href="/"><h6 data-name="home">Home</h6></a>

                <h6 data-name="About">About</h6>

                <h6 data-name="contact">contact</h6>
        @guest
                <a href="/login"><h6 data-name="Login">Login</h6></a>

                <a href="/register"><h6 data-name="Register">Register</h6></a>
        @else
                <a href="/user"><h6 data-name="{{Auth::user()->name}}">{{Auth::user()->name}}</h6></a>
                <a href="/article/add"><h6 data-name="NewPost">NewPost</h6></a>
            <form action="/logout" method="POST">
                @csrf
                <button type="submit">Выйти</button>
            </form>

        @endguest

    </header>

    <main class="container">
        @include('blocks.messages')
        @yield('content')
    </main>

    <footer>Все права защищены</footer>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
