<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Interfaces\RoomRepositoryInterface;

class RoomDetailController extends Controller
{
    private RoomRepositoryInterface $roomRepo;

    public function __construct(RoomRepositoryInterface $roomRepo)
    {
        $this->roomRepo = $roomRepo;
    }

    public function index(Request $r, $id)
    {
        return view('roomdetail', [
            'room' => $this->roomRepo->roomDetail($id),
        ]);
    }

    public function postReview(Request $r)
    {
        $userId = intval($r->input("userId"));
        $roomId = $r->input("roomId");
        $rating = floatval($r->input('rating_review'));
        $content = $r->input('review_text');

        $comment = new Comment();

        $comment->rating = $rating;
        $comment->content = $content;
        $comment->user_id = $userId;
        $comment->room_id = $roomId;
        
        $comment->save();
        
        return redirect("/room/".$roomId);
    }
}
