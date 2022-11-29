<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class OrderController extends Controller
{
    public function checkout(Request $request)
    {
        
    }
}
