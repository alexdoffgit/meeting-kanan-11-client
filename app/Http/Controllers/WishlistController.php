<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Interfaces\SearchRepositoryInterface;

class WishlistController extends Controller
{
    private SearchRepositoryInterface $searchRepo;

    public function __construct(SearchRepositoryInterface $searchRepo)
    {
        $this->searchRepo = $searchRepo;
    }

    public function index()
    {
        $wishlist = new Wishlist();

        return view('wishlist', ['wishlists' => $wishlist->wishData()]);
    }

    public function add(Request $request)
    {
        $roomId = $request->input('room_id');
        $wishlist = new Wishlist();
        $wishlist->guardedAdd(
            auth()->user()->id, 
            $roomId);

        if(url()->previous() != url('/wishlist')) {
            if($request->session()->has($this->roomSession)) {
                $prevSearch = $request->session()->get($this->roomSession)[0]["prevRoomsSearch"];

                session()->forget($this->roomSession);

                $roomSearch = $this->searchRepo->roomsSearch($prevSearch);

                session()->flash($this->roomSession, $roomSearch);
            }

            if($request->session()->has($this->homeSession)) {
                $prevSearch = $request->session()->get($this->homeSession)[0]["prevHomeSearch"];
                session()->forget($this->homeSession);
                $homeSearch = $this->searchRepo->homeSearch($prevSearch);
                
                session()->flash($this->homeSession, $homeSearch);
            }
        }


        return redirect()->back();
    }

    public function delete(Request $request)
    {
        $wishlistId = intval($request->input('wishlist_id'));
        $wishlist = Wishlist::find($wishlistId);
        $wishlist->delete();

        if(url()->previous() != url('/wishlist')) {
            if($request->session()->has($this->roomSession)) {
                $prevSearch = $request->session()->get($this->roomSession)[0]["prevRoomsSearch"];

                session()->forget($this->roomSession);

                $roomSearch = $this->searchRepo->roomsSearch($prevSearch);

                session()->flash($this->roomSession, $roomSearch);
            }

            if($request->session()->has($this->homeSession)) {
                $prevSearch = $request->session()->get($this->homeSession)[0]["prevHomeSearch"];
                session()->forget($this->homeSession);
                $homeSearch = $this->searchRepo->homeSearch($prevSearch);
                
                session()->flash($this->homeSession, $homeSearch);
            }
        }

        return redirect()->back();
    }
}
