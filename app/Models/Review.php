<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'guest_name', 'rating', 'comment', 'approved'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getReviewerNameAttribute()
    {
        return $this->user?->name ?? $this->guest_name ?? 'Anonymous';
    }
}