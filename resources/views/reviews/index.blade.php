@extends('layouts.app')

@section('title', 'ToothWorks | Reviews')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/reviews.css') }}">
@endsection

@section('content')
<div class="container" style="padding-bottom:60px;">
    <div class="revText">
        <h2>Customer Reviews</h2>
        @if($total > 0)
            <div class="avg">{{ $avg }} <span style="font-size:24px;color:#353839;">/ 5</span></div>
        @endif
    </div>

    <div class="review-stats">
        <div class="stars-column">
            <p>★★★★★</p>
            <p>★★★★☆</p>
            <p>★★★☆☆</p>
            <p>★★☆☆☆</p>
            <p>★☆☆☆☆</p>
        </div>

        <div class="bars-column">
            @foreach([5,4,3,2,1] as $star)
            <div class="bar-row">
                <div class="bar-label">{{ $star }} star</div>
                <div class="bar">
                    <div class="fill" style="width: {{ $stats[$star]['pct'] }}%;"></div>
                </div>
                <div class="bar-count">{{ $stats[$star]['count'] }}</div>
            </div>
            @endforeach
        </div>
    </div>

    <div class="writeButton">
        <button class="btn btn-primary" onclick="document.getElementById('reviewModal').classList.add('show')">
            <i class="bi bi-pen"></i> Write a Review
        </button>
    </div>

    @if($reviews->count())
    <div class="reviews-list">
        @foreach($reviews as $review)
        <div class="review-card">
            <div class="review-header">
                <span class="review-author">{{ $review->reviewer_name }}</span>
                <span class="review-date">{{ $review->created_at->format('M d, Y') }}</span>
            </div>
            <div class="review-stars stars">
                {{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}
            </div>
            <div class="review-comment">{{ $review->comment }}</div>
        </div>
        @endforeach
    </div>
    @else
        <p style="text-align:center;color:#888;margin-bottom:60px;">No reviews yet. Be the first!</p>
    @endif
</div>

<!-- Write Review Modal -->
<div class="popup-overlay" id="reviewModal">
    <div class="popup-box" style="max-width:500px;">
        <h3 style="margin-bottom:18px;font-family:var(--font-body);">Write a Review</h3>
        <form action="{{ route('reviews.store') }}" method="POST" class="review-form">
            @csrf

            @guest
            <label>Your Name</label>
            <input type="text" name="guest_name" placeholder="Enter your name" required>
            @endguest

            <label>Rating</label>
            <select name="rating" required>
                <option value="5">★★★★★ (5)</option>
                <option value="4">★★★★☆ (4)</option>
                <option value="3">★★★☆☆ (3)</option>
                <option value="2">★★☆☆☆ (2)</option>
                <option value="1">★☆☆☆☆ (1)</option>
            </select>

            <label>Your Review</label>
            <textarea name="comment" placeholder="Share your experience..." required></textarea>

            <div class="popup-buttons">
                <button type="button" class="btn btn-secondary" onclick="document.getElementById('reviewModal').classList.remove('show')">Cancel</button>
                <button type="submit" class="btn btn-primary">Submit Review</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Close modal when clicking outside
    document.getElementById('reviewModal').addEventListener('click', function(e) {
        if (e.target === this) this.classList.remove('show');
    });
</script>
@endsection