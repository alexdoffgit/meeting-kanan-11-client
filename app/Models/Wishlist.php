<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function guardedAdd($userId, $roomId)
    {
        $notWishlisted = $this
            ->where('user_id', $userId)
            ->where('room_id', $roomId)
            ->get()
            ->isEmpty();

        if($notWishlisted) {
            $this->user_id = $userId;
            $this->room_id = $roomId;
            $this->save();
        }
    }

    public function wishData()
    {
        return $this::all()
            ->map(function($wishlist, $index) {
                $wishlistId = $wishlist->id;

                $thumbnail = asset($wishlist
                    ->room
                    ->images
                    ->where('thumbnail', 1)
                    ->first()
                    ->image_url);
                
                $roomId = $wishlist
                    ->room_id;

                $roomName = $wishlist
                    ->room
                    ->room_name;

                $description = $wishlist
                    ->room
                    ->description;

                $price = $wishlist
                    ->room
                    ->price;

                $averageRating = $wishlist
                    ->room
                    ->comments
                    ->whenNotEmpty(function($comments) {
                        return $comments->avg('rating');
                    }, function($comments) {
                        return 0;
                    });

                $ratingCount = $wishlist
                    ->room
                    ->comments
                    ->count();

                return [
                    'id' => $wishlistId,
                    'thumbnail' => $thumbnail,
                    'room_id' => $roomId,
                    'room_name' => $roomName,
                    'description' => $description,
                    'price' => $price,
                    'rating' => $averageRating,
                    'count' => $ratingCount
                ];
            })
            ->all();
    }
}
