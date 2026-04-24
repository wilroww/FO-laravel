@extends('layouts.app')

@section('title', 'Login - ToothWorks')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<main class="log">
    <section class="Login">
        <h1 class="loginText">Login</h1>
        <p class="signUp">Don't have an account yet? <a href="{{ route('register') }}">Sign up here</a></p>
        
        <form class="loginForm" action="{{ route('login.post') }}" method="POST" novalidate>
            @csrf
            
            <input id="email" name="email" type="email" placeholder="Enter email here..." value="{{ old('email') }}">
            @error('email')
                <small style="color: red; font-family: 'Alice', serif;">{{ $message }}</small>
            @enderror

            <input id="password" name="password" type="password" placeholder="Enter password...">
            @error('password')
                <small style="color: red; font-family: 'Alice', serif;">{{ $message }}</small>
            @enderror

            <button class="logButton" type="submit">LOG IN</button>
        </form>
    </section>
</main>
@endsection

@section('scripts')
    <script src="{{ asset('js/navBar.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
@endsection