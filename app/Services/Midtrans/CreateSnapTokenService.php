<?php

namespace App\Services\Midtrans;

use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans {
    /**
     *  type array:
     *  [
     *      'transaction_details' => [
     *           'order_id' => string,
     *           'gross_amount' => integer,
     *       ],
     *      'customer_details' => [
     *           'first_name' => string,
     *           'last_name' => string,
     *           'email' => string,
     *           'phone' => string,
     *           'billing_address' => [
     *                  'address' => string,
     *                  'city' => string,
     *                  'postal_code' => string,
     *                  'country_code' => string,
     *           ],
     *       ],
     *  ]
     */
    protected $order;
 
    public function __construct($order)
    {
        parent::__construct();
 
        $this->order = $order;
    }

    public function getSnapToken()
    {
        $snapToken = Snap::getSnapToken($this->order);
 
        return $snapToken;
    }
}