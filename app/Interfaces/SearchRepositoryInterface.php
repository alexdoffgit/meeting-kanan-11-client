<?php

namespace App\Interfaces;

interface SearchRepositoryInterface {
    /*
    * $detail: [
    *       'room_name' => string,
    *       'maxpeople' => string | int,
    *       'sort' => string
    * ]
    */
    public function homeSearch($detail);

    /*
    * $detail: [
    *       'room_name' => string,
    *       'location' => string,
    *       'maxpeople' => string | int,
    *       'sort' => string
    * ]
    */
    public function roomsSearch($detail);
}