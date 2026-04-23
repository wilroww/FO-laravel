<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\CartItem;

class OrderController extends Controller
{
    private function sessionId()
    {
        return session()->getId();
    }

    private function cartQuery()
    {
        if (auth()->check()) {
            return CartItem::where('user_id', auth()->id());
        }
        return CartItem::where('session_id', $this->sessionId());
    }

    public function index()
    {
        $base = auth()->check()
            ? Order::where('user_id', auth()->id())
            : Order::where('session_id', $this->sessionId());

        $currentOrders = (clone $base)->current()->latest()->get();
        $historyOrders = (clone $base)->history()->latest()->get();

        return view('orders', compact('currentOrders', 'historyOrders'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'address' => 'required|string|max:500',
            'payment_method' => 'required|in:COD,Gcash',
            'terms' => 'required'
        ]);

        $cartItems = $this->cartQuery()->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $total = $cartItems->sum(fn($i) => $i->product->price * $i->quantity);

        $order = Order::create([
            'user_id' => auth()->id(),
            'session_id' => auth()->check() ? null : $this->sessionId(),
            'address' => $request->address,
            'payment_method' => $request->payment_method,
            'total' => $total,
            'status' => 'pending',
        ]);

        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->price,
            ]);
        }

        $this->cartQuery()->delete();

        return redirect()->route('orders.index')->with('success', 'Order placed successfully!');
    }

    public function complete(Request $request, Order $order)
    {
        $order->update(['status' => 'completed', 'completed_at' => now()]);
        return redirect()->route('orders.index')->with('success', 'Transaction completed!');
    }

    public function destroy(Request $request, Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Removed from history!');
    }
}