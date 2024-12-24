<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>

<body>
    <div class="container">
        <nav class="nav">
            <div class="nav__logo">
                <img width="55" height="55" src="{{ asset('images/nav__logo.png') }}" alt="логотип">
            </div>
            @auth
                <ul class="nav__links">
                    <li><a href="{{ route('admin.poster') }}">Афиша</a></li>
                    <li><a href="{{ route('admin.news') }}">Новости</a></li>
                </ul>
                <a href="{{ route('logout') }}" class="nav__link">Выход</a>
            @endauth
            @guest
                <ul class="nav__links">
                    <li><a href="{{ route('index') }}">Главная</a></li>
                    <li><a href="{{ route('events') }}">Афиша</a></li>
                    <li><a href="{{ route('posts') }}">Новости</a></li>
                    <li><a href="{{ route('modal-theater') }}">О театре</a></li>
                </ul>
                <a href="{{ route('signin') }}" class="nav__link">Вход</a>
            @endguest
        </nav>
    </div>
    {{ $slot }}
</body>

</html>
