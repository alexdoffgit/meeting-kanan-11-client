<?php

namespace App\Interfaces;

interface DashboardRepositoryInterface {
    public function IncomeDataGraphData();
    public function oneYearCancelData();
    public function oneYearPendingData();
    public function oneYearSuccessData();
    public function roomOrderQuantity();
}

// 1. grafik sukses
// 2. graph cancel
// 3. jumlah order deny
// 4. graph total pemasukan
// 5. tabel kuantitas pemesanan ruangan