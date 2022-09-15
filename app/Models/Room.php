<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    public function usersWhoBooked()
    {
        return $this->belongsToMany(User::class, 'bookings');
    }

    public function usersWhoWishlisted() {
        return $this->belongsToMany(User::class, 'wislists');
    }

    public function usersCart() {
        return $this->belongsToMany(User::class, 'carts');
    }

    public function comments()
    {
        return $this->belongsToMany(Comment::class, 'ratings');
    }
}
