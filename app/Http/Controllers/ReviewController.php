<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::where('approved', true)->latest()->get();
        $total = $reviews->count();
        $avg = $total > 0 ? round($reviews->avg('rating'), 1) : 0;

        $stats = [];
        for ($i = 5; $i >= 1; $i--) {
            $count = $reviews->where('rating', $i)->count();
            $stats[$i] = [
                'count' => $count,
                'pct'   => $total > 0 ? round(($count / $total) * 100) : 0,
            ];
        }

        return view('reviews.index', compact('reviews', 'stats', 'total', 'avg'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'rating'     => 'required|integer|min:1|max:5',
            'comment'    => 'required|string|min:3|max:2000',
            'guest_name' => 'nullable|string|max:255',
        ]);

        Review::create([
            'user_id'    => auth()->id(),
            'guest_name' => auth()->check() ? null : $request->guest_name,
            'rating'     => $request->rating,
            'comment'    => $request->comment,
        ]);

        return back()->with('success', 'Thank you! Your review has been submitted.');
    }
}