<?php

namespace App\Http\Controllers;

use App\Interfaces\RoomRepositoryInterface;
use Illuminate\Http\Request;
use App\Interfaces\SearchRepositoryInterface;

class SortController extends Controller
{
    private SearchRepositoryInterface $searchRepo;
    private RoomRepositoryInterface $roomRepo;

    public function __construct(
        SearchRepositoryInterface $searchRepo, 
        RoomRepositoryInterface $roomRepo)
    {
        $this->searchRepo = $searchRepo;
        $this->roomRepo = $roomRepo;
    }

    public function all(Request $request)
    {
        
        if($request->session()->has($this->roomSession)) {
            $prevData = $request->session()->get($this->roomSession)[0]["prevRoomsSearch"];
            $request->session()->forget($this->roomSession);

            $roomsSearch = $this->searchRepo->roomsSearch([
                "room_name" => $prevData["room_name"],
                "location" => $prevData["location"],
                "maxpeople" => $prevData["maxpeople"],
                "sort" => "all"
            ]);

            return back()->with($this->roomSession, $roomsSearch);
        }


        if($request->session()->has($this->homeSession)) {
            $prevData = $request->session()->get($this->homeSession)[0]["prevHomeSearch"];
            $request->session()->forget($this->homeSession);

            $homeSearch = $this->searchRepo->homeSearch([
                "room_name" => $prevData["room_name"],
                "maxpeople" => $prevData["maxpeople"],
                "sort" => "all"
            ]);

            return back()->with($this->homeSession, $homeSearch);
        }

        return back()->with($this->allRoom, $this->roomRepo->roomListWithAverageRating(1, "all"));
    }

    public function popular(Request $request)
    {
        if($request->session()->has($this->roomSession)) {
            $prevData = $request->session()->get($this->roomSession)[0]["prevRoomsSearch"];
            $request->session()->forget($this->roomSession);

            $roomsSearch = $this->searchRepo->roomsSearch([
                "room_name" => $prevData["room_name"],
                "location" => $prevData["location"],
                "maxpeople" => $prevData["maxpeople"],
                "sort" => "popular"
            ]);

            return back()->with($this->roomSession, $roomsSearch);
        }


        if($request->session()->has($this->homeSession)) {
            $prevData = $request->session()->get($this->homeSession)[0]["prevHomeSearch"];
            $request->session()->forget($this->homeSession);

            $homeSearch = $this->searchRepo->homeSearch([
                "room_name" => $prevData["room_name"],
                "maxpeople" => $prevData["maxpeople"],
                "sort" => "popular"
            ]);

            return back()->with($this->homeSession, $homeSearch);
        }

        return back()->with($this->allRoom, $this->roomRepo->roomListWithAverageRating(1, "popular"));
    }

    public function latest(Request $request)
    {
        if($request->session()->has($this->roomSession)) {
            $prevData = $request->session()->get($this->roomSession)[0]["prevRoomsSearch"];
            $request->session()->forget($this->roomSession);

            $roomsSearch = $this->searchRepo->roomsSearch([
                "room_name" => $prevData["room_name"],
                "location" => $prevData["location"],
                "maxpeople" => $prevData["maxpeople"],
                "sort" => "latest"
            ]);

            return back()->with($this->roomSession, $roomsSearch);
        }


        if($request->session()->has($this->homeSession)) {
            $prevData = $request->session()->get($this->homeSession)[0]["prevHomeSearch"];
            $request->session()->forget($this->homeSession);

            $homeSearch = $this->searchRepo->homeSearch([
                "room_name" => $prevData["room_name"],
                "maxpeople" => $prevData["maxpeople"],
                "sort" => "latest"
            ]);

            return back()->with($this->homeSession, $homeSearch);
        }

        return back()->with($this->allRoom, $this->roomRepo->roomListWithAverageRating(1, "latest"));
    }
}
