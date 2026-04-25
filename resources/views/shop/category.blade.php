@extends('layouts.app')

@section('title', 'ToothWorks | ' . $categoryName)
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection

@section('content')
    <section class="shop-section">
        <h2>{{ $categoryName }}</h2>
        <div class="products">
            @foreach($products as $product)
            <div class="product"
                 data-slug="{{ $product->slug }}"
                 data-id="{{ $product->id }}"
                 data-name="{{ $product->name }}"
                 data-price="PHP {{ number_format($product->price, 2) }}"
                 data-img="{{ asset($product->image) }}">
                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" loading="lazy">
                <div class="product-info">
                    <p>{{ $product->name }}</p>
                    <span>PHP {{ number_format($product->price, 2) }}</span>
                    <div class="rating">{{ $product->rating }} ★</div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    @include('shop.popup')
@endsection

@section('scripts')
<script>
const productMap = @json($products->pluck('id', 'slug'));
</script>
<script src="{{ asset('js/shop-popup.js') }}"></script>
@endsection