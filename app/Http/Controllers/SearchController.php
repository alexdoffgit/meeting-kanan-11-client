<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\SearchRepositoryInterface;

class SearchController extends Controller
{
    private SearchRepositoryInterface $searchRepo;

    public function __construct(SearchRepositoryInterface $searchRepo)
    {
        $this->searchRepo = $searchRepo;
    }

    public function homeSearch(Request $r)
    {
        $roomName = empty($r->roomName) ? '' : $r->roomName;
        $maxpeople = empty($r->maxpeople) ? '' : (int) $r->maxpeople;

        $homeRoomSearch = $this->searchRepo->homeSearch([
            "room_name" => $roomName,
            "maxpeople" => $maxpeople,
            "sort" => "all"
        ]);

        return redirect('/rooms/grid')->with($this->homeSession, $homeRoomSearch);
    }

    public function gridSearch(Request $r)
    {
        $roomName = empty($r->roomName) ? '' : $r->roomName;
        $location = empty($r->location) ? '' : $r->location;
        $maxpeople = empty($r->maxpeople) ? '' : (int) $r->maxpeople;

        $roomsSearch = $this->searchRepo->roomsSearch([
            "room_name" => $roomName,
            "location" => $location,
            "maxpeople" => $maxpeople,
            "sort" => "all",
        ]);

        return redirect("/rooms/grid")->with($this->roomSession, $roomsSearch);
    }

    public function listSearch(Request $r)
    {
        $roomName = empty($r->roomName) ? '' : $r->roomName;
        $location = empty($r->location) ? '' : $r->location;
        $maxpeople = empty($r->maxpeople) ? '' : (int) $r->maxpeople;

        $roomsSearch = $this->searchRepo->roomsSearch([
            "room_name" => $roomName,
            "location" => $location,
            "maxpeople" => $maxpeople,
            "sort" => "all"
        ]);

        return redirect("/rooms/list")->with($this->roomSession, $roomsSearch);
    }
}
