<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Services\Midtrans\SnapService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

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
    
            $snap = new SnapService([
                    'transaction_details' => [
                        'order_id' => uniqid(),
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

            return redirect()->away($snap->getSnapRedirectUrl());
        } catch(ValidationException $v) {
            return response('please fill all field', 400);
        } catch(\Throwable $th) {
            Log::error($th);
            return response('internal server error', 500);
        }
    }
}
