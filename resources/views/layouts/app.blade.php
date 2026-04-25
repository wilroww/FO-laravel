<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ToothWorks')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montez&family=Alice&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/base.css') }}">
    @yield('styles')
</head>
<body>

    @if(session('success'))
        <div class="alert-toast success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert-toast error">{{ session('error') }}</div>
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
            <a href="{{ route('reviews.index') }}">Reviews</a>
        </div>

        <div class="logo"><h1>ToothWorks</h1></div>

        <div class="nav-right">
            <a href="{{ route('cart.index') }}" class="cart-icon" title="Cart">
                <i class="bi bi-bag"></i>
                @php
                    $cartCount = auth()->check()
                        ? \App\Models\CartItem::where('user_id', auth()->id())->count()
                        : \App\Models\CartItem::where('session_id', session()->getId())->count();
                @endphp
                @if($cartCount > 0)
                    <span class="cart-badge">{{ $cartCount }}</span>
                @endif
            </a>

            <div class="profile-dropdown">
                <a href="#" class="profile-icon" title="Account">
                    <i class="bi bi-person-circle"></i>
                </a>
                <div class="profile-menu">
                    @auth
                        <a href="{{ route('profile') }}">
                            <i class="bi bi-person"></i> View Profile
                        </a>
                        <div class="divider"></div>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit">
                                <i class="bi bi-box-arrow-right"></i> Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                        <a href="{{ route('register') }}">
                            <i class="bi bi-person-plus"></i> Sign Up
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <main class="page-wrapper">
        @yield('content')
    </main>

    <footer>
        <h2>ToothWorks</h2>
        <p>Smile Brighter, Live Happier</p>
        <h3>Your #Toothified smile awaits you!</h3>
        <ul class="social-links">
            <a href="https://www.facebook.com/WilrowReosa" target="_blank" rel="noopener" title="Facebook">
                <i class="bi bi-facebook"></i>
            </a>
            <a href="https://www.instagram.com/wilrow.reosa.bayona/" target="_blank" rel="noopener" title="Instagram">
                <i class="bi bi-instagram"></i>
            </a>
            <a href="https://www.tiktok.com/@lianna_gnr?_r=1&_t=ZS-95p1gMjjeia" target="_blank" rel="noopener" title="TikTok">
                <i class="bi bi-tiktok"></i>
            </a>
            <a href="https://youtube.com/@evessma?si=7WYu8yfu-nxvKOMA" target="_blank" rel="noopener" title="YouTube">
                <i class="bi bi-youtube"></i>
            </a>
        </ul>
        <h4><i class="bi bi-c-circle"></i> <small><span>2025 ToothWorks Dental Clinic. All Rights Reserved.</span></small></h4>
    </footer>

    <script>
        setTimeout(() => document.querySelectorAll('.alert-toast').forEach(el => el.remove()), 3500);
    </script>
    @yield('scripts')
</body>
</html>