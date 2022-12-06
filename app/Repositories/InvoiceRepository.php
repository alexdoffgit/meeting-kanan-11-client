<?php

namespace App\Repositories;

use App\Interfaces\InvoiceRepositoryInterface;
use App\Models\Cart;
use Carbon\Carbon;

class InvoiceRepository implements InvoiceRepositoryInterface {
    public function invoiceData()
    {
        return Cart::where('user_id', auth()->user()->id)
            ->get()
            ->map(function($cart, $key) {
                $dateStart = new Carbon($cart->booking_day_start);
                $dateEnd = new Carbon($cart->booking_day_end);

                $timeStart = new Carbon($cart->booking_time_start);
                $timeEnd = new Carbon($cart->booking_time_end);

                return [
                    'booking_start' => $dateStart->format('l, j F'),
                    'booking_end' => $dateEnd->format('l, j F'),
                    'time_start' => $timeStart->format('H:i'),
                    'time_end' => $timeEnd->format('H:i'),
                    'attendant' => $cart->attendant,
                    'room_name' => $cart->room->room_name,
                    'price' => $cart->room->price
                ];
            })
            ->pipe(function($invoiceCollection) {
                $orderDate = Carbon::now()->format('l, j F');
                $paymentId = uniqid();
                $totalPay = $invoiceCollection->sum('price');

                return [
                    'invoice_table' => $invoiceCollection->all(),
                    'order_date' => $orderDate,
                    'payment_id' => $paymentId,
                    'total_pay' => $totalPay
                ];
            });
    }
}