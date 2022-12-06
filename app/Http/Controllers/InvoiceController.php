<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\InvoiceRepositoryInterface;


class InvoiceController extends Controller
{
    private InvoiceRepositoryInterface $repo;

    public function __construct(InvoiceRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index()
    {
        session()->reflash();

        $invoice = $this->repo->invoiceData();
        
        session()->flash('payment_id', $invoice['payment_id']);

        return view('invoice', ['invoiceData' => $invoice]);
    }
}
