<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Cart extends Model
{
    use HasFactory;

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function cartData($userId)
    {
        if(empty($userId)) {
            return [
                "carts" => [],
                "from" => "",
                "to" => "",
                "total_price" => 0,
                "total_guest" => 0
            ];
        }

        return $this::where('user_id', $userId)
            ->get()
            ->map(function($item, $key) {
                $cartId = $item->id;

                $roomImageIcon = asset($item
                    ->room
                    ->images
                    ->where('thumbnail', 1)
                    ->first()
                    ->image_url);

                $roomName = $item
                    ->room
                    ->room_name;

                $roomPrice = $item
                    ->room
                    ->price;

                $guest = $item
                    ->attendant;

                $bookingDateStart = $item
                    ->booking_day_start;

                $bookingDateEnd = $item
                    ->booking_day_end;

                return [
                    'id' => $cartId,
                    'room_name' => $roomName,
                    'image_icon' => $roomImageIcon,
                    'date_start' => new Carbon($bookingDateStart),
                    'date_end' => new Carbon($bookingDateEnd),
                    'price' => $roomPrice,
                    'guest' => $guest
                ];
            })
            ->whenNotEmpty(function($collection) {
                $carts = $collection
                    ->map(function($item, $key) {
                        return [
                            'id' => $item['id'],
                            'room_name' => $item['room_name'],
                            'image_icon' => $item['image_icon'],
                            'price' => $item['price']
                        ];
                    })
                    ->all();

                $from = $collection
                    ->map(function($item, $key) {
                        return $item['date_start'];
                    })
                    ->sort()
                    ->first()
                    ->format('d-m-y');

                $to = $collection
                    ->map(function($item, $key) {
                        return $item['date_end'];
                    })
                    ->sortDesc()
                    ->first()
                    ->format('d-m-y');

                return [
                    'carts' => $carts,
                    'from' => $from,
                    'to' => $to,
                    'total_price' => $collection->sum('price'),
                    'total_guest' => $collection->sum('guest')
                ];
            }, function($collection) {
                return [
                    "carts" => [],
                    "from" => "",
                    "to" => "",
                    "total_price" => 0,
                    "total_guest" => 0
                ];
            });
    }
}
