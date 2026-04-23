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
    @if(session('success'))
        <div class="alert-toast" style="position:fixed;top:90px;right:20px;background:#28a745;color:#fff;padding:12px 20px;border-radius:6px;z-index:99999;">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="alert-toast" style="position:fixed;top:90px;right:20px;background:#dc3545;color:#fff;padding:12px 20px;border-radius:6px;z-index:99999;">
            {{ session('error') }}
        </div>
    @endif

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
            <a href="#">Reviews</a>
        </div>

        <div class="logo"><h1>ToothWorks</h1></div>

        <div class="nav-right">
            <a href="{{ route('cart.index') }}"><i class="bi bi-bag"></i></a>
            <div class="profile-dropdown">
                <a href="#" class="profile-icon"><i class="bi bi-person-circle"></i></a>
                <div class="profile-menu">
                    <a href="#">View Profile</a>
                    <a href="#">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        <h2>ToothWorks</h2>
        <p>Smile Brighter, Live Happier</p><br><br>
        <h3>Your #Toothified smile awaits you!</h3><br><br><br>
        <ul>
            <a href="#"><i class="bi bi-facebook"></i></a>
            <a href="#"><i class="bi bi-instagram"></i></a>
            <a href="#"><i class="bi bi-twitter-x"></i></a>
            <a href="#"><i class="bi bi-tiktok"></i></a>
            <a href="#"><i class="bi bi-youtube"></i></a>
        </ul><br><br>
        <h4><i class="bi bi-c-circle"></i> <small><span>2025 ToothWorks Dental Clinic. All Rights Reserved.</span></small></h4>
    </footer>

    <script>
        setTimeout(() => document.querySelectorAll('.alert-toast').forEach(el => el.remove()), 3000);
    </script>
    @yield('scripts')
</body>
</html>