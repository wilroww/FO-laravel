@extends('layouts.app')

@section('title', 'ToothWorks | Cart')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/cart.css') }}">
@endsection

@section('content')
<div class="page-wrapper">
    <div class="containerbody">
        <div class="leftBody">
            <div class="container">
                <h2 class="carttext">Cart</h2>
                <a href="{{ route('shop.index') }}" class="continueShopping">Continue Shopping</a>
            </div>
            <hr>

            <div class="cart-items">
                @if($cartItems->isEmpty())
                    <p class="empty-message">Your cart is empty.</p>
                @else
                    @foreach($cartItems as $item)
                    <div class="iteminfo">
                        <img src="{{ asset($item->product->image) }}" class="itemimage" alt="{{ $item->product->name }}">
                        <p>{{ $item->product->name }}</p>
                        <div class="quantity-section">
                            <div class="numItem">
                                <form action="{{ route('cart.update') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="cart_item_id" value="{{ $item->id }}">
                                    <input type="hidden" name="quantity" value="{{ $item->quantity - 1 }}">
                                    <button type="submit" class="quantity-btn" {{ $item->quantity <= 1 ? 'disabled' : '' }}>-</button>
                                </form>
                                <h4>{{ $item->quantity }}</h4>
                                <form action="{{ route('cart.update') }}" method="POST" style="display:inline;">
                                    @csrf
                                    <input type="hidden" name="cart_item_id" value="{{ $item->id }}">
                                    <input type="hidden" name="quantity" value="{{ $item->quantity + 1 }}">
                                    <button type="submit" class="quantity-btn">+</button>
                                </form>
                            </div>
                            <form action="{{ route('cart.remove') }}" method="POST" style="display:inline;">
                                @csrf
                                <input type="hidden" name="cart_item_id" value="{{ $item->id }}">
                                <button type="submit" class="remove-btn">remove</button>
                            </form>
                        </div>
                        <h3 class="price">PHP {{ number_format($item->product->price * $item->quantity, 2) }}</h3>
                    </div>
                    <hr>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="rightbody">
            <form action="{{ route('orders.store') }}" method="POST">
                @csrf
                <div class="container">
                    <h4 id="sub">SUBTOTAL</h4>
                    <h3 id="subtotal-price">PHP {{ number_format($subtotal, 2) }}</h3>
                </div>
                <hr>
                <h4>Shipping address:</h4><br>
                <input type="text" name="address" placeholder="Enter address Here" required id="address-line"><br>

                <h3 id="pay">Payment Method</h3><br>
                <div class="paymentoptions">
                    <label class="radio-box">
                        <input type="radio" name="payment_method" value="COD" required>
                        <span>Cash on Delivery</span>
                    </label>
                    <label class="radio-box">
                        <input type="radio" name="payment_method" value="Gcash" required>
                        <span>GCash</span>
                    </label>
                </div>
                <br>
                <label id="checkbox">
                    <input type="checkbox" name="terms" required>
                    <span>I agree to the Terms and Condition</span>
                </label>
                <br>
                <button type="submit" id="submitbutton">Place Order</button>
            </form>
        </div>
    </div>
</div>
@endsection