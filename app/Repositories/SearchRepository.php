<?php

namespace App\Repositories;

use App\Interfaces\SearchRepositoryInterface;
use App\Models\Room;

class SearchRepository implements SearchRepositoryInterface 
{
    private function averageRating(Room $room) 
    {
        return $room
            ->comments
            ->whenEmpty(function($c) {
                return 0;
            }, function($c) {
                return $c->avg('rating');
            });
    }

    private function commentCount(Room $room) 
    {
        return $room
            ->comments
            ->count();
    }

    private function roomThumbnail(Room $room)
    {
        return asset($room
            ->images
            ->where('thumbnail', 1)
            ->first()
            ->image_url);
    }

    private function wishlistData(Room $room)
    {
        $loggedIdUser = !empty(auth()->user()) ? auth()->user()->id : false;

        $wishlisted = $room
                    ->usersWhoWishlisted
                    ->filter(function($value, $key) use ($loggedIdUser) {
                        return $value->id == $loggedIdUser;
                    })
                    ->isNotEmpty();

        $wishlistId = $room
            ->wishlists
            ->where('user_id', $loggedIdUser)
            ->where('room_id', $room->id)
            ->whenNotEmpty(function($wishlist) {
                return $wishlist->first()->id;
            }, function($wishlist) {
                return 0;
            });

        return [
            "wishlisted" => $wishlisted,
            "wishlistId" => $wishlistId,
        ];
    }

    private function homeSearchInternal($detail)
    {
        $rooms = Room::query();

        if(!empty($detail['room_name']) && !empty($detail['maxpeople'])) {
            $rooms
                ->where('room_name', $detail['room_name'])
                ->where('maxpeople', '<=', $detail['maxpeople']);
        } else {
            $rooms
                ->where('room_name', $detail['room_name'])
                ->orWhere('maxpeople', '<=', $detail['maxpeople']);
        }

        return $rooms
            ->get()
            ->map(function($room, $key) use (&$detail) {
                $rating = $this->averageRating($room);

                $count = $this->commentCount($room);

                $image = $this->roomThumbnail($room);

                $wishlistData = $this->wishlistData($room);

                return [
                    "id" => $room->id,
                    "room_name" => $room->room_name,
                    "price" => $room->price,
                    "wishlisted" => $wishlistData["wishlisted"],
                    "wishlistId" => $wishlistData["wishlistId"],
                    "image" => $image,
                    "rating" => $rating,
                    "description" => $room->description,
                    "ratingCount" => $count,
                    "createdAt" => $room->created_at,
                    "updatedAt" => $room->updated_at,
                    "prevHomeSearch" => [
                        "room_name" => $detail["room_name"],
                        "maxpeople" => $detail["maxpeople"],
                        "sort" => $detail["sort"]
                    ],
                ];
            });
    }

    private function homeSearchAll($detail) 
    {
        return $this->homeSearchInternal($detail)->all();
    }

    private function homeSearchPopular($detail) 
    {
        return $this->homeSearchInternal($detail)->sortByDesc('rating')->all();
    }

    private function homeSearchLatest($detail)
    {
        foreach ($this->homeSearchInternal($detail) as $value) {
            if(empty($value["createdAt"])) {
                return $this->homeSearchInternal($detail)->all();
            }
        }

        return $this->homeSearchInternal($detail)->sortByDesc('createdAt')->all();
    }

    private function roomsSearchInternal($detail) 
    {
        $rooms = Room::query();
        $detailFilled = (!empty($detail['room_name']) 
            && !empty($detail['location'])
            && !empty($detail['maxpeople']));

        if($detailFilled) {
            $rooms
                ->where('room_name', $detail['room_name'])
                ->where('location', $detail['location'])
                ->where('maxpeople', '<=', $detail['maxpeople']);
        } else {
            $rooms
                ->where('room_name', $detail['room_name'])
                ->orWhere('location', $detail['location'])
                ->orWhere('maxpeople', '<=', $detail['maxpeople']);
        }

        return $rooms
            ->get()
            ->map(function($room, $key) use (&$detail) {
                $rating = $this->averageRating($room);
            
                $count = $this->commentCount($room);

                $image = $this->roomThumbnail($room);

                $wishlistData = $this->wishlistData($room);

                return [
                    "id" => $room->id,
                    "room_name" => $room->room_name,
                    "price" => $room->price,
                    "wishlisted" => $wishlistData['wishlisted'],
                    "wishlistId" => $wishlistData['wishlistId'],
                    "image" => $image,
                    "rating" => $rating,
                    "description" => $room->description,
                    "ratingCount" => $count,
                    "createdAt" => $room->created_at,
                    "updatedAt" => $room->updated_at,
                    "prevRoomsSearch" => [
                        "room_name" => $detail["room_name"],
                        "location" => $detail["location"],
                        "maxpeople" => $detail["maxpeople"],
                        "sort" => $detail["sort"]
                    ],
                ];
            });
    }

    private function roomsSearchAll($detail)
    {
        return $this->roomsSearchInternal($detail)->all();
    }

    private function roomsSearchLatest($detail)
    {
        foreach ($this->roomsSearchInternal($detail) as $value) {
            if(empty($value["createdAt"])) {
                return $this->roomsSearchInternal($detail)->all();
            }
        }

        return $this->roomsSearchInternal($detail)->sortByDesc("createdAt")->all();
    }

    private function roomsSearchPopular($detail)
    {
        return $this->roomsSearchInternal($detail)->sortByDesc("rating")->all();
    }

    /*
    * $detail: [
    *       'room_name' => string,
    *       'maxpeople' => string | int
    *       'sort' => string
    * ]
    */
    public function homeSearch($detail)
    {
        if($detail["sort"] == "all") {
            return $this->homeSearchAll($detail);
        } else if($detail["sort"] == "popular") {
            return $this->homeSearchPopular($detail);
        } else if($detail["sort"] == "latest") {
            return $this->homeSearchLatest($detail);
        } else {
            return $this->homeSearchAll($detail);
        }
    }

    /*
    * $detail: [
    *       'room_name' => string,
    *       'location' => string,
    *       'maxpeople' => string | int,
    *       'sort' => string
    * ]
    */
    public function roomsSearch($detail)
    {
        if($detail["sort"] == "all") {
            return $this->roomsSearchAll($detail);
        } else if($detail["sort"] == "popular") {
            return $this->roomsSearchPopular($detail);
        } else if($detail["sort"] == "latest") {
            return $this->roomsSearchLatest($detail);
        } else {
            return $this->roomsSearchAll($detail);
        }
    }
}