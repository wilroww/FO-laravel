@extends('layouts.app')

@section('title', 'ToothWorks | Shop')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/shop.css') }}">
@endsection

@section('content')
    @foreach(['daily-care' => 'Daily Care', 'fresh-breath' => 'Fresh Breath', 'dental-tools' => 'Dental Tools'] as $cat => $title)
        @if(isset($products[$cat]) && $products[$cat]->count())
        <section class="shop-section">
            <h2>{{ $title }}</h2>
            <div class="products">
                @foreach($products[$cat] as $product)
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
        @endif
    @endforeach

    @include('shop.popup')
@endsection

@section('scripts')
<script>
const productMap = @json(\App\Models\Product::all()->pluck('id', 'slug'));
</script>
<script src="{{ asset('js/shop-popup.js') }}"></script>
@endsection