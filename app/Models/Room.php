<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    use HasFactory;

    public $incrementing = false;

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function usersWhoWishlisted() {
        return $this->belongsToMany(User::class, 'wishlists');
    }

    public function usersCart() {
        return $this->belongsToMany(User::class, 'carts');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function images()
    {
        return $this->hasMany(RoomImage::class, 'room_id');
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}
