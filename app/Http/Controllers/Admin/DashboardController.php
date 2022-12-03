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
        $year = !empty(session()->has('year')) ? session()->get('year') : '2023';

        $incomeData = $this->repo->IncomeDataGraphData($year);
        $cancelData = $this->repo->oneYearCancelData($year);
        $pendingData = $this->repo->oneYearPendingData($year);
        $successData = $this->repo->oneYearSuccessData($year);
        $orderCount = $this->repo->roomOrderQuantity($year);

        return view('admin.dashboard', [
            'incomes' => $incomeData,
            'cancel' => $cancelData,
            'pending' => $pendingData,
            'success' => $successData,
            'ordersCount' => $orderCount
        ]);
    }

    public function filter(Request $request)
    {
        $year = !empty($request->year) ? $request->year : '2023';

        return redirect('/admin/dashboard')->with('year', $year);
    }
}