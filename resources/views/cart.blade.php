@extends('layouts.app')

@section('title', 'ToothWorks | Cart')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection

@section('content')
<div class="containerbody">
    <div class="leftBody">
        <div class="cart-header">
            <h2 class="carttext">Cart</h2>
            <a href="{{ route('shop.index') }}" class="continueShopping">← Continue Shopping</a>
        </div>

        <div class="cart-items">
            @if($cartItems->isEmpty())
                <div class="empty-state">
                    <i class="bi bi-bag-x" style="font-size:48px;color:#ccc;"></i>
                    <p>Your cart is empty.</p>
                    <a href="{{ route('shop.index') }}" class="btn btn-primary" style="margin-top:10px;">Start Shopping</a>
                </div>
            @else
                @foreach($cartItems as $item)
                <div class="iteminfo">
                    <img src="{{ asset($item->product->image) }}" class="itemimage" alt="{{ $item->product->name }}"
                         onerror="this.style.background='#f0f0f0';this.style.display='none';this.nextElementSibling.style.display='flex'">
                    <div class="item-details">
                        <p class="item-name">{{ $item->product->name }}</p>
                        <p class="item-unit">PHP {{ number_format($item->product->price, 2) }} / each</p>
                    </div>

                    <div class="quantity-section">
                        <div class="numItem">
                            <form action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="cart_item_id" value="{{ $item->id }}">
                                <input type="hidden" name="quantity" value="{{ $item->quantity - 1 }}">
                                <button type="submit" class="qty-btn" {{ $item->quantity <= 1 ? 'disabled' : '' }}>−</button>
                            </form>
                            <span class="qty-val">{{ $item->quantity }}</span>
                            <form action="{{ route('cart.update') }}" method="POST">
                                @csrf
                                <input type="hidden" name="cart_item_id" value="{{ $item->id }}">
                                <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                                <button type="submit" class="qty-btn">+</button>
                            </form>
                        </div>
                        <form action="{{ route('cart.remove') }}" method="POST">
                            @csrf
                            <input type="hidden" name="cart_item_id" value="{{ $item->id }}">
                            <button type="submit" class="remove-btn">Remove</button>
                        </form>
                    </div>

                    <div class="price">PHP {{ number_format($item->product->price * $item->quantity, 2) }}</div>
                </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="rightbody">
        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <div class="summary-row">
                <span class="summary-label">Subtotal</span>
                <span class="summary-price">PHP {{ number_format($subtotal, 2) }}</span>
            </div>

            <div class="form-group">
                <label for="address-line">Shipping Address</label>
                <input type="text" name="address" id="address-line" placeholder="Enter full address..." required value="{{ old('address') }}">
            </div>

            <div class="form-group">
                <label>Payment Method</label>
                <div class="paymentoptions">
                    <label class="radio-box">
                        <input type="radio" name="payment_method" value="COD" required @checked(old('payment_method')=='COD')>
                        <span>Cash on Delivery</span>
                    </label>
                    <label class="radio-box">
                        <input type="radio" name="payment_method" value="Gcash" required @checked(old('payment_method')=='Gcash')>
                        <span>GCash</span>
                    </label>
                </div>
            </div>

            <label id="checkbox">
                <input type="checkbox" name="terms" required>
                <span>I agree to the Terms and Conditions</span>
            </label>

            <button type="submit" id="submitbutton" class="btn btn-primary" style="width:100%;margin-top:16px;" {{ $cartItems->isEmpty() ? 'disabled' : '' }}>
                Place Order
            </button>
        </form>
    </div>
</div>
@endsection