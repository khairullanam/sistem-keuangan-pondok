<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\KeuanganController;
use App\Models\Santri;
use App\Models\Keuangan;
use App\Models\KoperasiTransaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
         if (auth()->user()->role !== 'admin') {
        abort(403);
    
    }
        $jumlahSantri = Santri::count();
        $jumlahtransaksi = KoperasiTransaction::count();
        $jumlahKamar = Santri::whereNotNull('kamar')->count();


        $ringkasan = KeuanganController::getRingkasanKeuangan();

        return view('admin.dashboard.index', [
        'jumlahSantri' => $jumlahSantri,
        'jumlahKamar' => $jumlahKamar,
        'jumlahtransaksi' => $jumlahtransaksi,
        'totalSaldo' => $ringkasan['total_saldo'],
        'totalSppDibayar' => $ringkasan['total_spp'],
        'totalSimpanan' => $ringkasan['total_simpanan'],
        'totaltarik' => $ringkasan['total_penarikan'],
    ]);
    }


    
}
