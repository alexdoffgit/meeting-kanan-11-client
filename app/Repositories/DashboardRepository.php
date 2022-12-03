<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\Room;
use App\Interfaces\DashboardRepositoryInterface;

class DashboardRepository implements DashboardRepositoryInterface {
    public function IncomeDataGraphData($year)
    {
        $order = new Order();
        $settled = $order
            ->where('status', 'settlement')
            ->get();

        $yearlyOrder = $settled->filter(function ($order, $key) use ($year) {
            return $order->created_at->format('Y') == $year;
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
    public function oneYearCancelData($year)
    {
        $order = new Order();
        $cancel = $order
            ->where('status', 'cancel')
            ->get()
            ->filter(function ($order, $key) use ($year) {
                return $order->created_at->format('Y') == $year;
            })
            ->count();
        return $cancel;
    }

    // TODO: add filter by year
    public function oneYearPendingData($year) 
    {
        $order = new Order();
        $pending = $order
            ->where('status', 'pending')
            ->get()
            ->filter(function ($order, $key) use ($year) {
                return $order->created_at->format('Y') == $year;
            })
            ->count();
        return $pending;
    }

    // TODO: add filter by year
    public function oneYearSuccessData($year)
    {
        $order = new Order();
        $success = $order
            ->where('status', 'settlement')
            ->get()
            ->filter(function ($order, $key) use ($year) {
                return $order->created_at->format('Y') == $year;
            })
            ->count();
        return $success;
    }

    // TODO: add filter by year
    public function roomOrderQuantity($year)
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

        $yearlyOrder = Order::all()
            ->filter(function ($order, $key) use ($year) {
                return $order->created_at->format('Y') == $year;
            });

        foreach($yearlyOrder as $order) {
            foreach($order->bookings as $booking) {
                $roomName = $booking->room->room_name;

                $roomOrderQuantity[$roomName]
                    = $roomOrderQuantity[$roomName] + 1;
            }
        }

        return $roomOrderQuantity;
    }
}