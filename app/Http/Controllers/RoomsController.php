<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Interfaces\RoomRepositoryInterface;

class RoomsController extends Controller
{
    private RoomRepositoryInterface $roomRepo;


    public function __construct(RoomRepositoryInterface $roomRepo)
    {
        $this->roomRepo = $roomRepo;
    }

    public function index(Request $r)
    {
        $load = $r->query('load');

        if(!empty($load)) {
            return view('welcome', ['rooms' => $this->roomRepo->roomListWithAverageRating(intval($load), "all")]);
        }

        return view('welcome', ['rooms' => $this->roomRepo->roomListWithAverageRating(1, "all")]);
    }

    public function roomGridIndex(Request $r)
    {
        $load = $r->query('load');

        
        if(session()->has($this->roomSession)) {
            session()->reflash();
            return view('roomgrid', ['rooms' => session()->get($this->roomSession)]);
        }

        if(session()->has($this->homeSession)) {
            session()->reflash();
            return view('roomgrid', ['rooms' => session()->get($this->homeSession)]);
        }

        if(session()->has($this->allRoom)) {
            session()->reflash();
            return view('roomgrid', ['rooms' => session()->get($this->allRoom)]);    
        }

        if($load != null) {
            return view('roomgrid', ['rooms' => $this->roomRepo->roomListWithAverageRating(intval($load), "all")]);
        } else {
            return view('roomgrid', ['rooms' => $this->roomRepo->roomListWithAverageRating(1, "all")]);
        }
    }

    public function roomListIndex(Request $r)
    {
        $load = $r->query('load');

        if(session()->has($this->roomSession)) {
            session()->reflash();
            return view('roomlist', ['rooms' => session()->get($this->roomSession)]);
        }

        if(session()->has($this->homeSession)) {
            session()->reflash();
            return view('roomlist', ['rooms' => $r->session()->get($this->homeSession)]);
        }

        if(session()->has($this->allRoom)) {
            session()->reflash();
            return view('roomlist', ['rooms' => session()->get($this->allRoom)]);    
        }

        if($load != null) {
            return view('roomlist', ['rooms' => $this->roomRepo->roomListWithAverageRating(intval($load), "all")]);
        } else {
            return view('roomlist', ['rooms' => $this->roomRepo->roomListWithAverageRating(1, "all")]);
        }
    }
}
