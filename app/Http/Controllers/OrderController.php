<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Cart;
use App\Services\Midtrans\SnapService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;
use App\Services\Midtrans\CallbackService;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        try {
            $data = $request->validate([
                "firstname_booking" => 'required',
                "lastname_booking" => 'required',
                "email_booking" => 'required|email',
                "email_confirm" => 'required|email|same:email_booking',
                "telephone_booking" => 'required|string',
                "address" => 'required|string',
                "city" => 'required|string',
                "postal_code" => 'required|string',
                "country_code" => 'required|string'
            ]);
    
            $cart = new Cart();
    
            $userId = (!empty(auth()->user())) ? auth()->user()->id : null;
            
            $orderId = uniqid();

            $snap = new SnapService([
                    'transaction_details' => [
                        'order_id' => $orderId,
                        'gross_amount' => $cart->cartData($userId)['total_price']
                    ],
                    'customer_details' => [
                        'first_name' => $data['firstname_booking'],
                        'last_name' => $data['lastname_booking'],
                        'email' => $data['email_booking'],
                        'phone' => $data['telephone_booking'],
                        'billing_address' => [
                            'address' => $data['address'],
                            'city' => $data['city'],
                            'postal_code' => $data['postal_code'],
                            'country_code' => $data['country_code'],
                        ]
                    ]
                ]
            );

            $redirectUrl = $snap->getSnapRedirectUrl();

            $this->addToOrder($orderId);

            $this->addToBooking($orderId);
            
            $this->emptyUserCart();

            return redirect()->away($redirectUrl);
        } catch(ValidationException $v) {
            return back()->with('error-order', 'please fill all field');
        } catch(\Throwable $th) {
            Log::error($th);
            return response('internal server error', 500);
        }
    }

    public function receiveMidtransNotification(Request $request)
    {
        $callback = new CallbackService();

        if ($callback->isSignatureKeyVerified()) {
            $notification = $callback->getNotification();
            $order = $callback->getOrder();
 
            if ($callback->isSuccess()) {
                Order::where('id', $order->id)->update([
                    'status' => 'settlement',
                ]);
            }
 
            if ($callback->isExpire()) {
                Order::where('id', $order->id)->update([
                    'status' => 'expire',
                ]);
            }
 
            if ($callback->isCancelled()) {
                Order::where('id', $order->id)->update([
                    'status' => 'cancel',
                ]);
            }
 
            return response()
                ->json([
                    'success' => true,
                    'message' => 'Notifikasi berhasil diproses',
                ]);
        } else {
            return response()
                ->json([
                    'error' => true,
                    'message' => 'Signature key tidak terverifikasi',
                ], 403);
        }
    }

    private function addToOrder($orderId)
    {
        $order = new Order();
        $order->payment_order_id = $orderId;
        $order->status = 'pending';
        $order->user_id = auth()->user()->id;
        $order->save();
    }

    private function addToBooking($orderId)
    {
        $userCart = Cart::where('user_id', auth()->user()->id)->get();
        $order = Order::where('payment_order_id', $orderId)->first();

        foreach($userCart as $c) {
            Booking::create([
                'booking_day_start' => $c->booking_day_start,
                'booking_day_end' => $c->booking_day_end,
                'booking_time_start' => $c->booking_time_start,
                'booking_time_end' => $c->booking_time_end,
                'attendant' => $c->attendant,
                'room_id' => $c->room_id,
                'order_id' => $order->id,
            ]);
        }
    }

    private function emptyUserCart()
    {
        Cart::where('user_id', auth()->user()->id)->delete();
    }
}
