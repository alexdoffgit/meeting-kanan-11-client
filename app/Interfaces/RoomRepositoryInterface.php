<?php

namespace App\Interfaces;

interface RoomRepositoryInterface {
    public function roomListWithAverageRating($load, $sort);
    public function roomDetail($id);
}