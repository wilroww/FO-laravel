@extends('layouts.app')

@section('title', 'ToothWorks | Profile')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
@endsection

@section('content')
<main class="profile">
    <section class="profile-container">
        <div class="profile-header">
            <div class="avatar">
                <i class="bi bi-person" style="font-size:52px;color:#353839;"></i>
            </div>
            <h1 class="loginText" style="font-size:42px;">My Profile</h1>
        </div>

        <div class="profileForm">
            <label>Name</label>
            <div class="profile-value">{{ auth()->user()->name }}</div>

            <label>Email</label>
            <div class="profile-value">{{ auth()->user()->email }}</div>

            <div class="profile-buttons">
                <a href="{{ route('orders.index') }}" class="profile-button">Order History</a>
                <button type="button" class="profile-button" style="background:#ddd;" onclick="document.getElementById('logoutModal').style.display='flex'">
                    Logout
                </button>
            </div>
        </div>
    </section>
</main>

<div class="logout-modal" id="logoutModal" style="display:none;">
    <div class="logout-content">
        <h3>Are you sure you want to logout?</h3>
        <div class="logout-actions">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="yes-btn">Yes</button>
            </form>
            <button onclick="document.getElementById('logoutModal').style.display='none'" class="no-btn">No</button>
        </div>
    </div>
</div>
@endsection