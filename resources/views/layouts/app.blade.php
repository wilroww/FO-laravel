<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ToothWorks')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montez&family=Alice&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
</head>
<body>
    <nav class="navbar">
        <div class="nav-left">
            <a href="{{ route('home') }}">Home</a>
            <div class="dropdown-container">
                <a href="{{ route('shop.index') }}">Shop All▾</a>
                <div class="dropdown">
                    <a href="{{ route('shop.category', 'daily-care') }}">Daily Care</a>
                    <a href="{{ route('shop.category', 'fresh-breath') }}">Fresh Breath</a>
                    <a href="{{ route('shop.category', 'dental-tools') }}">Dental Tools</a>
                </div>
            </div>
            <a href="{{ route('about') }}">About</a>
        </div>

        <div class="logo"><h1>ToothWorks</h1></div>

        <div class="nav-right">
            <a href="{{ route('cart.index') }}"><i class="bi bi-bag"></i></a>
            <div class="profile-dropdown">
                <a href="#" class="profile-icon"><i class="bi bi-person-circle"></i></a>
                <div class="profile-menu">
                    <a href="{{ route('login') }}">Login</a>
                    <a href="#">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer>
        <h2>ToothWorks</h2>
        <p>Smile Brighter, Live Happier</p>
        <h4>&copy; {{ date('Y') }} ToothWorks Dental Clinic. All Rights Reserved.</h4>
    </footer>

    @yield('scripts')
</body>
</html>