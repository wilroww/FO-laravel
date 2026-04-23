@extends('layouts.app')

@section('title', 'ToothWorks | Orders')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
@endsection

@section('content')
<div class="order-container">
    <div class="tab-buttons">
        <button class="tab-btn active" onclick="switchTab('current')">Current Order</button>
        <button class="tab-btn" onclick="switchTab('history')">Order History</button>
    </div>

    <div class="tab-content active" id="currentOrder">
        <h2>Current Order</h2>
        <div class="order-box">
            @if($currentOrders->isEmpty())
                <p class="no-orders">No current orders.</p>
                <a href="{{ route('shop.index') }}" class="order-now-btn">Order Now</a>
            @else
                @foreach($currentOrders as $order)
                <div class="current-order-detail">
                    <h4>Order ID: {{ $order->id }}</h4>
                    <h4>Date: {{ $order->created_at->format('m/d/Y H:i') }}</h4>
                    <h4>Address: {{ $order->address }}</h4>
                    <h4>Payment: {{ $order->payment_method }}</h4>
                    <h4>Total: PHP {{ number_format($order->total, 2) }}</h4>
                    <hr>
                    @foreach($order->items as $item)
                    <div class="order-item">
                        <img src="{{ asset($item->product->image) }}" class="itemimage" alt="{{ $item->product->name }}">
                        <span>{{ $item->product->name }} x {{ $item->quantity }}</span>
                        <span>PHP {{ number_format($item->price * $item->quantity, 2) }}</span>
                    </div>
                    @endforeach
                    <form action="{{ route('orders.complete', $order) }}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="transaction-complete-btn">Transaction Complete</button>
                    </form>
                </div>
                @endforeach
            @endif
        </div>
    </div>

    <div class="tab-content" id="orderHistory">
        <h2>Order History</h2>
        <div class="history-box">
            @if($historyOrders->isEmpty())
                <p class="no-orders">No order history.</p>
            @else
                @foreach($historyOrders as $order)
                <div class="history-order-detail">
                    <h4>Order ID: {{ $order->id }}</h4>
                    <h4>Date: {{ $order->created_at->format('m/d/Y H:i') }}</h4>
                    <h4>Address: {{ $order->address }}</h4>
                    <h4>Payment: {{ $order->payment_method }}</h4>
                    <h4>Total: PHP {{ number_format($order->total, 2) }}</h4>
                    <hr>
                    @foreach($order->items as $item)
                    <div class="order-item">
                        <img src="{{ asset($item->product->image) }}" class="itemimage" alt="{{ $item->product->name }}">
                        <span>{{ $item->product->name }} x {{ $item->quantity }}</span>
                        <span>PHP {{ number_format($item->price * $item->quantity, 2) }}</span>
                    </div>
                    @endforeach
                    <form action="{{ route('orders.destroy', $order) }}" method="POST" style="display:inline;" onsubmit="return confirm('Remove from history?');">
                        @csrf
                        <button type="submit" class="remove-history-btn">Remove from History</button>
                    </form>
                </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
function switchTab(tab) {
    document.getElementById('currentOrder').classList.toggle('active', tab === 'current');
    document.getElementById('orderHistory').classList.toggle('active', tab === 'history');
    document.querySelectorAll('.tab-btn')[0].classList.toggle('active', tab === 'current');
    document.querySelectorAll('.tab-btn')[1].classList.toggle('active', tab === 'history');
}
</script>
@endsection