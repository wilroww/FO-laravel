@extends('layouts.app')

@section('title', 'ToothWorks | ' . $categoryName)
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection

@section('content')
    <div class="dcText">
        <h2>{{ $categoryName }}</h2>
    </div>

    <div class="prodContainer">
        @foreach($products as $product)
        <div class="prodBox"
             data-slug="{{ $product->slug }}"
             data-id="{{ $product->id }}"
             data-name="{{ $product->name }}"
             data-price="PHP {{ number_format($product->price, 2) }}"
             data-img="{{ asset($product->image) }}">
            <img src="{{ asset($product->image) }}" alt="{{ $product->name }}">
            <div class="prodInfo">
                <a href="#"><p class="name">{{ $product->name }}</p></a>
                <p class="price">PHP {{ number_format($product->price, 2) }}</p>
                <p class="rating">{{ $product->rating }} ★</p>
            </div>
        </div>
        @endforeach
    </div>

    @include('shop._popup')
@endsection

@section('scripts')
<script>
const productMap = @json($products->pluck('id', 'slug'));
</script>
<script src="{{ asset('js/shop-popup.js') }}"></script>
@endsection