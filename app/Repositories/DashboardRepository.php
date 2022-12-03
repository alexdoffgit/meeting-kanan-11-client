<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\Room;
use App\Interfaces\DashboardRepositoryInterface;

class DashboardRepository implements DashboardRepositoryInterface {
    public function IncomeDataGraphData()
    {
        $order = new Order();
        $settled = $order
            ->where('status', 'settlement')
            ->get();

        $yearlyOrder = $settled->filter(function ($order, $key) {
            return $order->created_at->format('Y') == '2023';
        });

        $graphData = [
            '1' => [
                'month' => '',
                'quantity' => 0,
                'total_price' => 0
            ],
            '2' => [
                'month' => '',
                'quantity' => 0,
                'total_price' => 0
            ],
            '3' => [
                'month' => '',
                'quantity' => 0,
                'total_price' => 0
            ],
            '4' => [
                'month' => '',
                'quantity' => 0,
                'total_price' => 0
            ],
            '5' => [
                'month' => '',
                'quantity' => 0,
                'total_price' => 0
            ],
            '6' => [
                'month' => '',
                'quantity' => 0,
                'total_price' => 0
            ],
            '7' => [
                'month' => '',
                'quantity' => 0,
                'total_price' => 0
            ],
            '8' => [
                'month' => '',
                'quantity' => 0,
                'total_price' => 0
            ],
            '9' => [
                'month' => '',
                'quantity' => 0,
                'total_price' => 0
            ],
            '10' => [
                'month' => '',
                'quantity' => 0,
                'total_price' => 0
            ],
            '11' => [
                'month' => '',
                'quantity' => 0,
                'total_price' => 0
            ],
            '12' => [
                'month' => '',
                'quantity' => 0,
                'total_price' => 0
            ],
        ];

        foreach($yearlyOrder as $order) {
            $price = $order->bookings->map(function($booking, $key) {
                return $booking->room->price;
            })->first();

            $graphData[$order->updated_at->format('n')]['month'] 
                = $order->updated_at->format('M');
            $graphData[$order->updated_at->format('n')]['quantity']
                = $graphData[$order->updated_at->format('n')]['quantity'] + 1;
            $graphData[$order->updated_at->format('n')]['total_price']
                = $graphData[$order->updated_at->format('n')]['total_price'] 
                    + intval($price);
        }

        return $graphData;
    }

    // TODO: add filter by year
    public function oneYearCancelData()
    {
        $order = new Order();
        $cancel = $order
            ->where('status', 'cancel')
            ->get()
            ->count();
        return $cancel;
    }

    // TODO: add filter by year
    public function oneYearPendingData() 
    {
        $order = new Order();
        $pending = $order
            ->where('status', 'pending')
            ->get()
            ->count();
        return $pending;
    }

    // TODO: add filter by year
    public function oneYearSuccessData()
    {
        $order = new Order();
        $success = $order
            ->where('status', 'settlement')
            ->get()
            ->count();
        return $success;
    }

    // TODO: add filter by year
    public function roomOrderQuantity()
    {
        $roomsName = Room::all('room_name')
            ->map(function($room, $key) {
                return $room->room_name;
            })
            ->all();

        $roomOrderQuantity = [];

        foreach($roomsName as $roomName) {
            $roomOrderQuantity[$roomName] = 0;
        }

        foreach(Order::all() as $order) {
            foreach($order->bookings as $booking) {
                $roomName = $booking->room->room_name;

                $roomOrderQuantity[$roomName]
                    = $roomOrderQuantity[$roomName] + 1;
            }
        }

        return $roomOrderQuantity;
    }
}