<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\RoomImage;
use Illuminate\Support\Facades\Log;

class RoomListController extends Controller
{
    public function index()
    {
        $rooms = [];
        $roomCollection = Room::all('room_name', 'price', 'id');
        foreach($roomCollection as $r) {
            array_push($rooms, [
                "room_name" => $r->room_name,
                "price" => $r->price,
                "images" => $this->trimImageUrl(
                    $r->images->where('thumbnail', 1)
                        ->first()->image_url
                )
            ]);
        }
        return view('welcome', ['rooms' => $rooms]);
    }

    private function trimImageUrl($imageUrl)
    {
        return str_replace("public/", "storage/", $imageUrl);
    }
}
