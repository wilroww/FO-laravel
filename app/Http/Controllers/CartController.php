<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;

class CartController extends Controller
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
        $cartItems = $this->cartQuery()->with('product')->get();
        $subtotal = $cartItems->sum(fn($i) => $i->product->price * $i->quantity);
        return view('cart', compact('cartItems', 'subtotal'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $item = $this->cartQuery()->where('product_id', $request->product_id)->first();

        if ($item) {
            $item->increment('quantity', $request->quantity);
        } else {
            CartItem::create([
                'user_id' => auth()->id(),
                'session_id' => auth()->check() ? null : $this->sessionId(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Added to cart!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'cart_item_id' => 'required|exists:cart_items,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $item = CartItem::findOrFail($request->cart_item_id);
        $item->update(['quantity' => $request->quantity]);

        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }

    public function remove(Request $request)
    {
        $request->validate(['cart_item_id' => 'required|exists:cart_items,id']);
        CartItem::findOrFail($request->cart_item_id)->delete();

        return redirect()->route('cart.index')->with('success', 'Item removed!');
    }
}