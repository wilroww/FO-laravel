@extends('layouts.app')

@section('title', 'ToothWorks | About')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/about.css') }}">
@endsection

@section('content')
    <main class="about">
        <section class="aboutForm">
            <h2 class="motto">Clean. Confident. Care.</h2><br>
            <div class="vision-mission">
                <div class="vision">
                    <h3>VISION</h3>
                    <p>To be the most trusted and accessible source of quality dental care products that inspire confidence, promote oral health, and create smiles that last a lifetime.</p>
                </div>
                <div class="mission">
                    <h3>MISSION</h3>
                    <p>At Dental Essentials, we aim to make oral care simple, safe, and sustainable. We provide high-quality, dentist-approved products made with care for people and the planet—helping everyone achieve a healthy, confident smile every day.</p>
                </div>
            </div>
        </section>
    </main>
@endsection