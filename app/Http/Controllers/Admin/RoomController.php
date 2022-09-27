<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Validation\ValidationException;
class RoomController extends Controller
{
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
                'floor' => 'required',
                'maxpeople' => 'required',
                'price' => 'required'
            ]);

            $room = new Room();
            $room->id = $r->input('id');
            $room->room_name = $r->input('name');
            $room->location = $r->input('floor');
            $room->price = $r->input('price');
            $room->maxpeople = $r->input('maxpeople');
            $room->save();

            return response('ok');
        } catch(ValidationException $v) {
            return response('please fill all field', 400);
        } catch(\Throwable $th) {
            return response('internal server error', 500);
        }
    }
}
