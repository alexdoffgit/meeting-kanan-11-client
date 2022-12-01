<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\RoomImage;


class BatchImageUploadController extends Controller
{
    public function store(Request $r, $id)
    {
        // i'm not gonna check if the image will fail or not because i can't
        // but, if i try to create a relation on nonexisting id in room desc, it won't show
        // so it doesn't matter
        
        $thumbnail = $r->input('thumbnail');
        $image = $r->file('file');
        $ri = new RoomImage();

        $ri->thumbnail = $thumbnail == 'true' ? true : false;
        $ri->image_url = $this->fixImageUrl(
            $image->store('public/room_images')
        );
        $ri->room_id = $id;
        $ri->save();

        return response('ok');
    }

    public function update(Request $r, $id)
    {
        // i delete this because i can't figure out image update with dropzone
        RoomImage::where('room_id', $id)->delete();

        $thumbnail = $r->input('thumbnail');
        $image = $r->file('file');
        $ri = new RoomImage();

        $ri->thumbnail = $thumbnail == 'true' ? true : false;
        $ri->image_url = $this->fixImageUrl(
            $image->store('public/room_images')
        );
        $ri->room_id = $id;
        $ri->save();

        return response('ok');
    }

    private function fixImageUrl($imageUrl)
    {
        if($imageUrl) {
            return str_replace("public/", "storage/", $imageUrl);
        }

        return null;
    }
}
