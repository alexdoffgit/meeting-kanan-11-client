<?php

namespace App\Repositories;

use App\Models\Room;
use App\Interfaces\RoomRepositoryInterface;

class RoomRepository implements RoomRepositoryInterface {
    private function roomListInternal($load)
    {
        $limit = $load * 6;

        $loggedIdUser = !empty(auth()->user()) ? auth()->user()->id : false;

        return Room::limit($limit)
            ->get()
            ->map(function($room, $key) use ($loggedIdUser) {
                $rating = $room
                    ->comments
                    ->whenEmpty(function($c) {
                        return 0;
                    }, function($c) {
                        return $c->avg('rating');
                    });
                
                $count = $room
                    ->comments
                    ->count();

                $image = $room
                    ->images
                    ->where('thumbnail', 1)
                    ->first()
                    ->image_url;

                if($loggedIdUser) {
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
                        "id" => $room->id,
                        "room_name" => $room->room_name,
                        "price" => $room->price,
                        "image" => $image,
                        "wishlisted" => $wishlisted,
                        "wishlistId" => $wishlistId,
                        "createdAt" => $room->created_at,
                        "updatedAt" => $room->updated_at,
                        "rating" => $rating,
                        "description" => $room->description,
                        "ratingCount" => $count,
                    ]; 
                } else {
                    return [
                        "id" => $room->id,
                        "room_name" => $room->room_name,
                        "price" => $room->price,
                        "image" => $image,
                        "wislisted" => false,
                        "wishlistId" => 0,
                        "createdAt" => $room->created_at,
                        "updatedAt" => $room->updated_at,
                        "rating" => $rating,
                        "description" => $room->description,
                        "ratingCount" => $count,
                    ];
                }
            });
    }

    private function roomSortedAll($load)
    {
        return $this->roomListInternal($load)->all();
    }

    private function roomSortedPopular($load) {
        return $this->roomListInternal($load)->sortByDesc("rating")->all();
    }

    private function roomSortedLatest($load) {
        if($this->roomListInternal($load)->isEmpty()) {
            return $this->roomSortedAll($load);
        }

        foreach ($this->roomSortedAll($load) as $value) {
            if(empty($value["createdAt"])) {
                return $this->roomSortedAll($load);
            }
        }

        return $this->roomListInternal($load)->sortByDesc("createdAt")->all();
    }
    
    public function roomListWithAverageRating($load, $sort)
    {
        if($sort == "all") {
            return $this->roomSortedAll($load);
        } else if($sort == "latest") {
            return $this->roomSortedLatest($load);
        } else if($sort == "popular") {
            return $this->roomSortedPopular($load);
        } else {
            return $this->roomSortedAll($load);
        }
    }

    public function roomDetail($id)
    {
        return collect([Room::find($id)])
            ->map(function($room, $key) {
                $avgRating = $room
                    ->comments
                    ->whenNotEmpty(
                        fn($c) => $c->avg('rating'),
                        fn($c) => 0);

                $ratingCount = $room
                        ->comments
                        ->count();

                $ratingGroup = $room
                        ->comments
                        ->reduce(function($carry, $comment) {
                            return [
                                "5" => round($comment->rating/2) == 5 ? $carry["5"] + 1 : $carry["5"],
                                "4" => round($comment->rating/2) == 4 ? $carry["4"] + 1 : $carry["4"],
                                "3" => round($comment->rating/2) == 3 ? $carry["3"] + 1 : $carry["3"],
                                "2" => round($comment->rating/2) == 2 ? $carry["2"] + 1 : $carry["2"],
                                "1" => round($comment->rating/2) == 1 ? $carry["1"] + 1 : $carry["1"],
                            ];
                        }, [
                            "5" => 0,
                            "4" => 0,
                            "3" => 0,
                            "2" => 0,
                            "1" => 0
                        ]);

                $ratingPercentage = $ratingCount != 0 ? [
                    "5" => intval(round(($ratingGroup["5"] / $ratingCount) * 100.0)),
                    "4" => intval(round(($ratingGroup["4"] / $ratingCount) * 100.0)),
                    "3" => intval(round(($ratingGroup["3"] / $ratingCount) * 100.0)),
                    "2" => intval(round(($ratingGroup["2"] / $ratingCount) * 100.0)),
                    "1" => intval(round(($ratingGroup["1"] / $ratingCount) * 100.0))
                ] : [
                    "5" => 0,
                    "4" => 0,
                    "3" => 0,
                    "2" => 0,
                    "1" => 0
                ];
                        

                $commentWithInfo = $room
                        ->comments
                        ->whenNotEmpty(function($c) {
                            return $c->map(function($comment, $key) {
                                return [
                                    "star" => intval(round($comment->rating/2)),
                                    "text" => $comment->content,
                                    "author" => $comment->user->name,
                                    "time" =>  (!empty($comment->updated_at)) ? $comment->updated_at->toFormattedDateString() : "",
                                ];
                            });
                        });

                
                $heroImage = asset($room
                        ->images
                        ->where('thumbnail', 1)
                        ->first()
                        ->image_url);

                $roomImages = $room
                        ->images
                        ->map(function($roomImage, $key) {
                            return asset($roomImage->image_url);
                        })->all();
                        
                return [
                    "id" => $room->id,
                    "price" => $room->price,
                    "maxpeople" => $room->maxpeople,
                    "description" => $room->description,
                    "averageRating" => $avgRating,
                    "ratingCount" => $ratingCount,
                    "ratingPercentage" => $ratingPercentage,
                    "commentWithInfo" => $commentWithInfo,
                    "heroImage" => $heroImage,
                    "roomImages" => $roomImages,
                ];
            })
            ->first();
    }
}