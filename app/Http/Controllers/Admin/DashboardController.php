<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Interfaces\DashboardRepositoryInterface;
use App\Models\Booking;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class DashboardController extends Controller
{
    public DashboardRepositoryInterface $repo;

    public function __construct(DashboardRepositoryInterface $repo)
    {
        $this->repo = $repo;
    }

    public function index(Request $request)
    {
        $incomeData = $this->repo->IncomeDataGraphData();
        $cancelData = $this->repo->oneYearCancelData();
        $pendingData = $this->repo->oneYearPendingData();
        $successData = $this->repo->oneYearSuccessData();
        $orderCount = $this->repo->roomOrderQuantity();

        return view('admin.dashboard', [
            'incomes' => $incomeData,
            'cancel' => $cancelData,
            'pending' => $pendingData,
            'success' => $successData,
            'ordersCount' => $orderCount
        ]);
    }
}

// 1. grafik sukses
// 2. graph cancel
// 3. jumlah order deny
// 4. graph total pemasukan
// 5. tabel kuantitas pemesanan ruangan