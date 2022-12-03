<?php

namespace App\Interfaces;

interface DashboardRepositoryInterface {
    public function IncomeDataGraphData($year);
    public function oneYearCancelData($year);
    public function oneYearPendingData($year);
    public function oneYearSuccessData($year);
    public function roomOrderQuantity($year);
}

// 1. grafik sukses
// 2. graph cancel
// 3. jumlah order deny
// 4. graph total pemasukan
// 5. tabel kuantitas pemesanan ruangan