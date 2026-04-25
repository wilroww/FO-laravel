@extends('layouts.app')

@section('title', 'ToothWorks | Login')
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

            <input id="email" name="email" type="email" placeholder="Enter email here..." value="{{ old('email') }}" required>
            @error('email')
                <small class="error-message" style="display:block;">{{ $message }}</small>
            @enderror

            <input id="password" name="password" type="password" placeholder="Enter password..." required>
            @error('password')
                <small class="error-message" style="display:block;">{{ $message }}</small>
            @enderror

            <button class="logButton" type="submit">LOG IN</button>

            @if(session('success'))
                <p class="success-message" style="display:block;">{{ session('success') }}</p>
            @endif
        </form>
    </section>
</main>
@endsection