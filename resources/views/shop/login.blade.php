@extends('layouts.app')

@section('title', 'Login - ToothWorks')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<main class="log">
    <section class="Login">
        <h1 class="loginText">Login</h1>
        <p class="signUp">Don't have an account yet? <a href="{{ route('user.register') }}">Sign up here</a></p>
        
        <form class="loginForm" action="{{ route('user.login') }}" method="POST" novalidate>
            @csrf
            
            <input id="email" name="email" type="email" placeholder="Enter email here..." value="{{ old('email') }}">
            @error('email')
                <small class="error-message">{{ $message }}</small>
            @enderror

            <input id="password" name="password" type="password" placeholder="Enter password...">
            @error('password')
                <small class="error-message">{{ $message }}</small>
            @enderror

            <button class="logButton" type="submit">LOG IN</button>

            <p class="success-message"></p>
        </form>
    </section>
</main>
@endsection

@section('scripts')
    {{-- Assuming these JS files are in public/js/ --}}
    <script src="{{ asset('js/navBar.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
@endsection