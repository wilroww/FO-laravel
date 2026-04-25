@extends('layouts.app')

@section('title', 'ToothWorks | Orders')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/order.css') }}">
@endsection

@section('content')
<div class="order-container">
    <div class="tab-buttons">
        <button class="tab-btn active" onclick="switchTab('current')">Current Orders</button>
        <button class="tab-btn" onclick="switchTab('history')">Order History</button>
    </div>

    {{-- CURRENT ORDERS --}}
    <div class="tab-content active" id="currentOrder">
        <div class="order-box">
            @if($currentOrders->isEmpty())
                <div class="empty-state">
                    <i class="bi bi-box-seam" style="font-size:48px;color:#ccc;"></i>
                    <p class="no-orders">No current orders.</p>
                    <a href="{{ route('shop.index') }}" class="btn btn-primary">Order Now</a>
                </div>
            @else
                @foreach($currentOrders as $order)
                <div class="order-card">
                    <div class="order-header">
                        <div class="order-meta">
                            <h4>Order #<strong>{{ $order->id }}</strong></h4>
                            <h4>{{ $order->created_at->format('F d, Y · h:i A') }}</h4>
                        </div>
                        <span class="status-badge status-{{ $order->status }}">{{ ucfirst($order->status) }}</span>
                    </div>

                    <div class="order-items">
                        @foreach($order->items as $item)
                        <div class="order-item">
                            <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" loading="lazy">
                            <span class="item-name">{{ $item->product->name }}</span>
                            <span class="item-qty">× {{ $item->quantity }}</span>
                            <span class="item-price">PHP {{ number_format($item->price * $item->quantity, 2) }}</span>
                        </div>
                        @endforeach
                    </div>

                    <div class="order-footer">
                        <div class="order-info">
                            <small><i class="bi bi-geo-alt"></i> {{ $order->address }}</small>
                            <small><i class="bi bi-credit-card"></i> {{ $order->payment_method }}</small>
                        </div>
                        <div class="order-total">Total: <strong>PHP {{ number_format($order->total, 2) }}</strong></div>
                    </div>

                    <div class="order-actions">
                        <form action="{{ route('orders.complete', $order) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-complete">
                                <i class="bi bi-check-lg"></i> Transaction Complete
                            </button>
                        </form>
                    </div>
                </div>
                @endforeach
            @endif
        </div>
    </div>

    {{-- ORDER HISTORY --}}
    <div class="tab-content" id="orderHistory">
        <div class="history-box">
            @if($historyOrders->isEmpty())
                <div class="empty-state">
                    <i class="bi bi-clock-history" style="font-size:48px;color:#ccc;"></i>
                    <p class="no-orders">No order history yet.</p>
                </div>
            @else
                @foreach($historyOrders as $order)
                <div class="order-card history">
                    <div class="order-header">
                        <div class="order-meta">
                            <h4>Order #<strong>{{ $order->id }}</strong></h4>
                            <h4>{{ $order->created_at->format('F d, Y · h:i A') }}</h4>
                        </div>
                        <span class="status-badge status-completed">Completed</span>
                    </div>

                    <div class="order-items">
                        @foreach($order->items as $item)
                        <div class="order-item">
                            <img src="{{ asset($item->product->image) }}" alt="{{ $item->product->name }}" loading="lazy">
                            <span class="item-name">{{ $item->product->name }}</span>
                            <span class="item-qty">× {{ $item->quantity }}</span>
                            <span class="item-price">PHP {{ number_format($item->price * $item->quantity, 2) }}</span>
                        </div>
                        @endforeach
                    </div>

                    <div class="order-footer">
                        <div class="order-info">
                            <small><i class="bi bi-geo-alt"></i> {{ $order->address }}</small>
                            <small><i class="bi bi-credit-card"></i> {{ $order->payment_method }}</small>
                        </div>
                        <div class="order-total">Total: <strong>PHP {{ number_format($order->total, 2) }}</strong></div>
                    </div>

                    <div class="order-actions">
                        <form action="{{ route('orders.destroy', $order) }}" method="POST" onsubmit="return confirm('Remove this order from history?');">
                            @csrf
                            <button type="submit" class="btn-remove">
                                <i class="bi bi-trash"></i> Remove from History
                            </button>
                        </form>
                    </div>
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