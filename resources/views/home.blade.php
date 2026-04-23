@extends('layouts.app')

@section('title', 'ToothWorks | Home')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
    <div id="video-container">
        <video class="clinic-video" autoplay loop muted playsinline>
            <source src="{{ asset('video/home.mp4') }}" type="video/mp4">
        </video>
    </div>

    <section class="hero">
        <h2>Smile Brighter, Live Happier</h2>
        <p>Because every smile deserves gentle care</p>
        <a href="{{ route('shop.index') }}" class="btn-shop">Shop Now</a>
    </section>
@endsection