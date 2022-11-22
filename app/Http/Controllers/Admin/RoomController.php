<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
class RoomController extends Controller
{
    public function viewlisting(Request $request, $id)
    {
        $room = Room::find($id);

        return view('admin.viewlisting', ['room' => $room]);
    }

    public function listing(Request $request)
    {
        $roomListingPerPage = 10;

        $page = $request->query('page');
        $currentPage = !empty($page) ? intval($page) : 1;

        $chunkIndex = !empty($page) ? intval($page - 1) : 0;

        if(session()->has($this->adminListingChunkIndex)) {
            session()->reflash();
        } else {
            session()->flash($this->adminListingChunkIndex, $chunkIndex);
        }

        $chunkIndexSession = session()->get($this->adminListingChunkIndex);

        $chunkedRoom = Room::all()->map(function($room, $index) {
            $image = asset(
                $room
                ->images
                ->where('thumbnail', 1)
                ->first()
                ->image_url);
            
            return [
                "id" => $room->id,
                "room_name" => $room->room_name,
                "description" => $room->description,
                "image" => $image
            ];
        })->chunk($roomListingPerPage);

        $rooms = $chunkedRoom[$chunkIndexSession]->all();

        return view('admin.listings', [
            'rooms' => $rooms, 
            'totalPage' => $chunkedRoom->count(),
            'currentPage' => $currentPage
        ]);
    }

    public function createForm()
    {
        return view('admin.addlisting');
    }

    public function create(Request $r) 
    {
        try {
            $r->validate([
                'id' => 'required',
                'name' => 'required',
                'description' => 'required',
                'floor' => 'required',
                'maxpeople' => 'required',
                'price' => 'required'
            ]);

            $room = new Room();
            $room->id = $r->input('id');
            $room->room_name = $r->input('name');
            $room->description = $r->input('description');
            $room->location = $r->input('floor');
            $room->price = $r->input('price');
            $room->maxpeople = $r->input('maxpeople');
            $room->save();

            return response('ok');
        } catch(ValidationException $v) {
            return response('please fill all field', 400);
        } catch(\Throwable $th) {
            Log::error($th);
            return response('internal server error', 500);
        }
    }
}
