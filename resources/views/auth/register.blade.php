@extends('layouts.app')

@section('title', 'ToothWorks | Sign Up')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/signup.css') }}">
@endsection

@section('content')
<main class="sign">
    <section class="signUpForm">
        <h1 class="signUpText">Sign Up</h1>

        <form class="signForm" action="{{ route('register.post') }}" method="POST">
            @csrf

            <label for="first_name">First Name:</label>
            <input id="first_name" name="first_name" type="text" placeholder="Enter first name..." value="{{ old('first_name') }}" required>
            @error('first_name')
                <small class="error-message" style="display:block;">{{ $message }}</small>
            @enderror

            <label for="last_name">Last Name:</label>
            <input id="last_name" name="last_name" type="text" placeholder="Enter last name..." value="{{ old('last_name') }}" required>
            @error('last_name')
                <small class="error-message" style="display:block;">{{ $message }}</small>
            @enderror

            <label for="email">Email:</label>
            <input id="email" name="email" type="email" placeholder="Enter email..." value="{{ old('email') }}" required>
            @error('email')
                <small class="error-message" style="display:block;">{{ $message }}</small>
            @enderror

            <label for="password">Password:</label>
            <input id="password" name="password" type="password" placeholder="Enter password..." required>
            @error('password')
                <small class="error-message" style="display:block;">{{ $message }}</small>
            @enderror

            <button type="submit" class="createButton">CREATE</button>

            @if(session('success'))
                <small class="success-message" style="display:block;">{{ session('success') }}</small>
            @endif
        </form>
    </section>
</main>
@endsection