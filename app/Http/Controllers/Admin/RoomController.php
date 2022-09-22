<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Room;

class RoomController extends Controller
{
    public function createForm()
    {
        return view('admin.addlisting');
    }

    public function create(Request $r) 
    {
        $r->validate([
            'name' => 'required',
            'location' => 'required',
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg'],
        ]);

        $name = $r->name;
        $location = $r->location;
        $image = $r->file('image');

        $imageStoragePath = Storage::disk('public')->put("/", $image);

        $room = new Room;
        $room->room_name = $name;
        $room->location = $location;

        if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') {
            $room->image_url = public_path("storage\\{$imageStoragePath}");
        } else {
            $room->image_url = public_path("storage/{$imageStoragePath}");
        }

        $room->save();

        return redirect()->route('admin.room.create.get');
    }
}
